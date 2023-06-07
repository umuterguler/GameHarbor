<?php
session_start();

    if(!isset($_SESSION["user_id"])){
        header("Location: /GamePages/searchGamePage.php");
        exit;
    }
    

    $parts = explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

    $parts[0]; 
    $parts[1]; 
    $parts[2];
    $id = $parts[3];

    
    require 'config.php';
    
    $upload = DB::get("SELECT * FROM upload WHERE id = " . intval($id));

    
    $mysqli = require __DIR__ . "/../ProfilePage/database.php";
        
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
                
    $result = $mysqli->query($sql);
        
    $user = $result->fetch_assoc();

    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Harbor</title>
    <link rel="stylesheet" href="gameCSS2.css">
    
    <?php
    $cssDosyasi = file_get_contents('gamePageCSS.css');
    echo '<style>' . $cssDosyasi . '</style>';
    ?>


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
                //game img
                $imgPath = "/UploadGames/uploads/" . $upload[0]->image_url_1;
                echo '<img src="' . $imgPath . '" alt="imggg">';
                 
            ?>
                
            </section>
            <div id="game_Description"><br>
            <h1 id="game_Title"><?php echo $upload[0]->game_name; ?></h1><br><br>
            <p><?php echo $upload[0]->game_description; ?></p><br>
                
            </div>
            <div >
                <br>
                <h2>Credits</h2><br>
                <br>
                <section class="game_Item" onclick="submitForm()">
                <form class="full_search_form" action="/ProfilePage/publicProfilePage.php" method="post" enctype="multipart/form-data" id="myForm">
                    <article class="article-wrapper">
                        <div class="rounded-lg container-project">
                            <img id="item_Img" src="/imgs/account.png" alt="problem">
                        </div>
                        <div class="project-info">
                            <div class="flex-pr">
                                <div class="project-title text-nowrap"> 
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
                </script>
                

                    <!-- <a href="gamePage.php<? //php echo "/". $v->id ?>"> -->
                </section>
                
            </div>
            
            
        </div>
    </section>
    <script src="/dynamic.js" > </script>
</body>
</html>