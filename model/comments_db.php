<?php
function get_comments_by_user($user_id) {
    global $db;
    $query = 'SELECT * FROM comments
              WHERE comments.UserID = :user_id
              ORDER BY CommentsID';
    $statement = $db->prepare($query);
    $statement->bindValue(":user_id", $user_id);
    $statement->execute();
    $comments= $statement->fetchAll();
    $statement->closeCursor();
    return $comments;
}
function get_comments_by_thread($thread_id) {
    global $db;
    $query = 'SELECT * FROM comments
              WHERE comments.ThreadID = :thread_id
              ORDER BY CommentsID';
    $statement = $db->prepare($query);
    $statement->bindValue(":thread_id", $thread_id);
    $statement->execute();
    $comments = $statement->fetchAll();
    $statement->closeCursor();
    return $comments;
}
function get_comments_by_thread_limit($thread_id, $range) {
    global $db;
    $query = 'SELECT * FROM comments
              WHERE ThreadID = :thread_id
              ORDER BY Date ASC
              LIMIT :range, 7';        
    $statement = $db->prepare($query);
    $statement->bindValue(':thread_id', $thread_id);
    $statement->bindValue(':range', $range, PDO::PARAM_INT);
    $statement->execute();
    $comments = $statement->fetchAll();
    $statement->closeCursor();
    return $comments;    
}
function get_all_comments(){
    global $db;
    $query = 'SELECT * FROM comments
              ORDER BY CommentsID
              ORDER BY Date ASC';
    $statement = $db->prepare($query);
    $statement->execute();
    $comments = $statement->fetchAll();
    $statement->closeCursor();
    return $comments;
}
function get_comments($comments_id) {
    global $db;
    $query = 'SELECT * FROM comments
              WHERE CommentsID = :comments_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":comments_id", $comments_id);
    $statement->execute();
    $comments = $statement->fetch();
    $statement->closeCursor();
    return $comments;
}


function add_comment($comments_id, $user_id, $thread_id, $text, $rating, $date) {
    global $db;
    $query = 'INSERT INTO comments
                 (CommentsID, UserID, ThreadID, Text, Rating, Date)
              VALUES
                 (:comments_id, :user_id, :thread_id, :text, :rating, :date)';
    $statement = $db->prepare($query);
    $statement->bindValue(':comments_id', $comments_id);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':thread_id', $thread_id);
    $statement->bindValue(':text', $text);
    $statement->bindValue(':rating', $rating);
    $statement->bindValue(':date', $date);
    $statement->execute();
    $statement->closeCursor();
}
function update_comment($comments_id, $rating) {
    global $db;
$query = "UPDATE comments
          SET Rating = :rating
          WHERE CommentsID = :comments_id";
$statement = $db->prepare($query);
$statement->bindValue(':comments_id', $comments_id);
$statement->bindValue(':rating', $rating);
$statement->execute();
$statement->closeCursor();
}
function delete_comment($comments_id) {
    global $db;
    $query = 'DELETE FROM comments
              WHERE CommentsID = :comments_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':comments_id', $comments_id);
    $statement->execute();
    $statement->closeCursor();
}
?>