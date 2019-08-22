<?php
function get_admin_by_user($user_id) {
    global $db;
    $query = 'SELECT * FROM admin
              WHERE admin.UserID = :user_id
              ORDER BY AdminID';
    $statement = $db->prepare($query);
    $statement->bindValue(":user_id", $user_id);
    $statement->execute();
    $admin = $statement->fetchAll();
    $statement->closeCursor();
    return $admin;
}

function get_all_admin(){
    global $db;
    $query = 'SELECT * FROM admin
              ORDER BY AdminID';
    $statement = $db->prepare($query);
    $statement->execute();
    $admin = $statement->fetchAll();
    $statement->closeCursor();
    return $admin;
}
function get_admin($admin_id) {
    global $db;
    $query = 'SELECT * FROM admin
              WHERE AdminID = :admin_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":admin_id", $admin_id);
    $statement->execute();
    $admin = $statement->fetch();
    $statement->closeCursor();
    return $admin;
}
function delete_admin($admin_id) {
    global $db;
    $query = 'DELETE FROM admin
              WHERE AdminID = :admin_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':admin_id', $admin_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_admin($admin_id, $user_id) {
    global $db;
    $query = "INSERT INTO admin
                 (AdminID, UserID)
              VALUES
                 (:admin_id, :user_id)";
    $statement = $db->prepare($query);
    $statement->bindValue(':admin_id', $admin_id);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $statement->closeCursor();
}

?>