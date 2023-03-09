<?php

require_once("../index.php");

$users = convert_file_to_array();

$key=array("Date:" , "Ip address:","name:","email:","message:");
foreach($users as $user){
    $user_details = explode(",",$user);
      echo "New User <br/>";
      
      echo str_repeat("*", 20);
        echo "<Div>";
        $i=0;
    foreach($user_details as $value ){
      echo "<h3> $key[$i] $value </h3>";
       $i++;      
    }
      echo "</div>";
}

?>