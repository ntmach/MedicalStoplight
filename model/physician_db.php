<?php
function get_physican_by_user($user_id) {
    global $db;
    $query = 'SELECT * FROM physician
              WHERE physician.UserID = :user_id
              ORDER BY PhysicianID';
    $statement = $db->prepare($query);
    $statement->bindValue(":user_id", $user_id);
    $statement->execute();
    $physican= $statement->fetch();
    $statement->closeCursor();
    return $physican;
}
function get_all_physican(){
    global $db;
    $query = 'SELECT * FROM physician
              ORDER BY PhysicianID';
    $statement = $db->prepare($query);
    $statement->execute();
    $physican = $statement->fetchAll();
    $statement->closeCursor();
    return $physican;
}
function get_physican($physican_id) {
    global $db;
    $query = 'SELECT * FROM comments
              WHERE PhysicanID = :physician_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":physician_id", $physican_id);
    $statement->execute();
    $physican = $statement->fetch();
    $statement->closeCursor();
    return $physican;
}


function add_physican($physician_id, $user_id, $credentials) {
    global $db;
    $query = 'INSERT INTO physician
                 (PhysicianID, UserID, Credentials)
              VALUES
                 (:physican_id, :user_id, :credentials)';
    $statement = $db->prepare($query);
    $statement->bindValue(':physician_id', $physician_id);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':credentials_id', $credentials);
    $statement->execute();
    $statement->closeCursor();
}
function update_physician($physician_id, $credentials) {
    global $db;
$query = "UPDATE physician
          SET Credentials = :credentials
          WHERE PhysicianID = :physician_id";
$statement = $db->prepare($query);
$statement->bindValue(':physician_id', $physician_id);
$statement->bindValue(':credentials', $credentials);
$statement->execute();
$statement->closeCursor();
}
function delete_physican($physician_id) {
    global $db;
    $query = 'DELETE FROM physican
              WHERE PhysicianID = :physician_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':physician_id', $physician_id);
    $statement->execute();
    $statement->closeCursor();
}
?>
