<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="POST">
    <textarea name="test"></textarea>
    <input type="submit">
</form>
<?php
    echo nl2br($_POST['test']); ?>
</body>
</html>