<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            font-family: Poppins, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        p {
            color: #666;
            text-align: center;
            margin-bottom: 20px;
        }
        .btn {
            display: block;
            width: 200px;
            margin: 0 auto;
            padding: 10px 20px;
            background-color: #04764E;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #04764E;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Reset Password</h1>
        <p>Click the link below to reset your password:</p>
        <a class="btn mb-2 me-2 btn-icon icon-start w-100 btn-primary" href="{{ route('reset.password', $token) }}">RESET PASSWORD</a>
    </div>
</body>
</html>

