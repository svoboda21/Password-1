<?php
session_start();

function getUser($login)
{
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['login'] == $login) {
            return $user;
        }
    }
    return null;
}

function login($login, $password)
{
    $user = getUser($login);
    $_SESSION['validate']=$user['password'];
    if ($user && $user['password'] == $password) {

        $_SESSION['user'] = $user;
        return true;
    }
    return false;
}

function getUsers()
{
    $usersData = file_get_contents(__DIR__ . '/users.json');
    if (!$usersData) {
        return [];
    }
    $users = json_decode($usersData, true);
    if (!$users) {
        return [];
    }
    return $users;
}
function isAuthorized()
{
    return !empty($_SESSION['user']);
}
function isAdmin()
{
    return $_SESSION['user']['is_admin'];
}
function redirect($page)
{
    header("Location: $page.php");
    die;
}

