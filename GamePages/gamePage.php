<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/../ProfilePage/database.php";
    
    $sql = "SELECT * FROM user JOIN upload";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    $upload = $result->fetch_assoc();   
    
}

else
{
    header("Location: loginPage.php");
}

// $mysqli = require __DIR__ . "/../UploadGames/uploadDB.php";
// $sql2 = "SELECT * FROM upload ORDER BY id";

// $result2 = $mysqli->query($sql2);
    
// $upload = $result2->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Harbor</title>
    <link rel="stylesheet" href="/GamePages/gamePageCSS.css">

</head>
<body>
    
    <header>
        <a href="/HomePage/index.html"><img class="nav__logo" src="/imgs/logo.png" alt="error"/></a>     
        <nav>
            <ul class="nav__links">
                <li><a> <input id="search_Bar" type="search" placeholder="Game Search"> <button id="search_Button">&#128270</button> </a></li>
                <li><a href="/HomePage/index.html"><button>Home Page</button></a></li>
                <li><a href="/UploadGames/uploadPage.html"><Button>Upload Game</Button></a></li>
                <li><a href="/ProfilePage/profilePage.html"><button>Profile</button></a></li>
                <li><a href="/contactPage.html"><button>Contact</button></a></a></li>
            </ul>
        </nav>
    </header>

    <section >
        <div class="container" >
            <section class="image_Slider">
                <div class="left_Arrow">
                    <i class="arrow-left">&lt;</i>
                </div>
                <div class="right_Arrow">
                    <i class="arrow-right;">&gt;</i>
                </div>
            </section>
            <div id="game_Discription"><br>
                <h1 id="game_Title"><?= htmlspecialchars($upload["game_name"]) ?></h1>
                <p><?= htmlspecialchars($upload["game_description"]) ?></p>
                
            </div>
            <div id="credits">
                <br>
                <h2>Credits</h2>
                <br>
                <section class="game_Item">
                    <article class="article-wrapper">
                        <div class="rounded-lg container-project">
                            <img class="item_Img" src="/imgs/account.png" alt="">
                          </div>
                          <div class="project-info">
                            <div class="flex-pr">
                                <div class="project-title text-nowrap">Mert Göksu</div>                            
                          </div>
                      </article>
                </section>
            </div>
            
        </div>
    </section>
    <script src="gamePageJS.js"></script>
</body>
</html>