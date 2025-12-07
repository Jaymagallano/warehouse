<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Connection Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .success {
            color: #28a745;
            border: 2px solid #28a745;
            padding: 15px;
            border-radius: 5px;
            background-color: #d4edda;
        }
        .error {
            color: #dc3545;
            border: 2px solid #dc3545;
            padding: 15px;
            border-radius: 5px;
            background-color: #f8d7da;
        }
        .info-box {
            margin-top: 20px;
            padding: 15px;
            background-color: #e7f3ff;
            border-left: 4px solid #2196F3;
        }
        .info-box h3 {
            margin-top: 0;
            color: #2196F3;
        }
        .info-item {
            margin: 10px 0;
        }
        .info-label {
            font-weight: bold;
            display: inline-block;
            width: 150px;
        }
        ul {
            columns: 2;
            -webkit-columns: 2;
            -moz-columns: 2;
        }
        li {
            padding: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔌 Database Connection Test</h1>
        
        <div class="<?= $status ?>">
            <h2><?= $status === 'success' ? '✅ ' : '❌ ' ?><?= esc($message) ?></h2>
        </div>
        
        <?php if ($status === 'success'): ?>
            <div class="info-box">
                <h3>Connection Details</h3>
                <div class="info-item">
                    <span class="info-label">Database:</span>
                    <span><?= esc($database) ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Hostname:</span>
                    <span><?= esc($hostname) ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Username:</span>
                    <span><?= esc($username) ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Driver:</span>
                    <span><?= esc($dbdriver) ?></span>
                </div>
            </div>
            
            <div class="info-box">
                <h3>Database Statistics</h3>
                <div class="info-item">
                    <span class="info-label">Total Users:</span>
                    <span><?= $user_count ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Total Inventory Items:</span>
                    <span><?= $inventory_count ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Total Tables:</span>
                    <span><?= count($tables) ?></span>
                </div>
            </div>
            
            <div class="info-box">
                <h3>Database Tables</h3>
                <ul>
                    <?php foreach ($tables as $table): ?>
                        <li><?= esc($table) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        
        <div style="margin-top: 30px; text-align: center;">
            <a href="<?= base_url() ?>" style="padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;">Back to Home</a>
        </div>
    </div>
</body>
</html>
