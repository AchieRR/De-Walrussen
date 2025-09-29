<?php

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Bedankt voor je reservering</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f6f6f6;
            color: #c11414ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .box {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 400px;
        }
        h1 {
            color: #bb2020ff;
            margin-bottom: 15px;
        }
        p {
            margin: 10px 0;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background: #c72828ff;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: 0.3s;
        }
        .btn:hover {
            background: #225e5f;
        }
    </style>
</head>
<body>
    <div class="box">
        <h1>Bedankt voor je reservering!</h1>
        <p>We hebben je aanvraag ontvangen en bevestigen deze zo snel mogelijk.</p>
        <p>We kijken ernaar uit je te ontvangen 🍽️</p>
        <a href="../Reserveren.php" class="btn">Nieuwe reservering maken</a>
    </div>
</body>
</html>