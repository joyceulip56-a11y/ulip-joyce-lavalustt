<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Student Information | <?= htmlspecialchars($student['name']); ?>
    </title>

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

            padding: 40px 25px;

            color: #4a3040;
        }


        /* =========================
           MAIN CONTAINER
        ========================= */

        .container {

            max-width: 1000px;

            margin: auto;

            background: #ffffff;

            border-radius: 28px;

            overflow: hidden;

            border: 1px solid #f2c5d8;

            box-shadow:
                0 20px 50px rgba(180, 60, 110, 0.15);
        }


        /* =========================
           HEADER
        ========================= */

        .profile-header {

            background:
                linear-gradient(
                    135deg,
                    #d94f8a,
                    #c65b9d
                );

            color: white;

            padding: 45px;

            display: flex;

            align-items: center;

            gap: 30px;

            position: relative;

            overflow: hidden;
        }

        .profile-header::after {

            content: "♡";

            position: absolute;

            right: 30px;

            bottom: -60px;

            font-size: 220px;

            color: rgba(255,255,255,0.08);
        }


        /* =========================
           PROFILE AVATAR
        ========================= */

        .avatar {

            width: 120px;

            height: 120px;

            flex-shrink: 0;

            background: white;

            color: #d94f8a;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 55px;

            box-shadow:
                0 10px 25px rgba(0,0,0,0.15);

            position: relative;

            z-index: 2;
        }


        .header-info {

            position: relative;

            z-index: 2;
        }

        .header-info .status {

            display: inline-block;

            background: rgba(255,255,255,0.2);

            border: 1px solid rgba(255,255,255,0.3);

            padding: 7px 15px;

            border-radius: 20px;

            font-size: 11px;

            text-transform: uppercase;

            letter-spacing: 1px;

            margin-bottom: 10px;
        }

        .header-info h1 {

            font-size: 32px;

            margin-bottom: 6px;
        }

        .header-info p {

            font-size: 14px;

            opacity: 0.9;
        }


        /* =========================
           CONTENT
        ========================= */

        .content {

            padding: 40px;
        }


        .section-title {

            display: flex;

            align-items: center;

            gap: 10px;

            margin-bottom: 22px;
        }

        .section-title h2 {

            color: #7f3158;

            font-size: 21px;
        }

        .section-title span {

            font-size: 22px;
        }


        /* =========================
           INFORMATION GRID
        ========================= */

        .info-grid {

            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap: 16px;
        }


        .info-box {

            background: #fff7fa;

            border: 1px solid #f4d4e1;

            border-radius: 16px;

            padding: 18px;

            transition: 0.25s;
        }

        .info-box:hover {

            transform: translateY(-3px);

            border-color: #efaec8;

            box-shadow:
                0 8px 18px rgba(190,65,120,0.08);
        }


        .info-label {

            display: block;

            font-size: 11px;

            color: #b04c78;

            text-transform: uppercase;

            letter-spacing: 0.8px;

            font-weight: 700;

            margin-bottom: 7px;
        }


        .info-value {

            display: block;

            color: #4d3742;

            font-size: 14px;

            line-height: 1.5;

            word-break: break-word;
        }


        /* =========================
           ABOUT SECTION
        ========================= */

        .about-box {

            margin-top: 30px;

            background: #fff7fa;

            border: 1px solid #f4d4e1;

            border-radius: 18px;

            padding: 25px;
        }

        .about-box h3 {

            color: #a43d70;

            margin-bottom: 10px;

            font-size: 17px;
        }

        .about-box p {

            color: #77616c;

            font-size: 14px;

            line-height: 1.7;
        }


        /* =========================
           HOBBIES
        ========================= */

        .hobby-box {

            margin-top: 18px;

            background: #fff7fa;

            border: 1px solid #f4d4e1;

            border-radius: 18px;

            padding: 22px;
        }

        .hobby-box h3 {

            color: #a43d70;

            margin-bottom: 10px;

            font-size: 17px;
        }

        .hobby-box p {

            color: #77616c;

            font-size: 14px;
        }


        /* =========================
           FACEBOOK
        ========================= */

        .facebook {

            margin-top: 18px;

            background: #fff7fa;

            border: 1px solid #f4d4e1;

            border-radius: 18px;

            padding: 20px;
        }

        .facebook h3 {

            color: #a43d70;

            margin-bottom: 8px;

            font-size: 16px;
        }

        .facebook p {

            font-size: 14px;

            color: #777;

            word-break: break-all;
        }


        /* =========================
           BUTTONS
        ========================= */

        .actions {

            margin-top: 35px;

            padding-top: 25px;

            border-top: 1px solid #f2dce5;

            display: flex;

            justify-content: center;

            gap: 12px;

            flex-wrap: wrap;
        }


        .btn {

            display: inline-block;

            padding: 12px 25px;

            border-radius: 12px;

            text-decoration: none;

            font-size: 14px;

            font-weight: 600;

            transition: 0.25s;
        }


        .btn-home {

            background: #fff0f6;

            color: #b83f75;

            border: 1px solid #f2c4d6;
        }

        .btn-home:hover {

            background: #fbdbe9;

            transform: translateY(-2px);
        }


        .btn-revoke {

            background: #d94f8a;

            color: white;

            box-shadow:
                0 6px 15px rgba(210,70,130,0.20);
        }

        .btn-revoke:hover {

            background: #b83f75;

            transform: translateY(-2px);
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 700px) {

            body {
                padding: 15px;
            }

            .profile-header {

                padding: 30px 25px;

                flex-direction: column;

                text-align: center;
            }

            .avatar {

                width: 100px;

                height: 100px;

                font-size: 45px;
            }

            .header-info h1 {

                font-size: 25px;
            }

            .content {

                padding: 25px 20px;
            }

            .info-grid {

                grid-template-columns: 1fr;
            }

            .btn {

                width: 100%;

                text-align: center;
            }

        }

    </style>

