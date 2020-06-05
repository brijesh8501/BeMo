<?php
session_start();
error_reporting(0);
if(!(isset($_SESSION['name'])) && !(isset($_SESSION['email']))){
  header("location: bemo-login.php");
}
include '../form_csrf/csrf.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>BeMo Academic Consulting Inc</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <link rel="icon" type="image/png" href="../assets/bemo-logo2.png" />
    <link rel="stylesheet" href="../css/bootstrap-4.4.1.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/bootstrap-dataTable.css">
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-primary">
  <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
          <a class="nav-link text-white" href="/bemo/bemo-admin/">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown">
          Add Content
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="edit.php?id=1&action=edit">Home</a>
          <a class="dropdown-item border-top" href="edit.php?id=2&action=edit">How To Prepare</a>
          <a class="dropdown-item border-top" href="edit.php?id=3&action=edit">CDA Interviews Questions</a>
          <a class="dropdown-item border-top" href="edit.php?id=4&action=edit">Contact Us</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown">
          Online Tool
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="online-tool.php?id=1&action=online-tool">Facebook Advertising Pixel</a>
          <a class="dropdown-item border-top" href="online-tool.php?id=2&action=online-tool">Google Analytics Tag</a>
        </div>
      </li>
      <li class="nav-item bg-light">
        <a class="nav-link contact-link" href="contact-us.php">Contact Us - Inquiry</a>
      </li>
    </ul>
    <span class="navbar-text">
      <a href="logout.php?ounce=<?php echo generateToken('logout'); ?>"><i class="fas fa-sign-out-alt"></i> logout</a>
    </span>
  </div>
</nav>
<br>