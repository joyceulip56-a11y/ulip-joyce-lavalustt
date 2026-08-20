<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Dashboard | <?= htmlspecialchars($student['name']); ?></title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: #fff0f6;
            min-height: 100vh;
            color: #4a3040;
        }

        /* =========================
           MAIN LAYOUT
        ========================= */

        .dashboard {
            min-height: 100vh;
            display: flex;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            width: 260px;
            background: linear-gradient(180deg, #d94f8a, #b83f75);
            color: white;
            padding: 35px 22px;

            display: flex;
            flex-direction: column;

            box-shadow: 5px 0 20px rgba(180, 60, 110, 0.15);
        }

        .logo {
            text-align: center;
            margin-bottom: 45px;
        }

        .logo .icon {
            width: 65px;
            height: 65px;

            margin: auto;
            margin-bottom: 12px;

            background: white;
            color: #d94f8a;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 30px;

            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        .logo h2 {
            font-size: 20px;
            font-weight: 700;
        }

        .logo p {
            font-size: 12px;
            opacity: 0.8;
            margin-top: 5px;
        }

        .menu-title {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            opacity: 0.7;

            margin: 0 12px 12px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 13px;

            color: white;
            text-decoration: none;

            padding: 14px 15px;
            margin-bottom: 8px;

            border-radius: 12px;

            font-size: 14px;

            transition: 0.25s;
        }

        .menu a:hover,
        .menu a.active {
            background: rgba(255,255,255,0.18);
            transform: translateX(4px);
        }

        .menu-icon {
            font-size: 18px;
        }

        .sidebar-bottom {
            margin-top: auto;

            background: rgba(255,255,255,0.12);
            border-radius: 15px;

            padding: 15px;

            font-size: 12px;
            line-height: 1.6;
        }

        /* =========================
           CONTENT
        ========================= */

        .content {
            flex: 1;
            padding: 40px;
            max-width: 1300px;
        }

        /* =========================
           TOP BAR
        ========================= */

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 30px;
        }

        .topbar h1 {
            color: #7f3158;
            font-size: 28px;
        }

        .topbar p {
            color: #987383;
            font-size: 14px;
            margin-top: 5px;
        }

        .user-badge {
            background: white;
            border: 1px solid #f3c5d8;

            padding: 10px 18px;
            border-radius: 30px;

            color: #b83f75;
            font-size: 13px;
            font-weight: 600;

            box-shadow: 0 5px 15px rgba(180,60,110,0.08);
        }

        /* =========================
           WELCOME CARD
        ========================= */

        .welcome {
            background: linear-gradient(135deg, #d94f8a, #c45a9a);
            border-radius: 25px;

            padding: 35px 40px;

            color: white;

            display: flex;
            justify-content: space-between;
            align-items: center;

            min-height: 190px;

            box-shadow: 0 15px 30px rgba(190,65,120,0.20);

            position: relative;
            overflow: hidden;

            margin-bottom: 30px;
        }

        .welcome::after {
            content: "♡";
            position: absolute;

            right: 35px;
            bottom: -35px;

            font-size: 180px;
            color: rgba(255,255,255,0.10);
        }

        .welcome-text {
            position: relative;
            z-index: 2;
        }

        .welcome small {
            font-size: 13px;
            opacity: 0.85;
        }

        .welcome h2 {
            font-size: 34px;
            margin: 8px 0;
        }

        .welcome p {
            font-size: 14px;
            opacity: 0.9;
        }

        .welcome-icon {
            position: relative;
            z-index: 2;

            width: 100px;
            height: 100px;

            background: white;
            color: #d94f8a;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 45px;

            box-shadow: 0 10px 25px rgba(0,0,0,0.12);
        }

        /* =========================
           GRID
        ========================= */

        .grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 25px;
        }

        /* =========================
           CARDS
        ========================= */

        .card {
            background: #ffffff;

            border: 1px solid #f2c8d9;
            border-radius: 22px;

            padding: 28px;

            box-shadow: 0 8px 25px rgba(180,60,110,0.08);
        }

        .card-title {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 22px;
        }

        .card-title h3 {
            color: #7f3158;
            font-size: 18px;
        }

        .card-title span {
            font-size: 22px;
        }

        /* =========================
           PROFILE
        ========================= */

        .profile {
            display: flex;
            align-items: center;
            gap: 20px;

            padding: 20px;

            background: #fff5f9;
            border-radius: 16px;

            border: 1px solid #f8d8e5;
        }

        .avatar {
            width: 75px;
            height: 75px;

            flex-shrink: 0;

            background: linear-gradient(135deg, #f48fb1, #ce93d8);

            color: white;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 30px;
        }

        .profile h3 {
            color: #9b3d68;
            margin-bottom: 5px;
        }

        .profile p {
            color: #8c7680;
            font-size: 13px;
        }

        /* =========================
           QUICK ACTIONS
        ========================= */

        .actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .action {
            text-decoration: none;

            background: #fff5f9;

            border: 1px solid #f3d1df;

            border-radius: 15px;

            padding: 20px 15px;

            text-align: center;

            color: #a43d70;

            transition: 0.25s;
        }

        .action:hover {
            background: #fce1ec;
            transform: translateY(-4px);

            box-shadow: 0 8px 18px rgba(190,65,120,0.12);
        }

        .action .action-icon {
            font-size: 27px;
            margin-bottom: 8px;
        }

        .action strong {
            display: block;
            font-size: 13px;
        }

        .action small {
            display: block;
            color: #9d858f;
            font-size: 11px;
            margin-top: 3px;
        }

        /* =========================
           ACCESS NOTICE
        ========================= */

        .notice {
            margin-top: 25px;

            background: #fff8fb;

            border-left: 5px solid #d94f8a;

            border-radius: 12px;

            padding: 18px;

            color: #765b68;

            font-size: 13px;
            line-height: 1.6;
        }

        .notice strong {
            color: #a43d70;
        }

        .notice a {
            color: #c03f78;
            font-weight: 700;
            text-decoration: none;
        }

        .notice a:hover {
            text-decoration: underline;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            .dashboard {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                padding: 20px;
            }

            .logo {
                margin-bottom: 20px;
            }

            .menu {
                display: flex;
                gap: 8px;
                overflow-x: auto;
            }

            .menu-title,
            .sidebar-bottom {
                display: none;
            }

            .menu a {
                white-space: nowrap;
                margin-bottom: 0;
            }

            .content {
                padding: 25px;
            }

            .grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {

            .content {
                padding: 18px;
            }

            .topbar {
                align-items: flex-start;
                gap: 15px;
                flex-direction: column;
            }

            .welcome {
                padding: 28px;
            }

            .welcome h2 {
                font-size: 26px;
            }

            .welcome-icon {
                width: 70px;
                height: 70px;
                font-size: 30px;
            }

            .actions {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<div class="dashboard">

    <!-- =========================
         SIDEBAR
    ========================== -->

    <aside class="sidebar">

        <div class="logo">

            <div class="icon">
                🎀
            </div>

            <h2>Student Portal</h2>

            <p>LavaLust Information System</p>

        </div>

        <div class="menu-title">
            Main Menu
        </div>

        <nav class="menu">

            <a href="<?= site_url('student'); ?>" class="active">
                <span class="menu-icon">🏠</span>
                <span>Home</span>
            </a>

            <a href="<?= site_url('student/profile'); ?>">
                <span class="menu-icon">👩🏻‍🎓</span>
                <span>My Profile</span>
            </a>

            <a href="<?= site_url('student/access'); ?>">
                <span class="menu-icon">🔐</span>
                <span>Grant Access</span>
            </a>

        </nav>

        <div class="sidebar-bottom">
            <strong>Student Account</strong><br>
            Your account is currently active.
        </div>

    </aside>


    <!-- =========================
         MAIN CONTENT
    ========================== -->

    <main class="content">

        <!-- TOP BAR -->

        <div class="topbar">

            <div>
                <h1>Dashboard</h1>
                <p>Welcome to your student information portal.</p>
            </div>

            <div class="user-badge">
                🎀 Student
            </div>

        </div>


        <!-- WELCOME -->

        <section class="welcome">

            <div class="welcome-text">

                <small>GOOD DAY, STUDENT!</small>

                <h2>
                    Hello, <?= htmlspecialchars($student['name']); ?>! ♡
                </h2>

                <p>
                    Manage and view your student information here.
                </p>

            </div>

            <div class="welcome-icon">
                🌸
            </div>

        </section>


        <!-- CARDS -->

        <div class="grid">

            <!-- PROFILE CARD -->

            <div class="card">

                <div class="card-title">

                    <h3>My Student Profile</h3>

                    <span>👩🏻‍🎓</span>

                </div>

                <div class="profile">

                    <div class="avatar">
                        ♡
                    </div>

                    <div>

                        <h3>
                            <?= htmlspecialchars($student['name']); ?>
                        </h3>

                        <p>
                            Student Account
                        </p>

                        <p>
                            LavaLust Student Information System
                        </p>

                    </div>

                </div>

                <div class="notice">

                    <strong>Profile Access</strong><br>

                    Your Student Profile page is protected by
                    <strong>StudentMiddleware</strong>.

                    If you haven't unlocked access yet,
                    <a href="<?= site_url('student/access'); ?>">
                        click here to grant access
                    </a>.

                </div>

            </div>


            <!-- QUICK ACTIONS -->

            <div class="card">

                <div class="card-title">

                    <h3>Quick Actions</h3>

                    <span>✨</span>

                </div>

                <div class="actions">

                    <a
                        href="<?= site_url('student'); ?>"
                        class="action"
                    >
                        <div class="action-icon">
                            🏠
                        </div>

                        <strong>Home</strong>

                        <small>Dashboard</small>
                    </a>


                    <a
                        href="<?= site_url('student/profile'); ?>"
                        class="action"
                    >
                        <div class="action-icon">
                            👩🏻‍🎓
                        </div>

                        <strong>Profile</strong>

                        <small>View information</small>
                    </a>


                    <a
                        href="<?= site_url('student/access'); ?>"
                        class="action"
                    >
                        <div class="action-icon">
                            🔐
                        </div>

                        <strong>Access</strong>

                        <small>Grant profile access</small>
                    </a>


                    <a
                        href="<?= site_url('student'); ?>"
                        class="action"
                    >
                        <div class="action-icon">
                            💗
                        </div>

                        <strong>Student Portal</strong>

                        <small>Information system</small>
                    </a>

                </div>

            </div>

        </div>

    </main>

</div>

</body>
</html>