<?php

$userName = "Admin";
$passWord = "Password";
setlocale(LC_ALL, "sv_SE", "sv_SE.utf-8", "sv", "swedish");
$errorMassage = "";
$keepme = "";
session_start();
	
if($_POST){
	
	$user = $_POST["userID"];
	$pass = $_POST["passID"];
	$autologin = isset($_POST["autologinID"]);
	$loginMessage = "";
	

	
		if($user == $userName && $pass == $passWord){
			
			$_SESSION['mySess'] = true;
			
			$loginMassage =  "<p>inloggning lyckades</p>";
		}
		
		else if($user == ''){
			
			$errorMassage = "<p>Användarnamn saknas</p>";
		}
		
		else if($pass == ''){
			
			$errorMassage = "<p>Lösenord saknas</p>";
		}
		
		else{
				
			$errorMassage = "<p> Användarnamn eller Lösenord är felaktigt</p>";
			
		}
		
		if(!isset($_SESSION['mySess'])){
				
			$_SESSION['mySess'] = false;
			
		}
}

	if(isset($_SESSION['mySess']) && $_SESSION['mySess']){
		
		if(isset($_POST["autologinID"])){
				
				$keepme = "<p>Dina uppgifter är sparade</p>";
		}
		
		echo "
		<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'> 
        <html xmlns='http://www.w3.org/1999/xhtml'> 
		<head> 
	            <title>Laboration. Inloggad</title> 
	            <meta http-equiv='content-type' content='text/html; charset=utf-8' /> 
	             
	         </head> 
	         <body>
	         $loginMassage
	         $keepme
	           <h1>Laboration 1 ms223eq</h1>
				<h2>Admin är inloggad</h2>
				 	 <p><a href='logout.php'>Logga ut</a></p>
				 <p>" . strftime('%A, den %d %B år %Y. Klockan är: [%H:%M:%S] ') . " </p>
	         </body>
	        </html>
		";
	}
	else{
		
		
			
		$nameValue = null;
		
		if(isset($_POST['userID'])){
				
			$nameValue = $_POST['userID'];
		}
		
		$outMassage = "";
		
		if(isset($_SESSION['outMessage'])){
			
			$outMassage = $_SESSION['outMessage'];
			
		}
		
		unset($_SESSION['outMessage']);
		
		echo"

        <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'> 
        <html xmlns='http://www.w3.org/1999/xhtml'> 
          <head> 
             <title>Laboration 1. Inte inloggad</title> 
             <meta http-equiv='content-type' content='text/html; charset=utf-8' /> 
             
          </head> 
          
          <body>
            <h1>Labration 1 ms223eq</h1><h2>Ej Inloggad</h2>
			<p id='loggout'> </p>	  	
			 $errorMassage
			 $outMassage
			<form action='?login' method='post' enctype='multipart/form-data'>
				<fieldset>
					<legend>Login - Skriv in användarnamn och lösenord</legend>
					<label for='userID' >Användarnamn :</label>
					<input type='text' size='20' name='userID' id='userID' value= '". $nameValue ."'/>
					<label for='passID' >Lösenord  :</label>
					<input type='password' size='20' name='passID' id='passID' value='' />
					<label for='autologinID' >Håll mig inloggad  :</label>
					<input type='checkbox' name='autologinID' id='autologinID' />
					<input type='submit' name=''  value='Logga in' />
				</fieldset>
			</form>
				 <p> ".strftime('%A, den %d %B år %Y. Klockan är: [%H:%M:%S] ')." </p>
          </body>
        </html>
    ";
}
	
?>