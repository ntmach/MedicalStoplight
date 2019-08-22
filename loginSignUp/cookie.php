<?php
require('../model/database.php');
require('../model/user_db.php');
$username = filter_input(INPUT_POST, 'username');
$user = get_user_by_username($username);
$accountType = $user['AccType'];
$userID = $user['UserID'];


setcookie('id', $userID, time() + 3600, '/'); 
setcookie('accType', $accountType, time() + 3600, '/'); 

if (isset($_COOKIE['id'])) {
        echo 'cookie user id = ' . htmlspecialchars($_COOKIE['id']);
        echo '<br>';
}


if (isset($_COOKIE['accType'])) {
        echo 'cookie account type = ' . htmlspecialchars($_COOKIE['accType']);
        
}

?>

