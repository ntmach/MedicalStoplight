<?php
setcookie('id', $userID, time() + 3600, '/'); 
setcookie('accType', $accountType, time() + 3600, '/'); 

if (isset($_COOKIE['id'])) {
        echo 'cookie user id = ' . htmlspecialchars($_COOKIE['id']);
        echo '<br>';
}
else
{
    echo 'id cookie not set';
    echo '<br>';
}
if (isset($_COOKIE['accType'])) {
        echo 'cookie account type = ' . htmlspecialchars($_COOKIE['accType']);   
}
else
{
    echo 'acc type cookie not set';
}
?>

