<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Home | <?= htmlspecialchars($student['name']); ?></title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .card {
            background: #ffffff;
            border-radius: 16px;
            padding: 40px;
            max-width: 460px;
            width: 100%;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            text-align: center;
        }
        .badge {
            display: inline-block;
            background: #2c5364;
            color: #fff;
            padding: 4px 14px;
            border-radius: 20px;
            font-size: 12px;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 16px;
        }
        h1 { color: #0f2027; margin-bottom: 8px; }
        p.sub { color: #555; margin-bottom: 24px; }
        nav a {
            display: inline-block;
            margin: 6px;
            padding: 10px 20px;
            background: #2c5364;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
            transition: background 0.2s;
        }
        nav a:hover { background: #0f2027; }
        .note {
            margin-top: 20px;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="card">
        <span class="badge">Student Information Page</span>
        <h1>Welcome, <?= htmlspecialchars($student['name']); ?>!</h1>
        <p class="sub">This is the home page of the LavaLust Student Information System.</p>

        <nav>
            <a href="<?= site_url('student'); ?>">Home</a>
            <a href="<?= site_url('student/profile'); ?>">Student Profile</a>
        </nav>

        <p class="note">
            The Student Profile page is protected by <strong>StudentMiddleware</strong>.
            If you haven't unlocked access yet, click
            <a href="<?= site_url('student/access'); ?>" style="color:#2c5364;">here to grant access</a>
            before opening the profile page.
        </p>
    </div>
</body>
</html>
