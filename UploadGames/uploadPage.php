<?php
session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/../ProfilePage/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

else
{
    header("Location: /ProfilePage/loginPage.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Harbor</title>
    <link rel="stylesheet" href="uploadPageCSS.css">

</head>
<body>
    <header>
        <a href="/HomePage/index.php"><img class="nav__logo" src="/imgs/logo.png" alt="error"/></a>     
        <div class="top_mid_space">
            <img id="ad_img" src="/imgs/google_ads.jpg" alt="">
        </div> 
        <nav>
            <ul class="nav__links">
                <div class="search-container">
                    <div class="search-input">
                    <form class="full_search_form" action="/ProfilePage/publicProfilePage.php" method="post" enctype="multipart/form-data">
                        <input id="search_Bar" type="text" placeholder="Profile Search (Without @)" name="search_name">
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
                    <li><a href="uploadPage.php"><Button>Upload Game</Button></a></li>
                    <li><a href="/ProfilePage/showProfilePage.php"><button>Profile</button></a></li>
                    <li><a href="/contactPage.html"><button>Contact</button></a></a></li>
                </div>
                
                
            </ul>
        </nav>
    </header>
   


    <section class="game_Info">
        <?php if(isset($_GET['error'])): ?>
            <p> <?php echo $_GET['error']; ?> </p>
        <?php endif ?>

        <form  action="upload.php" method="post" enctype="multipart/form-data">
      
            <h1>Game Name</h1>
            <textarea class="game_Name" type="text" placeholder="Game Name" name="name"></textarea><br><br>

            <h2>Game Description</h2>
            <textarea class="game_Description" type="text" placeholder="Game Description" name="message"></textarea><br>

            <h3>Credit</h2>
            <textarea class="game_Credit" type="text" name="credit" readonly><?php echo "@". $user["username"] ?></textarea><br><br>


            <h4>Game Photos</h3>
            <input class="game_Photo" type="file" name="gameImage" > <br><br>

            <input id="form-input" type="submit" name="submit" value="Upload">

        </form>
    </section>
    <script src="/dynamic.js" > </script>     
</body> 
</html>