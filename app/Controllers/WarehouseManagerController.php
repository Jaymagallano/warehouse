<?php

namespace App\Controllers;

use App\Models\InventoryModel;
use App\Models\ShipmentModel;
use App\Models\ApprovalModel;
use App\Models\ReportModel;

class WarehouseManagerController extends BaseController
{
    protected $inventoryModel;
    protected $shipmentModel;
    protected $approvalModel;
    protected $reportModel;

    public function __construct()
    {
        $this->inventoryModel = new InventoryModel();
        $this->shipmentModel = new ShipmentModel();
        $this->approvalModel = new ApprovalModel();
        $this->reportModel = new ReportModel();
    }

    // ==================== DASHBOARD ====================
    public function dashboard()
    {
        // Get inventory summary
        $data['inventory_summary'] = $this->inventoryModel->getSummary();

        // Get pending shipments (outgoing)
        $data['pending_shipments'] = $this->shipmentModel
            ->where('type', 'outgoing')
            ->where('status', 'pending')
            ->countAllResults();

        // Get pending receivings (incoming)
        $data['pending_receivings'] = $this->shipmentModel
            ->where('type', 'incoming')
            ->where('status', 'pending')
            ->countAllResults();

        // Get pending approvals
        $data['pending_approvals'] = $this->approvalModel
            ->where('status', 'pending')
            ->findAll();

        // Get recent activities (last 5 shipments)
        $data['recent_activities'] = $this->shipmentModel
            ->orderBy('created_at', 'DESC')
            ->limit(5)
            ->findAll();

        // Get low stock notifications
        $data['low_stock_items'] = $this->inventoryModel
            ->where('quantity <', 10)
            ->findAll();

        // Get active users count (you may need to adjust this based on your User model)
        $data['active_users'] = 8; // Placeholder - update with actual user count if you have a User model

        return view('warehouse_manager/dashboard', $data);
    }

    // ==================== INVENTORY CRUD ====================
    public function inventoryOverview()
    {
        $data['inventory'] = $this->inventoryModel->findAll();
        return view('warehouse_manager/inventory_overview', $data);
    }

    public function getInventoryList()
    {
        $inventory = $this->inventoryModel->findAll();
        return $this->response->setJSON(['status' => 'success', 'data' => $inventory]);
    }

