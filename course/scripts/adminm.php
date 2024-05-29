<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Меню администратора</title>
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

        input[type="text"],
        input[type="password"],
        select {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 1rem;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #3e8e41;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
            width: 100%;
            margin-top: 1rem;
        }

        button:hover {
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
        <h1>Добавить пользователя</h1>
        <form action="adminm.php" method="get">
            <label for="loginm">Логин:</label>
            <input type="text" name="loginm" id="loginm" required><br>
            <label for="passwordm">Пароль:</label>
            <input type="text" name="passwordm" id="passwordm" required><br>
            <label for="positionm">Должность:</label>
            <select id="positionm" name="positionm" required>
                <option value="accountant">Бухгалтер</option>
                <option value="HR">HR</option>
                <option value="admin">Администратор</option>
            </select>
            <input type="submit" name="action" value="Добавить">
        </form>
        <button onclick="document.location='http://localhost/course/users/admin.php'">Назад</button>
    </div>
</body>
</html>
