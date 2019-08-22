<!DOCTYPE html>
<html>
    <head>
        <title>Edit Profile Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
        <link href="editprofilepage.css" rel="stylesheet">
        <script src="editprofilepage.js"></script>

    </head>
    <body>
        <?php include('../Header/navbar.php');?>
        <div class="container"> <!--Avatar-->
            <div class="profileImage">
                <img src="https://img.purch.com/w/660/aHR0cDovL3d3dy5saXZlc2NpZW5jZS5jb20vaW1hZ2VzL2kvMDAwLzA4OC85MTEvb3JpZ2luYWwvZ29sZGVuLXJldHJpZXZlci1wdXBweS5qcGVn" />
            </div>
        </div>
        <div class="profile_page">
            <label><a href="./profilepage.php">Back to Profile</a></label><br>
        </div>
        <div class="form"> <!--Patient's Information-->
            <div class="left">
                <label>Name</label>
            </div>
            <div class="right">
                <input type="text" name="name"><br>
            </div>

            <div class="left"><!--Age-->
                <label>Age</label>
            </div>
            <div class="right">
                <input type="text" name="age"><br>
            </div>

            <div class ="radio-container"><!--Gender-->
                <div class="radio-container-left">
                    <label>Gender</label>
                </div>
                <div class="radio-container-right">
                    <input type="radio" name="gender" value="male">Male
                    <br>
                    <input type="radio" name="gender" value="female">Female
                    <br>
                    <input type="radio" name="gender" value="other">I choose not to enter
                    <br>
                </div>
            </div>

            <div class="left"><!--City-->
                <label>City</label>
            </div>
            <div class="right">
                <input type="text" name="City"><br>
            </div>

            <div class="left"><!--State-->
                <label>State</label>
            </div>
            <div class="right">
                <input type="text" name="state"><br>
            </div>

            <div class="conditions-container"><!--Conditions-->
                <div class="conditions-containerL">
                    <label>Conditions</label>
                </div>
                <div class="conditions-containerR">
                    <select name="conditions" id="conditions">
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                        <option value="fiat">Fiat</option>
                        <option value="audi">Audi</option>
                    </select>
                    <button id="addCond" onclick="addCond()">Add</button>
                    <p id="condP"></p>
                </div>
            </div>

            <div class="left"><!--Medications-->
                <label>Medications</label>
            </div>
            <div class="right">
                <input type="text" name="medications"><br>
            </div>

            <div class="sym-container"><!--Symptoms-->
                <div class="sym-containerL">
                    <label>Symptoms</label>
                </div>
                <div class="sym-containerR">
                    <select name="symptoms" id="symptoms">
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                        <option value="fiat">Fiat</option>
                        <option value="audi">Audi</option>
                    </select>
                    <button id="addSym" onclick="addSym()">Add</button>
                    <p id="sym"></p>
                </div>
            </div>

            <!--Save and Cancel Buttons-->
            <button type="button" onclick="cancelClick()">Cancel</button>
            <button type="button" onclick="saveClick()">Save</button>
        </div>
    </body>
</html>
<?php include('../Footer/footer.php');?>