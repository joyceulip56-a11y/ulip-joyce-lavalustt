<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <style>
        *{
            box-sizing:border-box;
        }

        body{
            font-family:Arial, sans-serif;
            background:#f3e8ff;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
            margin:0;
        }

        .login-box{
            background:#ffffff;
            padding:35px;
            width:380px;
            border-radius:12px;
            box-shadow:0 4px 15px rgba(0,0,0,0.15);
        }

        h2{
            text-align:center;
            color:#7b1fa2;
            margin-bottom:25px;
            font-size:36px;
        }

        label{
            display:block;
            margin-bottom:8px;
            margin-top:15px;
            font-size:14px;
            font-weight:bold;
            color:#4a148c;
        }

        input{
            width:100%;
            padding:12px;
            border:1px solid #c084fc;
            border-radius:6px;
            margin-bottom:10px;
            font-size:15px;
        }

        input:focus{
            outline:none;
            border-color:#7b1fa2;
        }

        button{
            width:100%;
            padding:12px;
            background:#7b1fa2;
            color:white;
            border:none;
            border-radius:6px;
            font-size:16px;
            font-weight:bold;
            cursor:pointer;
            margin-top:10px;
        }

        button:hover{
            background:#6a1b9a;
        }
    </style>
</head>

<body>

<div class="login-box">

    <h2>Login</h2>

    <form action="<?= site_url('products'); ?>" method="get">

        <label>Username</label>
        <input type="text"
               name="username"
               value="admin"
               required>

        <label>Password</label>
        <input type="password"
               name="password"
               value="123456"
               required>

        <button type="submit">Login</button>

    </form>

</div>

</body>
</html>