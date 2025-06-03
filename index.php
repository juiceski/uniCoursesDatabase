<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>Western Courses Database</title>
</head>
<body>

<p><a href="home.html" style="text-decoration:none">Home</a></p>

<h1>Western Courses Database</h1>


<div class="container">
  <div class="row">
    <div class="col-sm">
      <div class="radio">

      <!--Form for selecting display format of western course data-->
        <form action="" method="post">

            <p>Display Western Course Data</p>
            Filter By:
            <br>
            <input type="radio" id="courseNum" value="courseNum" name="1"> Course Number
            <br>
            <input type="radio" id="courseName" value="courseName" name="1"> Course Name
            <br>
            <p></p>
            <input type="radio" id="asc" value="asc" name="2"> Ascending
            <br>
            <input type="radio" id="asc" value="desc" name="2"> Descending
            <br>
            <p></p>
            <input type="submit" value="Submit" name="Submit">

        </form>

      </div>
    </div>

    <!--Form for adding new courses to Western-->
    <div class="col-sm">
      <div class="radioborder">
        <p>Add New Course</p>
        <form action="" method="post">

        New Course Number: <input type="text" pattern='cs+[0-9]{4}' value="" name="coursenum" placeholder="Ex: cs0000" title="Include cs and follow with four numbers." required>
        <br>
        New Course Name: <input type="text" name="coursename" required>
        <br>
        New Course Weight: <input type="text" name="weight" required>
        <br>
        New Course Suffix: <input type="text" name="suffix" value="">
        <br>
        <input type="submit" value="Add Course" name="Add">
        </form>

      </div>
    </div>


  </div>
</div>

<!--Western Course data table and Edit/Delete form-->
<hr>
<div class="container">
  <div class="row">
    <div class="col-sm"> 
      
      <?php
          if (isset($_POST['Submit'])) { // display table of western courses on submit
            include "connecttodb.php"; // i have a lot of these before every php file just in case to ensure connection to the db
            include "getwesterncoursedata.php"; // table of western course data
          } //end of if
      ?>

      <?php
          if (isset($_POST['Add'])) { // insert user-inputted course into database
            include "connecttodb.php";
            include "addwesterncourse.php"; // adds western courses
          } //end of if
      ?>

      <?php
          if (isset($_POST['Edit'])) { // edit selected course
            if ($_POST['pickacourse'] != 1){
              include "connecttodb.php";
              include "editwesterncourse.php"; // edits western courses
              print("Resubmit above to see changes.");
            }
            else{
              print("Please select a valid course for editing.");
            }
          } //end of if
      ?>

      <?php
          if (isset($_POST['Delete'])) { // delete selected course
            if ($_POST['pickacourse'] != 1){
              include "connecttodb.php";
              include "deletewesterncourse.php"; // deletes western courses
            }
            else{
              print("Please select a valid course for deletion.");
            }
            
      
          } //end of if
      ?>

    </div>

    <!--Form for editing/deleting courses at Western-->
    <div class="col-sm">
      <div class="radioborder">
        <p>Edit Western Course Data</p>
        <form action="" method="post">

        <select name="pickacourse" id="pickacourse">
        <option value="1">Select Course</option>
        <?php
          include "connecttodb.php";
          include "westerndropdown.php"; // dropdown of western course names
        ?>
        </select>
        <br>
        Edit Course Name: <input type="text" name="ecoursename">
        <br>
        Edit Course Weight: <input type="text" name="eweight">
        <br>
        Edit Course Suffix: <input type="text" name="esuffix">
        <br>
        <input type="submit" value="Edit Selected Course" name="Edit">
        <p></p>
        <input type="submit" value="Delete Selected Course" name="Delete" onclick="return confirm('Are you sure you want to delete the selected course?');">

        </form>
      </div>
    </div>

  </div>
</div>
</hr>

</body>
</html>