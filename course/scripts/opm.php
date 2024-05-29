<?php
// Подключение к базе данных
session_start();

if ($_SESSION["position"] != "accountant") {
    header("Location: http://localhost/course/index.php");
    exit;
}

echo "<h1>Операции с товарами</h1>";


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
$sql = "SELECT oid, amt, cid, pid, odate FROM operations";
$result = $conn->query($sql);

// Проверяем, есть ли данные
if ($result->num_rows > 0) {
    // Создаем таблицу
    echo "<table><tr><th>ID операции</th><th>ID клиента</th><th>ID товара</th><th>Дата ухода</th><th>Количество</th></tr>";
    // Выводим данные каждой строки
    while($row = $result->fetch_assoc()) {
        // Заполняем таблицу данными
        echo "<tr><td>" . $row["oid"]. "</td><td>" . $row["cid"]. "</td><td>" . $row["pid"]. "</td><td>" . $row["odate"] . "</td><td>" . $row["amt"] . "</td></tr>";
    }
    // Закрываем таблицу
    echo "</table>";
}
 else {
    echo "0 результатов";
}

$conn->close();
?>

<head>

<style>

    body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
    }
    h1 {
        color: #333;
        text-align: center;
        margin-top: 30px;
    }
    table {
        border-collapse: collapse;
        width: 90%;
        margin: 20px auto;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #4CAF50;
        color: white;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #ddd;
    }
    form {
        width: 90%;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }
    input[type="text"],
    input[type="date"] {
        padding: 8px;
        width: calc(100% - 20px);
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
    a {
        display: block;
        text-align: center;
        margin-top: 20px;
        color: #333;
        text-decoration: none;
    }
    a:hover {
        text-decoration: underline;
    }

</style>
</head>

<h1>Добавить операцию</h1>
<form action="op.php" method="post">

    <label for="amt">Количество товара:</label>
    <input type="text" name="amt" placeholder="Количество" required>
    <br>
    <label for="cid">ID клиента:</label>
    <input type="text" name="cid" placeholder="Код клиента" required>
    <br>
    <label for="pid">ID товара:</label>
    <input type="text" name="pid" placeholder="Код товара" required>
    <br>
    <label for="odate">Дата операции:</label>
    <input type="date" name="odate" required>
    <br>
    <input type="submit" value="Добавить" required>
    <br><a href="http://localhost/course/users/accountant.php">Назад</a>

</form>
