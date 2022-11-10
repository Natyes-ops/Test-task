<?php 
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: /');
    } else {
        $user = $_COOKIE['user'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Привет <?php echo $user ?>! </title>
</head>
<?php 
?>
<body>
    <main>
        <h1>Привет <?php echo $user ?>!</h1>
        <a href="./app/loginout.php">Выйти</a>
    </main>
</body>
</html>