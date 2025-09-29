<?php

namespace App\Controllers;

use App\Models\InventoryModel;
use App\Models\ShipmentModel;
use App\Models\ApprovalModel;
use App\Models\ReportModel;

class WarehouseManagerController extends BaseController
{
    public function dashboard()
    {
        $inventoryModel = new InventoryModel();
        $data['inventory_summary'] = $inventoryModel->getSummary();
        return view('warehouse_manager/dashboard', $data);
    }

    public function inventoryOverview()
    {
        $inventoryModel = new InventoryModel();
        $data['inventory'] = $inventoryModel->findAll();
        return view('warehouse_manager/inventory_overview', $data);
    }

    public function receiving()
    {
        $shipmentModel = new ShipmentModel();
        $data['incoming_shipments'] = $shipmentModel->getIncoming();
        return view('warehouse_manager/receiving', $data);
    }

    public function shipping()
    {
        $shipmentModel = new ShipmentModel();
        $data['outgoing_shipments'] = $shipmentModel->getOutgoing();
        return view('warehouse_manager/shipping', $data);
    }

    public function approvals()
    {
        $approvalModel = new ApprovalModel();
        $data['pending_approvals'] = $approvalModel->getPending();
        return view('warehouse_manager/approvals', $data);
    }

    public function batchTracking()
    {
        $inventoryModel = new InventoryModel();
        $data['batches'] = $inventoryModel->getBatches();
        return view('warehouse_manager/batch_tracking', $data);
    }

    public function reports()
    {
        $reportModel = new ReportModel();
        $data['reports'] = $reportModel->getManagerReports();
        return view('warehouse_manager/reports', $data);
    }
}