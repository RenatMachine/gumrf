<?php
session_start();

if ($_SESSION["position"] != "accountant") {
    header("Location: http://localhost/course/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Меню бухгалтера</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h1 {
            margin-bottom: 1.5rem;
            color: #333333;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 1rem;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
            margin-bottom: 1rem;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 2rem;
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Меню бухгалтера</h1>
        <form action="http://localhost/course/scripts/cust_view.php" method="POST">
            <input type="submit" value="Просмотр клиентов">
        </form>
        <form action="http://localhost/course/scripts/wares.php" method="POST">
            <input type="submit" value="Приход товаров">
        </form>
        <form action="http://localhost/course/scripts/opm.php" method="POST">
            <input type="submit" value="Уход товаров">
        </form>
        <a href="http://localhost/course">Назад</a>
    </div>
</body>
</html>
