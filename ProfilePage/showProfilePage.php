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

switch (true) {
    case (0 <= $user['game_counter'] && $user['game_counter'] <= 3):
        $role = "Newbie";
        break;
    case (3 < $user['game_counter'] && $user['game_counter'] <= 10):
        $role = "Amateur";
        break;
    case (10 < $user['game_counter'] && $user['game_counter'] <= 15):
        $role = "Rising Star";
        break;
    case (15 < $user['game_counter'] && $user['game_counter'] <= 20):
        $role = "Experienced Player";
        break;
    case (20 < $user['game_counter'] && $user['game_counter'] <= 25):
        $role = "Senior Enjoyer";
        break;
    case ($user['game_counter'] > 25):
        $role = "Ultra Super Duper Extreme Insane Player";
        break;
    default:
        echo "Unknown Role";
        break;
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
        <div class="top_mid_space">
            <!-- <form class="full_search_form" action="/ProfilePage/publicProfilePage.php" method="post" enctype="multipart/form-data">
                    <input id="search_Bar" type="text" placeholder="Profile Search(without @)" name="search_name">
                    <button id="search_Button" type="submit">&#128270</button>
                </form>
                <form class="full_search_form" action="/GamePages/searchGamePage.php" method="post" enctype="multipart/form-data">
                    <input id="search_Bar" type="text" placeholder="Game Search" name="search_game">
                    <button id="search_Button" type="submit">&#128270</button>
                </form>  search bar ortada versiyon -->  
                <img src="" alt="">
        </div> 
        <nav>
            <ul class="nav__links">
                <div class="search-container">
                    <div class="search-input">
                        <form class="full_search_form" action="publicProfilePage.php" method="post" enctype="multipart/form-data">
                            <input id="search_Bar" type="text" placeholder="Profile Search(without @)" name="search_name">
                            <button id="search_Button" type="submit">&#128270</button>
                        </form>
                        <form class="full_search_form" action="/GamePages/searchGamePage.php" method="post" enctype="multipart/form-data">
                            <input id="search_Bar" type="text" placeholder="Game Search" name="search_game">
                            <button id="search_Button" type="submit">&#128270</button>
                        </form>
                    </div>
                    
                </div>
                <div class="other_Buttons">
                    <li><a href="/HomePage/index.php"><button>Home Page</button></a></li>
                    <li><a href="/UploadGames/uploadPage.php"><?php $selamTmp = $user['username'] ?><Button>Upload Game</Button></a></li>
                    <li><a href="showProfilePage.php"><button>Profile</button></a></li>
                    <li><a href="/contactPage.html"><button>Contact</button></a></a></li>
                </div>
                
                
            </ul>
        </nav>
    </header>
   
   
    
    <div class="container">
        <div class="profile_header">
          <img src="/imgs/account.png" alt="Profil Fotografi" class="profile_picture">
          <h2 class="profile_name"><?= htmlspecialchars($user["name"]) ?></h2>
          <p class="profile_username"><?= "Username: @" . htmlspecialchars($user["username"]) ?></p>
          <p class="profile_email"><?= "E-Mail: " . htmlspecialchars($user["email"]) ?></p>
          <p class="profile_game_counter"> <?php echo "Uploaded Games: " . $user['game_counter']  ?>  </p>
          <p class="profile_role"> <?php echo "User Role: " .  $role ?>  </p>
        </div>

        <li><a href="passwordChange.php"><button id="btn3">Change Password</button></a></li>
        <li><a href="emailChange.php"><button id="btn3">Change E-mail</button></a></li>
        <li><a href="logoutPage.php"><button id="btn3">Log Out</button></a></li>
        
    </div>
            
</body>