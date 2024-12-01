<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Sayfa Bulunamadı</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            max-width: 600px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 48px;
            color: #d9534f;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #0056b3;
        }

        .image {
            margin-top: 20px;
        }

        .image img {
            max-width: 100%;
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>404 - Sayfa Bulunamadı</h1>
        <p>Üzgünüz, aradığınız sayfa bulunamadı. Ana sayfamıza geri dönebilirsiniz.</p>
        <a href="/">Ana Sayfaya Dön</a>
        <div class="image">
            <img src="https://via.placeholder.com/600x400" alt="404 Illustration">
        </div>
    </div>
</body>

</html>