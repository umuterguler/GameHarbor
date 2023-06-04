<?php

$is_invalid = false;

session_start();
if($_POST){
    if (isset($_SESSION["user_id"])) {

        $mysqli = require __DIR__ . "/database.php";
        
        $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();
    
        $currentPassword = $_POST['current_password'];
        $newPassword = $_POST['new_password'];

        if (password_verify($currentPassword, $user['password_hash'])) {

            $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            

            $update_query = "UPDATE user SET password_hash = '$newHashedPassword' WHERE id = {$_SESSION["user_id"]}";
            $mysqli->query($update_query);
    
            header("Location: passwordChangeSuccess.html");
        } else {
            echo "Current Password is wrong!";
        }
    }
    else{
        header("Location: /contactPage.html");
    }     

}

$is_invalid = true;

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
                <li><a href="/HomePage/index.php"><button>Home Page   </button></a></li>
                <li><a href="/UploadGames/uploadPage.php"><Button>Upload Game</Button></a></li>
                <li><a href= "showProfilePage.php" ><button>Profile</button></a></li>
                <li><a href="/contactPage.html"><button>Contact</button></a></a></li>

            </ul>
        </nav>
    </header>
    
    <div class="container"> 
        <h2>Password Change</h2>
        <?php if ($_POST && $is_invalid): ?>
          <em>Invalid Change</em>
        <?php endif; ?>
        <form method="post"  novalidate  >
          <input type="password" placeholder="Current Password" id="current_password" name="current_password" required>
          <input type="password" placeholder="New Password" name="new_password" id="new_password" required>
          <button id="btn3" type="submit">Change Password</button>
        </form>
    </div>
    
</body> 
</html>