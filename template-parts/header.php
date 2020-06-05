<?php
include 'backend/controller.php';
$controller = new Controller();

$current_page_name = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); 
if($current_page_name === "index.php"){

  $id = 1; 

}else if($current_page_name === "how-to-prepare.php"){

  $id = 2; 

}else if($current_page_name === "cda-interview-questions.php"){

  $id = 3; 

}else if($current_page_name === "contact-us.php"){

  $id = 4; 

}  
$id = array('id' => $id);
$select_record_by_id_resp = $controller->select_record_by_id_controller($id, "edit");
$online_tool_list = $controller->online_tool_list_controller();
?>
<html>
<head>
    <title>BeMo Academic Consulting Inc - <?php echo $select_record_by_id_resp->title; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php ($select_record_by_id_resp->is_index === 'Y') ? $is_index =  'index' : $is_index =  'noindex'; ?>
    <meta name="robots" content="<?php echo $is_index;?>">
    <meta name="googlebot" content="<?php echo $is_index;?>">
    <meta name="description" content="<?php echo $select_record_by_id_resp->meta_description; ?>">
    <meta name="keywords" content="<?php echo $select_record_by_id_resp->meta_keywords; ?>">
    <meta name="author" content="<?php echo $select_record_by_id_resp->meta_author; ?>">
    <link rel="icon" type="image/png" href="assets/bemo-logo2.png" />
    <link rel="stylesheet" href="css/bootstrap-4.4.1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <?php 
    foreach ($online_tool_list as $data){

      echo html_entity_decode($data['header_content']);

    } ?>
</head>
<body>
<div id="topheader">
<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-custom fixed-top">
    <div class="logo">
      <a class="navbar-brand" href="/bemo/"><img src="assets/bemo-logo2.png" class="logo-brand"/></a>
    </div>
  <button id="navbar-toggler" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active" id="current">
        <a class="nav-link text-dark" href="/bemo/" id="current">Main</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="how-to-prepare.php">How To Prepare</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="cda-interview-questions.php">CDA Interviews Questions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="contact-us.php">Contact Us</a>
      </li>
    </ul>
  </div>
</nav>
</div>