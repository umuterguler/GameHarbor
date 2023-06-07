<?php
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
    <link rel="stylesheet" href="/HomePage/stylesHome.css">
    
    <style>
        .article-wrapper:hover .project-title {
            display: block;
        }
    </style>
</head>
<body>
<header>
        <a href="/HomePage/index.php"><img class="nav__logo" src="/imgs/logo.png" alt="error"/></a>     
        <div class="top_mid_space">
            <img id="ad_img" src="/imgs/google_ads.jpg" alt="">
        </div> 
        <nav>
            <ul class="nav__links">
                <div class="search-container_2">
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
                <div class="other_Buttons_2">
                    <li><a href="/HomePage/index.php"><button>Home Page</button></a></li>
                    <li><a href="/UploadGames/uploadPage.php"><Button>Upload Game</Button></a></li>
                    <li><a href="/ProfilePage/showProfilePage.php">><button>Profile</button></a></li>
                    <li><a href="/contactPage.html"><button>Contact</button></a></a></li>
                </div>
                
                
            </ul>
        </nav>
    </header>
    

    <section class="game_Item">
        <?php foreach($games as $k => $v) :
        $photo = PATH.  "UploadGames/uploads/$v->image_url_1"

        
        ?>
        <article class="article-wrapper">
            <div>
                <div class="rounded-lg container-project">
                    <a onclick="redirectToSearchPage('<?php echo $v->game_name; ?>')">
                        <img class="item_Img" src="<?php echo $photo; ?>" alt="">
                    </a>
                </div>
                <div class="project-info">
                    <div class="flex-pr">
                        <div class="project-title text-nowrap">
                            <?php echo $v->game_name; ?>    
                        </div>
                        <div class="project-hover">
                            <svg style="color: black;" xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" color="black" stroke-linejoin="round" stroke-linecap="round" viewBox="0 0 24 24" stroke-width="2" fill="none" stroke="currentColor"><line y2="12" x2="19" y1="12" x1="5"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        </div>
                    </div>
                </div>
            </div>
        </article>

        <?php endforeach; ?>
    </section>
        <script>
            function redirectToSearchPage(gameName) {
                var form = document.createElement('form');
                form.action = 'searchGamePage.php';
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
        <script src="/dynamic.js" > </script>
</body>
</html>