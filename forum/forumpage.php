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
    require('../functions/get_color_ratings.php');

    if (isset($_COOKIE['id'])) {
        if ($_COOKIE['id'] != '') {
            $ID = $_COOKIE['id'];
        } else {
            $ID = null;
        }
    }
    if (isset($_COOKIE['accType'])) {
        if ($_COOKIE['accType'] != '') {
            $accType = $_COOKIE['accType'];
            $physician = get_physican_by_user($ID);
            $physician_id = $physician['PhysicianID'];
        } else {
            $accType = null;
        }
    }
    ?>
    <head>
        <title>Forum Page</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <!-- My own CSS -->
        <link rel="stylesheet" link = "text/css" href="main.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">

    </head>

    <body >

        <!-- forum header -->
        <div class="container-fluid">
            <!-- Title -->
            <header>
                <h1>Forum Page</h1>
            </header>

            <!-- Forum Create Thread Button, Dropdown, Legend-->
            <div class="row justify-content-between">
                <div class="col-4 mt-3">
                    <!-- Create Thread Button Modal -->
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#myModal">Create Thread</button>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Create Your Thread</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form class="" action="" method="post">
                                        Thread Title: <br>
                                        <input type="text" name="threadtitle" value="">
                                        <br>
                                        Your Comment:<br>
                                        <textarea type="text" name="threadcomment" value="" rows="4" cols="50"></textarea>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal" name="button">Submit</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Dropdown -->
                    <!--                    <div class="mb-3">
                                            <form method="POST">
                                                <select name="forum-condition-id" onchange="if (this.value)
                                                    window.location.href = this.value" action=".">
                                                    <option selected disabled>select forum</option>
                                                    //<?php
//                                $i = 1;
//                                $results = get_conditions();
//                                foreach ($results as $result) {
//                                    echo "<option value='http://localhost:7777/MedicalStoplight/forum/forumpage.php/?conditionID=" . $i . "&amp;pageNumber=1'>" . $result['ConditionName'] . "</option>";
//                                    $i++;
//                                }
//                                
//                    
    ?>
                                                </select>
                                            </form>
                                        </div>-->



                    <div class='forum-head'>
                        <div class='forum-head-left'>
                            <!--Select Forums Drop Down - Gets Drop Down Value into URL for FILTER_GET-->
                            <form method="POST">
                                <select name="forum-condition-id" onchange="if (this.value)
                                            window.location.href = this.value" action=".">
                                    <option selected disabled>select forum</option>
                                    <?php
                                    $i = 1;
                                    $results = get_conditions();
                                    foreach ($results as $result) {
                                        echo "<option value='http://localhost:7777/MedicalStoplight/forum/forumpage.php?conditionID=" . $i . "&amp;pageNumber=1'>" . $result['ConditionName'] . "</option>";
                                        $i++;
                                    }
                                    ?>
                                </select>
                            </form>
                        </div>
                        <?php
                        //getting condition name and displaying it as forum name by getting info from URL.
                        $condition_id = filter_input(INPUT_GET, "conditionID");
                        if ($condition_id == null) {
                            $condition_id = 1;
                        }
                        $forum_name = get_condition_name_by_id($condition_id);
                        //Set Default forum
                        $action = filter_input(INPUT_GET, "action");
                        if ($action == null) {
                            if (!isset($forum_name)) {
                                $forum_name = 'Cancer';
                            }
                        }
                        ?>
                    </div>
                </div>

                <!-- Accuracy Key -->
                <div class="col-4">
                    <div class="row">
                        <h6><b>Accuracy Key (%)</b></h6>
                    </div>
                    <div class="row">
                        <span class="red-bullet"></span>= 0%-50% Accuracy
                    </div>
                    <div class="row">
                        <span class="yellow-bullet"></span>=51%-85% Accuracy
                    </div>
                    <div class="row">
                        <span class="green-bullet"></span>=86%-100% Accuracy
                    </div>
                </div>
            </div>

            <!-- Forum Header -->
            <div class="p-3 mb-3 bg-secondary text-white" id="forum-header">
                <div class="row">
                    <div class="col-sm-2" id="date-column">
                        <?php echo $forum_name ?>
                    </div>
                    <div class="col-sm-5">
                        Thread Name
                    </div>
                    <div class="col-sm-2">
                        Posted By
                    </div>
                    <div class="col-sm-1">
                        # Of Posts
                    </div>
                    <div class="col-sm-1">
                        Physician Rating 
                    </div>
                    <div class="col-sm-1">
                        Overall Rating
                    </div>
                </div>
            </div>

            <?php
            $page_number = filter_input(INPUT_GET, 'pageNumber');
            if ($page_number == null) {
                $page_number = 1;
            }
            $range = ($page_number - 1) * 8;
            $threads_all = get_threads_by_condition_id($condition_id);
            $content_length = count($threads_all);
            $threads = get_threads_by_condition_id_limit($condition_id, $range);

            foreach ($threads as $thread) {

                $patientID = $thread['PatientID'];
                $patient = get_patient($patientID);
                $userID = $patient['UserID'];
                $user = get_user($userID);
                $threadOwner = $user['Name'];
                $thread_id = $thread['ThreadID'];
                $comments = get_comments_by_thread($thread_id);
                $num_comments = count($comments);
                $accuracy_all_per_thread = get_color_rating_accuracy_from_all($thread_id);
                if(!isset($physician_id))
                {
                    $physician_id = null;
                }
                $accuracy_physician_per_thread = get_color_rating_accuracy_by_thread_and_physician_id($thread_id, $physician_id);
                ?>

                <!-- forum content -->
                <div class="border p-3 mb-2">
                    <!-- First Thread on Forum -->
                    <div class=" border-bottom">
                        <div class="row pt-2">
                            <div class="col-sm-2">
    <?php echo $thread['Date']; ?>
                            </div>
                            <div class="col-sm-5">
                                <a href="http://localhost:7777/MedicalStoplight/thread/thread.php?action=viewThread&amp;threadID=<?php echo $thread_id; ?>&amp;conditionID=<?php echo $condition_id; ?>&amp;pageNumber=1"><?php echo $thread['Text']; ?></a>
                                <p>First Comment</p>
                            </div>
                            <div class="col-sm-2">
    <?php echo $threadOwner; ?>
                            </div>
                            <div class="col-sm-1">
    <?php echo $num_comments; ?>
                            </div>
                            <div class="col-sm-1">
    <?php display_accuracy($accuracy_physician_per_thread) ?> 
                            </div>
                            <div class="col-sm-1">
    <?php display_accuracy($accuracy_all_per_thread) ?>
                            </div>
                        </div>
                    </div>
                </div>
    <?php
}
$tag = 'conditionID';
include ('../pagination/pagination.php');
?>
    </body>
            <?php include('../Footer/footer.php'); ?>
</html>
