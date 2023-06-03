<?php
session_start();
        
if($_POST){
    if (isset($_SESSION["user_id"])) {

        $mysqli = require __DIR__ . "/database.php";
        
        $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();
    
        $currentPassword = $_POST['current_password'];
        $newPassword = $_POST['new_password'];
    
        // Kullanıcının mevcut şifresini doğrula
        if (password_verify($currentPassword, $user['password_hash'])) {
            // Yeni şifreyi hashleyerek güvenli hale getir
            $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            
            // Kullanıcının şifresini güncelle
            $update_query = "UPDATE user SET password_hash = '$newHashedPassword' WHERE id = {$_SESSION["user_id"]}";
            $mysqli->query($update_query);
    
            echo "Password has been changed!";
        } else {
            echo "Current Password is wrong!";
        }
    }
    else{
        header("Location: /contactPage.html");
    }
    
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
        <a href="/HomePage/index.php"><img class="nav__logo" src="/imgs/logo.png" alt="error"/></a>     
        <nav>
            <ul class="nav__links">
                <li><a> <input id="search_Bar" type="search" placeholder="Game Search"> <button id="search_Button">&#128270</button> </a></li>
                <li><a href="/HomePage/index.php"><button>Home Page</button></a></li>
                <li><a href="/UploadGames/uploadPage.php"><Button>Upload Game</Button></a></li>
                <li><a href="loginPage.php"><button>Profile</button></a></li>
                <li><a href="/contactPage.html"><button>Contact</button></a></a></li>
            </ul>
        </nav>
    </header>
    
    <div class="container"> 
        <h2>Password Change</h2>
        <form method="post"  novalidate  >
          <input type="password" placeholder="Current Password" id="current_password" name="current_password" required>
          <input type="password" placeholder="New Password" name="new_password" id="new_password" required>
          <button type="submit">Change Password</button>
        </form>
      </div>
    
</body> 