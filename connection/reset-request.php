<?php

if(isset($_POST["reset-request-submit"]))
{
  //tokens
  $selector=bin2hex(random_bytes(8)); //pin points user to database
  $token=random_bytes(32);//authenticates user

  //link to be sent to the user by email
  $url="www.jajjadev.com/forgottenpassword/create-new-password.php?selector=". $selector."&validator=".bin2hex($token);

  //expire time
  $expires=date("U") + 3600;

  
  //connect to the database
   require "../private/connlogin.php";

   $userEmail=$_POST["email"];
   $query="DELETE FROM pwdReset WHERE pwdResetEmail=?";//deleting token if exists
   $stmt=$pdo->prepare($query);
   
   if(!$stmt)
   {
     echo "There was an error";
     exit();
   } else
   {
    $stmt->bindParam(1,$userEmail,PDO::PARAM_STR);
    $stmt->execute();
   };

   $query="INSERT INTO pwdReset (pwdResetEmail,pwdResetSelector,pwdResetToken,pwdResetExpires) VALUES (?,?,?,?);";
   $stmt=$pdo->prepare($query);

   if(!$stmt)
   {
     echo "There was an error";
     exit();
   } else
   {
    $hashedToken=password_hash($token, PASSWORD_DEFAULT);
    $stmt->bindParam(1,$userEmail,PDO::PARAM_STR);
    $stmt->bindParam(2,$selector,PDO::PARAM_STR);
    $stmt->bindParam(3,$hashedToken,PDO::PARAM_STR);
    $stmt->bindParam(4,$expires,PDO::PARAM_INT);
    $stmt->execute();
   }

   $pdo=null;

   $to=$userEmail;
   $subject="Reset your password from the link below";
   $message="<p>We received a password reset request. The link to reset your password 
   is below. Please ignore the email if you did not make such a request.</p> ";
   $message.="<p> Here is your password reset link:</br>";
   $message.="<a href='.$url'>".$url."</a></p>";

   $headers="From: Jajjatech<devjajja@gmail.com>\r\n";
   $headers.="Repy-To:<devjajja@gmail.com>\r\n";
   $headers.="Content-type: text/email\r\n";

   mail($to,$subject,$message,$headers);

   header("location:../reset-password.php?reset=success");

}

else{
  header("location:../index.php");
}