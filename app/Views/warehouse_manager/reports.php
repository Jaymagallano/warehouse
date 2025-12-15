<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WM Reports</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/wm-reports.css') ?>">
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
            <li><a href="<?= base_url('warehouse-manager/batch-tracking') ?>">Batch/Lot Tracking</a></li>
            <li><a href="<?= base_url('warehouse-manager/reports') ?>" class="active">Reports</a></li>
        </ul>
        <div class="logout-box">
            <a href="<?= base_url('auth/logout') ?>" class="logout-link">Logout</a>
        </div>
    </div>
    <div class="main-content">
        <div class="dashboard-section" id="reports-section">
            <h2>Reports</h2>
            <div class="report-filters">
                <div class="filter-group">
                    <label for="reportType">Report Type</label>
                    <select id="reportType">
                        <option value="">Select Report Type...</option>
                        <option value="inventory">Inventory Report</option>
                        <option value="receiving">Receiving Report</option>
                        <option value="shipping">Shipping Report</option>
                        <option value="approvals">Approvals Report</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label for="startDate">Start Date</label>
                    <input type="date" id="startDate">
                </div>
                <div class="filter-group">
                    <label for="endDate">End Date</label>
                    <input type="date" id="endDate">
                </div>
                <div class="filter-actions">
                    <button id="generateReportBtn" class="action-btn">Generate Report</button>
                    <button id="exportPdfBtn" class="action-btn">Export PDF</button>
                    <button id="exportExcelBtn" class="action-btn">Export Excel</button>
                </div>
            </div>
            <div class="report-content" id="reportContent">
                <p>Select a report type and click "Generate Report" to view data.</p>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/wm-reports.js') ?>"></script>
</body>
</html>
