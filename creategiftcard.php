<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>Gift Card</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

    </style>
</head>
<body>



<?php
// connect to the database
include_once('homepage.php');
require_once('connect-db.php');
if (empty($_POST['id']) || empty($_POST['classid'])) {

}
else
{
    $id = $_POST['id'];
    $classid = $_POST['classid'];
    $type = $_POST['type'];
    if($type == 'enroll'){
        $query = "select * from enroll where UserId = '$id' and ClassId = '$classid'";
        $result = mysqli_query($mysqli, $query);
        if($result->num_rows > 0)
        {
            $fmsg = "You are already enrolled in the class";
        }
        else
        {
            $query = "INSERT INTO enroll(UserId, ClassId) VALUES ('$id','$classid')";
            $result = mysqli_query($mysqli, $query);
            if($result){
                $smsg = "Class Enrollment is Successful.";
            }else{
                $fmsg = "Class Enrollment Failed.";
            }


        }
    }
    else{
        $query = "select * from enroll where UserId = '$id' and ClassId = '$classid'";
        $result = mysqli_query($mysqli, $query);
        if($result->num_rows == 0)
        {
            $fmsg = "You are trying to drop from an unenrolled class";
        }
        else
        {
            $query = "DELETE FROM enroll WHERE UserId= '$id' and ClassId = '$classid' ";
            $result = mysqli_query($mysqli, $query);
            if($result){
                $smsg = "You are Dropped from the class.";
            }else{
                $fmsg = "Dropping of class Failed.";
            }
        }

    }

}
if ($res = $mysqli->query("select * from login where Username='$login_session'")){
    $row1 = $res->fetch_object();
    $id = $row1->Id;

}
// get the records from the database
if ($result = $mysqli->query("SELECT * FROM enroll WHERE UserId = '$id'"))
{
// display records if there are records to display
    if ($result->num_rows > 0)
    {
        echo "<div class='container'>";
        echo "<div class='row'>";
        echo "<div class='col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4'>";
        /*echo <<<_END
        <form method='post' action='creategiftcard.php'>
        <input type='hidden' name='id' value='$id'>
        <input type='submit' class="btn btn-success btn-block" value='Create Gift Card'>
        </form>
        </br>
        _END;*/

        echo "</br>";
        echo "<form method='post' action='viewaccount.php' id=\"viewEnrolledClassForm\">";
        echo " <div class='form-group'>";
        echo "<label for='enrolledclass'>Select an Enrolled Class</label>";
        echo "<div class=\"form-group\" name=\"classId\" id=\"classId\" class=\"form-control\" required>";
        echo "<select id='selectedClass', name='selectedClass', class=\"form-control\">";
        while ($row = $result->fetch_object()) {
            $class = $mysqli->query("select * from class where Id='$row->ClassId'");
            $class_row = $class->fetch_object();
            echo "<option>". $class_row-> Name ."</option>";
        }
        echo "</select>";
        echo "</div>";
        echo "</div>";
        echo "<button type='submit' class='btn btn-default'>Submit</button>";
        echo "</form>";
        echo "</br>";

        if (empty($_POST['selectedClass']) ) {

        }
        else {
            echo "<table class='table table-striped table-hover'>";
            echo "<tbody>";
            echo "<tr><th>Topic</th><th>URL</th></tr>";
            $classId = $_POST['selectedClass'];
            $videos = $mysqli->query("select * from videos where ClassId='$classId'");
            if ($videos->num_rows > 0) {
                while ($video_row = $result->fetch_object()) {
                    echo "<tr>";
                    echo "<td>" . $video_row->Topic . "</td>";
                    echo "<td>" . $video_row->Links . "</td>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "<tr>";
                echo "<td> <input type=\"text\" name=\"topic\" id=\"topic\" tabindex=\"1\" class=\"form-control\" placeholder=\"topic\" value=\"\" required></td>";
                echo "<td> <input type=\"text\" name=\"url\" id=\"url\" tabindex=\"1\" class=\"form-control\" placeholder=\"URL\" value=\"\" required></td>";
                echo "</td>";
                echo "</tr>";
                echo "</tbody>";
                echo "</table>";
                echo "</br></br>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            else
            {
                echo "<tr>";
                echo "<td> <input type=\"text\" name=\"topic\" id=\"topic\" tabindex=\"1\" class=\"form-control\" placeholder=\"topic\" value=\"\" required></td>";
                echo "<td> <input type=\"text\" name=\"url\" id=\"url\" tabindex=\"1\" class=\"form-control\" placeholder=\"URL\" value=\"\" required></td>";
                echo "</td>";
                echo "</tr>";
                echo "</tbody>";
                echo "</table>";
                echo "</br></br>";

            }
        }
    }
// if there are no records in the database, display an alert message
    else
    {
        echo "<div class='container'>";
        echo "<div class='row'>";
        echo "<div class='col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4'>";
        echo "</br></br>";
        echo "<center>There are no Enrolled Classes to view.</center><br>";
//echo <<<_END
//<form method='post' action='creategiftcard.php'>
//<input type='hidden' name='id' value='$id'>
//<input type='submit' class="btn btn-success btn-block" value='Create Gift Card'>
//</form>
//</br>
//_END;
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
}
// show an error if there is an issue with the database query
else
{
    echo "Error: " . $mysqli->error;
}
// close database connection
$mysqli->close();

?>
</body>
</html>