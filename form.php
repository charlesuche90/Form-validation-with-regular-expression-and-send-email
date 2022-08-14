<?php

$nameerror="";
$emailerror="";
$websiteerror="";

if(isset($_POST['submit'])) {
	
	
	if(empty($_POST["name"])){
		$nameerror="Name is Required";
	}
	else{
		$name=test_user_input($_POST["name"]);
		if(!preg_match("/^[A-Za-z. ]*$/",$name)){
			$nameerror="Use only letters";
		}
	}
			if(empty($_POST["email"])){
		$emailerror="Email is Required";
	}
	else{
		$email=test_user_input($_POST["email"]);
		if(!preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/",$email)){
			$emailerror="Insert correct email address";
		}
	}
			if(empty($_POST["website"])){
		$websiteerror="Website is Required";
	}
	else{
		$website=test_user_input($_POST["website"]);
		if(!preg_match("/(https:|ftp:)\/\/+[a-zA-Z0-9.\-_\/?\$=&\#\~`!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~`!]*/",$website)){
			$websiteerror="website address incorrect";
		}		
	}
	if(!empty($_POST["name"])&&!empty($_POST["email"])&&!empty($_POST["website"])){
if((preg_match("/^[A-Za-z. ]*$/",$name)==true)&&(preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/",$email)==true)&&(preg_match("/(https:|ftp:)\/\/+[a-zA-Z0-9.\-_\/?\$=&\#\~`!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~`!]*/",$website)==true))
	{
echo "<h2>Your Input:</h2> <br>";
echo "Name: {$_POST["name"]}";
echo "<br>";
echo "Email: {$_POST["email"]}";
echo "<br>";
echo "Name: {$_POST["gender"]}";
echo "<br>";
echo "Name: {$_POST["website"]}";
echo "<br>";
echo "Comment: {$_POST["comment"]}";


$emailTo="charlesuche90@gmail.com";
 $subject="Contact Form";
 $body=" Name : ".$_POST["name"]." Email : ".$_POST["email"].
 "  Gender : ". $_POST["gender"]."  Website of: ".$_POST["website"].
 " Comment :: ".$_POST["comment"];
 $Sender="From:mail@gmail.com";
     if (mail($emailTo, $subject, $body, $Sender)) {
                echo "Mail sent successfully!";
                    } else {
                                echo "Mail not sent!";
                    }

	}else{
		echo "input correct information";
	}
	}
	
}
function test_user_input($Data){
	return $Data;
	
}

?>



<!DOCTYPE HTML>  
<html>
<head>

</head>
<body>  

<?php

?>

<h2>Form Validation</h2>
<p><span class="">* required field</span></p>
<form method="post" action="form.php">
  Name*: <input type="text" name="name" value="">
  <?php echo $nameerror; ?><br><br>
  E-mail*: <input type="text" name="email" value="">
  <?php echo $emailerror; ?><br><br>
   Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male

  <br><br>
  Website*: <input type="text" name="website" value="">
  <?php echo $websiteerror; ?><br><br>
  Comment: <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>


</body>
</html>