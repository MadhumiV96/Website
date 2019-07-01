<?php

session_start();

if(isset($_SESSION["username"]))
{
	echo '<h1 align="center">Login Success, Welcome -  '.$_SESSION["username"].'</h1>';	
	
}

else
{
	header("location:login.php");
}

?>


<html>
<head>
<title>Welcome</title>
<style type="text/css">
	body {background-image:url("images/smile.jpg");
	      background-size:contain;}
</style>
</head>

<body >

<h3>&nbsp;</h3>
<p>&nbsp;</p>
<p>&nbsp;</p>
<blockquote>
  <blockquote>
    <blockquote>
      <blockquote>
        <blockquote>
          <blockquote>
            
                
                    <h3><em><a href="index.html">HOME</a></em></h3>
                    <p>&nbsp;</p>
                    <h3><em><a href="howItWorks.html">HOW IT WORKS</a></em></h3>
                    <p>&nbsp;</p>
                    <h3><em><a href="About.html">ABOUT US</a></em></h3>
                    <p>&nbsp;</p>
                    <h3><em><a href="Contact.html">CONTACT US</a></em></h3>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    
                  
           
</body>

</html>


<?php

echo '<h3 align="center"><a href="logout.php">Log Out</a></h3>';

?>
