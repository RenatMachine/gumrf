<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сотрудники</title>
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
            max-width: 600px;
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
        select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            box-sizing: border-box;
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
            margin-bottom: 1rem;
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
            margin-bottom: 1rem;
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
        <h1>Добавить сотрудника</h1>
        <form action="worker.php" method="get">
            <label for="wname">Имя:</label>
            <input type="text" name="wname" id="wname" required>
            <label for="speciality">Специальность:</label>
            <select name="speciality" id="speciality" required>
                <option value="охранник">Охранник</option>
                <option value="бухгалтер">Бухгалтер</option>
                <option value="грузчик">Грузчик</option>
                <option value="ИС">ИС</option>
            </select>
            <label for="shift">Смена:</label>
            <select name="shift" id="shift" required>
                <option value="день">День</option>
                <option value="ночь">Ночь</option>
            </select>
            <input type="submit" name="action" value="Добавить">
        </form>
        <button onclick="document.location='http://localhost/course/users/HR.php'">Назад</button>
    </div>
</body>
</html>
