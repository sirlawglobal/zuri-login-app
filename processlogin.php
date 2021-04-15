<?php session_start();

$errorcount = 0;

$email = $_POST['email'] != "" ? $_POST['email'] : $errorcount++;
$password = $_POST['password'] != "" ? $_POST['password'] : $errorcount++;


$_SESSION['email']= $email;

if($errorcount > 0){

  $session_error = "You have" . $errorcount . "error";

    if ($errorcount > 1 ) {
      $session_error .=  "s";
    }

    $session_error .= " in your form submission";
    $_SESSION["error"] = $session_error;

    header("Location: login.php");

  }else{
 $allUsers = scandir("db/users/");
  $countAllUsers = count($allUsers);

  for ($counter = 0; $counter < $countAllUsers; $counter++ ){

    $currentUser = $allUsers[$counter];

    if($currentUser == $email . ".json"){
      $userString = file_get_contents("db/users/". $currentUser);
      $userObject = json_decode($userString);
      $passwordFromDB = $userObject -> password;

      $passwordFromUser = password_verify($password, $passwordFromDB);


      if($passwordFromDB == $passwordFromUser){
        $_SESSION ["LoggedIn"] = $userObject -> id;
        $_SESSION ["fullname"] = $userObject -> first_name . " " . $userObject -> last_name;
        $_SESSION ["role"] = $userObject -> role;
        $_SESSION ["department"] = $userObject -> department;
        $_SESSION ["registered"] = $userObject -> registered;
        if ($_SESSION["role"] == "Teacher"){
        
        header("Location: dashboard.php");
      } elseif ($_SESSION["role"] == "admin") {
        header("Location: admin.php");
      } else {
        header("Location: studentdashboard.php");
       }


      }
        die();
      }

    }
  }
  $_SESSION["message"] = "Invalid Email or password" ;
  header("Location: login.php");
  die();




?>
