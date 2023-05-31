<?php
session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Harbor</title>
    <link rel="stylesheet" href="profilePageStyle.css">

</head>
<body>
    
    <header>
        <img class="nav__logo" src="/imgs/logo.png" alt="error"/>     
    
        <?php if (isset($user)): 
            
            header("Location: /HomePage/index.php");
            ?>

        <?php else:
            header("Location: loginPage.php")
            ?>
                   
        <?php endif; ?>
        
    </header>   
</body>
</html>