<?php
function get_threads_by_patient($patient_id) {
    global $db;
    $query = 'SELECT * FROM threads
              WHERE threads.PatientID = :patient_id
              ORDER BY ThreadID';
    $statement = $db->prepare($query);
    $statement->bindValue(":patient_id", $patient_id);
    $statement->execute();
    $threads= $statement->fetchAll();
    $statement->closeCursor();
    return $threads;
}

function get_threads_by_condition_id($condition_id) {
    global $db;
    $query = 'SELECT * FROM threads
          WHERE ConditionID = :condition_id
          ORDER BY ThreadID';
    $statement = $db->prepare($query);
    $statement->bindValue(':condition_id', $condition_id);
    $statement->execute();
    $thread = $statement->fetchAll();
    $statement->closeCursor();
    return $thread;    
}

function get_threads_by_condition_id_limit($condition_id, $range) {
    global $db;
    $query = 'SELECT * FROM threads
          WHERE ConditionID = :condition_id
          ORDER BY ThreadID
          LIMIT :range, 7';
    $statement = $db->prepare($query);
    $statement->bindValue('condition_id', $condition_id);
    $statement->bindValue(':range', $range, PDO::PARAM_INT);
    $statement->execute();
    $thread = $statement->fetchAll();
    $statement->closeCursor();
    return $thread;    
}

function get_thread($thread_id) {
    global $db;
    $query = 'SELECT * FROM threads
          WHERE ThreadID = :thread_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':thread_id', $thread_id);
    $statement->execute();
    $thread = $statement->fetch();
    $statement->closeCursor();
    return $thread;
}

function get_all_threads() {
    global $db;
    $query = 'SELECT * FROM threads
              ORDER BY Date DESC';     
    $statement = $db->prepare($query);
    $statement->execute();
    $thread = $statement->fetchAll();
    $statement->closeCursor();
    return $thread; 
}

function add_comments($thread_id, $patient_id, $text, $condition_id, $accuracy, $date) {
    global $db;
    $query = 'INSERT INTO threads
                 (ThreadID, PatientID, Text, ConditionID, Accuracy, Date)
              VALUES
                 (:thread_id, :patient_id, :text, :condition_id, :accuracy, :date';
    $statement = $db->prepare($query);
    $statement->bindValue(':thread_id', $thread_id);
    $statement->bindValue(':patient_id', $patient_id);
    $statement->bindValue(':text', $text);
    $statement->bindValue(':condition_id', $condition_id);
    $statement->bindValue(':accuracy', $accuracy);
    $statement->bindValue(':date', $date);
    $statement->execute();
    $statement->closeCursor();
}
function update_threads($thread_id, $accuracy) {
    global $db;
$query = "UPDATE threads
          SET Accuracy = :accuracy
          WHERE ThreadID = :thread_id";
$statement = $db->prepare($query);
$statement->bindValue(':thread_id', $thread_id);
$statement->bindValue(':accuracy', $accuracy);
$statement->execute();
$statement->closeCursor();
}
function delete_threads($thread_id) {
    global $db;
    $query = 'DELETE FROM threads
              WHERE ThreadID = :thread_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':thread_id', $thread_id);
    $statement->execute();
    $statement->closeCursor();
}