<?php

if (empty($_POST["name"])) {
    die("Name is required");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

$mysqli = require __DIR__ . "/database.php";

$username = $_POST["username"];
$sql_check_username = "SELECT username FROM user WHERE username = '$username'";
$result_check_username = $mysqli->query($sql_check_username);

if ($result_check_username->num_rows > 0) {
    die("Username already taken");
}

$email = $_POST["email"];
$sql_check_email = "SELECT email FROM user WHERE email = '$email'";
$result_check_email = $mysqli->query($sql_check_email);

if ($result_check_email->num_rows > 0) {
    die("Email already taken");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql = "INSERT INTO user (username, name, email, password_hash)
        VALUES (?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssss",
    $_POST["username"],
    $_POST["name"],
    $_POST["email"],
    $password_hash
);

if ($stmt->execute()) {
    header("Location: signupSuccess.html");
    exit;
} else {
    die($mysqli->error . " " . $mysqli->errno);
}


// print_r($_POST);
// var_dump($password_hash);

?>