<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AP Clerk Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/apclerk.css') ?>">
</head>
<body>
<div class="container">
    <header>
        <h1>Accounts Payable Clerk</h1>
        <p>Welcome, <?= session()->get('username'); ?>!</p>
        <nav>
            <a href="<?= base_url('apclerk/invoices') ?>">Invoices</a>
            <a href="<?= base_url('apclerk/payments') ?>">Payments</a>
            <a href="<?= base_url('apclerk/reports') ?>">Reports</a>
            <a href="<?= base_url('logout') ?>" class="logout">Logout</a>
        </nav>
    </header>

    <main>
        <h2>Quick Overview</h2>
        <div class="cards">
            <div class="card">
                <h3>Pending Invoices</h3>
                <p>24</p>
            </div>
            <div class="card">
                <h3>Approved Payments</h3>
                <p>15</p>
            </div>
            <div class="card">
                <h3>Outstanding Payables</h3>
                <p>₱45,000</p>
            </div>
        </div>
    </main>
</div>
</body>
</html>
