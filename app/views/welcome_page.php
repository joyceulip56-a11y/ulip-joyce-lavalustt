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

    <title>Student Information System</title>

    <link
        rel="shortcut icon"
        href="data:image/x-icon;,"
        type="image/x-icon"
    >

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        :root {

            --pink: #d94f8a;
            --pink-dark: #b83f75;
            --pink-light: #fff0f6;

            --purple: #c45a9a;

            --text: #4a3040;
            --muted: #8c7480;

            --border: #f1c9da;
        }


        /* =========================
           BODY
        ========================= */

        body {

            font-family: "Poppins", sans-serif;

            min-height: 100vh;

            background:
                linear-gradient(
                    135deg,
                    #fff0f6 0%,
                    #ffe5f0 45%,
                    #f0e5ff 100%
                );

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 35px;

            color: var(--text);

            position: relative;

            overflow: hidden;
        }


        /* =========================
           DECORATIONS
        ========================= */

        .circle {

            position: fixed;

            border-radius: 50%;

            pointer-events: none;

            z-index: 0;
        }


        .circle-one {

            width: 450px;

            height: 450px;

            background: #f8b6d0;

            opacity: 0.25;

            top: -180px;

            left: -130px;
        }


        .circle-two {

            width: 400px;

            height: 400px;

            background: #d9b8f5;

            opacity: 0.25;

            bottom: -170px;

            right: -130px;
        }


        .heart-one {

            position: fixed;

            top: 12%;

            right: 15%;

            font-size: 55px;

            color: rgba(217,79,138,0.15);

            transform: rotate(15deg);

            z-index: 0;
        }


        .heart-two {

            position: fixed;

            bottom: 12%;

            left: 12%;

            font-size: 45px;

            color: rgba(196,90,154,0.15);

            transform: rotate(-15deg);

            z-index: 0;
        }


        /* =========================
           MAIN CARD
        ========================= */

        .card {

            width: 100%;

            max-width: 900px;

            min-height: 560px;

            background: #ffffff;

            border: 1px solid var(--border);

            border-radius: 30px;

            overflow: hidden;

            display: grid;

            grid-template-columns: 40% 60%;

            position: relative;

            z-index: 1;

            box-shadow:
                0 25px 60px rgba(180,60,110,0.16);
        }


        /* =========================
           LEFT PANEL
        ========================= */

        .left-panel {

            background:
                linear-gradient(
                    160deg,
                    #d94f8a,
                    #c45a9a
                );

            color: white;

            padding: 45px 35px;

            display: flex;

            flex-direction: column;

            justify-content: center;

            align-items: center;

            text-align: center;

            position: relative;

            overflow: hidden;
        }


        .left-panel::before {

            content: "";

            position: absolute;

            width: 300px;

            height: 300px;

            border-radius: 50%;

            background: rgba(255,255,255,0.08);

            top: -120px;

            left: -120px;
        }


        .left-panel::after {

            content: "♡";

            position: absolute;

            font-size: 250px;

            color: rgba(255,255,255,0.07);

            right: -70px;

            bottom: -100px;

            transform: rotate(-15deg);
        }


        /* =========================
           ICON
        ========================= */

        .student-icon {

            width: 145px;

            height: 145px;

            background: white;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 70px;

            box-shadow:
                0 15px 30px rgba(0,0,0,0.15);

            margin-bottom: 25px;

            position: relative;

            z-index: 2;
        }


        .left-panel h2 {

            font-size: 25px;

            font-weight: 700;

            position: relative;

            z-index: 2;
        }


        .left-panel p {

            font-size: 13px;

            opacity: 0.85;

            line-height: 1.6;

            margin-top: 8px;

            max-width: 240px;

            position: relative;

            z-index: 2;
        }


        .system-label {

            margin-top: 30px;

            background: rgba(255,255,255,0.15);

            border: 1px solid rgba(255,255,255,0.25);

            padding: 9px 18px;

            border-radius: 30px;

            font-size: 11px;

            letter-spacing: 1px;

            text-transform: uppercase;

            position: relative;

            z-index: 2;
        }


        /* =========================
           RIGHT PANEL
        ========================= */

        .right-panel {

            padding: 55px 55px;

            display: flex;

            flex-direction: column;

            justify-content: center;
        }


        .small-label {

            display: inline-block;

            color: var(--pink);

            background: #fff0f6;

            border: 1px solid #f4c8da;

            padding: 7px 15px;

            border-radius: 20px;

            font-size: 11px;

            font-weight: 700;

            letter-spacing: 1px;

            text-transform: uppercase;

            width: fit-content;

            margin-bottom: 20px;
        }


        .right-panel h1 {

            font-size: 37px;

            line-height: 1.25;

            color: #71314f;

            margin-bottom: 15px;
        }


        .right-panel h1 span {

            color: var(--pink);
        }


        .description {

            color: var(--muted);

            font-size: 14px;

            line-height: 1.8;

            max-width: 520px;

            margin-bottom: 30px;
        }


        /* =========================
           PROFILE BUTTON
        ========================= */

        .profile-button {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 10px;

            background:
                linear-gradient(
                    135deg,
                    #d94f8a,
                    #c45a9a
                );

            color: white;

            text-decoration: none;

            padding: 14px 25px;

            border-radius: 13px;

            font-size: 14px;

            font-weight: 600;

            width: fit-content;

            box-shadow:
                0 8px 20px rgba(210,70,130,0.20);

            transition: 0.25s;
        }


        .profile-button:hover {

            transform: translateY(-3px);

            box-shadow:
                0 12px 25px rgba(210,70,130,0.28);
        }


        /* =========================
           FEATURES
        ========================= */

        .features {

            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap: 12px;

            margin-top: 35px;
        }


        .feature {

            background: #fff7fa;

            border: 1px solid #f4d5e1;

            border-radius: 14px;

            padding: 15px;

            display: flex;

            align-items: center;

            gap: 12px;
        }


        .feature-icon {

            width: 38px;

            height: 38px;

            flex-shrink: 0;

            background: #ffe4ef;

            border-radius: 10px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 18px;
        }


        .feature strong {

            display: block;

            font-size: 12px;

            color: #8d3b62;
        }


        .feature small {

            display: block;

            font-size: 10px;

            color: #9d858f;

            margin-top: 2px;
        }


        /* =========================
           FOOTER
        ========================= */

        .footer {

            margin-top: 30px;

            padding-top: 20px;

            border-top: 1px solid #f2dce5;

            color: #aa929d;

            font-size: 10px;

            letter-spacing: 1px;

            text-transform: uppercase;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 800px) {

            body {

                padding: 20px;
            }


            .card {

                grid-template-columns: 1fr;

                max-width: 600px;
            }


            .left-panel {

                padding: 40px 25px;
            }


            .student-icon {

                width: 110px;

                height: 110px;

                font-size: 55px;
            }


            .right-panel {

                padding: 40px 30px;
            }


            .right-panel h1 {

                font-size: 30px;
            }

        }


        @media (max-width: 480px) {

            body {

                padding: 12px;
            }


            .card {

                border-radius: 22px;
            }


            .right-panel {

                padding: 30px 22px;
            }


            .right-panel h1 {

                font-size: 26px;
            }


            .features {

                grid-template-columns: 1fr;
            }


            .profile-button {

                width: 100%;
            }

        }

    </style>

