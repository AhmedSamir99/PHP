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

    
    save_to_file();


      die($error);
    }


    function save_to_file(){

      $fp= fopen(_Saving_file_,"a+");
      // Prints something like: Monday 8th of August 2005 03:12:46 PM
      $thedate= date("F j Y g:i a ,"); 
      // $thedate = trim($thedate,",");
      // echo $thedate;
      $ip= $_SERVER['REMOTE_ADDR'];
      $ip .=',';
      // echo $ip;
      $written = implode(",", $_POST);
      echo $written;
      fwrite($fp,$thedate);
      fwrite($fp,$ip);
      fwrite($fp,$written.PHP_EOL);
      fclose($fp);
      
    }

    function read_from_file(){

      $fp= fopen(_Saving_file_,"r+");
      $readed_string = fread($fp, filesize(_Saving_file_));
      fclose($fp);
      return $readed_string;

    }

    function convert_file_to_array() {
      return file(_Saving_file_);
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