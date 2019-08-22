<!DOCTYPE html>
<html>
    <?php
    include('../Header/navbar.php');
    
    require('../model/database.php');
    require('../model/admin_db.php');
    require('../model/color_rating_db.php');
    require('../model/comments_db.php');
    require('../model/conditionForum_db.php');
    require('../model/link_db.php');
    require('../model/patient_db.php');
    require('../model/physician_db.php');
    require('../model/symptoms_db.php');
    require('../model/thread_db.php');
    require('../model/user_db.php');
    
    if(!isset($_COOKIE['id']))
    {
        $userID = null;
    }
    else
    {
    $userID = $_COOKIE['id'];
    }
    $user = get_user($userID);
    $patient = get_patient_by_user($userID);
    $condition_id = $patient['ConditionID'];
    $condition = get_condition_name_by_id($condition_id);
    $symptoms = get_symptoms_by_conditions($condition_id)
    ?>
    <head>
        <title>Profile Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
        <link href="profilepage.css" rel="stylesheet">

    </head>
    <body>
        
        <div class="container"> <!--Avatar-->
            <div class="profileImage">
                <img src="https://img.purch.com/w/660/aHR0cDovL3d3dy5saXZlc2NpZW5jZS5jb20vaW1hZ2VzL2kvMDAwLzA4OC85MTEvb3JpZ2luYWwvZ29sZGVuLXJldHJpZXZlci1wdXBweS5qcGVn" />
            </div>
        </div>
        <div class="edit_page">
            <label><a href="./editprofilepage.php">Edit Profile</a></label><br>
        </div>
        <div class="form"> <!--Patient's Information-->
            
            <div class="left">
                <label>Name</label>
            </div>
            <div class="right">
                <label><?php echo $user['Name'] ?></label><br>
            </div>

            <div class="left"><!--Age-->
                <label>Age</label><br>
            </div>
            <div class="right">
                <label><?php echo $user['Age']?></label><br>
            </div>

            <div class="left"><!--Gender-->
                <label>Gender</label>
            </div>
            <div class="right">
                <label><?php echo $user['Sex']?></label><br>
            </div>

            <div class="left"><!--City-->
                <label>Street</label>
            </div>
            <div class="right">
                <label><?php echo $user['Street']?></label><br>
            </div>

            <div class="left"><!--State-->
                <label>State</label>
            </div>
            <div class="right">
                <label><?php echo $user['State']?></label><br>
            </div>

            <div class="left"><!--Conditions-->
                <label>Conditions</label><br>
            </div>
            <div class="right">
                <label><?php echo $condition?></label><br>
            </div>

            <div class="left"><!--Medications-->
                <label>Medications</label><br>
            </div>
            <div class="right">
                <label><?php echo $patient['Medication']?></label><br>
            </div>

            <div class="left"><!--Symptoms-->
                <label>Symptoms</label>
            </div>
            <div class="right">
                <label><?php foreach ($symptoms as $symptom) {echo $symptom['SymptomsName'] .'<br>';}?></label>
            </div>

        </div>

        <?php include('../Footer/footer.php'); ?>
    </body>
</html>