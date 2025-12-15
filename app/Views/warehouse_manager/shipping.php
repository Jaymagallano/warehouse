<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WM Shipping</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/wm-shipping.css') ?>">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="<?= base_url('assets/images/WeBuild.png') ?>" alt="WeBuild Logo" class="sidebar-logo">
            <span class="sidebar-title">Warehouse Manager</span>
        </div>
        <ul>
            <li><a href="<?= base_url('warehouse-manager/dashboard') ?>">Dashboard</a></li>
            <li><a href="<?= base_url('warehouse-manager/inventory-overview') ?>">Inventory Overview</a></li>
            <li><a href="<?= base_url('warehouse-manager/receiving') ?>">Receiving</a></li>
            <li><a href="<?= base_url('warehouse-manager/shipping') ?>" class="active">Shipping</a></li>
            <li><a href="<?= base_url('warehouse-manager/approvals') ?>">Approvals</a></li>
            <li><a href="<?= base_url('warehouse-manager/batch-tracking') ?>">Batch/Lot Tracking</a></li>
            <li><a href="<?= base_url('warehouse-manager/reports') ?>">Reports</a></li>
        </ul>
        <div class="logout-box">
            <a href="<?= base_url('auth/logout') ?>" class="logout-link">Logout</a>
        </div>
    </div>
    <div class="main-content">
        <div class="dashboard-section" id="shipping-section">
            <h2>Shipping</h2>
            <button class="add-item-btn" id="openAddModalBtn">+ Add Shipment</button>
            <div class="shipping-table-wrapper">
                <table class="shipping-table">
                    <thead>
                        <tr>
                            <th>Shipment ID</th>
                            <th>Destination</th>
                            <th>Material</th>
                            <th>Quantity</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="shipping-table-body"></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Shipment Modal -->
    <div class="modal" id="addModal">
        <div class="modal-content">
            <span class="close" id="closeAddModal">&times;</span>
            <h3>Add Shipment</h3>
            <form id="addShippingForm">
                <?= csrf_field() ?>
                <label for="shipment_number">Shipment Number</label>
                <input type="text" id="shipment_number" name="shipment_number" required>

                <label for="customer_id">Customer/Destination</label>
                <input type="text" id="customer_id" name="customer_id" required>

                <label for="expected_date">Expected Date</label>
                <input type="date" id="expected_date" name="expected_date" required>

                <label for="actual_date">Actual Date</label>
                <input type="date" id="actual_date" name="actual_date">

                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="">Select Status...</option>
                    <option value="pending">Pending</option>
                    <option value="shipped">Shipped</option>
                    <option value="delivered">Delivered</option>
                    <option value="cancelled">Cancelled</option>
                </select>

                <button type="submit">Add Shipment</button>
                <div class="success-message" id="addSuccessMsg"></div>
            </form>
        </div>
    </div>


    <!-- Edit Shipment Modal -->
    <div class="modal" id="editModal">
        <div class="modal-content">
            <span class="close" id="closeEditModal">&times;</span>
            <h3>Edit Shipment</h3>
            <form id="editShippingForm">
                <?= csrf_field() ?>
                <label for="editShipmentId">Shipment Number</label>
                <input type="text" id="editShipmentId" name="shipment_number" required>

                <label for="editDestination">Customer/Destination</label>
                <input type="text" id="editDestination" name="customer_id" required>

                <label for="editExpectedDate">Expected Date</label>
                <input type="date" id="editExpectedDate" name="expected_date" required>

                <label for="editActualDate">Actual Date</label>
                <input type="date" id="editActualDate" name="actual_date">

                <label for="editStatus">Status</label>
                <select id="editStatus" name="status" required>
                    <option value="">Select Status...</option>
                    <option value="pending">Pending</option>
                    <option value="shipped">Shipped</option>
                    <option value="delivered">Delivered</option>
                    <option value="cancelled">Cancelled</option>
                </select>

                <button type="submit">Save Changes</button>
                <div class="success-message" id="editSuccessMsg"></div>
            </form>
        </div>
    </div>

    <!-- View Shipment Modal -->
    <div class="modal" id="viewModal">
        <div class="modal-content">
            <span class="close" id="closeViewModal">&times;</span>
            <h3>Shipment Details</h3>
            <div id="viewShippingDetails"></div>
        </div>
    </div>

    <!-- Confirm Delete Modal -->
    <div class="modal" id="deleteModal">
        <div class="modal-content">
            <span class="close" id="closeDeleteModal">&times;</span>
            <h3>Delete Shipment</h3>
            <div id="deleteShippingDetails"></div>
            <div class="delete-modal-actions">
                <button id="confirmDeleteBtn" class="action-btn" style="background:#d8000c;">Delete</button>
                <button id="cancelDeleteBtn" class="action-btn">Cancel</button>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/wm-shipping.js') ?>"></script>
</body>
</html>
