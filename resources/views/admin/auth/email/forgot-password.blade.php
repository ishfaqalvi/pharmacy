<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: #333333;
            background-color: #ffffff;
        }
        .container {
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }
        .content {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            padding: 20px;
            border: 1px solid #dddddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            font-size: 24px;
            color: #333333;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
            color: #666666;
        }
        a.button {
            display: inline-block;
            padding: 10px 20px;
            margin: 15px 0;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <h1>Password Reset Request</h1>
            <p>You are receiving this email because we received a password reset request for your account.</p>
            <a href="{{ route('admin.password.reset',[$token,'email'=> $email]) }}" class="button">Reset Password</a>
            <p>This password reset link will expire in 60 minutes. If you did not request a password reset, no further action is required.</p>
            <p>Regards,<br>{{ config('app.name') }}</p>
        </div>
    </div>
</body>
</html>
