<?php

session_start();

if (isset ($_SESSION ["LoggedIn"]) && ($_SESSION["LoggedIn"])){
   header("Location: dashboard.php");


}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      .error {color: #FF0000}
    </style>
  </head>
  <body>
  
    <strong> <p> Welcome! Please Register </p></strong>
    <p>All fields are Required</p>

    <form class="" action="processregister.php" method="POST">
<p>
      <?php
      if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
                echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
                session_destroy();
                 }
       ?>
       </p>
      <p>
         <label for="">First Name</label><br />
         <input
         <?php
         if(isset($_SESSION['first_name'])){
                   echo "Value =" . $_SESSION['first_name'];

                    }
          ?>
         type="text" name="first_name" value="" placeholder="First Name" pattern=".{2,}" title="Name must not be less that 2 letters or left blank">

      </p>

      <p>
         <label for="">Last Name</label> <br />
         <input
         <?php
         if(isset($_SESSION['last_name'])){
                   echo "Value =" . $_SESSION['last_name'];

                    }
          ?>

         type="text" name="last_name" value="" placeholder="Last Name"pattern=".{2,}" title="Name must not be less that 2 letters or left blank" >
      </p>

      <p>
         <label for="">Email</label> <br />
         <input
         <?php
         if(isset($_SESSION['email'])){
                   echo "Value =" . $_SESSION['email'];

                    }
  ?>


         type="text" name="email" value="" placeholder="Your Email" >
      </p>

      <p>
         <label for="">Password</label> <br />
         <input type="password" name="password" value="" placeholder="Password" >

      </p>

      <p>
         <label for="">Gender</label> <br />
         <select class="" name="gender" >
           <option value="">Select One</option>
           <option>Female</option>
           <option> Male</option>

         </select>
      </p>


      <p>
         <label for="">Role</label> <br />
         <select class="" name="role" >
           <option value="">Select One</option>
           <option>Teacher </option>
           <option>Student</option>

         </select>

      </p>

      <p>
         <label for="">Department</label> <br />
         <input
         <?php
         if(isset($_SESSION['department'])){
                   echo "Value =" . $_SESSION['department'];

                    }
          ?>
 
         type="text" name="department" value="" placeholder="Department">
      </p>

      <p> 
        <button type="submit" name="Register"> Register</button>

      </p>

    </form>

   <p> <a href="index.php">Home</a> |
   <a href="login.php">Already Have an account</a> 
   </p>
   
        </p>
  </body>
</html>
