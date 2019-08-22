<?php
function get_symptoms_by_conditions($condition_id) {
    global $db;
    $query = 'SELECT * FROM symptoms
              WHERE symptoms.ConditionID = :condition_id
              ORDER BY ConditionID';
    $statement = $db->prepare($query);
    $statement->bindValue(":condition_id", $condition_id);
    $statement->execute();
    $symptoms = $statement->fetchAll();
    $statement->closeCursor();
    return $symptoms;
}

function get_all_symptoms(){
    global $db;
    $query = 'SELECT * FROM symptoms
              ORDER BY SymptomsID';
    $statement = $db->prepare($query);
    $statement->execute();
    $symptoms = $statement->fetchAll();
    $statement->closeCursor();
    return $symptoms;
}
function get_symptoms($symptoms_id) {
    global $db;
    $query = 'SELECT * FROM symptoms
              WHERE SymptomsID = :symptoms_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":symptoms_id", $symptoms_id);
    $statement->execute();
    $symptoms = $statement->fetch();
    $statement->closeCursor();
    return $symptoms;
}

?>