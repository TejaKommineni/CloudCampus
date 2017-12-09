<?php
include('session.php');
?>
<html>
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="home.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
    
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
	
  </style>
</head>
<body>
  
<div class="container-fluid text-center">    
<div class="row">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="homepage.php">Cloud Campus</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav nav-stacked">
	  <li id="user-name"><?php echo $login_session; ?>&nbsp;<span class="glyphicon glyphicon-sunglasses"></span></li>






	</ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-bell"></span> Notifications (<b>2</b>)</a>
                <ul class="dropdown-menu notify-drop" id="notification-li">
                    <div class="notify-drop-title">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">Bildirimler (<b>2</b>)</div>
                            <div class="col-md-6 col-sm-6 col-xs-6 text-right"><a href="" class="rIcon allRead" data-tooltip="tooltip" data-placement="bottom" title="tümü okundu."><i class="fa fa-dot-circle-o"></i></a></div>
                        </div>
                    </div>
                    <!-- end notify title -->
                    <!-- notify content -->
                    <div class="drop-content">
                        <li>
                            <div class="col-md-3 col-sm-3 col-xs-3"><div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div></div>
                            <div class="col-md-9 col-sm-9 col-xs-9 pd-l0"><a href="">Ahmet</a> yorumladı. <a href="">Çicek bahçeleri...</a> <a href="" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>

                                <hr>
                                <p class="time">Şimdi</p>
                            </div>
                        </li>



                    </div>
                    <div class="notify-drop-footer text-center">
                        <a href=""><i class="fa fa-eye"></i> Tümünü Göster</a>
                    </div>
                </ul>
            </li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> &nbsp;Logout</a></li>
        </ul>
    </div>
  </div>
</nav>
</div>
    <ul class="nav nav-pills nav-stacked" id="vertical-nav">
        <li><a href="#">Customer Profile  &nbsp;<span class="glyphicon glyphicon-user"></span></a></li>
        <?php

        ?>
        <?php
        if($login_role == 'Professor')
        {
            echo "<li><a href=\"addvideos.php\">Add Videos &nbsp;<span class=\"glyphicon glyphicon-camera\"></span></a></li>";
            echo "<li><a href=\"answerquestions.php\">Answer Questions &nbsp;<span class=\"glyphicon glyphicon-pencil\"></span></a></li>";
            echo "<li><a href=\"enrollclass.php\" class='disabled'>Enroll Class   &nbsp;&nbsp;&nbsp;<span class=\"glyphicon glyphicon-search\"></span></a></li>";
            echo "<li><a href=\"viewenrolledclasses.php\" class='disabled'>View Enrolled Classes &nbsp;<span class=\"glyphicon glyphicon-list-alt\"></span></a></li>";
            echo "<li><a href=\"askquestions.php\" class='disabled'>Ask Questions &nbsp;<span class=\"glyphicon glyphicon-question-sign\"></span></a></li>";
        }
        if($login_role == 'Student')
        {
            echo "<li><a href=\"addvideos.php\" class='disabled'>Add Videos &nbsp;<span class=\"glyphicon glyphicon-camera\"></span></a></li>";
            echo "<li><a href=\"answerquestions.php\" class='disabled'>Answer Questions &nbsp;<span class=\"glyphicon glyphicon-pencil\"></span></a></li>";
            echo "<li><a href=\"enrollclass.php\">Enroll Class   &nbsp;&nbsp;&nbsp;<span class=\"glyphicon glyphicon-search\"></span></a></li>";
            echo "<li><a href=\"viewenrolledclasses.php\">View Enrolled Classes &nbsp;<span class=\"glyphicon glyphicon-list-alt\"></span></a></li>";
            echo "<li><a href=\"askquestions.php\">Ask Questions &nbsp;<span class=\"glyphicon glyphicon-question-sign\"></span></a></li>";
        }
        ?>

<!--        <li><a href="redeem.php">Redeem</a></li>-->
    </ul>
</div>
 

</body>
</html>