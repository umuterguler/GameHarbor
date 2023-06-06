<?php

    require 'config.php';

    $mysqli = require __DIR__ . "/../ProfilePage/database.php";

    if(isset( $_POST['search_game']))
    {   //search bar'dan gelenler icin
        $search_game = $_POST['search_game'];
        $upload = DB::get("SELECT * FROM upload WHERE game_name COLLATE utf8mb4_unicode_ci = '$search_game'");


        if (empty($upload)) {
            header("Location: noGameExist.php"); 
        }

        // $sql2 = "SELECT * FROM upload WHERE game_name = '$search_game'";
        // $result = $mysqli->query($sql2);
        // $upload = $result->fetch_assoc();
    }
    
    else
    {   //oyun tiklama ile gelenler icin
        $upload = DB::get("SELECT * FROM upload ORDER BY id DESC");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Harbor</title>
    <link rel="stylesheet" href="gamePageCSS.css">

</head>
<body>

    <header>
        <a href="/HomePage/index.php"><img class="nav__logo" src="/imgs/logo.png" alt="error"/></a>     
        <div class="top_mid_space">
             
                <img src="" alt="">
        </div> 
        <nav>
            <ul class="nav__links">
                <div class="search-container">
                    <div class="search-input">
                        <form class="full_search_form" action="/ProfilePage/publicProfilePage.php" method="post" enctype="multipart/form-data">
                            <input id="search_Bar" type="text" placeholder="Profile Search (Without @)" name="search_name">
                            <button id="search_Button" type="submit">&#128270</button>
                        </form>
                        <form class="full_search_form" action="searchGamePage.php" method="post" enctype="multipart/form-data">
                            <input id="search_Bar" type="text" placeholder="Game Search" name="search_game">
                            <button id="search_Button" type="submit">&#128270</button>
                        </form>
                    </div>
                    
                </div>
                <div class="other_Buttons">
                <li><a href="/HomePage/index.php"><button>Home Page</button></a></li>
                <li><a href="/UploadGames/uploadPage.php"><Button>Upload Game</Button></a></li>
                <li><a href="/ProfilePage/showProfilePage.php">><button>Profile</button></a></li>
                <li><a href="/contactPage.html"><button>Contact</button></a></a></li>
                </div>
                
                
            </ul>
        </nav>
    </header>

   

    <section >
        <div class="container" >
            <section class="image_Slider">
               
            <?php
                //img game
                $imgPath = "/UploadGames/uploads/" . $upload[0]->image_url_1;
                echo '<img src="' . $imgPath . '" alt="imggg">';
            ?>
                
            </section>

            <div class = "description_container">
                <div id="game_Description"><br>
                    <h1 id="game_Title"><?php echo $upload[0]->game_name ?></h1><br><br>
                    <p><?php echo $upload[0]->game_description ?></p><br>
                    <br>
                    <h2 id="credits">Credits</h2><br>
                    <br>
                </div>
            </div>
            
            <div>
                
                <section class="game_Item" >
                <form class="full_search_form" action="/ProfilePage/publicProfilePage.php" method="post" enctype="multipart/form-data" id="myForm">
                    <article class="article-wrapper" onclick="submitForm()">
                        <div class="rounded-lg container-project">
                            <img id="item_Img" src="/imgs/account.png" alt="problem">
                        </div>
                        <div class="project-info">
                            <div class="flex-pr">
                                <div class="project-title"> 
                                    <?php $input = str_replace("@", "", $upload[0]->credit) ?> 
                                    <?php echo $input; ?>
                                    <input type="hidden" name="search_name" value="<?php echo $input ?>">
                                </div>
                            </div>
                        </div>
                    </article>
                </form>

                <script>
                    function submitForm() 
                    {
                        document.getElementById("myForm").submit();
                    }
                    function goToGamePage(gameID) {
                        window.location.href = "/GamePages/gamePage.php/" + gameID;
                    }
                </script>
                    <!-- <a href="gamePage.php<? //php echo "/". $v->id ?>"> -->
                </section>
            </div>
            
        </div>
    </section>
    <script src="/dynamic.js" > </script>
</body>
</html>