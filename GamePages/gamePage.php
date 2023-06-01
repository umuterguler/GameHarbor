<?php

$parts = explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

$parts[0]; 
$parts[1]; 
$parts[2];
$id = $parts[3];
intval($id);

require 'config.php';

$upload = DB::get("SELECT * FROM upload WHERE id = $id");




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
                <li><a href="/HomePage/index.php"><button>Home Page</button></a></li>
                <li><a href="/UploadGames/uploadPage.php"><Button>Upload Game</Button></a></li>
                <li><a href="/ProfilePage/showProfilePage.php">><button>Profile</button></a></li>
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
                <output type="file" src="<?php $upload[0]->image_url_1?>" id="myfile" name="myfile">
                <div class="right_Arrow">
                    <i class="arrow-right;">&gt;</i>
                </div>
            </section>
            <div id="game_Discription"><br>
                <h1 id="game_Title"><?php echo $upload[0]->game_name ?></h1>
                <p><?php echo $upload[0]->game_description ?></p>
                
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