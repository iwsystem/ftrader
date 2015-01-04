<?php
session_start();
	include("pdo-connect.php");
	// Define $myusername and $mypassword 
	$username=strtolower($_POST['username']);
	$password=strtolower($_POST['password']);
	try {
		// We Will prepare SQL Query
		$str_query = "	SELECT user_id, firstname, lastname, status
	    				FROM tbl_user
	    				WHERE username = :username 
	    				AND password = :password";
	    $str_stmt = $r_Db->prepare($str_query);
		// bind paramenters, Named paramenters alaways start with colon(:)
	    $str_stmt->bindParam(':username', $username);
	    $str_stmt->bindParam(':password', $password);
		// For Executing prepared statement we will use below function
	    $str_stmt->execute();
		// Count no. of records	
	    $count = $str_stmt->rowCount();
		//just fetch. only gets one row. Use  fatch(PDO::FETCH_ASSOC) for making the result an associative array
		$row  = $str_stmt -> fetch();
		// User Redirect Conditions will go here
		if($count==1) {
			$_SESSION["user_id"]=$row[0];
			$_SESSION["firstname"]=$row[1];
			$_SESSION["lastname"]=$row[2];
			$_SESSION["status"]=$row[3];
			$_SESSION["logged_in_user"]=$username;
			
	/*		//	If there is a different page for admin user, this could be used to redirect to the correct page
			if($row[0] == 0)  {
			header( "location: ../Adminhome.php"); 	
			}   else    { 
			header( "location: ../home.php");  
			}*/

			//	Redirect to the portal home page
			header("location:../home.php"); 
		} else {
			echo "Invalid Username or Password, if this continues, contact administrator<br>";
			echo "You will be returned to login page in 5 seconds.<br> Redirecting ...";
			header("refresh:10; url=../index.php");
		}
	}	catch(PDOException $e)	{
		echo "Connection failed: " . $e->getMessage();
	}
	// Closing MySQL database connection   
    $r_Db = null;
?>