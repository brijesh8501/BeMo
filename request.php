<?php
include 'backend/controller.php';

$controller = new Controller();
// check action
if(isset($_REQUEST['action'])){
    $action = $_REQUEST['action'];
	
    // insert contact details
    // check contact form csrf token
    if($action === 'insert'){
			
        if(isset($_REQUEST['name']) && isset($_REQUEST['email']) && isset($_REQUEST['message']) && isset($_REQUEST['captcha']) ){
            
            if(!empty($_REQUEST['name']) && !empty($_REQUEST['email']) && !empty($_REQUEST['message']) && !empty($_REQUEST['captcha']) ){
                $captcha = $_REQUEST['captcha'];
                $secretKey = "**************************************************";

                // post request to server
                $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
                $response = file_get_contents($url);
                $responseKeys = json_decode($response,true);
                // should return JSON with success as true
                if($responseKeys["success"]) {
                    
                    // pass data to contact controller
                    $insert_msg = $controller->insert_contact_controller($_REQUEST);
                  	echo $insert_msg;
                    
                } 

            }
            
        }
      
    }

}
?>