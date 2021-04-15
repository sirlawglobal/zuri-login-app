<?php
include_once('lib/header.php');

if (!isset ($_SESSION["LoggedIn"])){
    header("Location : login.php");
}

?>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

button{
  background-color: #808080; 
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
</style>

<body>

<p> 
<a href="index.php">Home</a> |
<a href="logout.php">Logout</a>| 
<button onclick="window.location.href = 'adduser.php';">Add User</button>
</p>
<hr />

<?php
             if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
                 echo "<span style='color:green'>" . $_SESSION['message'] . "</span>";
                 session_destroy();
             }
         ?>
<h3> Super Admin Space</h3>

<table>
  <tr>
    <th>Admin </th>
    <th> Details</th>
  </tr>
  <tr>
    <td>You are logged in as</td>
    <td> an Admin</td>
  
  </tr>
  
  
  <tr>
    <td>Last Login :</td>
    <td><?php 
    $email = $_SESSION['email'];
    
    $alldate = scandir("date/");
    $countAllUsers = count($alldate);
  
    for ($counter = 0; $counter < $countAllUsers; $counter++ ){
  
      $currentdate = $alldate[$counter];
  
      if($currentdate == $email . ".json"){
        $userString = file_get_contents("date/". $currentdate);
        $userdate = json_decode($userString);
        $_SESSION ["lastLogin"] = $userdate -> lastLogin;

        echo $_SESSION["lastLogin"];

          die();
        }
    }
    ?></td>
   
  </tr>
  
</table>

     </body> 



