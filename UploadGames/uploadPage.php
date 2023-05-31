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
        <nav>
            <ul class="nav__links">
                <li><a> <input id="search_Bar" type="search" placeholder="Game Search"> <button id="search_Button">&#128270</button> </a></li>
                <li><a href="/HomePage/index.php"><button>Home Page</button></a></li>
                <li><a href="uploadPage.php"><Button>Upload Game</Button></a></li>
                <li><a href="/ProfilePage/showProfilePage.php"><button>Profile</button></a></li>
                <li><a href="/contactPage.html"><button>Contact</button></a></a></li>
            </ul>
        </nav>
    </header>
    <section class="game_Info">
        <?php if(isset($_GET['error'])): ?>
            <p> <?php echo $_GET['error']; ?> </p>
        <?php endif ?>

        <form action="upload.php" method="post" enctype="multipart/form-data">

            <!-- <h3>Game Name</h3>
            <input class="game_Name" type="text" placeholder="Game Name" required> <br>

            <h3>Game Description</h3>
            <input class="game_Description" type="text" placeholder="Game Description" required> <br>

            <h3>Game Credits</h3>
            <input class="game_Credits" type="text" placeholder="Game Credits" required> <br> -->
            <!-- id="image_Input" accept="image/jpg, image/png" required -->
            
            <h1>Game Name</h1>
            <textarea class="game_Name" placeholder="Game Name" name="name"></textarea>

            <h2>Game Description</h2>
            <textarea class="game_Credits" type="text" placeholder="Game Description" name="message"></textarea>

            <h3>Game Photos</h3>
            <input class="game_Photo" type="file" name="gameImage" > <br>


            <input type="submit" name="submit" value="Upload">

            <!-- <div id="send_Button">
                <button>Send</button>
            </div> -->
        </form>
    </section>
</body> 
</html>