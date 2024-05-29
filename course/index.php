<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "course";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT position FROM users WHERE login = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $position = $row["position"];

        $_SESSION["position"] = $position;

        if ($position == "admin") {
            header("Location: users/admin.php");
            exit;
        } elseif ($position == "accountant") {
            header("Location: users/accountant.php");
            exit;
        } elseif ($position == "HR") {
            header("Location: users/hr.php");
            exit;
        }
    } else {
        $error = "Неверные учетные данные. Пожалуйста, попробуйте еще раз.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
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
        }

        label {
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-align: left;
        }

        input[type="text"],
        input[type="password"] {
            padding: 12px;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
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
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        p.error {
            color: red;
            margin-top: 1rem;
        }

        .bottom-info {
            margin-top: 2rem;
            font-size: 0.875rem;
            color: #666666;
            text-align: center;
        }

        .bottom-info a {
            color: #007bff;
            text-decoration: none;
        }

        .bottom-info a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Авторизация</h1>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <label for="username">Имя пользователя:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Войти">
        </form>
        <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
    </div>
    <div class="bottom-info">
        Данная ИС позволяет осуществлять работу с ИС склада, управлять системой могут 3 типа пользователей - бухгалтер, администратор или HR. Если вы ещё не зарегистрированы, <a href="#">обратитесь к администратору</a>.
    </div>
</body>
</html>
