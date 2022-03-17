<?php

session_start();

     include("function.php");
     include("connect.php");


     if($_SERVER[ 'REQUEST_METHOD'] == "POST")
     {
         //something was posted
         $username = $_POST['username'];
         $password = $_POST['password'];
         echo "$username,$password";

         if(!empty($username)&& !empty($password) && !is_numeric($username))
         {

            //read from database
            $query = "select * from form where username = '$username' limit 1";
            $result = mysqli_query($conn, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {

                    $user_data =mysqli_fetch_assoc($result);


                    if($user_data['password'] === $password)
                    {

                        $_session['username'] = $user_data['username'];
                        header("Location: register.php");
                        die;
                    }
                }
            }
         echo "wrong username or password!";
        }else
        {
            echo "wrong username or password!";
        }
     }
 
?>


<html>
  <head><link rel='stylesheet' href="LOGIN.CSS"></head>
    <body><form action="" method="post">
 
    
  

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
    <label>Already have an account..?</label>
                    <a href="register.php" class="text">Register here</a>
  </div></div>

</form>
        
    </body>
</html>

