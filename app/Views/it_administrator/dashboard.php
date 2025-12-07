<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Admin Dashboard - WeBuild WITMS</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/warehouse-manager.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <div class="logo">
                <i class="fas fa-hard-hat"></i>
                <h2>WeBuild WITMS</h2>
            </div>
            <nav class="nav-menu">
                <a href="<?= base_url('itadmin/dashboard') ?>" class="nav-item active">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </nav>
            <a href="<?= base_url('logout') ?>" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </aside>

        <main class="main-content">
            <div class="top-bar">
                <h1>IT Administrator Dashboard</h1>
                <div class="user-info">
                    <span>Welcome, <?= session()->get('username') ?></span>
                </div>
            </div>

            <div class="dashboard-content">
                <div class="dashboard-card">
                    <h2>System Administration</h2>
                    <p>Dashboard coming soon...</p>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
