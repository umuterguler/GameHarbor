<?php
// Veritabanı bağlantısı
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'upload_db';

$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Kayıt Olma
if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Şifreyi hashleme
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    // Veritabanına kullanıcıyı ekleme
    $query = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";
    mysqli_query($connection, $query);
    
    echo "Kayıt başarılı!";
}

// Giriş Yapma
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Kullanıcıyı veritabanından sorgulama
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($connection, $query);
    
    if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);
        $hashedPassword = $user['password'];
        
        // Şifre doğrulama
        if(password_verify($password, $hashedPassword)){
            echo "Giriş başarılı!";
        } else {
            echo "Hatalı şifre!";
        }
    } else {
        echo "Kullanıcı bulunamadı!";
    }
}

// Şifre Değiştirme
if(isset($_POST['change_password'])){
    $username = $_POST['username'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    
    // Kullanıcıyı veritabanından sorgulama
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($connection, $query);
    
    if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);
        $hashedPassword = $user['password'];
        
        // Mevcut şifrenin doğruluğunu kontrol etme
        if(password_verify($current_password, $hashedPassword)){
            // Yeni şifreyi hashleme
            $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            
            // Şifreyi güncelleme
            $update_query = "UPDATE users SET password='$new_hashed_password' WHERE username='$username'";
            mysqli_query($connection, $update_query);
            
            echo "Şifre değiştirme başarılı!";
        } else {
            echo "Mevcut şifre hatalı!";
        }
    } else {
        echo "Kullanıcı bulunamadı!";
    }
}

// Veritabanı bağlantısını kapatma
mysqli_close($connection);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Kullanıcı Kayıt ve Giriş</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Kayıt Ol</h2>
        <form method="post" action="register.php">
            <input type="text" name="username" placeholder="Kullanıcı Adı" required>
            <input type="password" name="password" placeholder="Şifre" required>
            <input type="submit" name="register" value="Kayıt Ol">
        </form>
    </div>

    <div class="container">
        <h2>Giriş Yap</h2>
        <form method="post" action="login.php">
            <input type="text" name="username" placeholder="Kullanıcı Adı" required>
            <input type="password" name="password" placeholder="Şifre" required>
            <input type="submit" name="login" value="Giriş Yap">
        </form>
    </div>

    <div class="container">
        <h2>Şifre Değiştir</h2>
        <form method="post" action="change_password.php">
            <input type="text" name="username" placeholder="Kullanıcı Adı" required>
            <input type="password" name="current_password" placeholder="Mevcut Şifre" required>
            <input type="password" name="new_password" placeholder="Yeni Şifre" required>
            <input type="submit" name="change_password" value="Şifre Değiştir">
        </form>
    </div>
</body>
</html>
