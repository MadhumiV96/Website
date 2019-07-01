<?php

session_start();
$host="localhost";
$username="root";
$password="";
$database="talkmate_new";
$message="";

try
{
	$connect=new PDO("mysql:host=$host;dbname=$database",$username,$password);
	$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
	if(isset($_POST["login"]))
	{
		if (!empty($_POST["username"]) && !empty($_POST["password"]))
		
			$query="SELECT * FROM users WHERE username= :username AND password= :password";
			$statement=$connect->prepare($query);
			$statement->execute(
				array(
					'username' => $_POST["username"],
					'password' => $_POST["password"]
				)
			);
			$count=$statement->rowCount();
			if($count>0)
			{
				$_SESSION["username"]=$_POST["username"];
				header("location:login_success.php");
			}
			else
			{
				$message='<label>Incorrect Username and Password</label>';
			}
		}
	}
	
	
	
catch(PDOException $error)
{
	$message=$error->getMessage();
	}

?>

<!DOCTYPE html>

<html>
<head>
<title>Login Page</title>

<script type="text/javascript" src="javascript/JSfunction.js"></script>


<style type="text/css">
body {background-image:url("images/img1.jpg");
	  background-size:cover;}
</style>




</head>

<body>

<br/>



<?php
if(isset($message))
{
	echo $message;
}
?>


<div class="container" align="left">
<blockquote>
  <blockquote>
    <blockquote>
      <blockquote>
        <blockquote>
          <blockquote>
            <blockquote>
              <blockquote>
                <blockquote>
                  <blockquote>
                    <blockquote>
                      <h1 align="">&nbsp;</h1>
                      </blockquote>
                    <h1 align="">Login</h1>
                  </blockquote>
                </blockquote>
              </blockquote>
            </blockquote>
          </blockquote>
        </blockquote>
      </blockquote>
    </blockquote>
  </blockquote>
</blockquote>
<br/>

<form name="form1" method="post" onsubmit="return checkLogin()">

<p id="error">.</p>

<p>
  <label>
    <blockquote>
      <blockquote>
        <blockquote>
          <blockquote>
            <blockquote>
              <blockquote>
                <blockquote>
                  <blockquote>
                    <p><strong>Username</strong>  </p>
                    <p>
                      <input type="text" id="uid" name="username" placeholder="Enter your Username"/>
                    </p>
                  </blockquote>
                </blockquote>
              </blockquote>
            </blockquote>
          </blockquote>
        </blockquote>
      </blockquote>
    </blockquote>
</label>
  </p>
<p><br/>
  
  <label>
    <blockquote>
      <blockquote>
        <blockquote>
          <blockquote>
            <blockquote>
              <blockquote>
                <blockquote>
                  <blockquote>
                    <p><strong>Password</strong></p>
                    <p>
                      <input type="password" id="pid" name="password" placeholder="Enter your Password"/>
                    </p>
                  </blockquote>
                </blockquote>
              </blockquote>
            </blockquote>
          </blockquote>
        </blockquote>
      </blockquote>
    </blockquote>
  </label>
</p>
. 
<p>.</p>
<blockquote>
  <blockquote>
    <blockquote>
      <blockquote>
        <blockquote>
          <blockquote>
            <blockquote>
              <blockquote>
                <blockquote>
                  <p><span class="container" style="width:500px;"><span class="container" style="width:500px;">
                    <input type="submit" name="login" value="Login"/>
                    </span></span><br/>
                  </p>
                </blockquote>
              </blockquote>
            </blockquote>
          </blockquote>
        </blockquote>
      </blockquote>
    </blockquote>
  </blockquote>
</blockquote>


</form>
</div>
</body>



</html>
