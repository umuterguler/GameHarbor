<?php

session_start();

require 'config.php';

$games = DB::get("SELECT * FROM upload ORDER BY id DESC");

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

                        <div class="other_Buttons">
                        <li><a href="index.php"><button>Home Page</button></a></li>
                        <li><a href="/UploadGames/uploadPage.php"><Button>Upload Game</Button></a></li>
                        <li><a href="/ProfilePage/showProfilePage.php"><button>Profile</button></a></li>
                        <li><a href="/contactPage.html"><button>Contact</button></a></a></li>
                </div>
                    </div>
                    
                </div>
                
                
                
            </ul>
        </nav>
    </header>

    <section class="image_Slider">
        
        <div class="main_Slider">
            
            <?php 
                foreach ($games as $k => $v) {
                    $imgPath = "/UploadGames/uploads/" . $v->image_url_1;
                    $gameName = $v->game_name;
                    $gameDescription = $v->game_description;

                    echo '<div class="slider-image" onclick="redirectToSearchPage(\'' . $gameName . '\')" style="background-image: url(' . $imgPath . ')">';
                    echo '<div class="caption">';
                    echo '<h3>' . $gameName . '</h3>';
                    echo '<p>' . $gameDescription . '</p>';
                    echo '</div>';
                    echo '</div>';
            } 
                
                

            ?>
                <a onclick="redirectToSearchPage('<?php echo $v->game_name; ?>')">
                        <img class="item_Img" src="<?php echo $photo; ?>" alt="">
                </a>
        </div>
        
        <div class="left_Arrow">
            <i id="left_Arrow_Icon" class="arrow-left">&lt;</i>
            <!-- buton'a cevrilebilir -->
        </div>
        <div class="right_Arrow">
            <i id="right_Arrow_Icon" class="arrow-right">&gt;</i>
        </div>
    </section>

    <section>
        <main class="game_Types">
            <div class="game_Type">
                <a href="/ProfilePage/allUsers.php">
                    <img src="/imgs/allUsersButton.png" class="game_Img" alt=""> </a>

                <a href="/GamePages/allGames.php">
                    <img src="/imgs/allGamesButton.png" class="game_Img" alt=""> </a>    

                <a href="/contactPage.html">
                    <img src="/imgs/contactUsButton.png" class="game_Img" alt=""> </a>    
            </div>
            <div class="game_Type_2">
                <a >
                    <img src="/imgs/evrimGH2.png" class="index_img_evrim" alt=""> </a>
            </div>
        </main>
        
    </section>
   
    <script> //veri gondermek ve sayfaya duzgun erismek icin
        function redirectToSearchPage(gameName) {
            var form = document.createElement('form');
            form.action = '/GamePages/searchGamePage.php';
            form.method = 'post';

            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'search_game';
            input.value = gameName;

            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="scriptHome.js"></script>
    
</body>
</html>
