<?php
function get_patient_by_user($user_id) {
    global $db;
    $query = 'SELECT * FROM patient
              WHERE patient.UserID = :user_id
              ORDER BY PatientID';
    $statement = $db->prepare($query);
    $statement->bindValue(":user_id", $user_id);
    $statement->execute();
    $patient= $statement->fetch();
    $statement->closeCursor();
    return $patient;
}
function get_patient_by_condition($condition_id) {
    global $db;
    $query = 'SELECT * FROM patient
              WHERE patient.ConditionID = :condition_id
              ORDER BY PatientID';
    $statement = $db->prepare($query);
    $statement->bindValue(":condition_id", $condition_id);
    $statement->execute();
    $patient = $statement->fetchAll();
    $statement->closeCursor();
    return $patient;
}
function get_all_patient(){
    global $db;
    $query = 'SELECT * FROM patient
              ORDER BY PatientID';
    $statement = $db->prepare($query);
    $statement->execute();
    $patient = $statement->fetchAll();
    $statement->closeCursor();
    return $patient;
}
function get_patient($patient_id) {
    global $db;
    $query = 'SELECT * FROM patient
              WHERE PatientID = :patient_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":patient_id", $patient_id);
    $statement->execute();
    $patient = $statement->fetch();
    $statement->closeCursor();
    return $patient;
}


function add_patient($patient_id, $user_id, $condition_id, $medication) {
    global $db;
    $query = 'INSERT INTO patient
                 (PatientID, UserID, ConditionID, Medication)
              VALUES
                 (:patient_id, :user_id, :condition_id, :medication)';
    $statement = $db->prepare($query);
    $statement->bindValue(':patient_id', $patient_id);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':condition_id', $condition_id);
    $statement->bindValue(':medication', $medication);
    $statement->execute();
    $statement->closeCursor();
}
function update_patient($patient_id, $medication) {
    global $db;
$query = "UPDATE patient
          SET Medication = :medication
          WHERE PatientID = :patient_id";
$statement = $db->prepare($query);
$statement->bindValue(':patient_id', $patient_id);
$statement->bindValue(':medication', $medication);
$statement->execute();
$statement->closeCursor();
}
function delete_patient($patient_id) {
    global $db;
    $query = 'DELETE FROM patient
              WHERE PatientID = :patient_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':patient_id', $patient_id);
    $statement->execute();
    $statement->closeCursor();
}
?>