</head>


<body>


<div class="container">


    <!-- =========================
         PROFILE HEADER
    ========================== -->

    <header class="profile-header">

        <div class="avatar">
            👩🏻‍🎓
        </div>

        <div class="header-info">

            <span class="status">
                🔓 Access Granted
            </span>

            <h1>
                <?= htmlspecialchars($student['name']); ?>
            </h1>

            <p>
                Student Information Profile
            </p>

        </div>

    </header>


    <!-- =========================
         CONTENT
    ========================== -->

    <main class="content">


        <div class="section-title">

            <span>🌸</span>

            <h2>
                Personal Information
            </h2>

        </div>


        <!-- INFORMATION -->

        <div class="info-grid">


            <div class="info-box">

                <span class="info-label">
                    Student ID
                </span>

                <span class="info-value">
                    <?= htmlspecialchars($student['student_id']); ?>
                </span>

            </div>


            <div class="info-box">

                <span class="info-label">
                    Full Name
                </span>

                <span class="info-value">
                    <?= htmlspecialchars($student['name']); ?>
                </span>

            </div>


            <div class="info-box">

                <span class="info-label">
                    Course
                </span>

                <span class="info-value">
                    <?= htmlspecialchars($student['course']); ?>
                </span>

            </div>


            <div class="info-box">

                <span class="info-label">
                    Year Level
                </span>

                <span class="info-value">
                    <?= htmlspecialchars($student['year']); ?>
                </span>

            </div>


            <div class="info-box">

                <span class="info-label">
                    Section
                </span>

                <span class="info-value">
                    <?= htmlspecialchars($student['section']); ?>
                </span>

            </div>


            <div class="info-box">

                <span class="info-label">
                    Email Address
                </span>

                <span class="info-value">
                    <?= htmlspecialchars($student['email']); ?>
                </span>

            </div>


            <div class="info-box">

                <span class="info-label">
                    Contact Number
                </span>

                <span class="info-value">
                    <?= htmlspecialchars($student['contact_no']); ?>
                </span>

            </div>


            <div class="info-box">

                <span class="info-label">
                    Address
                </span>

                <span class="info-value">
                    <?= htmlspecialchars($student['address']); ?>
                </span>

            </div>


        </div>


        <!-- =========================
             HOBBIES
        ========================== -->

        <div class="hobby-box">

            <h3>
                🎀 Hobbies & Interests
            </h3>

            <p>
                <?= htmlspecialchars($student['hobbies']); ?>
            </p>

        </div>


        <!-- =========================
             ABOUT
        ========================== -->

        <div class="about-box">

            <h3>
                💗 About Me
            </h3>

            <p>
                <?= htmlspecialchars($student['description']); ?>
            </p>

        </div>


        <!-- =========================
             FACEBOOK
        ========================== -->

        <div class="facebook">

            <h3>
                💙 Facebook
            </h3>

            <p>
                <?= htmlspecialchars($student['Facebook']); ?>
            </p>

        </div>


        <!-- =========================
             ACTION BUTTONS
        ========================== -->

        <div class="actions">

            <a
                href="<?= site_url('student'); ?>"
                class="btn btn-home"
            >
                🏠 Back to Home
            </a>


            <a
                href="<?= site_url('student/logout'); ?>"
                class="btn btn-revoke"
            >
                🔒 Revoke Access
            </a>

        </div>


    </main>

</div>


</body>

</html>