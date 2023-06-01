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
                <a href="/GamePages/actionGames.php">
                    <img src="/imgs/action.png" class="game_Img" alt=""> </a>
            </div>
            <div class="game_Type">
                <h4>Strategy</h4>
                <a href="/GamePages/strategyGames.html">
                    <img src="/imgs/strategy.png" class="game_Img" alt=""> </a>
            </div>
            <div class="game_Type">
                <h4>Sport</h4>
                <a href="/GamePages/sportGames.html">
                    <img src="/imgs/sport.png" class="game_Img" alt=""> </a>
            </div>
            <div class="game_Type">
                <h4>Sport</h4>
                <a href="/GamePages/shooterGames.html">
                    <img src="/imgs/shooter.png" class="game_Img" alt=""> </a>
            </div>
            <div class="game_Type">
                <h4>RPG</h4>
                <a href="/GamePages/RPGGames.html">
                    <img src="/imgs/rpg.png" class="game_Img" alt=""> </a>
            </div>
            <div class="game_Type">
                <h4>Adventure</h4>
                <a href="/GamePages/adventureGames.html">
                    <img src="/imgs/adventure.png" class="game_Img" alt=""> </a>
            </div>
        </main>

    </section>
    
    <script src="scriptHome.js"></script>
</body>
</html>