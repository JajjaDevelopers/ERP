<?php
include_once("../private/database.php");//database connection details

if(isset($_POST["submit"]))//checking whether user has submited info
{ 
<<<<<<< HEAD
  session_start();
=======
>>>>>>> refs/remotes/origin/main
  //gathering user information
  $fullname=$_POST["fullname"];
  $username=$_POST["username"];
  $email=$_POST["email"];
  $tel=$_POST["tel"];
  $password=$_POST["pwd"];
  $passwordRepeat=$_POST["confpwd"];
  $dateupload=date("Y-m-d H:i:s");
<<<<<<< HEAD
  $access=$_POST["access"];

  //session variables
  $_SESSION["fname"]=$fullname;
  $_SESSION["fusername"]=$username;
  $_SESSION["email"]=$email;
  $_SESSION["tel"]=$tel;
 

=======
>>>>>>> refs/remotes/origin/main

  //error handling
  $error="";
  //empty fields
<<<<<<< HEAD
  if(emptyFieldSignUp($fullname,$username,$email,$tel,$password,$passwordRepeat,$access)!==false)
  {
    header("location:../forms/signup.php?error=emptyfield");
=======
  if(emptyFieldSignUp($fullname,$username,$email,$tel,$password,$passwordRepeat)!==false)
  {
    header("location:../signup.php?error=emptyfield");
>>>>>>> refs/remotes/origin/main
    exit();
  }

  //invalidusername
  if( validUsername($username)!==false)
  {
<<<<<<< HEAD
    header("location:../forms/signup.php?error=invalidname");
=======
    header("location:../signup.php?error=invalidname");
>>>>>>> refs/remotes/origin/main
    exit();
  }
  //password mismatch
  if(pwdMatch($password,$passwordRepeat)!==false)
  {
<<<<<<< HEAD
    header("location:../forms/signup.php?error=passwordsdontmatch");
=======
    header("location:../signup.php?error=passwordsdontmatch");
>>>>>>> refs/remotes/origin/main
    exit();
  }
 //invalid phone number
 if(validMobile($tel)!==false)
 {
<<<<<<< HEAD
  header("location:../forms/signup.php?error=incorrectnumber");
=======
  header("location:../signup.php?error=incorrectnumber");
>>>>>>> refs/remotes/origin/main
  exit();
 }
 //user and email aready in database
 if(validUsernameEmail($username,$email)!==false)
 {
<<<<<<< HEAD
  header("location:../forms/signup.php?error=userexists");
=======
  header("location:../signup.php?error=userexists");
>>>>>>> refs/remotes/origin/main
  exit();
 }
 //invalid email
 if( validEmail($email)!==false)
 {
<<<<<<< HEAD
  header("location:../forms/signup.php?error=invalidemail");
  exit();
 }
  signUpUser($fullname,$username,$email,$tel,$password,$access);
=======
  header("location:../signup.php?error=invalidemail");
  exit();
 }
  signUpUser($fullname,$username,$email,$tel,$password,$dateupload);
>>>>>>> refs/remotes/origin/main
}
?>