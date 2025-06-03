<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>Equivalent Courses Database</title>
</head>
<body>


<p><a href="home.html" style="text-decoration:none">Home</a></p>

<h1>Equivalent Courses Database</h1>

<!--Select and submit to display equivalencies by western course code or by date-->
<div class="container">
  <div class="row">
    <div class="col-sm">
      <div class="radio">

        <form action="" method="post">

            <p>Display Equivalencies By Western course</p>
            <select name="pickacode" id="pickacode">
            <option value="1">Select Western Course Code</option>
            <?php
                include "connecttodb.php";
                include "codedropdown.php"; // dropdown of western course codes
            ?>
            </select>

            <input type="submit" value="Submit" name="codesubmit">

        </form>

        <p></p>
        
        <form action="" method="post">

            <p>Display Equivalencies By Date</p>
            <input type="date" id ="pickdate" name="pickdate">
            <input type="submit" value="Submit" name="datesubmit">

        </form>

      </div>
    </div>

    <!--Form to create new equivalency between existing western course and existing outside course-->
    <div class="col-sm">
      <div class="radioborder">
        <p>Add New Equivalency</p>
        <form action="" method="post">

            <select name="pickacode2" id="pickacode2">
            <option value="1">Select Western Course Code</option>
            <?php
                include "connecttodb.php";
                include "codedropdown.php"; // dropdown of western course codes
            ?>
            </select>

            <br>
            
            <select name="pickaout" id="pickaout">
            <option value="1">Select Outside Course Code</option>
            <?php
                include "connecttodb.php";
                include "outsidedropdown.php"; // dropdown of outside course codes
            ?>
            </select>

            <br>
            
            <select name="pickaouni" id="pickaouni">
            <option value="1">Select Outside University</option>
            <?php
                include "connecttodb.php";
                include "iddropdown.php"; // dropdown of outside university ids
            ?>
            </select>

            <br>

            <input type="submit" value="Add Equivalency" name="equadd">

        </form>
        
      </div>
    </div>
  </div>
</div>

<!--Display equivalency data as table-->
<hr>
<div class="container">
  <div class="row">
    <div class="col-sm"> 
      
    <?php
        if (isset($_POST['codesubmit'])) { // display equivalency data by western course code
            if($_POST['pickacode'] != 1){
                include "connecttodb.php";
                include "getequivalent.php"; // table of equivalencies
            }
            else{
                print("Please select a Western course code.");
            }
        } //end of if
    ?>

    <?php
        if (isset($_POST['datesubmit'])) { // display equivalency data by date
            include "connecttodb.php";
            include "getequivalentbydate.php"; // table of equivalencies by date
        } //end of if
    ?>

    <?php
        if (isset($_POST['equadd'])) { // insert/update user selected equivalency into database
            if($_POST['pickacode2'] != 1 && $_POST['pickaout'] != 1 && $_POST['pickaouni'] != 1){
                include "connecttodb.php";
                include "addequivalent.php"; // add/update equivalency
            }
            else{ 
                print("Missing selection for one or more fields, equivalency addition aborted.");
            }
        } //end of if
    ?>

    </div>
  </div>
</div>
</hr>

</body>
</html>