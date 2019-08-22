<?php
function get_color_rating_by_physician($physician_id) {
    global $db;
    $query = 'SELECT * FROM colorrating
              WHERE colorrating.PhysicianID = :physician_id
              ORDER BY ColorID';
    $statement = $db->prepare($query);
    $statement->bindValue(":physician_id", $physician_id);
    $statement->execute();
    $color_rating= $statement->fetchAll();
    $statement->closeCursor();
    return $color_rating;
}
function get_color_ratings_by_physician_and_comment($physician_id, $comments_id) {
    global $db;
    $query = 'SELECT * FROM colorrating
              WHERE colorrating.PhysicianID = :physician_id
              AND colorrating.CommentsID = :comments_id
              ORDER BY ColorID';
    $statement = $db->prepare($query);
    $statement->bindValue(":physician_id", $physician_id);
    $statement->bindValue(":comments_id", $comments_id);
    $statement->execute();
    $color_rating= $statement->fetchAll();
    $statement->closeCursor();
    return $color_rating;
}
function get_color_rating_by_physician_and_comment($physician_id, $comments_id) {
    global $db;
    $query = 'SELECT * FROM colorrating
              WHERE colorrating.PhysicianID = :physician_id
              AND colorrating.CommentsID = :comments_id
              ORDER BY ColorID';
    $statement = $db->prepare($query);
    $statement->bindValue(":physician_id", $physician_id);
    $statement->bindValue(":comments_id", $comments_id);
    $statement->execute();
    $color_rating= $statement->fetch();
    $statement->closeCursor();
    return $color_rating;
}
function get_color_rating_by_comments($comments_id) {
    global $db;
    $query = 'SELECT * FROM colorrating
              WHERE colorrating.CommentsID = :comments_id
              ORDER BY ColorID';
    $statement = $db->prepare($query);
    $statement->bindValue(":comments_id", $comments_id);
    $statement->execute();
    $color_rating = $statement->fetchAll();
    $statement->closeCursor();
    return $color_rating;
}
function get_all_color_rating(){
    global $db;
    $query = 'SELECT * FROM colorrating
              ORDER BY ColorID';
    $statement = $db->prepare($query);
    $statement->execute();
    $color_rating = $statement->fetchAll();
    $statement->closeCursor();
    return $color_rating;
}
function get_color_rating($color_id) {
    global $db;
    $query = 'SELECT * FROM colorrating
              WHERE ColorID = :color_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":color_id", $color_id);
    $statement->execute();
    $color_rating = $statement->fetch();
    $statement->closeCursor();
    return $color_rating;
}


function add_color_rating($color_id, $physician_id, $comments_id, $green, $yellow, $red) {
    global $db;
    $query = 'INSERT INTO colorrating
                 (ColorID, Green, Yellow, Red, PhysicianID, CommentsID)
              VALUES
                 (:color_id, :green, :yellow, :red, :physician_id, :comments_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':color_id', $color_id);
    $statement->bindValue(':physician_id', $physician_id);
    $statement->bindValue(':comments_id', $comments_id);
    $statement->bindValue(':green', $green);
    $statement->bindValue(':yellow', $yellow);
    $statement->bindValue(':red', $red);
    $statement->execute();
    $statement->closeCursor();
}
function update_color_rating($color_id, $green, $yellow, $red) {
    global $db;
$query = "UPDATE colorrating
          SET Green = :green,
              Yellow = :yellow,
              Red = :red
          WHERE ColorID = :color_id";
$statement = $db->prepare($query);
$statement->bindValue(':color_id', $color_id);
$statement->bindValue(':green', $green);
$statement->bindValue(':yellow', $yellow);
$statement->bindValue(':red', $red);
$statement->execute();
$statement->closeCursor();
}
?>
