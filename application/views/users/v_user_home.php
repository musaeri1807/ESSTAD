<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f5f5f5;
        }

        .container {
            max-width: 100%;
            padding: 15px;
        }

        /* Header Styles */
        .header {
            background: #007bff;
            color: white;
            padding: 20px 15px;
            border-radius: 0 0 15px 15px;
        }

        .user-info {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .avatar {
            width: 50px;
            height: 50px;
            background: #ffffff;
            border-radius: 25px;
            margin-right: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .balance-card {
            background: rgba(255, 255, 255, 0.1);
            padding: 15px;
            border-radius: 10px;
        }

        .balance-amount {
            font-size: 24px;
            font-weight: bold;
            margin: 10px 0;
        }

        /* Quick Actions */
        .quick-actions {
            margin: 20px 0;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            padding: 0 15px;
        }

        .action-button {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: white;
            padding: 15px 10px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .action-button i {
            font-size: 24px;
            margin-bottom: 8px;
            color: #007bff;
        }

        .action-button span {
            font-size: 12px;
            text-align: center;
            color: #333;
        }

        /* Transaction Section */
        .section-title {
            margin: 20px 15px 15px;
            font-size: 18px;
            color: #333;
        }

        .transaction-list {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            margin: 0 15px;
        }

        .transaction-item {
            padding: 15px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .transaction-info {
            display: flex;
            align-items: center;
        }

        .transaction-icon {
            width: 40px;
            height: 40px;
            background: #f8f9fa;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }

        .transaction-details h4 {
            font-size: 14px;
            color: #333;
        }

        .transaction-details p {
            font-size: 12px;
            color: #666;
            margin-top: 4px;
        }

        .transaction-amount {
            font-weight: bold;
        }

        .amount-positive {
            color: #28a745;
        }

        .amount-negative {
            color: #dc3545;
        }

        /* Bottom Navigation */
        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: white;
            display: flex;
            justify-content: space-around;
            padding: 10px 0;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
        }

        .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #666;
            text-decoration: none;
            font-size: 12px;
        }

        .nav-item i {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .nav-item.active {
            color: #007bff;
        }
    </style>
</head>

<body>
    <!-- Header with User Info and Balance -->
    <div class="header">
        <div class="user-info">
            <div class="avatar">👤</div>
            <div>
                <h2>Hi, <?= $user['name_users']; ?></h2>
                <p>Welcome back!</p>
            </div>
        </div>
        <div class="balance-card">
            <p>Total Saldo</p>
            <div class="balance-amount">Gr 2,459.50</div>
            <p>Terakhir diperbarui: Today, 14:30</p>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="quick-actions">
        <div class="action-button">
            <i>↑</i>
            <span><?= 'Rp ' . number_format($gold['buyback']); ?></span>
        </div>
        <div class="action-button">
            <i>↓</i>
            <span><?= 'Rp ' . number_format($gold['buyback']); ?></span>
        </div>
        <!-- <div class="action-button">
            <i>↺</i>
            <span><?= 'Rp ' . number_format($gold['buyback']); ?></span>
        </div>
        <div class="action-button">
            <i>≡</i>
            <span><?= 'Rp ' . number_format($gold['buyback']); ?></span>
        </div> -->
    </div>

    <!-- Recent Transactions -->
    <h3 class="section-title">Transaksi Terkini</h3>
    <div class="transaction-list">
        <div class="transaction-item">
            <div class="transaction-info">
                <div class="transaction-icon">↑</div>
                <div class="transaction-details">
                    <h4>Payment to Sarah</h4>
                    <p>Today, 14:30</p>
                </div>
            </div>
            <div class="transaction-amount amount-negative">-$50.00</div>
        </div>
        <div class="transaction-item">
            <div class="transaction-info">
                <div class="transaction-icon">↓</div>
                <div class="transaction-details">
                    <h4>Received from Mike</h4>
                    <p>Today, 12:15</p>
                </div>
            </div>
            <div class="transaction-amount amount-positive">+$120.00</div>
        </div>
        <div class="transaction-item">
            <div class="transaction-info">
                <div class="transaction-icon">↺</div>
                <div class="transaction-details">
                    <h4>Top Up Balance</h4>
                    <p>Yesterday</p>
                </div>
            </div>
            <div class="transaction-amount amount-positive">+$200.00</div>
        </div>
    </div>

    <!-- Bottom Navigation -->
    <nav class="bottom-nav">
        <a href="<?= base_url('usershome') ?>" class="nav-item active">
            <i>🏠</i>
            <span>Home</span>
        </a>
        <a href="#" class="nav-item">
            <i>📊</i>
            <span>Statistics</span>
        </a>
        <a href="#" class="nav-item">
            <i>📃</i>
            <span>History</span>
        </a>
        <a href="<?= base_url('usershome/profile') ?>" class="nav-item">
            <i>👤</i>
            <span>Profile</span>
        </a>
    </nav>
</body>

</html>