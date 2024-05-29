<?php
// Подключение к базе данных
session_start();

if ($_SESSION["position"] != "accountant") {
    header("Location: http://localhost/course/index.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "course";

$conn = new mysqli($servername, $username, $password, $dbname);

mysqli_set_charset($conn, "utf8");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//просмотр таблицы
$sql = "SELECT pid, pname, cid, arrdate, amt FROM warehouse";
$result = $conn->query($sql);

// Проверяем, есть ли данные
$tableHTML = '';
if ($result->num_rows > 0) {
    // Создаем таблицу
    $tableHTML .= "<table><tr><th>ID</th><th>Название</th><th>ID клиента</th><th>Дата поступления</th><th>Количество</th></tr>";
    // Выводим данные каждой строки
    while($row = $result->fetch_assoc()) {
        // Заполняем таблицу данными
        $tableHTML .= "<tr><td>" . $row["pid"]. "</td><td>" . $row["pname"]. "</td><td>" . $row["cid"]. "</td><td>" . $row["arrdate"] . "</td><td>" . $row["amt"] . "</td></tr>";
    }
    // Закрываем таблицу
    $tableHTML .= "</table>";
} else {
    $tableHTML = "0 результатов";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Товары на складе</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
            padding-top: 2rem;
        }

        .container {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
        }

        h1 {
            margin-bottom: 1.5rem;
            color: #333333;
            text-align: center;
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

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 30px;
        }

        form label {
            font-weight: bold;
            margin-bottom: 10px;
        }

        form input[type="text"],
        form input[type="date"],
        form input[type="number"] {
            padding: 10px;
            border: 2px solid black;
            border-radius: 5px;
            margin-bottom: 20px;
            width: 100%;
            box-sizing: border-box;
        }

        form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        form input[type="submit"]:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Товары на складе</h1>
        <?php echo $tableHTML; ?>
        <h1>Приход товаров</h1>
        <form action="addwares.php" method="post">
            <label for="pname">Наименование продукта:</label>
            <input type="text" name="pname" id="pname" required>

            <label for="cid">ID клиента:</label>
            <input type="text" name="cid" id="cid" required>

            <label for="arrdate">Дата поступления:</label>
            <input type="date" name="arrdate" id="arrdate" required>

            <label for="amt">Количество:</label>
            <input type="number" name="amt" id="amt" required>

            <input type="submit" value="Добавить запись">
        </form>
        <a href="http://localhost/course/users/accountant.php">Назад</a>
    </div>
</body>
</html>
