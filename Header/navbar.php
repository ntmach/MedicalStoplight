<!docytpe HTML>

<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="../Header/mystyle.css">
    </Head>
    <body>
        <div id="header">
            <div class="container">
                <div class="row">
                    <div id="col-lg-4 col-md-3">
                        <div class="logo">
                            <a class="navbar-brand" href="../index.php" >
                                <img id="pic" alt="Logo" src="../Header/logo.png" height="150px" width="250px">
                            </a>
                        </div>
                    </div>
                    <div id="row1" class="row">


                        <!-- Phone -->
                        <div id="column1" class="col-lg-4 col-md-4">
                            <div class="contact-details">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3">
                                        <img alt="phone" src="../Header/phone.png" height="28px" width="28px">
                                    </div>
                                    <div class="col-lg-10 col-md-9">
                                        <p class="para-color">Phone</p>
                                        <p class="col-org">Medical Stoplight is not a real medical forum. It is a project by student competitors for the Information Technology Competition hosted by Cal Poly Pomona's MISSA.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Location -->
                        <div id="column2" class="col-lg-4 col-md-4">
                            <div class="contact-details">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3">
                                        <img alt="phone" src="../Header/location.png" height="28px" width="28px">
                                    </div>
                                    <div class="col-lg-10 col-md-9">
                                        <p class="para-color">Location</p>
                                        <p class="col-org">Pomona, California</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Email -->
                        <div id="column3" class="col-lg-4 col-md-4">
                            <div class="contact-details">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3">
                                        <img alt="phone" src="../Header/email.png" height="28px" width="28px">
                                    </div>
                                    <a>
                                        <div class="col-lg-10 col-md-9">
                                            <p class="para-color">email</p>
                                            <p class="col-org">BillyBronco@cpp.edu</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--<div id="spacer"></div>-->
        <nav id="row2" class="navbar navbar-expand-lg navbar-dark bg-dark">


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php"><h5>Medical Stoplight</h5></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../forum/forumpage.php">Forums</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../profile/profilepage.php">Your Profile</a>
                    </li>
                </ul>

                <button id='login' class="btn btn-outline-info my-2 my-sm-0" onclick="redirect_login()">Login</button>
                <!--Spacing between buttons --> <li class="nav-item"><a class="nav-link" ></a></li>
                <button id='register' class="btn btn-outline-info my-2 my-sm-0 "onclick="redirect_signup()">Register</button>
                <!--Spacing between buttons --> <li class="nav-item"><a class="nav-link" ></a></li>
                <button id='logout' class="btn btn-outline-info my-2 my-sm-0" onclick="redirect_logout()">Log Out</button>

            </div>
        </nav>

        <div id="row3">
            <ul>
                <li>
                    <a href="../index.php"><h4>Medical Stoplight</h4></a>
                </li>
                <li>
                    <a href="../index.php"><h4>Home</h4></a>
                </li>
                <li>
                    <a href="../forum/forumpage.php"><h4>Forums</h4></a>
                </li>
                <li>
                    <a href="../profile/profilepage.php"><h4>Your Profile</h4></a>
                </li>
            </ul>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
    <?php
    if (isset($_COOKIE['id']) && isset($_COOKIE['accType'])) {
        ?>
        <script>
                        document.getElementById('login').style.display = 'none';
                        document.getElementById('register').style.display = 'none';
                        document.getElementById('logout').style.display = 'block';
        </script>
        <?php
    }
    if (!isset($_COOKIE['id']) && !isset($_COOKIE['accType'])) {
        ?>
        <script>
            document.getElementById('login').style.display = 'block';
            document.getElementById('register').style.display = 'block';
            document.getElementById('logout').style.display = 'none';
        </script>
        <?php
    }
    ?>

</html>
<script>
    function redirect_login()
    {
        window.location = "../loginSignUp/login.php";
    }
    function redirect_logout()
    {
        window.location = "../loginSignUp/logout.php";
    }
    function redirect_signup()
    {
        window.location = "../loginSignUp/signup.php";
    }

</script>