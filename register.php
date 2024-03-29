<?php

// Include config file
include "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        unset($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
         
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = $username;
     	    $param_password =$password; 
           // $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    
	<style type="text/css">
body {background-image:url("images/img1.jpg");
	  background-size:cover;}
	  
	  .wrapper{ width: 350px; padding: 20px; }
</style>
        
</head>
<body>
<blockquote>
  <blockquote>
    <blockquote>
      <blockquote>
        <blockquote>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        </blockquote>
      </blockquote>
    </blockquote>
  </blockquote>
</blockquote>
<blockquote><blockquote><blockquote>
<div class="wrapper" align="left">
        <blockquote>
          <blockquote>
            <h1>Sign Up</h1>
            <p>&nbsp;</p>
          </blockquote>
        </blockquote>
  <h3> Please fill this form to create an account.</h3>
        <p>&nbsp;</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <p>
              <label>Username</label>
            </p>
            <p>
              <input type="text" name="username"  value="<?php echo $username; ?>">
              <span class="help-block"><?php echo $username_err; ?></span></p>
        </div>    
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <p>
              <label>Password</label>
            </p>
            <p>
              <input type="password" name="password"  value="<?php echo $password; ?>">
              <span class="help-block"><?php echo $password_err; ?></span></p>
      </div>
        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
          <p>Confirm Password</p>
          <p>
            <input type="password" name="confirm_password"  value="<?php echo $confirm_password; ?>">
            <span class="help-block"><?php echo $confirm_password_err; ?></span></p>
      </div>
        <div class="form-group">
          <blockquote>
            <p>
              <input type="submit" value="Submit">
              <input type="reset" value="Reset">
            </p>
          </blockquote>
      </div>
      <strong>Already have an account? <a href="login.php">Login here</a></strong>
    </form>
  </div>    
</body>
</html>
