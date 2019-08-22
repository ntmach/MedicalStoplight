<?php

require ('../model/database.php');
require ('../model/user_db.php');

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$name = filter_input(INPUT_POST, 'name');
$age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
$sex = filter_input(INPUT_POST, 'sex');
$email = filter_input(INPUT_POST, 'email');
$country = filter_input(INPUT_POST, 'country');
$state_province = filter_input(INPUT_POST, 'state_province');
$street = filter_input(INPUT_POST, 'race');
$race = filter_input(INPUT_POST, 'street');
$accountType = filter_input(INPUT_POST, 'accountType');

$users = get_all_user();
$userID = count($users) + 1;

echo 'username = ' . $username . '<br>';
$userExist = match_user($username);


echo 'userExist = ' . $userExist['Username'] . '<br>';
echo 'password = ' . $password . '<br>';
echo 'name = ' . $name . '<br>';
echo 'age = ' . $age . '<br>';
echo 'email = ' . $email . '<br>';
echo 'country ' . $country . '<br>';
echo 'state = ' . $state_province . '<br>';
echo 'street = ' . $street . '<br>';
echo 'race = ' . $race . '<br>';
echo 'accType = ' . $accountType . '<br>';

if($password == '')
{
    echo 'password not set <br>';
}

if ($username == '' || $password == '' || $name == '' || 
        $age == '' || $sex == '' || $email == '' || 
        $country == '' || $state_province == '' || $street == '' || 
        $race == '')
{
    echo 'there is an empty or incorrect text';
    header('Location: ./signup.php');
}
else {
    if ($username == $userExist['Username']) {
    header('Location: ./signup.php');
        echo 'username is taken <br>';
    }
    else {
        add_user($userID, $username, $password, $name, $age, $sex, $email, $country, $state_province, $street, $race, $accountType);
        echo 'username is available <br>';
        include ('./cookie_no_requires.php');
        header('Location: ../index.php');
    }
}
