<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
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

        /* Profile Header */
        .profile-header {
            background: #007bff;
            color: white;
            padding: 30px 15px;
            text-align: center;
            border-radius: 0 0 15px 15px;
        }

        .profile-avatar {
            width: 100px;
            height: 100px;
            background: #ffffff;
            border-radius: 50%;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            position: relative;
        }

        .edit-avatar {
            position: absolute;
            bottom: 0;
            right: 0;
            background: #007bff;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid white;
            cursor: pointer;
        }

        .profile-name {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .profile-email {
            opacity: 0.9;
            font-size: 14px;
        }

        /* Profile Sections */
        .section {
            background: white;
            border-radius: 10px;
            margin: 15px 0;
            overflow: hidden;
        }

        .section-header {
            padding: 15px;
            border-bottom: 1px solid #eee;
            font-weight: bold;
            color: #333;
        }

        .section-item {
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #eee;
        }

        .section-item:last-child {
            border-bottom: none;
        }

        .item-label {
            display: flex;
            align-items: center;
            gap: 15px;
            color: #333;
        }

        .item-value {
            color: #666;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Toggle Switch */
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 24px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #007bff;
        }

        input:checked+.slider:before {
            transform: translateX(26px);
        }

        /* Logout Button */
        .logout-button {
            background: #dc3545;
            color: white;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            font-size: 16px;
            margin-top: 20px;
            cursor: pointer;
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
    <div class="profile-header">
        <div class="profile-avatar">
            👤
            <div class="edit-avatar">✏️</div>
        </div>
        <h1 class="profile-name">John Doe</h1>
        <p class="profile-email">john.doe@example.com</p>
    </div>

    <div class="container">
        <!-- Personal Information -->
        <div class="section">
            <div class="section-header">Personal Information</div>
            <div class="section-item">
                <div class="item-label">
                    <i>📱</i>
                    Phone Number
                </div>
                <div class="item-value">
                    +1 234 567 8900
                    <i>▶️</i>
                </div>
            </div>
            <div class="section-item">
                <div class="item-label">
                    <i>📍</i>
                    Address
                </div>
                <div class="item-value">
                    Update Address
                    <i>▶️</i>
                </div>
            </div>
            <div class="section-item">
                <div class="item-label">
                    <i>🔑</i> 
                    Change Password
                </div>
                <div class="item-value">
                    <i>▶️</i>
                </div>
            </div>
        </div>

        <!-- Payment Methods -->
        <!-- <div class="section">
            <div class="section-header">Payment Methods</div>
            <div class="section-item">
                <div class="item-label">
                    <i>💳</i>
                    Credit/Debit Cards
                </div>
                <div class="item-value">
                    2 Cards
                    <i>▶️</i>
                </div>
            </div>
            <div class="section-item">
                <div class="item-label">
                    <i>🏦</i>
                    Bank Accounts
                </div>
                <div class="item-value">
                    1 Account
                    <i>▶️</i>
                </div>
            </div>
        </div> -->

        <!-- Security Settings -->
        <!-- <div class="section">
            <div class="section-header">Security</div>
            <div class="section-item">
                <div class="item-label">
                    <i>🔒</i>
                    Two-Factor Authentication
                </div>
                <div class="item-value">
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider"></span>
                    </label>
                </div>
            </div>
            <div class="section-item">
                <div class="item-label">
                    <i>👆</i>
                    Fingerprint Login
                </div>
                <div class="item-value">
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider"></span>
                    </label>
                </div>
            </div>
        </div> -->

        <!-- Notifications -->
            <!-- <div class="section">
                <div class="section-header">Notifications</div>
                <div class="section-item">
                    <div class="item-label">
                        <i>📱</i>
                        Push Notifications
                    </div>
                    <div class="item-value">
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>
                <div class="section-item">
                    <div class="item-label">
                        <i>📧</i>
                        Email Notifications
                    </div>
                    <div class="item-value">
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>
            </div> -->

        <button class="logout-button">Logout</button>
    </div>

    <!-- Bottom Navigation -->
    <nav class="bottom-nav">
        <a href="<?= base_url('usershome') ?>" class="nav-item">
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
        <a href="<?= base_url('usershome/profile') ?>" class="nav-item active">
            <i>👤</i>
            <span>Profile</span>
        </a>
    </nav>
</body>

</html>