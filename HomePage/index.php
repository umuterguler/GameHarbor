<?php
require 'config.php';
$games = DB::get("SELECT * FROM upload ORDER BY id DESC");
$gms[] = DB::get("SELECT * FROM upload ORDER BY id DESC");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Harbor</title>
    <link rel="stylesheet" href="stylesHome.css">

</head>
<body>
    
    <header>
        <a href="index.php"><img class="nav__logo" src="/imgs/logo.png" alt="error"/></a>     
        <nav>
            <ul class="nav__links">
                <li><a> <input id="search_Bar" type="search" placeholder="Game Search"> <button id="search_Button">&#128270</button> </a></li>
                <li><a href="index.php"><button>Home Page</button></a></li>
                <li><a href="/UploadGames/uploadPage.php"><Button>Upload Game</Button></a></li>
                <li><a href="/ProfilePage/showProfilePage.php"><button>Profile</button></a></li>
                <li><a href="/contactPage.html"><button>Contact</button></a></a></li>
            </ul>
        </nav>
    </header>

    <section class="image_Slider">
        <div class="left_Arrow">
            <i class="arrow-left">&lt;</i>
        </div>

        <div class="main_Slider">
            <?php 
            $imgPath = "/UploadGames/uploads/" . $games[0]->image_url_1;
            echo '<img src="' . $imgPath . '" alt="imggg">';
            foreach ($gms as $image) {
                    echo '<div class="slider-image" style="background-image: url(' . $imgPath . ')"></div>';
            } 
            ?>
        </div>

        <div class="right_Arrow">
            <i class="arrow-right;">&gt;</i>
        </div>

        <div class="caption">
            <h1 >Hello !</h1>
            <p >Welcome to the Game Harbor !</p>
        </div>
    </section>

    <section>
        <main class="game_Types">
            <div class="game_Type">
                <h4>Action</h4>
                <a href="/GamePages/allGames.php">
                    <img src="/imgs/action.png" class="game_Img" alt=""> </a>
            </div>
        </main>

    </section>

</body>
</html>