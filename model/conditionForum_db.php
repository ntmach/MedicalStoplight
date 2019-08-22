<?php
function get_conditions() {
    global $db;
    $query = 'SELECT * FROM conditionForum
              ORDER BY ConditionID';
    $statement = $db->prepare($query);
    $statement->execute();
    $conditions = $statement->fetchAll();
    $statement->closeCursor();
    return $conditions;
}

function get_condition_name_by_id($condition_id) {
    global $db;
    $query = 'SELECT * FROM conditionForum
              WHERE ConditionID = :condition_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':condition_id', $condition_id);
    $statement->execute();    
    $condition = $statement->fetch();
    $statement->closeCursor();    
    $condition_name = $condition['ConditionName'];
    return $condition_name;
}