    public function addInventory()
    {
        try {
            $data = [
                'item_name' => $this->request->getPost('item_name'),
                'category' => $this->request->getPost('category'),
                'quantity' => $this->request->getPost('quantity'),
                'unit' => $this->request->getPost('unit'),
                'status' => $this->request->getPost('status'),
            ];

            if ($this->inventoryModel->insert($data)) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Inventory item added successfully']);
            }
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to add inventory item']);
        } catch (\Exception $e) {
            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function getInventory($id)
    {
        $inventory = $this->inventoryModel->find($id);
        if ($inventory) {
            return $this->response->setJSON(['status' => 'success', 'data' => $inventory]);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Inventory item not found']);
    }

    public function updateInventory($id)
    {
        $data = [
            'item_name' => $this->request->getPost('item_name'),
            'category' => $this->request->getPost('category'),
            'quantity' => $this->request->getPost('quantity'),
            'unit' => $this->request->getPost('unit'),
            'status' => $this->request->getPost('status'),
        ];

        if ($this->inventoryModel->update($id, $data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Inventory item updated successfully']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update inventory item']);
    }

    public function deleteInventory($id)
    {
        if ($this->inventoryModel->delete($id)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Inventory item deleted successfully']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete inventory item']);
    }

    // ==================== RECEIVING CRUD ====================
    public function receiving()
    {
        $data['incoming_shipments'] = $this->shipmentModel->getIncoming();
        return view('warehouse_manager/receiving', $data);
    }

    public function getReceivingList()
    {
        $receiving = $this->shipmentModel->getIncoming();
        return $this->response->setJSON(['status' => 'success', 'data' => $receiving]);
    }

    public function addReceiving()
    {
        $data = [
            'shipment_number' => $this->request->getPost('shipment_number'),
            'type' => 'incoming',
            'status' => $this->request->getPost('status') ?? 'pending',
            'supplier_id' => $this->request->getPost('supplier_id'),
            'expected_date' => $this->request->getPost('expected_date'),
            'actual_date' => $this->request->getPost('actual_date'),
        ];

        if ($this->shipmentModel->insert($data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Receiving record added successfully']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to add receiving record']);
    }

    public function getReceiving($id)
    {
        $receiving = $this->shipmentModel->find($id);
        if ($receiving) {
            return $this->response->setJSON(['status' => 'success', 'data' => $receiving]);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Receiving record not found']);
    }

    public function updateReceiving($id)
    {
        $data = [
            'shipment_number' => $this->request->getPost('shipment_number'),
            'status' => $this->request->getPost('status'),
            'supplier_id' => $this->request->getPost('supplier_id'),
            'expected_date' => $this->request->getPost('expected_date'),
            'actual_date' => $this->request->getPost('actual_date'),
        ];

        if ($this->shipmentModel->update($id, $data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Receiving record updated successfully']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update receiving record']);
    }

    public function deleteReceiving($id)
    {
        if ($this->shipmentModel->delete($id)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Receiving record deleted successfully']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete receiving record']);
    }


    // ==================== SHIPPING CRUD ====================
    public function shipping()
    {
        $data['outgoing_shipments'] = $this->shipmentModel->getOutgoing();
        return view('warehouse_manager/shipping', $data);
    }

    public function getShippingList()
    {
        $shipping = $this->shipmentModel->getOutgoing();
        return $this->response->setJSON(['status' => 'success', 'data' => $shipping]);
    }

    public function addShipping()
    {
        $data = [
            'shipment_number' => $this->request->getPost('shipment_number'),
            'type' => 'outgoing',
            'status' => $this->request->getPost('status') ?? 'pending',
            'customer_id' => $this->request->getPost('customer_id'),
            'expected_date' => $this->request->getPost('expected_date'),
            'actual_date' => $this->request->getPost('actual_date'),
        ];

        if ($this->shipmentModel->insert($data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Shipment added successfully']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to add shipment']);
    }

    public function getShipping($id)
    {
        $shipping = $this->shipmentModel->find($id);
        if ($shipping) {
            return $this->response->setJSON(['status' => 'success', 'data' => $shipping]);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Shipment not found']);
    }

    public function updateShipping($id)
    {
        $data = [
            'shipment_number' => $this->request->getPost('shipment_number'),
            'status' => $this->request->getPost('status'),
            'customer_id' => $this->request->getPost('customer_id'),
            'expected_date' => $this->request->getPost('expected_date'),
            'actual_date' => $this->request->getPost('actual_date'),
        ];

        if ($this->shipmentModel->update($id, $data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Shipment updated successfully']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update shipment']);
    }

    public function deleteShipping($id)
    {
        if ($this->shipmentModel->delete($id)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Shipment deleted successfully']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete shipment']);
    }

    // ==================== APPROVALS CRUD ====================
    public function approvals()
    {
        $data['pending_approvals'] = $this->approvalModel->getPending();
        return view('warehouse_manager/approvals', $data);
    }

    public function getApprovalsList()
    {
        $approvals = $this->approvalModel->findAll();
        return $this->response->setJSON(['status' => 'success', 'data' => $approvals]);
    }

    public function approveRequest($id)
    {
        $data = [
            'status' => 'approved',
            'approved_by' => session()->get('user_id'),
        ];

        if ($this->approvalModel->update($id, $data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Request approved successfully']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to approve request']);
    }

    public function rejectRequest($id)
    {
        $data = [
            'status' => 'rejected',
            'approved_by' => session()->get('user_id'),
        ];

        if ($this->approvalModel->update($id, $data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Request rejected successfully']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to reject request']);
    }


    // ==================== BATCH TRACKING CRUD ====================
    public function batchTracking()
    {
        $data['batches'] = $this->inventoryModel->getBatches();
        return view('warehouse_manager/batch_tracking', $data);
    }

    public function getBatchList()
    {
        $batches = $this->inventoryModel->getBatches();
        return $this->response->setJSON(['status' => 'success', 'data' => $batches]);
    }

    public function addBatch()
    {
        $data = [
            'item_name' => $this->request->getPost('item_name'),
            'batch_number' => $this->request->getPost('batch_number'),
            'quantity' => $this->request->getPost('quantity'),
            'expiry_date' => $this->request->getPost('expiry_date'),
            'location' => $this->request->getPost('location'),
        ];

        if ($this->inventoryModel->insert($data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Batch added successfully']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to add batch']);
    }

    public function getBatch($id)
    {
        $batch = $this->inventoryModel->find($id);
        if ($batch) {
            return $this->response->setJSON(['status' => 'success', 'data' => $batch]);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Batch not found']);
    }

    public function updateBatch($id)
    {
        $data = [
            'item_name' => $this->request->getPost('item_name'),
            'batch_number' => $this->request->getPost('batch_number'),
            'quantity' => $this->request->getPost('quantity'),
            'expiry_date' => $this->request->getPost('expiry_date'),
            'location' => $this->request->getPost('location'),
        ];

        if ($this->inventoryModel->update($id, $data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Batch updated successfully']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update batch']);
    }

    public function deleteBatch($id)
    {
        if ($this->inventoryModel->delete($id)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Batch deleted successfully']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete batch']);
    }

    // ==================== REPORTS ====================
    public function reports()
    {
        $data['reports'] = $this->reportModel->getManagerReports();
        return view('warehouse_manager/reports', $data);
    }

    public function generateReport()
    {
        $type = $this->request->getGet('type') ?? 'inventory';
        $startDate = $this->request->getGet('start_date');
        $endDate = $this->request->getGet('end_date');

        $reportData = [];

        switch ($type) {
            case 'inventory':
                $reportData = $this->inventoryModel->findAll();
                break;
            case 'receiving':
                $reportData = $this->shipmentModel->getIncoming();
                break;
            case 'shipping':
                $reportData = $this->shipmentModel->getOutgoing();
                break;
            case 'approvals':
                $reportData = $this->approvalModel->findAll();
                break;
        }

        return $this->response->setJSON([
            'status' => 'success',
            'type' => $type,
            'data' => $reportData
        ]);
    }
}
