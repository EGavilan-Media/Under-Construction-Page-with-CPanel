<?php

  //header.php

  session_start();

  if(!isset($_SESSION["username"]))
  {
    header('location: login.php');
  }

?>
<!DOCTYPE html>
<html>

<head>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!--Import Google Icon Font-->
  <link href="../vendor/icon.css" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../vendor/materialize/materialize.min.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="../vendor/materialize/main.css"/>  
  <!--Datatable CSS-->
  <link href='../vendor/datatable/datatables.min.css' rel='stylesheet' type='text/css'>
  <!--jQuery Library-->
  <script src="../vendor/jquery-3.4.1.min.js"></script>
  <!--Datatable JS-->
  <script src="../vendor/datatable/datatables.min.js"></script>
  <!--Materialize.min.js library-->
  <script type="text/javascript" src="../vendor/materialize/materialize.min.js"></script>
  <!--favicon-->
  <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
  <title>EGM - CPanel</title>
</head>

<body class="grey lighten-4">
  <nav class="blue darken-2">
    <div class="container">
      <div class="nav-wrapper">
        <a href="index.php" class="brand-logo cpanel-logo">EGM CPanel</a>
        <a href="#" data-activates="side-nav" class="button-collapse show-on-large right">
          <i class="material-icons">menu</i>
        </a>
        <ul class="right hide-on-med-and-down">
          <li>
            <a href="subscriber.php">Subscribers List</a>
          </li>
          <li>
            <a href="general.php">General Settings</a>
          </li>
          <li>
            <a href="account.php">Account Settings</a>
          </li>
          <li>
            <a href="logout.php">Logout</a>
          </li>
        </ul>
        <!-- Side nav -->
        <ul id="side-nav" class="side-nav">
        <li>
            <div class="user-view">
              <div class="background">
                <img src="../img/ocean.jpg" alt="">
              </div>
              <a href="accountSettings.php">
                <span class="name white-text"><?php echo $_SESSION['username']; ?></span>
              </a>
              <a href="#">
                <span class="email white-text"></span>
              </a>
            </div>
          </li>
          <li>
            <a href="index.php">
              <i class="material-icons">dashboard</i> Dashboard</a>
          </li>
          <li>
            <div class="divider"></div>
          </li>
          <li>
            <a href="subscriber.php">Subscribers List</a>
          </li>
          <li>
            <a href="general.php">General Settings</a>
          </li>
          <li>
            <a href="account.php">Account Settings</a>
          </li>
          <li>
            <div class="divider"></div>
          </li>
          <li>
            <a href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
