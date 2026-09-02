<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<<<<<<< HEAD

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

=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to joycee LavaLust</title>
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500;600;700;800&family=Unbounded:wght@400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --lava: #dd4814;
            --lava-dim: #b83a10;
            --lava-glow: rgba(221,72,20,0.15);
            --lava-glow-strong: rgba(221,72,20,0.25);
            --bg: #0a0a0b;
            --bg2: #111113;
            --bg3: #18181b;
            --border: rgba(255,255,255,0.07);
            --border-hot: rgba(221,72,20,0.35);
            --text: #f4f4f5;
            --text-muted: #71717a;
            --text-dim: #3f3f46;
            --mono: 'JetBrains Mono', monospace;
            --sans: 'Unbounded', sans-serif;
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: var(--sans);
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* ── NOISE TEXTURE ── */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 0;
            opacity: 0.6;
        }

        /* ── GRID BACKGROUND ── */
        body::after {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(var(--border) 1px, transparent 1px),
                linear-gradient(90deg, var(--border) 1px, transparent 1px);
            background-size: 60px 60px;
            pointer-events: none;
            z-index: 0;
            mask-image: radial-gradient(ellipse 80% 60% at 50% 0%, black 30%, transparent 100%);
        }

        /* ── GLOW ORBS ── */
        .orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(120px);
            pointer-events: none;
            z-index: 0;
        }
        .orb-1 {
            width: 600px; height: 600px;
            top: -200px; left: -100px;
            background: radial-gradient(circle, rgba(221,72,20,0.12) 0%, transparent 70%);
        }
        .orb-2 {
            width: 400px; height: 400px;
            top: 200px; right: -100px;
            background: radial-gradient(circle, rgba(221,72,20,0.07) 0%, transparent 70%);
        }

        /* ── LAYOUT ── */
        .wrap {
            position: relative;
            z-index: 1;
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* ── NAV ── */
        nav {
            position: relative;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.5rem 2rem;
            border-bottom: 1px solid var(--border);
            backdrop-filter: blur(12px);
            background: rgba(10,10,11,0.6);
            max-width: 100%;
        }

        .nav-logo {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 1.1rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            color: var(--text);
            text-decoration: none;
        }

        .nav-logo .flame {
            width: 28px; height: 28px;
            background: var(--lava);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            box-shadow: 0 0 20px var(--lava-glow-strong);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .nav-links a {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            padding: 0.4rem 0.8rem;
            border-radius: 6px;
            transition: color 0.2s, background 0.2s;
        }

        .nav-links a:hover { color: var(--text); background: var(--bg3); }

        .nav-links .btn-nav {
            color: var(--text);
            background: var(--lava);
            padding: 0.4rem 1rem;
            border-radius: 6px;
            margin-left: 0.5rem;
            transition: background 0.2s, box-shadow 0.2s;
        }

        .nav-links .btn-nav:hover {
            background: var(--lava-dim);
            box-shadow: 0 0 20px var(--lava-glow-strong);
        }

        /* ── HERO ── */
        .hero {
            padding: 7rem 2rem 5rem;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(221,72,20,0.1);
            border: 1px solid var(--border-hot);
            color: #f97316;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 0.35rem 0.9rem;
            border-radius: 999px;
            margin-bottom: 2rem;
            font-family: var(--mono);
        }

        .badge::before {
            content: '';
            width: 6px; height: 6px;
            background: var(--lava);
            border-radius: 50%;
            box-shadow: 0 0 8px var(--lava);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; box-shadow: 0 0 8px var(--lava); }
            50% { opacity: 0.5; box-shadow: 0 0 3px var(--lava); }
        }

        .hero h1 {
            font-size: clamp(3rem, 8vw, 6rem);
            font-weight: 800;
            line-height: 1;
            letter-spacing: -0.04em;
            margin-bottom: 1.5rem;
        }

        .hero h1 .word-lava { color: var(--lava); }
        .hero h1 .word-lust {
            color: transparent;
            -webkit-text-stroke: 1.5px rgba(255,255,255,0.3);
        }

        .hero-sub {
            font-size: 1.15rem;
            color: var(--text-muted);
            max-width: 520px;
            margin: 0 auto 2.5rem;
            line-height: 1.7;
            font-weight: 400;
        }

        .hero-actions {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-family: var(--sans);
            font-size: 0.9rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
            cursor: pointer;
            border: none;
        }

        .btn-primary {
            background: var(--lava);
            color: #fff;
            box-shadow: 0 0 0 0 var(--lava-glow);
        }

        .btn-primary:hover {
            background: var(--lava-dim);
            box-shadow: 0 0 30px var(--lava-glow-strong), 0 4px 15px rgba(0,0,0,0.3);
            transform: translateY(-1px);
        }

        .btn-ghost {
            background: transparent;
            color: var(--text-muted);
            border: 1px solid var(--border);
        }

        .btn-ghost:hover {
            color: var(--text);
            border-color: rgba(255,255,255,0.2);
            background: var(--bg3);
        }

        /* ── STAT BAR ── */
        .stats {
            display: flex;
            justify-content: center;
            gap: 3rem;
            flex-wrap: wrap;
            padding: 3rem 2rem;
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
            position: relative;
            z-index: 1;
        }

        .stat { text-align: center; }

        .stat-value {
            font-size: 2rem;
            font-weight: 800;
            color: var(--text);
            letter-spacing: -0.03em;
            line-height: 1;
        }

        .stat-value span { color: var(--lava); }

        .stat-label {
            font-size: 0.78rem;
            color: var(--text-muted);
            font-weight: 500;
            margin-top: 0.3rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }

        /* ── SECTION ── */
        section {
            padding: 5rem 2rem;
            position: relative;
            z-index: 1;
        }

        .section-label {
            font-family: var(--mono);
            font-size: 0.72rem;
            font-weight: 500;
            color: var(--lava);
            text-transform: uppercase;
            letter-spacing: 0.12em;
            margin-bottom: 0.75rem;
        }

        .section-title {
            font-size: clamp(1.8rem, 4vw, 2.8rem);
            font-weight: 800;
            letter-spacing: -0.03em;
            line-height: 1.1;
            margin-bottom: 1rem;
        }

        .section-desc {
            color: var(--text-muted);
            font-size: 1rem;
            line-height: 1.7;
            max-width: 480px;
        }

        /* ── FEATURES GRID ── */
        .features-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1px;
            background: var(--border);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            margin-top: 3rem;
        }

        .feature {
            background: var(--bg);
            padding: 2rem;
            transition: background 0.2s;
            position: relative;
        }

        .feature:hover { background: var(--bg2); }

        .feature::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--lava-glow-strong), transparent);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .feature:hover::before { opacity: 1; }

        .feature-icon {
            width: 40px; height: 40px;
            background: rgba(221,72,20,0.1);
            border: 1px solid var(--border-hot);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            margin-bottom: 1rem;
        }

        .feature h3 {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            letter-spacing: -0.01em;
        }

        .feature p {
            font-size: 0.875rem;
            color: var(--text-muted);
            line-height: 1.6;
        }

        /* ── CODE SECTION ── */
        .code-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        .code-block {
            background: var(--bg2);
            border: 1px solid var(--border);
            border-radius: 12px;
            overflow: hidden;
        }

        .code-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1rem;
            border-bottom: 1px solid var(--border);
            background: var(--bg3);
        }

        .dot { width: 10px; height: 10px; border-radius: 50%; }
        .dot-r { background: #ff5f57; }
        .dot-y { background: #febc2e; }
        .dot-g { background: #28c840; }

        .code-filename {
            font-family: var(--mono);
            font-size: 0.75rem;
            color: var(--text-muted);
            margin-left: 0.5rem;
        }

        .code-body {
            padding: 1.5rem;
            font-family: var(--mono);
            font-size: 0.82rem;
            line-height: 1.8;
            color: #a1a1aa;
            overflow-x: auto;
        }

        .code-body .kw { color: #f97316; }
        .code-body .fn { color: #60a5fa; }
        .code-body .str { color: #86efac; }
        .code-body .cm { color: #3f3f46; }
        .code-body .cl { color: #fde68a; }
        .code-body .var { color: #c4b5fd; }

        /* ── STRUCTURE ── */
        .structure-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 0.5rem;
            margin-top: 2rem;
        }

        .dir-item {
            background: var(--bg2);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 0.875rem 1rem;
            font-family: var(--mono);
            font-size: 0.8rem;
            color: var(--text-muted);
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .dir-item:hover {
            border-color: var(--border-hot);
            color: var(--text);
            background: rgba(221,72,20,0.05);
        }

        .dir-item .dir-icon { color: var(--lava); font-size: 0.9rem; }

        /* ── FOOTER ── */
        footer {
            border-top: 1px solid var(--border);
            padding: 2rem;
            position: relative;
            z-index: 1;
        }

        .footer-inner {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .footer-meta {
            font-family: var(--mono);
            font-size: 0.75rem;
            color: var(--text-dim);
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .footer-meta span { color: var(--text-muted); }

        .footer-links {
            display: flex;
            gap: 1rem;
        }

        .footer-links a {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.82rem;
            transition: color 0.2s;
        }

        .footer-links a:hover { color: var(--lava); }

        /* ── DIVIDER ── */
        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--border), transparent);
            margin: 0 2rem;
            position: relative;
            z-index: 1;
        }

        /* ── ANIMATIONS ── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .hero > * {
            animation: fadeUp 0.6s ease both;
        }

        .hero .badge         { animation-delay: 0.05s; }
        .hero h1             { animation-delay: 0.15s; }
        .hero .hero-sub      { animation-delay: 0.25s; }
        .hero .hero-actions  { animation-delay: 0.35s; }

        @media (max-width: 768px) {
            .features-layout { grid-template-columns: 1fr; }
            .code-section { grid-template-columns: 1fr; }
            nav { padding: 1rem 1.5rem; }
            .nav-links a:not(.btn-nav) { display: none; }
            section { padding: 3rem 1.5rem; }
        }
    </style>
</head>
<body>

<div class="orb orb-1"></div>
<div class="orb orb-2"></div>

<!-- NAV -->
<nav>
    <a class="nav-logo" href="#">
        <div class="flame">🔥</div>
        LavaLust
    </a>
    <div class="nav-links">
        <a href="https://lavalust.netlify.app/docs/" target="_blank">Docs</a>
        <a href="https://github.com/ronmarasigan/LavaLust" target="_blank">GitHub</a>
        <a href="https://lavalust.netlify.app/docs/" target="_blank" class="btn-nav">Get Started →</a>
    </div>
</nav>

<!-- HERO -->
<div class="hero wrap">
    <div class="badge">v<?php echo config_item('VERSION') ?? '4.x'; ?> — Now Available</div>
    <h1>
        <span class="word-lava">Lava</span><span class="word-lust">Lust</span><br>Framework
    </h1>
    <p class="hero-sub">
        A lightweight, expressive PHP MVC framework built for developers who want structure without the bloat.
    </p>
    <div class="hero-actions">
        <a href="https://lavalust.netlify.app/docs/" target="_blank" class="btn btn-primary">
            Read the Docs
        </a>
        <a href="https://github.com/ronmarasigan/LavaLust" target="_blank" class="btn btn-ghost">
            View on GitHub
        </a>
    </div>
</div>

<!-- STATS -->
<div class="stats">
    <div class="stat">
        <div class="stat-value">MVC<span>+</span></div>
        <div class="stat-label">Architecture</div>
    </div>
    <div class="stat">
        <div class="stat-value"><span>4</span> DB</div>
        <div class="stat-label">Drivers</div>
    </div>
    <div class="stat">
        <div class="stat-value">HMVC<span>✓</span></div>
        <div class="stat-label">Module Support</div>
    </div>
    <div class="stat">
        <div class="stat-value">REST<span>*</span></div>
        <div class="stat-label">API Ready</div>
    </div>
</div>

<div class="divider"></div>

<!-- FEATURES -->
<section>
    <div class="wrap">
        <div class="section-label">// features</div>
        <h2 class="section-title">Everything you need.<br>Nothing you don't.</h2>
        <p class="section-desc">LavaLust gives you a clean, consistent structure so you can focus on building — not configuring.</p>

        <div class="features-layout">
            <div class="feature">
                <div class="feature-icon">🧠</div>
                <h3>MVC Architecture</h3>
                <p>Clean separation between Models, Views, and Controllers keeps your codebase maintainable as it grows.</p>
            </div>
            <div class="feature">
                <div class="feature-icon">⚙️</div>
                <h3>Flexible Routing</h3>
                <p>Define routes with GET, POST, PUT, DELETE and more. Supports named routes, closures, and grouped prefixes.</p>
            </div>
            <div class="feature">
                <div class="feature-icon">🗄️</div>
                <h3>ORM-style Models</h3>
                <p>Fluent query builder with relationships, soft deletes, timestamps, mass assignment protection, and eager loading.</p>
            </div>
            <div class="feature">
                <div class="feature-icon">📦</div>
                <h3>HMVC Modules</h3>
                <p>Scale your app with self-contained modules. Each module owns its controllers, models, and views.</p>
            </div>
            <div class="feature">
                <div class="feature-icon">🔗</div>
                <h3>REST API Support</h3>
                <p>Build JSON APIs out of the box using built-in conventions, response helpers, and content negotiation.</p>
            </div>
            <div class="feature">
                <div class="feature-icon">🛡️</div>
                <h3>Libraries & Helpers</h3>
                <p>Sessions, form validation, file uploads, pagination, encryption — batteries included where it counts.</p>
            </div>
        </div>
    </div>
</section>

<div class="divider"></div>

<!-- CODE EXAMPLE -->
<section>
    <div class="wrap">
        <div class="code-section">
            <div>
                <div class="section-label">// quick start</div>
                <h2 class="section-title">Up and running in minutes.</h2>
                <p class="section-desc">Define a route, write a controller method, render a view. That's the whole loop.</p>
            </div>

            <div>
                <div class="code-block" style="margin-bottom:1rem;">
                    <div class="code-header">
                        <div class="dot dot-r"></div>
                        <div class="dot dot-y"></div>
                        <div class="dot dot-g"></div>
                        <span class="code-filename">app/config/routes.php</span>
                    </div>
                    <div class="code-body">
<span class="var">$router</span>-><span class="fn">get</span>(<span class="str">'/'</span>, <span class="str">'Welcome::index'</span>);<br>
<span class="var">$router</span>-><span class="fn">get</span>(<span class="str">'/users'</span>, <span class="str">'Users::index'</span>);<br>
<span class="var">$router</span>-><span class="fn">post</span>(<span class="str">'/users/store'</span>, <span class="str">'Users::store'</span>);
                    </div>
                </div>

                <div class="code-block">
                    <div class="code-header">
                        <div class="dot dot-r"></div>
                        <div class="dot dot-y"></div>
                        <div class="dot dot-g"></div>
                        <span class="code-filename">app/controllers/Welcome.php</span>
                    </div>
                    <div class="code-body">
<span class="kw">class</span> <span class="cl">Welcome</span> <span class="kw">extends</span> <span class="cl">Controller</span> {<br>
&nbsp;&nbsp;<span class="kw">public function</span> <span class="fn">index</span>() {<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span class="var">$this</span>-><span class="fn">call</span>-><span class="fn">model</span>(<span class="str">'UserModel'</span>);<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span class="var">$data</span>[<span class="str">'users'</span>] = <span class="var">$this</span>-><span class="cl">UserModel</span>-><span class="fn">all</span>();<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span class="var">$this</span>-><span class="fn">call</span>-><span class="fn">view</span>(<span class="str">'welcome'</span>, <span class="var">$data</span>);<br>
&nbsp;&nbsp;}<br>
}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="divider"></div>

<!-- STRUCTURE -->
<section>
    <div class="wrap">
        <div class="section-label">// project structure</div>
        <h2 class="section-title">Organized by default.</h2>
        <p class="section-desc">A predictable directory layout so every file has a logical home from day one.</p>

        <div class="structure-grid">
            <?php
            $dirs = [
                ['app/config',      '⚙'],
                ['app/controllers', '🎮'],
                ['app/helpers',     '🔧'],
                ['app/libraries',   '📚'],
                ['app/language',    '🌐'],
                ['app/middlewares', '🛡️'],
                ['app/migrations',  '🔄'],
                ['app/models',      '🗄'],
                ['app/modules',     '📦'],
                ['app/views',       '🖼'],
                ['public/',         '🌍'],
                ['runtime/',        '⚡'],
                ['console/',        '💻'],
                ['scheme/',         '📐'],
            ];
            foreach ($dirs as [$name, $icon]): ?>
            <div class="dir-item">
                <span class="dir-icon"><?php echo $icon; ?></span>
                <?php echo $name; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer>
    <div class="footer-inner">
        <div class="footer-meta">
            <span>rendered in <span><?php echo lava_instance()->performance->elapsed_time('lavalust'); ?>s</span></span>
            <span>memory <span><?php echo lava_instance()->performance->memory_usage(); ?></span></span>
            <?php if(config_item('environment') === 'development'): ?>
            <span>version <span><?php echo config_item('version'); ?></span></span>
            <span style="color: #dd4814;">● development</span>
            <?php endif; ?>
        </div>
        <div class="footer-links">
            <a href="https://github.com/ronmarasigan/LavaLust" target="_blank">GitHub</a>
            <a href="https://lavalust.netlify.app/docs/" target="_blank">Docs</a>
            <a href="https://opensource.org/licenses/MIT" target="_blank">MIT License</a>
        </div>
    </div>
</footer>

</body>
>>>>>>> 121063916e1ca72aaba7c3715e9c867cbb14a09a
</html>