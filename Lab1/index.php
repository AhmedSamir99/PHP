<?php
  require_once("config.php");
  $parameter = isset($_GET["page"])? $_GET["page"]:"contact";
  // echo $parameter;
  $error ="";

  
    
  
  if( empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["message"]) ){
    $error= "Please Complete Your form";
  }
  elseif(strlen($_POST["name"]) > MAX_NAME_LENGTH ){
    $error= "Please Enter a name less than 100 characters";
  }
  elseif(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
    $error= "email is not valid :(";
  }
  elseif(strlen($_POST["message"])>MAX_MESSAGE_LENGTH){
    $error=  "Please Enter a message less than 255 characters";
    
  }
  else{
    $error = "<strong>". ThankYouMessage ."</strong> </br></br>
    <strong>Name: </strong>" .$_POST["name"] . "</br>".
    "<strong>Email: </strong>" .$_POST["email"] . "</br>".
    "<strong>Message: </strong>" .$_POST["message"];
    
      die($error);
    }


  
    // echo $error;
    
    // require_once("views/form.php");
    
    // echo $_POST["name"];
    // echo _Thank_you_;
    // echo strlen($_POST["name"])
    // echo $error;
    // if($parameter == 'contact')
    // require_once("views/form.php")  ;
    // else
    // require_once("views/hello.php") ;
    
    
    
  ?>