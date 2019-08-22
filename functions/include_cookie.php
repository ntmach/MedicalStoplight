<?php
function include_cookie()
{
    setcookie('id', $userID, time() + 3600, '/'); 
    setcookie('accType', $accountType, time() + 3600, '/'); 
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
