<!DOCTYPE html>
<html>
    <head>
        <title>SignUp | Medical Stoplight</title>
        <link rel="stylesheet" href="./signup.css">
    </head>

    <body>
        <script>
            function selectType() {
                var accType = document.getElementById("acctype").value;
                return accType;
            }

            function displayFormByType() {
                var accType = selectType();
                if (accType == 'patient')
                {
                    document.getElementById('basic-form').style.display = 'block';
                    document.getElementById('special-form').style.display = 'none';
                } else
                {
                    document.getElementById('basic-form').style.display = 'block';
                    document.getElementById('special-form').style.display = 'block';
                }
            }
            function setAccType() {
                var accType = selectType();
                document.getElementById("accountType").setAttribute("value", accType);
            }
        </script>
        
        <?php include('../Header/navbar.php'); ?>
        
        <div class="outer-table">
            <div class="form-login">

                <h2>SIGN UP</h2>
                <form method='POST' action=''>
                    <select id="acctype" name='account-type' onchange="selectType(); displayFormByType(); setAccType();">
                        <option selected disabled>Select Account Type</option>
                        <option value="patient">Patient</option>
                        <option value="physician">Physician</option>
                        <option value="admin">Admin</option>
                    </select>
                </form>


                <div id='basic-form' style="display: none;">
                    <form method="POST" action="./signup_add.php">
                        <input type="hidden" id="accountType" name="accountType" value='none'>
                        <div id='special-form' style="display: none;">
                            <div><b>Enter Given Code</b></div>
                            <input type="text">
                        </div>
                        <div><b>Username</b></div>
                        <input type="text" name="username">
                        <div><b>Name</b></div>
                        <input type="text" name="name">
                        <div><b>Password</b></div>
                        <input type="password" name="password">
                        <div><b>Age</b></div>
                        <input type="text" name="age">
                        <div><b>Sex</b></div>
                        <input type="radio" name="sex">Male
                        <input type="radio" name="sex">Female<br>
                        <div><b>Email</b></div>
                        <input type="text" name="email">
                        <div><b>Country</b></div>
                        <input type="text" name="country">
                        <div><b>State/Province</b></div>
                        <input type="text" name="state_province">
                        <div><b>Street</b></div>
                        <input type="text" name="street">
                        <div><b>Race</b></div>
                        <input type="text" name="race"><br>
                        <input type='submit' name='submit' value='Sign up'>
                    </form>
                </div>
            </div>
        </div>
        <?php include('../Footer/footer.php');?>
    </body>
</html>