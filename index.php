<?php
function validateForm($name, $email, $phone)
{

    if (empty($name)) {
        return "Поле с именем не может быть пустым";
    }
    if (strlen($name) < 2) {
        return "Имя должн состоять быть от 2 букв";
    }

    if (empty($email)) {
        return "Email не может быть пустым";
    }
    if (strlen($email) < 10 ) {
        return "Email должен быть от 10 символов";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Неверный формат почты";
    }

    if (empty($phone)) {
        return "Номер не может быть пустым";
    }
    if (strlen($phone) != 11) {
        return "Номер должен содержать 11 символов";
    }

    return "Валидация прошла успешно!";
}

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = validateForm($name, $email, $phone);
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Практика 2</title>
    <link rel="stylesheet" href="assets/style/style.css">
</head>

<body>
    <style>
        * {
            font-family: arial, sans-serif;
        }

        .message {
            color: red;
            font-weight: 500;
            text-align: center;
        }

         form {
            display: flex;
            flex-direction: column;
            align-items: start;
            gap: 10px;
            color:purple;
            align-items: center;
            
        }
        input{
            border-radius:30px;
            border: 1px solid pink;
            width: 250px;
            height: 40px;
        }
    </style>
    
    <form method="post" action="">
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name">
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        
        <label for="phone">Номер телефона:</label>
        <input type="text" id="phone" name="phone">
        
        <input type="submit" value="Отправить данные">
    </form>

    <?php
    // Вывод сообщения о валидации
    if ($message) {
        echo '<p class="message">' . $message . '</p>';
    }
    ?>
</body>
</html>