<?php

header('Content-Type: text/html; charset=utf-8');
session_start();
if ($_SESSION["position"] != "accountant" && $_SESSION["position"] != "admin" && $_SESSION["position"] != "HR") {
    header("Location: http://localhost/course/index.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "course";

// Создаем подключение
$conn = new mysqli($servername, $username, $password, $dbname);

mysqli_set_charset($conn, "utf8");

// Проверяем подключение
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Выполняем SQL запрос для получения данных из таблицы "customers"
$sql = "SELECT cid, cname, city FROM customers";
$result = $conn->query($sql);

// Проверяем, есть ли данные
$tableHTML = '';
if ($result->num_rows > 0) {
    // Создаем таблицу
    $tableHTML .= "<table><tr><th>ID</th><th>Name</th><th>City</th></tr>";
    // Выводим данные каждой строки
    while($row = $result->fetch_assoc()) {
        // Заполняем таблицу данными
        $tableHTML .= "<tr><td>" . $row["cid"]. "</td><td>" . $row["cname"]. "</td><td>" . $row["city"]. "</td></tr>";
    }
    // Закрываем таблицу
    $tableHTML .= "</table>";
} else {
    $tableHTML = "0 результатов";
}

// Закрываем подключение
$conn->close();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Клиенты</title>
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
            max-width: 800px;
            width: 100%;
            text-align: center;
        }

        h1 {
            margin-bottom: 1.5rem;
            color: #333333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table th,
        table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #007bff;
            color: white;
            text-align: left;
        }

        table tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        table td:last-child {
            text-align: center;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 30px;
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
        <h1>Клиенты</h1>
        <?php echo $tableHTML; ?>
        <a href="javascript:history.back()">Назад</a>
    </div>
</body>
</html>
