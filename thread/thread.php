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
    $thread_id = filter_input(INPUT_GET, 'threadID', FILTER_VALIDATE_INT);
    echo '<br>';

    $page_number = filter_input(INPUT_GET, 'pageNumber');
    $range = ($page_number - 1) * 8;
    $posts_all = get_comments_by_thread($thread_id);
    $content_length = count($posts_all);
    $posts = get_comments_by_thread_limit($thread_id, $range);
    $thread_title = get_thread($thread_id);
    $thread_name = $thread_title['Text'];
    $num_posts = count($posts);
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


            $accuracy_all = get_color_rating_accuracy_from_all($thread_id);
            $accuracy_physician = get_color_rating_accuracy_by_thread_and_physician_id($thread_id, $physician_id);
        } else {
            $accType = null;
        }
    }
    ?>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <link href='threadstyle.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <body>
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
        <div class="thread-head">
            <div class='thread-header'>
                <div class='thread-header-left'>
                    <h1><?php echo $thread_name; ?></h1> <br>
                </div>
                <div class='thread-header-right'>
                    Accuracy Rating All: <?php
                    if (isset($_COOKIE['accType'])) {
                        if ($_COOKIE['id'] != '') {
                            display_accuracy($accuracy_all);
                        };
                    }
                    ?> <br>
                    Accuracy By Physician: <?php
                    if (isset($_COOKIE['accType'])) {
                        if ($_COOKIE['id'] != '') {
                            display_accuracy($accuracy_physician);
                        };
                    }
                    ?>
                </div>
            </div>
        </div>
        <br>
        <?php
        if (isset($accType)) {
            if ($accType != 'physician' && isset($_COOKIE['id'])) {
                ?>
        
                <div class='create-container'>
                    <div class='create-container-left'>
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#myModal">Reply to Thread</button>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Create Your Thread</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form class="" action="" method="post">
                                        <div class="modal-body">

                                            <br>
                                            Your Comment:<br>
                                            <textarea type="text" name="threadcomment" value="" rows="4" cols="50"></textarea>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="create" class="btn btn-default" name="test" value="RUN">Submit</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($_COOKIE['id'])) {
                    if (array_key_exists('create', $_POST)) {
                        echo 'TESTING';
                        $all_comments = get_all_comments();
                        $next_comment_id = count($all_comments) + 1;
                        $ID;
                        $thread_id;
                        $patient_id = get_patient_by_user($ID);
                        $comment = filter_input(FILTER_POST, 'threadcomment');
                        $con_id = filter_input(FILTER_GET, 'conditionID');
                        $date = date();
                        //comment id, user id, thread id, text, rating, date
                        add_comment($next_comment_id, $ID, $thread_id, $comment, 0, $date);
                    }
                        ?>

                    </div>
                <?php
                }
            }
        }
            ?>
            <div class='container'>
                <div class='container-post'>
                    <form method="POST" id="forum-form">
                        <?php
                        $i = 1;
                        foreach ($posts as $post) {
                            $userID = $post['UserID'];
                            $name = get_user($userID);
                            $rating = $post['Rating'];
                            $comments_id = $post['CommentsID'];
                            if (isset($_COOKIE['accType'])) {
                                if ($_COOKIE['id'] != '') {
                                    $physician = get_physican_by_user($ID);
                                    $physician_id = $physician['PhysicianID'];
                                    $color_rating_thread = get_color_rating_by_physician_and_comment($physician_id, $comments_id);
                                }
                            }
                            ?>
                            <div class='middle'><?php echo $name['Name'] ?><br>

                                <div class='profile-avatar'>
                                    <div class='avatar'>
                                        <img src ="https://www.thehappycatsite.com/wp-content/uploads/2017/10/best-treats-for-kittens.jpg" alt="Avatar">
                                    </div>
                                </div>
                            </div>

                            <div class='left'>

                            </div>

                            <div class='right'>
                                <div class='right-top'>
                                    <div class='right-top-containers'>
                                        Date <br>
                                        <?php echo $post['Date'] ?> <br>

                                    </div>
                                    <div class='right-top-containers'>
                                        <button type="submit"><img src="thumbup.png" alt="Thumbs Up Icon">Like if Helpful</button>
                                    </div>
                                    <div class='right-top-containers'>
                                        <div id="rate<?php echo $i ?>"style="display: none;">
                                            Accuracy Rating <br>
                                            <label>current rating: <?php
                                                if ($_COOKIE['id'] != '') {
                                                    if ($color_rating_thread['Green'] == 1) {
                                                        echo display_green();
                                                    }
                                                }
                                                if ($_COOKIE['id'] != '') {
                                                    if ($color_rating_thread['Red'] == 1) {
                                                        echo display_red();
                                                    }
                                                }
                                                ?></label><br>
                                            <input type="radio" name="accuracy-rating<?php echo $i ?>" value="accurate"> Accurate<br>
                                            <input type="radio" name="accuracy-rating<?php echo $i ?>" value="inaccurate"> Inaccurate<br>
                                        </div>
                                    </div>
                                </div>
                                <div class='right-bottom'>
                                    Comments/Posts <br>
                                    <?php echo $post['Text'] ?>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    -------------------------------------------------------------------------------------------------------------------------------------
                                </div>

                            </div>
                            <?php
                            if (isset($accType)) {
                                if ($accType == 'physician') {
                                    ?>
                                    <script>
                                        document.getElementById('rate' + <?php echo $i; ?>).style.display = 'block';
                                    </script>
                                    <?php
                                } else if ($accType == 'patient') {
                                    ?>
                                    <script>
                                        document.getElementById('rate' + <?php echo $i; ?>).style.display = 'none';
                                    </script>
                                    <?php
                                }
                                $accuracy[$i] = filter_input(INPUT_POST, 'accuracy-rating' . $i);
                                if ($accuracy[$i] == 'accurate') {
                                    $physician = get_physican_by_user($ID);
                                    $physician_id = $physician['PhysicianID'];
                                    $num_array = get_all_color_rating();
                                    $color_id = count($num_array) + 1;
                                    $comments_id = $post['CommentsID'];
                                    $color_ratings = get_color_rating_by_physician($physician_id);
                                    $bool = true;
                                    if (count($color_ratings) != 0) {
                                        foreach ($color_ratings as $color_rating) {
                                            if ($comments_id == $color_rating['CommentsID']) {
                                                $color_id = $color_rating['ColorID'];
                                                update_color_rating($color_id, 1, 0, 0);
                                                $bool = false;
                                            }
                                        }
                                    }
                                    if ($bool) {
                                        add_color_rating($color_id, $physician_id, $comments_id, 1, 0, 0);
                                        ;
                                    }
                                } else if ($accuracy[$i] == 'inaccurate') {
                                    $physician = get_physican_by_user($ID);
                                    $physician_id = $physician['PhysicianID'];
                                    $num_array = get_all_color_rating();
                                    $color_id = count($num_array) + 1;
                                    $comments_id = $post['CommentsID'];
                                    $color_ratings = get_color_rating_by_physician($physician_id);
                                    $bool = true;
                                    if (count($color_ratings) != 0) {
                                        foreach ($color_ratings as $color_rating) {
                                            if ($comments_id == $color_rating['CommentsID']) {
                                                $color_id = $color_rating['ColorID'];
                                                update_color_rating($color_id, 0, 0, 1);
                                                $bool = false;
                                            }
                                        }
                                    }
                                    if ($bool) {
                                        add_color_rating($color_id, $physician_id, $comments_id, 0, 0, 1);
                                    }
                                }
                            }
                            $i++;
                        }
                        ?>
                        <input id='sub' type="submit" style='margin-left: 80%; margin-top: 2%;' value="rate posts!">
                        <?php
                        if (isset($accType)) {
                            if ($accType == 'physician') {
                                ?>
                                <script>
                                    document.getElementById('sub').style.display = 'block'
                                </script>
                                <?php
                            } else {
                                ?>
                                <script>
                                    document.getElementById('sub').style.display = 'none'
                                </script>
                                <?php
                            }
                        }
                        ?>



                    </form>
                </div>
            </div>

            <?php
            $tag = 'viewThread';
            include ('../pagination/pagination.php');
            ?>
        </body>
        <?php include('../Footer/footer.php'); ?>
    <script>
        function submitForms() {
            document.getElementById("thread-form").submit();
            window.location.reload();
        }
    </script>
</html>

