<?php
require('../model/database.php');
require('../model/user_db.php');
require('../functions/include_cookie.php');

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$user = get_user_by_username($username);
$accountType = $user['AccType'];
$userID = $user['UserID'];
$pw = $user['Password'];

if(!isset($userID) || $password != $pw)
{
    header('Location: ../loginSignUp/login.php');
}
 else {
     include('./cookie_no_requires.php');
     header('Location: ../homepage/homepage.php');
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

