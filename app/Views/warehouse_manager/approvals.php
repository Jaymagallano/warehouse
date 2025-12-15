<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WM Approvals</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/wm-approvals.css') ?>">
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
            <li><a href="<?= base_url('warehouse-manager/approvals') ?>" class="active">Approvals</a></li>
            <li><a href="<?= base_url('warehouse-manager/batch-tracking') ?>">Batch/Lot Tracking</a></li>
            <li><a href="<?= base_url('warehouse-manager/reports') ?>">Reports</a></li>
        </ul>
        <div class="logout-box">
            <a href="<?= base_url('auth/logout') ?>" class="logout-link">Logout</a>
        </div>
    </div>
    <div class="main-content">
        <div class="dashboard-section" id="approvals-section">
            <h2>Approval Requests</h2>
            <div class="approvals-table-wrapper">
                <table class="approvals-table">
                    <thead>
                        <tr>
                            <th>Request ID</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Reference</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="approvals-table-body"></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- View Approval Modal -->
    <div class="modal" id="viewModal">
        <div class="modal-content">
            <span class="close" id="closeViewModal">&times;</span>
            <h3>Approval Request Details</h3>
            <div id="viewApprovalDetails"></div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/wm-approvals.js') ?>"></script>
</body>
</html>
