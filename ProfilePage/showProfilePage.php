<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

else
{
    header("Location: loginPage.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Harbor</title>
    <link rel="stylesheet" href="showProfilePageStyle.css">

</head>
<body>
    
    <header>
        <a href="/HomePage/index.php"><img class="nav__logo" src="/imgs/logo.png" alt="error"/></a>     
        <nav>
            <ul class="nav__links">
                <li><a> <input id="search_Bar" type="search" placeholder="Game Search"> <button id="search_Button">&#128270</button> </a></li>
                <li><a href="/HomePage/index.php"><button>Home Page</button></a></li>
                <li><a href="/UploadGames/uploadPage.php"><Button>Upload Game</Button></a></li>
                <li><a href="showProfilePage.php"><button>Profile</button></a></li>
                <li><a href="/contactPage.html"><button>Contact</button></a></a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <div class="profile-header">
          <img src="/imgs/account.png" alt="Profil Fotografi" class="profile-picture">
          <h2 class="profile-name"><?= htmlspecialchars($user["name"]) ?></h2>
          <p class="profile-username">@<?= htmlspecialchars($user["username"]) ?></p>
          <p class="profile-email"><?= htmlspecialchars($user["email"]) ?></p>
        </div>

        <li><a href="passwordChange.php"><button id="btn3">Change Password</button></a></li>
        <li><a href="emailChange.php"><button id="btn3">Change E-mail</button></a></li>
        <li><a href="logoutPage.php"><button id="btn3">Log Out</button></a></li>
        
    </div>
            
</body>