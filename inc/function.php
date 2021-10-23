<?php
include('db.php');

function redirect($page)
{
    header('location:' . $page);
}

function alertmsg($msg, $type)
{
    if ($type == "error") {
        echo '<div class="alert alert-danger" role="alert">' . $msg . '</div>';
    } else {
        echo '<div class="alert alert-success" role="alert">' . $msg . '</div>';
    }
}

function register($name, $username, $email, $password)
{
    global $pdo;
    $encpassword = password_hash($password, PASSWORD_BCRYPT);
    $query = "INSERT INTO users(name, username, email, password) VALUES(:name, :username, :email, :password)";
    $sql = $pdo->prepare($query);
    $sql->bindValue(':name', $name);
    $sql->bindValue(':username', $username);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':password', $encpassword);
    return $sql->execute();
}

function login($username, $password)
{
    global $pdo;
    $query = "SELECT * FROM users WHERE username = :username";
    $sql = $pdo->prepare($query);
    $sql->bindValue(':username', $username);
    $sql->execute();
    $passwdfetch = $sql->fetch();
    $dbpass = $passwdfetch->password;
    $isVerified = password_verify($password, $dbpass);
    if ($isVerified) {
        return true;
    } else {
        return false;
    }
}

function isUsernameRegistered($username)
{
    global $pdo;
    $query = "SELECT * FROM users WHERE username = :username";
    $sql = $pdo->prepare($query);
    $sql->bindValue(":username", $username);
    $sql->execute();
    if ($sql->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}

function isEmailRegistered($email)
{
    global $pdo;
    $query = "SELECT * FROM users WHERE email = :email";
    $sql = $pdo->prepare($query);
    $sql->bindValue(":email", $email);
    $sql->execute();
    if ($sql->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}

function isLoggedin($msg, $page)
{
    if ($_SESSION["username"]) {
        return true;
    } else {
        $_SESSION["ErrorMessage"] = $msg;
        redirect($page);
    }
}

function getDetails($username)
{
    global $pdo;
    $query = "SELECT * FROM users WHERE username = :username";
    $sql = $pdo->prepare($query);
    $sql->bindValue(':username', $username);
    $sql->execute();
    return $data = $sql->fetch();
}
