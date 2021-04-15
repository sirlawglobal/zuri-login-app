<?php session_start() ;
date_default_timezone_set('Africa/Lagos');
$date = date("D M Y h:ia");


$email = $_POST['email'] != "" ? $_POST['email'] : $errorcount++;

 $email = $_SESSION['email'];


$dateObject = [
    'lastLogin' => $date
];

file_put_contents("date/". $email . ".json", json_encode ($dateObject));

header("Location: login.php ");
session_unset();
session_destroy();


?>
