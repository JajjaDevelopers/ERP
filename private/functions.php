<?php
// require_once "connlogin.php";
//function that tests for empty fields
function emptyFieldSignUp($fullname,$username,$email,$tel,$password,$passwordRepeat)
{
  if(empty($fullname)||empty($username)||empty($email)||empty($tel)||empty($password)||empty($passwordRepeat))
  {
    $result=true;
  } else
  {
    $result=false;
  }

  return $result;
}

//function that checks for validity of user name
function validUsername($username)
{
  if(!preg_match("/^[a-zA-Z0-9]*$/",$username))//makes sure username is alphanumeric
  {
    $result=true;
  } else {
    $result=false;
  }
  return $result;
}

//function that checks for validity of email address
function validEmail($email)
{
  if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $result=true;
  }else{
    $result=false;
  }

  return $result;
}

//function that checks for validity of mobile number
function validMobile($tel)
{
  if(!is_numeric($tel))
  {
    $result=true;
  }else{
    $result=false;
  }
  return $result;
}

//function that checks whether passwords match
function pwdMatch($password,$passwordRepeat){
  if($password!==$passwordRepeat){
   $result=true;
  }else{
   $result=false;
  }
  return $result;
 }

 //function that checks whether username or email already exists
 function validUsernameEmail($username,$email)
 {
  include "connlogin.php";//including in database connection details
  $query="SELECT * FROM members WHERE UserName=? OR EmailAddress=?";
  $stmt=$pdo->prepare($query);
  if(!$stmt)//checking for database connection failure;
  {
    header("location:../signup.php?error=stmtfailed");
    exit();
  }
  $stmt->bindParam(1,$username,PDO::PARAM_STR);//binding parameters
  $stmt->bindParam(2,$email,PDO::PARAM_STR);
  $stmt->execute();

  $row=$stmt->fetch(PDO::FETCH_ASSOC);

  if($row)
  {
    return $row;
  }else{
    $result=false;
    return $result;
  }

  $pdo=null;//closing database connection

 }
 
 //function that signs up user;
 function signUpUser($fullname,$username,$email,$tel,$password,$dateupload)
 {
  

 include "connlogin.php";

  $query="INSERT INTO members(FullName,UserName,EmailAddress,Telephone,UserPassword,DateSignedUp)
  VALUES(?,?,?,?,?,?)";
  $stmt=$pdo->prepare($query);
  
  if(!$stmt)
  {
    header("location:../signup.php?error=stmtfailed");
    exit();
  }

  $passwordHashed=password_hash($password,PASSWORD_DEFAULT);
  $stmt->bindParam(1,$fullname,PDO::PARAM_STR);
  $stmt->bindParam(2,$username,PDO::PARAM_STR);
  $stmt->bindParam(3,$email,PDO::PARAM_STR);
  $stmt->bindParam(4,$tel,PDO::PARAM_INT);
  $stmt->bindParam(5,$passwordHashed,PDO::PARAM_STR);
  $stmt->bindParam(6,$dateupload,PDO::PARAM_STR);
  $stmt->execute();
  $pdo=null;
  header("location:..\login.php?error=successfully");
  exit();
 }
 
 //login
 
function loginInputEmpty($username,$password){

  if(empty($username)||empty($password)){
  $result=true;
  } else{
    $result=false;
  }

  return $result;
}

function  loginUser($username,$password)
{
  $userExists=validUsernameEmail($username,$username);

  if($userExists===false)
  {
    header("location:../login.php?message=wrongdetails");
    exit();
  }

  $hashedPwd=$userExists["UserPassword"];

  $checkPwd=password_verify($password,$hashedPwd);

  if($checkPwd===false)
  {
    header("location:../login.php?message=incorrectpassword");
    exit();
  }

  else if($checkPwd===true)
  {
    session_start();

    $_SESSION["userName"]=$userExists["UserName"];
    header("location:../public/index.php");
    exit();
  }
}

?>