<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WM Batch Tracking</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/wm-batch-tracking.css') ?>">
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
            <li><a href="<?= base_url('warehouse-manager/shipping') ?>">Shipping</a></li>
            <li><a href="<?= base_url('warehouse-manager/approvals') ?>">Approvals</a></li>
            <li><a href="<?= base_url('warehouse-manager/batch-tracking') ?>" class="active">Batch/Lot Tracking</a></li>
            <li><a href="<?= base_url('warehouse-manager/reports') ?>">Reports</a></li>
        </ul>
        <div class="logout-box">
            <a href="<?= base_url('auth/logout') ?>" class="logout-link">Logout</a>
        </div>
    </div>
    <div class="main-content">
        <div class="dashboard-section" id="batch-section">
            <h2>Batch/Lot Tracking</h2>
            <button class="add-item-btn" id="openAddModalBtn">+ Add Batch</button>
            <div class="batch-table-wrapper">
                <table class="batch-table">
                    <thead>
                        <tr>
                            <th>Batch Number</th>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Location</th>
                            <th>Expiry Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="batch-table-body"></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Batch Modal -->
    <div class="modal" id="addModal">
        <div class="modal-content">
            <span class="close" id="closeAddModal">&times;</span>
            <h3>Add Batch</h3>
            <form id="addBatchForm">
                <?= csrf_field() ?>
                <label for="batch_number">Batch Number</label>
                <input type="text" id="batch_number" name="batch_number" required>

                <label for="item_name">Item Name</label>
                <input type="text" id="item_name" name="item_name" required>

                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" name="quantity" min="0" required>

                <label for="location">Location</label>
                <input type="text" id="location" name="location">

                <label for="expiry_date">Expiry Date</label>
                <input type="date" id="expiry_date" name="expiry_date">

                <button type="submit">Add Batch</button>
                <div class="success-message" id="addSuccessMsg"></div>
            </form>
        </div>
    </div>


    <!-- Edit Batch Modal -->
    <div class="modal" id="editModal">
        <div class="modal-content">
            <span class="close" id="closeEditModal">&times;</span>
            <h3>Edit Batch</h3>
            <form id="editBatchForm">
                <?= csrf_field() ?>
                <label for="editBatchNumber">Batch Number</label>
                <input type="text" id="editBatchNumber" name="batch_number" required>

                <label for="editItemName">Item Name</label>
                <input type="text" id="editItemName" name="item_name" required>

                <label for="editQuantity">Quantity</label>
                <input type="number" id="editQuantity" name="quantity" min="0" required>

                <label for="editLocation">Location</label>
                <input type="text" id="editLocation" name="location">

                <label for="editExpiryDate">Expiry Date</label>
                <input type="date" id="editExpiryDate" name="expiry_date">

                <button type="submit">Save Changes</button>
                <div class="success-message" id="editSuccessMsg"></div>
            </form>
        </div>
    </div>

    <!-- View Batch Modal -->
    <div class="modal" id="viewModal">
        <div class="modal-content">
            <span class="close" id="closeViewModal">&times;</span>
            <h3>Batch Details</h3>
            <div id="viewBatchDetails"></div>
        </div>
    </div>

    <!-- Confirm Delete Modal -->
    <div class="modal" id="deleteModal">
        <div class="modal-content">
            <span class="close" id="closeDeleteModal">&times;</span>
            <h3>Delete Batch</h3>
            <div id="deleteBatchDetails"></div>
            <div class="delete-modal-actions">
                <button id="confirmDeleteBtn" class="action-btn" style="background:#d8000c;">Delete</button>
                <button id="cancelDeleteBtn" class="action-btn">Cancel</button>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/wm-batch-tracking.js') ?>"></script>
</body>
</html>
