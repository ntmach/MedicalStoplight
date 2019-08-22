<?php
function get_link_by_admin($admin_id) {
    global $db;
    $query = 'SELECT * FROM link
              WHERE link.AdminID = :admin_id
              ORDER BY LinkID';
    $statement = $db->prepare($query);
    $statement->bindValue(":admin_id", $admin_id);
    $statement->execute();
    $link= $statement->fetchAll();
    $statement->closeCursor();
    return $link;
}

function get_all_link(){
    global $db;
    $query = 'SELECT * FROM link
              ORDER BY LinkID';
    $statement = $db->prepare($query);
    $statement->execute();
    $link = $statement->fetchAll();
    $statement->closeCursor();
    return $link;
}
function get_link($link_id) {
    global $db;
    $query = 'SELECT * FROM link
              WHERE LinkID = :link_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":link_id", $link_id);
    $statement->execute();
    $link = $statement->fetch();
    $statement->closeCursor();
    return $link;
}


function add_link($link_id, $links, $admin_id) {
    global $db;
    $query = 'INSERT INTO link
                 (LinkID, Link, AdminID)
              VALUES
                 (:link_id, :links, :admin_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':link_id', $link_id);
    $statement->bindValue(':links', $links);
    $statement->bindValue(':admin_id', $admin_id);
    $statement->execute();
    $statement->closeCursor();
}
function update_comments($link_id, $links) {
    global $db;
$query = "UPDATE link
          SET Link = :links
          WHERE LinkID = :link_id";
$statement = $db->prepare($query);
$statement->bindValue(':link_id', $link_id);
$statement->bindValue(':inks', $links);
$statement->execute();
$statement->closeCursor();
}
function delete_link($link_id) {
    global $db;
    $query = 'DELETE FROM link
              WHERE LinkID = :link_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':link_id', $link_id);
    $statement->execute();
    $statement->closeCursor();
}
?>
