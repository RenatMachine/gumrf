<!DOCTYPE html>
<html>
<head>
    <title>Меню администратора</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Nunito', sans-serif;
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
            background-color: #4CAF50;
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
            background-color: #3e8e41;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 2rem;
            color: #333333;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Меню администратора</h1>
        <form action="http://localhost/course/scripts/adminm.php" method="POST">
            <input type="submit" value="Работа с пользователями">
        </form>
        <br><a href="http://localhost/course">Назад</a>
    </div>
</body>
</html>
