<?php 
include_once('lib/header.php');

if (isset ($_SESSION ["LoggedIn"]) && ($_SESSION["LoggedIn"])){
    header("Location: dashboard.php");
 }


include_once('lib/header.php');

 ?>

<h3>Login</h3>


 <p>
         <?php
             if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
                 echo "<span style='color:green'>" . $_SESSION['message'] . "</span>";
                 session_destroy();
             }
         ?>
     </p>
<form method="POST" action="processlogin.php">
    <p>
        <?php
            if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
                echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";

                session_destroy();
            }
        ?>
    </p>

        <p>
            <label>Email</label><br />
            <input

            <?php
                if(isset($_SESSION['email'])){
                    echo "value=" . $_SESSION['email'];
                }
            ?>

             type="text" name="email" placeholder="Email"  />
        </p>

        <p>
            <label>Password</label><br />
            <input type="password" name="password" placeholder="Password"  />
        </p>


        <p>
            <button type="submit">Login</button>
        </p>
    </form>
    <p> <a href="index.php">Home</a> |
    <a href="forgot.php">forgot Password</a>|
   <a href="Register.php">New User</a> 
   </p>
