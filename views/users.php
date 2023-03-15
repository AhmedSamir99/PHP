<?php
//$site_map = read_from_external_site("https://www.foxnews.com/");
//echo $site_map;
$test_parameter = isset($_GET["name"])?$_GET["name"]:"";
$_SESSION["name"] = $test_parameter;
do_array_example();
/*$users = convert_file_to_array();

foreach($users as $user){
    $user_details = explode(",",$user);
      echo "New User <br/>";
      echo str_repeat("*", 20);
        echo "<Div>";
    foreach($user_details as $value ){
      echo "<h3> $value </h3>";
      
    }
      echo "</div>";
}*/


