<?php

setcookie('id', $userID, time() - 3600, '/'); 
setcookie('accType', $accountType, time() - 3600, '/'); 

header('Location: ../homepage/homepage.php');