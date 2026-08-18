<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information | <?= htmlspecialchars($student['name']); ?></title>
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
            max-width: 520px;
            width: 100%;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
        }
        .lock-badge {
            display: inline-block;
            background: #1a7f37;
            color: #fff;
            padding: 4px 14px;
            border-radius: 20px;
            font-size: 12px;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 16px;
        }
        h1 {
            color: #0f2027;
            margin-bottom: 20px;
            border-bottom: 3px solid #2c5364;
            padding-bottom: 10px;
        }
        table { width: 100%; border-collapse: collapse; }
        table td {
            padding: 10px 6px;
            border-bottom: 1px solid #eee;
            font-size: 15px;
        }
        table td.label {
            font-weight: 600;
            color: #2c5364;
            width: 40%;
        }
        nav { margin-top: 24px; text-align: center; }
        nav a {
            display: inline-block;
            margin: 6px;
            padding: 10px 20px;
            background: #2c5364;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
        }
        nav a:hover { background: #0f2027; }
    </style>
</head>
<body>
    <div class="card">
        <span class="lock-badge">🔓 Access Granted by StudentMiddleware</span>
        <h1>Student Information</h1>
        <table>
            <tr><td class="label">Student ID</td><td><?= htmlspecialchars($student['student_id']); ?></td></tr>
            <tr><td class="label">Name</td><td><?= htmlspecialchars($student['name']); ?></td></tr>
            <tr><td class="label">Course</td><td><?= htmlspecialchars($student['course']); ?></td></tr>
            <tr><td class="label">Year Level</td><td><?= htmlspecialchars($student['year']); ?></td></tr>
            <tr><td class="label">Section</td><td><?= htmlspecialchars($student['section']); ?></td></tr>
            <tr><td class="label">Email</td><td><?= htmlspecialchars($student['email']); ?></td></tr>
            <tr><td class="label">Address</td><td><?= htmlspecialchars($student['address']); ?></td></tr>
            <tr><td class="label">Contact No.</td><td><?= htmlspecialchars($student['contact_no']); ?></td></tr>
            <tr><td class="label">Hobbies</td><td><?= htmlspecialchars($student['hobbies']); ?></td></tr>
            <tr><td class="label">About</td><td><?= htmlspecialchars($student['description']); ?></td></tr>
        </table>

        <nav>
            <a href="<?= site_url('student'); ?>">Home</a>
            <a href="<?= site_url('student/logout'); ?>">Revoke Access</a>
        </nav>
    </div>
</body>
</html>
