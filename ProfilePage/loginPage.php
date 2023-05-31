<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
  $mysqli = require __DIR__ . "/database.php";
  
  $sql = sprintf("SELECT * FROM user
                  WHERE email = '%s'",
                 $mysqli->real_escape_string($_POST["email"]));
  
  $result = $mysqli->query($sql);
  
  $user = $result->fetch_assoc();

  if ($user) {
        
    if (password_verify($_POST["password"], $user["password_hash"])) {
        
        session_start();
        
        session_regenerate_id();
        
        $_SESSION["user_id"] = $user["id"];
        
        header("Location:/ProfilePage/loginSuccess.php");
        exit;
    }
}

$is_invalid = true;

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Harbor</title>
    <link rel="stylesheet" href="profilePageStyle.css">

</head>
<body>
    
    <header>
      <a href="/HomePage/index.php"><img class="nav__logo" src="/imgs/logo.png" alt="error"/></a> 
        <nav>
            <ul class="nav__links">
                <li><a> <input id="search_Bar" type="search" placeholder="Game Search"> <button id="search_Button">&#128270</button> </a></li>
                <li><a href="/HomePage/index.php"><button>Home Page</button></a></li>
                <li><a href="/UploadGames/uploadPage.php"><Button>Upload Game</Button></a></li>
                <li><a href="loginPage.php"><button>Profile</button></a></li>
                <li><a href="/contactPage.html"><button>Contact</button></a></a></li>
            </ul>
        </nav>


    </header>
    
      <div class="container">
        <h2>Login</h2>

        <?php if ($is_invalid): ?>
          <em>Invalid login</em>
        <?php endif; ?>

        <form method="post">
          <input type="email" placeholder="E-mail" name="email" id="email" required
              value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
          <input type="password" placeholder="Password" name="password" id="password" required>
          <button id="login-button" type="submit">Login</button>
          <button onclick= "window.location.href = 'registerPage.html';" id="register-button">Register?</button>
        </form>
        <form >
          
        </form>
      </div>
    
</body>