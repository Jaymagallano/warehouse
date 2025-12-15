<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WM Inventory Overview</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/wm-inventory-overview.css') ?>">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="<?= base_url('assets/images/WeBuild.png') ?>" alt="WeBuild Logo" class="sidebar-logo">
            <span class="sidebar-title">Warehouse Manager</span>
        </div>
        <ul>
            <li><a href="<?= base_url('warehouse-manager/dashboard') ?>">Dashboard</a></li>
            <li><a href="<?= base_url('warehouse-manager/inventory-overview') ?>" class="active">Inventory Overview</a></li>
            <li><a href="<?= base_url('warehouse-manager/receiving') ?>">Receiving</a></li>
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
        <div class="dashboard-section" id="inventory-overview-section">
            <h2>Inventory Overview</h2>
            <button class="add-item-btn" id="openAddModalBtn">+ Add Item</button>
            <div class="inventory-table-wrapper">
                <table class="inventory-table">
                    <thead>
                        <tr>
                            <th>Material Name</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Unit</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="inventory-table-body"></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Item Modal -->
    <div class="modal" id="addModal">
        <div class="modal-content">
            <span class="close" id="closeAddModal">&times;</span>
            <h3>Add Inventory Item</h3>
            <form id="addInventoryForm">
                <?= csrf_field() ?>

                <label for="item_name">Material Name</label>
                <input type="text" id="item_name" name="item_name" required>

                <label for="category">Category</label>
                <input type="text" id="category" name="category" required>

                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" name="quantity" min="0" required>

                <label for="unit">Unit</label>
                <input type="text" id="unit" name="unit" required>

                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="">Select Status...</option>
                    <option value="OK">OK</option>
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                </select>

                <button type="submit">Add Item</button>
                <div class="success-message" id="addSuccessMsg"></div>
            </form>
        </div>
    </div>

    <!-- Edit Item Modal -->
    <div class="modal" id="editModal">
        <div class="modal-content">
            <span class="close" id="closeEditModal">&times;</span>
            <h3>Edit Inventory Item</h3>
            <form id="editInventoryForm">
                <?= csrf_field() ?>
                <label for="editMaterialName">Material Name</label>
                <input type="text" id="editMaterialName" name="item_name" required>

                <label for="editCategory">Category</label>
                <input type="text" id="editCategory" name="category" required>

                <label for="editQuantity">Quantity</label>
                <input type="number" id="editQuantity" name="quantity" min="0" required>

                <label for="editUnit">Unit</label>
                <input type="text" id="editUnit" name="unit" required>

                <label for="editStatus">Status</label>
                <select id="editStatus" name="status" required>
                    <option value="">Select Status...</option>
                    <option value="OK">OK</option>
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                </select>

                <button type="submit">Save Changes</button>
                <div class="success-message" id="editSuccessMsg"></div>
            </form>
        </div>
    </div>

    <!-- View Item Modal -->
    <div class="modal" id="viewModal">
        <div class="modal-content">
            <span class="close" id="closeViewModal">&times;</span>
            <h3>Inventory Item Details</h3>
            <div id="viewItemDetails"></div>
        </div>
    </div>

    <!-- Confirm Delete Modal -->
    <div class="modal" id="deleteModal">
        <div class="modal-content">
            <span class="close" id="closeDeleteModal">&times;</span>
            <h3>Delete Inventory Item</h3>
            <div id="deleteItemDetails"></div>
            <div class="delete-modal-actions">
                <button id="confirmDeleteBtn" class="action-btn" style="background:#d8000c;">Delete</button>
                <button id="cancelDeleteBtn" class="action-btn">Cancel</button>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/wm-inventory-overview.js') ?>"></script>
</body>
</html>
