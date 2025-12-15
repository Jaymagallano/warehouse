<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WM Receiving</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/wm-receiving.css') ?>">
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
            <li><a href="<?= base_url('warehouse-manager/receiving') ?>" class="active">Receiving</a></li>
            <li><a href="<?= base_url('warehouse-manager/shipping') ?>">Shipping</a></li>
            <li><a href="<?= base_url('warehouse-manager/approvals') ?>">Approvals</a></li>
            <li><a href="<?= base_url('warehouse-manager/batch-tracking') ?>">Batch/Lot Tracking</a></li>
            <li><a href="<?= base_url('warehouse-manager/reports') ?>">Reports</a></li>
        </ul>
        <div class="logout-box">
            <a href="<?= base_url('auth/logout') ?>" class="logout-link">Logout</a>
        </div>
    </div>
    <div class="main-content">
        <div class="dashboard-section" id="receiving-section">
            <h2>Receiving</h2>
            <button class="add-item-btn" id="openAddModalBtn">+ Add Receiving</button>
            <div class="receiving-table-wrapper">
                <table class="receiving-table">
                    <thead>
                        <tr>
                            <th>Shipment No.</th>
                            <th>Supplier</th>
                            <th>Material</th>
                            <th>Quantity</th>
                            <th>Date Received</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="receiving-table-body"></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Receiving Modal -->
    <div class="modal" id="addModal">
        <div class="modal-content">
            <span class="close" id="closeAddModal">&times;</span>
            <h3>Add Receiving</h3>
            <form id="addReceivingForm">
                <?= csrf_field() ?>
                <label for="shipment_number">Shipment Number</label>
                <input type="text" id="shipment_number" name="shipment_number" required>

                <label for="supplier_id">Supplier ID</label>
                <input type="text" id="supplier_id" name="supplier_id" required>

                <label for="expected_date">Expected Date</label>
                <input type="date" id="expected_date" name="expected_date" required>

                <label for="actual_date">Actual Date</label>
                <input type="date" id="actual_date" name="actual_date">

                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="">Select Status...</option>
                    <option value="pending">Pending</option>
                    <option value="received">Received</option>
                    <option value="damaged">Damaged</option>
                </select>

                <button type="submit">Add Receiving</button>
                <div class="success-message" id="addSuccessMsg"></div>
            </form>
        </div>
    </div>


    <!-- Edit Receiving Modal -->
    <div class="modal" id="editModal">
        <div class="modal-content">
            <span class="close" id="closeEditModal">&times;</span>
            <h3>Edit Receiving</h3>
            <form id="editReceivingForm">
                <?= csrf_field() ?>
                <label for="editRefNo">Shipment Number</label>
                <input type="text" id="editRefNo" name="shipment_number" required>

                <label for="editSupplier">Supplier ID</label>
                <input type="text" id="editSupplier" name="supplier_id" required>

                <label for="editExpectedDate">Expected Date</label>
                <input type="date" id="editExpectedDate" name="expected_date" required>

                <label for="editActualDate">Actual Date</label>
                <input type="date" id="editActualDate" name="actual_date">

                <label for="editStatus">Status</label>
                <select id="editStatus" name="status" required>
                    <option value="">Select Status...</option>
                    <option value="pending">Pending</option>
                    <option value="received">Received</option>
                    <option value="damaged">Damaged</option>
                </select>

                <button type="submit">Save Changes</button>
                <div class="success-message" id="editSuccessMsg"></div>
            </form>
        </div>
    </div>

    <!-- View Receiving Modal -->
    <div class="modal" id="viewModal">
        <div class="modal-content">
            <span class="close" id="closeViewModal">&times;</span>
            <h3>Receiving Details</h3>
            <div id="viewReceivingDetails"></div>
        </div>
    </div>

    <!-- Confirm Delete Modal -->
    <div class="modal" id="deleteModal">
        <div class="modal-content">
            <span class="close" id="closeDeleteModal">&times;</span>
            <h3>Delete Receiving</h3>
            <div id="deleteReceivingDetails"></div>
            <div class="delete-modal-actions">
                <button id="confirmDeleteBtn" class="action-btn" style="background:#d8000c;">Delete</button>
                <button id="cancelDeleteBtn" class="action-btn">Cancel</button>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/wm-receiving.js') ?>"></script>
</body>
</html>
