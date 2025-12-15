<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Warehouse Manager Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/warehouse-manager.css') ?>">
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="<?= base_url('assets/images/WeBuild.png') ?>" alt="WeBuild Logo" class="sidebar-logo">
            <span class="sidebar-title">Warehouse Manager</span>
        </div>
        <ul>
            <li><a href="<?= base_url('warehouse-manager/dashboard') ?>" id="dashboard-link"
                    class="active">Dashboard</a></li>
            <li><a href="<?= base_url('warehouse-manager/inventory-overview') ?>" id="inventory-link">Inventory
                    Overview</a></li>
            <li><a href="<?= base_url('warehouse-manager/receiving') ?>" id="receiving-link">Receiving</a></li>
            <li><a href="<?= base_url('warehouse-manager/shipping') ?>" id="shipping-link">Shipping</a></li>
            <li><a href="<?= base_url('warehouse-manager/approvals') ?>" id="approvals-link">Approvals</a></li>
            <li><a href="<?= base_url('warehouse-manager/batch-tracking') ?>" id="batch-link">Batch/Lot Tracking</a>
            </li>
            <li><a href="<?= base_url('warehouse-manager/reports') ?>" id="reports-link">Reports</a></li>
        </ul>
        <div class="logout-box">
            <a href="<?= base_url('auth/logout') ?>" class="logout-link">Logout</a>
        </div>
    </div>
    <div class="main-content">
        <div id="dashboard-section">
            <h1>Welcome, Warehouse Manager!</h1>
            <div class="dashboard-row">
                <div class="dashboard-col">
                    <div class="dashboard-cards">
                        <div class="dashboard-card">
                            <div class="card-title">Total Inventory Items</div>
                            <div class="card-value" id="stat-inventory">
                                <?= number_format($inventory_summary['total_items'] ?? 0) ?>
                            </div>
                        </div>
                        <div class="dashboard-card">
                            <div class="card-title">Low Stock Alerts</div>
                            <div class="card-value" id="stat-lowstock"><?= $inventory_summary['low_stock'] ?? 0 ?></div>
                        </div>
                        <div class="dashboard-card">
                            <div class="card-title">Pending Shipments</div>
                            <div class="card-value" id="stat-shipments"><?= $pending_shipments ?? 0 ?></div>
                        </div>
                        <div class="dashboard-card">
                            <div class="card-title">Pending Receivings</div>
                            <div class="card-value" id="stat-receivings"><?= $pending_receivings ?? 0 ?></div>
                        </div>
                        <div class="dashboard-card">
                            <div class="card-title">Active Users/Staff</div>
                            <div class="card-value" id="stat-users"><?= $active_users ?? 0 ?></div>
                        </div>
                    </div>
                    <div class="dashboard-section">
                        <h2>Inventory & Shipment Trends</h2>
                        <div class="dashboard-chart-placeholder">
                            <span>Charts/Graphs (Inventory trends, Shipment volume over time) - Coming Soon</span>
                        </div>
                    </div>
                    <div class="dashboard-section">
                        <h2>Recent Activity</h2>
                        <ul class="activity-list" id="activity-list">
                            <?php if (!empty($recent_activities)): ?>
                                <?php foreach ($recent_activities as $activity): ?>
                                    <li>
                                        <?= ucfirst($activity['type']) ?> shipment #<?= $activity['shipment_number'] ?? 'N/A' ?>
                                        -
                                        Status: <?= ucfirst($activity['status']) ?>
                                        (<?= date('M d, Y', strtotime($activity['created_at'])) ?>)
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li>No recent activities</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="dashboard-col dashboard-col-right">
                    <div class="dashboard-section">
                        <h2>Notifications & Alerts</h2>
                        <ul class="notification-list" id="notification-list">
                            <?php if (!empty($low_stock_items)): ?>
                                <?php foreach ($low_stock_items as $item): ?>
                                    <li>Low stock: <?= $item['item_name'] ?> (<?= $item['quantity'] ?>
                                        <?= $item['unit'] ?? 'units' ?> left)</li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li style="color: #1a8f1a; border-left-color: #1a8f1a;">All items are well stocked!</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="dashboard-section">
                        <h2>Approval Requests</h2>
                        <ul class="approval-list" id="approval-list">
                            <?php if (!empty($pending_approvals)): ?>
                                <?php foreach (array_slice($pending_approvals, 0, 5) as $approval): ?>
                                    <li>
                                        <span>
                                            <strong><?= ucfirst($approval['request_type'] ?? 'Request') ?>:</strong> 
                                            <?= $approval['description'] ?? 'Pending approval' ?>
                                            <span style="color:#e6a700;font-weight:600;margin-left:0.5rem;">Pending</span>
                                        </span>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li>No pending approval requests</li>
                            <?php endif; ?>
                        </ul>
                        <a href="<?= base_url('warehouse-manager/approvals') ?>" class="approval-link">View all approval
                            requests &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="dynamic-content"></div>
    </div>
    <script src="<?= base_url('assets/js/warehouse-manager.js') ?>"></script>
</body>

</html>