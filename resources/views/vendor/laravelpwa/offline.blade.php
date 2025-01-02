<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offline - Mundo da Bola</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: #f4f4f4;
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        .container {
            text-align: center;
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .title {
            font-size: 2rem;
            font-weight: bold;
            color: #2c3e50;
        }

        .message {
            margin-top: 1rem;
            font-size: 1rem;
            color: #7f8c8d;
        }

        .btn {
            margin-top: 1.5rem;
            display: inline-block;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            font-weight: bold;
            color: white;
            background: #3498db;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.2s;
        }

        .btn:hover {
            background: #2980b9;
        }

        .btn:active {
            transform: scale(0.95);
        }

        .icon {
            font-size: 3rem;
            color: #e74c3c;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="icon">🚫</div>
    <h1 class="title">You Are Offline</h1>
    <p class="message">It seems that you're not connected to the internet. Please check your connection and try
        again.</p>
    <a href="{{ url('/') }}" class="btn">Try Again</a>
</div>
</body>
</html>
