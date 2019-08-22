<?php
function get_all_user(){
    global $db;
    $query = 'SELECT * FROM user
              ORDER BY UserID';
    $statement = $db->prepare($query);
    $statement->execute();
    $user = $statement->fetchAll();
    $statement->closeCursor();
    return $user;
}
function get_user($user_id) {
    global $db;
    $query = 'SELECT * FROM user
              WHERE UserID = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":user_id", $user_id);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
}


function add_user($user_id, $username, $password, $name, $age, $sex, $email, $country, $state, $street, $race, $accType) {
    global $db;
    $query = 'INSERT INTO user
                 (UserID, Username, Password, Name, Age, Sex, Email, Country, State, Street, Race, AccType)
              VALUES
                 (:user_id, :username, :password, :name, :age, :sex, :email, :country, :state, :street, :race, :accType)';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':age', $age);
    $statement->bindValue(':sex', $sex);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':country', $country);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':street', $street);
    $statement->bindValue(':race', $race);
    $statement->bindValue(':accType', $accType);
    $statement->execute();
    $statement->closeCursor();
}
function update_user_p1($user_id, $username, $password, $name, $age, $sex, $email) {
    global $db;
$query = "UPDATE user
          SET Username = :username
          SET Password = :password
          SET Name = :name
          SET Age = :age
          SET Sex = :sex
          SET Email = :Email
          WHERE UserID = :User_id";
$statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':age', $age);
    $statement->bindValue(':sex', $sex);
    $statement->bindValue(':email', $email);  
    $statement->execute();
    $statement->closeCursor();
}
function update_user_p2($country, $state, $street, $race) {
    global $db;
$query = "UPDATE user         
          SET Country = :country
          SET State = :state
          SET Street = :street
          SET Race = :race
          WHERE UserID = :User_id";
$statement = $db->prepare($query);
    $statement->bindValue(':profile_pic', $profile_pic);
    $statement->bindValue(':country', $country);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':street', $street);
    $statement->bindValue(':race', $race);
    $statement->execute();
    $statement->closeCursor();
}
function update_user($user_id, $username, $password, $name, $age, $sex, $email, $country, $state, $street, $race){
    update_user_p1($user_id, $username, $password, $name, $age, $sex, $email);
    update_user_p2($country, $state, $street, $race);
}
function update_user_password($user_id, $password) {
    global $db;
$query = "UPDATE user
          SET Password = :password
          WHERE UserID = :User_id";
$statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
}
function update_user_personal_p1($user_id, $name, $age, $sex, $email) {
    global $db;
$query = "UPDATE user
          SET Name = :name
          SET Age = :age
          SET Sex = :sex
          SET Email = :Email
          WHERE UserID = :User_id";
$statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':age', $age);
    $statement->bindValue(':sex', $sex);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $statement->closeCursor();
}
function update_user_personal_p2($profile_pic, $country, $state, $street, $race) {
    global $db;
$query = "UPDATE user
          SET Profile_Pic = :profile_pic
          SET Country = :country
          SET State = :state
          SET Street = :street
          SET Race = :race
          WHERE UserID = :User_id";
$statement = $db->prepare($query);
    $statement->bindValue(':profile_pic', $profile_pic);
    $statement->bindValue(':country', $country);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':street', $street);
    $statement->bindValue(':race', $race);
    $statement->execute();
    $statement->closeCursor();
}

function update_user_personal($user_id, $name, $age, $sex, $email, $country, $state, $street, $race) {
    update_user_personal($user_id, $name, $age, $sex, $email);
    update_user_personal($country, $state, $street, $race);
}
function delete_user($user_id) {
    global $db;
    $query = 'DELETE FROM user
              WHERE UserID = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $statement->closeCursor();
}

function get_user_by_username($username) {
    global $db;
    $query = 'SELECT * FROM user
              WHERE Username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(":username", $username);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
}
function match_user($username){
    global $db;
    $query = "SELECT Username FROM user WHERE Username = :username";
    $statement = $db->prepare($query);
    $statement->bindValue(":username", $username);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
}
?>