</head>


<body>


    <!-- Decorative Elements -->

    <div class="circle circle-one"></div>

    <div class="circle circle-two"></div>

    <div class="heart-one">♡</div>

    <div class="heart-two">♡</div>


    <!-- Main Card -->

    <div class="card">


        <!-- =========================
             LEFT SIDE
        ========================== -->

        <section class="left-panel">


            <div class="student-icon">
                👩🏻‍🎓
            </div>


            <h2>
                Student Portal
            </h2>


            <p>
                Your personal space for accessing
                your student information.
            </p>


            <div class="system-label">
                🌸 LavaLust System
            </div>


        </section>


        <!-- =========================
             RIGHT SIDE
        ========================== -->

        <section class="right-panel">


            <span class="small-label">
                Student Information System
            </span>


            <h1>

                Welcome,

                <span>
                    <?php
                    echo htmlspecialchars(
                        $student_name ?? 'Student'
                    );
                    ?>
                </span>

                ♡

            </h1>


            <p class="description">

                Welcome to your personal student
                information dashboard. You can view
                your student profile and access your
                information through the LavaLust
                Student Portal.

            </p>


            <a
                href="<?= site_url('student/profile'); ?>"
                class="profile-button"
            >

                👩🏻‍🎓

                View Student Profile

                →

            </a>


            <!-- Features -->

            <div class="features">


                <div class="feature">

                    <div class="feature-icon">
                        📋
                    </div>

                    <div>

                        <strong>
                            Student Information
                        </strong>

                        <small>
                            View your details
                        </small>

                    </div>

                </div>


                <div class="feature">

                    <div class="feature-icon">
                        🔐
                    </div>

                    <div>

                        <strong>
                            Protected Profile
                        </strong>

                        <small>
                            Secure access
                        </small>

                    </div>

                </div>


                <div class="feature">

                    <div class="feature-icon">
                        🌸
                    </div>

                    <div>

                        <strong>
                            Student Portal
                        </strong>

                        <small>
                            Easy navigation
                        </small>

                    </div>

                </div>


                <div class="feature">

                    <div class="feature-icon">
                        💗
                    </div>

                    <div>

                        <strong>
                            LavaLust
                        </strong>

                        <small>
                            Information system
                        </small>

                    </div>

                </div>


            </div>


            <div class="footer">

                LavaLust • Student Information System

            </div>


        </section>


    </div>


</body>

</html>