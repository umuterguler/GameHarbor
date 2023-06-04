<?php


        $mysqli = require __DIR__ . "/database.php";

        // $_POST = $search_name;
        $search_name = $_POST['search_name'];
        $sql2 = "SELECT * FROM user WHERE username = '$search_name'";
        $result = $mysqli->query($sql2);
        
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            
        } else {
            header("Location: /ProfilePage/noUserExist.php");
        }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Harbor</title>
    <link rel="stylesheet" href="showProfilePageStyle.css">

</head>
<body>
    
    <header>
        <a href="/HomePage/index.php"><img class="nav__logo" src="/imgs/logo.png" alt="error"/></a>     
        <nav>
            <ul class="nav__links">

                <form class="full_search_form" action="/ProfilePage/publicProfilePage.php" method="post" enctype="multipart/form-data">
                    <input id="search_Bar" type="text" placeholder="Profile Search" name="search_name">
                    <button id="search_Button" type="submit">&#128270</button>
                </form>
                
                <li><a href="/HomePage/index.php"><button>Home Page</button></a></li>
                <li><a href="/UploadGames/uploadPage.php"><Button>Upload Game</Button></a></li>
                <li><a href="showProfilePage.php"><button>Profile</button></a></li>
                <li><a href="/contactPage.html"><button>Contact</button></a></a></li>
            </ul>
        </nav>
    </header>
   
    
    <div class="container">
        <div class="profile-header">
          <img src="/imgs/account.png" alt="Profil Fotografi" class="profile-picture">
          <h2 class="profile-name"> <?php echo $user['name'] ?>  </h2>
          <p class="profile-username"> <?php echo $user['username'] ?>  </p>
          <p class="profile-email"> <?php echo $user['email'] ?>  </p>
        </div>



        <!-- <li><a href="passwordChange.php"><button id="btn3">Change Password</button></a></li>
        <li><a href="emailChange.php"><button id="btn3">Change E-mail</button></a></li>
        <li><a href="logoutPage.php"><button id="btn3">Log Out</button></a></li> -->
        
    </div>
            
</body>