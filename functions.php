<?php

function validate_form() {
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    if (empty($name) || empty($email) || empty($password)) {
        return "A field is empty";
    } elseif (strlen($password) < __MIN_PASS_LENGTH_ || strlen($password) > __MAX_PASS_LENGTH) {
        return"Password length is not right";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Email is not correct";
    } else {
        return "";
    }
}

function remeber_variable($var) {
    if (isset($_POST[$var]) && !empty($_POST[$var])) {
        return $_POST[$var];
    } else {
        return "";
    }
}

function short_validate_form() {

    foreach ($_POST as $key => $value) {
        if (empty($value)) {
            return "$key can't be empty";
        }
    }
}

function print_confirmation_page() {
    echo "<center><h2>" . _THANK_YOU_ . "</H2></center>";
    echo str_repeat("*", 50);
    foreach ($_POST as $key => $value) {
        if ($key != "password") {
            $value = strtolower(trim($value));
            echo "<br/><strong> $key </strong> : $value";
        }
    }
}

function save_to_file() {
    $fp = fopen(_Saving_File_, "a+");
    $written_string = implode(" , ", $_POST);
    fwrite($fp, $written_string);
    fclose($fp);
}

function read_from_file() {
    $fp = fopen(_Saving_File_, "r+");
    $readed_string = fread($fp, filesize(_Saving_File_));
    fclose($fp);
    return $readed_string;
}

function convert_file_to_array() {
    return file(_Saving_File_);
}

function read_from_external_site($site) {
    $site = trim($site, "/");
    $site = strstr($site, "robots.txt") ? $site : $site . "/robots.txt";
    $site_contents = file_get_contents($site);
    $position_of_siteMap = strpos($site_contents, "sitemap");
    return substr($site_contents, $position_of_siteMap);
}

function do_array_example() {
    $people = array(
        "employee1" => array(
            "name" => "Ali",
            "Age" => 18
        ),
        "employee2" => array(
            "name" => "Ahmed",
            "Age" => 38
        ), "employee3" => array(
            "name" => "Mona",
            "Age" => 20
        )
    );
   
   $count =  count($people);
    echo "count os people is $count";
    
    foreach ($people as $key => $person) {
        echo "<h4> New Employee <H4>";
     
        foreach (array_map("strtoupper",$person) as $key => $value) {
            echo "<h5> $key: $value </h5>";
        }
    }
}

function get_saved_counter(){
   $str_count=  file_get_contents(_counter_file_);
   return intval($str_count);
}

function increment_conter($previous_count){
    if(!isset($_SESSION["counted"])){
        $previous_count++;
        $fp = fopen(_counter_file_,"w+");
        fwrite($fp, $previous_count);
        $_SESSION["counted"] = true;
    }
}

// function authenticate($user,$pass){
//     if(true){
//         $_SESSION["user_id"] = $user_id;
//     }else{
//         echo "error messae";
//     }
// }

// function authorize($page){
//     if(isset($_SESSION["user_id"])){
//         if(!check_permissions($_SESSION["user_id"],$page)){
//            die("");
//         }else{
//            $_SESSION["user_profile"]=load_date($_SESSION["user_id"]);
//            require_once("needed_view_page");
 
//         }
        
        
//     }else{
//         header("locaqtion: login.php");
//         exit();
//     }
// }