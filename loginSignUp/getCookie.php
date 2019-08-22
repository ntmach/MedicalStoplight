<?php

if (isset($_COOKIE['id'])) {
        echo 'cookie user id = ' . htmlspecialchars($_COOKIE['id']);
}
if (isset($_COOKIE['accType'])) {
        echo 'cookie user id = ' . htmlspecialchars($_COOKIE['acctype']);
}

?>

<a>get cookie</a>
