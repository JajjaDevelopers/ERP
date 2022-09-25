<?php

if(isset($_POST["reset-password-submit"]))
{
  $selector=$_POST["selector"];
  $validator=$_POST["validator"];
  $pwd=$_POST["pwd"];
  $pwdRepeat=$_POST["pwdRepeat"];

  if(empty($pwd) || empty($pwdRepeat))
  {
    header("location:../create-new-password.php?newpwd=empty");
    exit();
  }
  else if($pwd !== $pwdRepeat)
  {
    header("location:../create-new-password.php?newpwd=pwddonotmatch");
    exit();
  }

  $currentDate= date("U");

  require "../private/connlogin.php";
  $query="SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >=?;";

  $stmt=$pdo->prepare($query);

  if(!$stmt)
  {
    echo "There was an error";
    exit();
  } else
  {
   
   $stmt->bindParam(1,$selector,PDO::PARAM_STR);
   $stmt->bindParam(2,$currentDate,PDO::PARAM_INT);
   $stmt->execute();

   $row=$stmt->fetch(PDO::FETCH_ASSOC);
   if(!$row)
   {
    echo "An expected error occured and you need to resubmit your request";
    exit();
   } else {

    $tokenBin=hex2bin($validator);
    $tokenCheck=password_verify($tokenBin,$row["pwdResetToken"]);

    if($tokenCheck==false)
    {
      echo "An expected error occured and you need to resubmit your request";
      exit();

    } elseif($tokenBin==true)
    {
      $tokenEmail=$row["pwdResetEmail"];

      $query="SELECT * FROM members WHERE EmailAddress=?;";
      $stmt=$pdo->prepare($query);

      if(!$stmt)
      {
        echo "There was an error";
        exit();
      } else
      {
        $stmt->bindParam(1,$tokenEmail,PDO::PARAM_STR);
        $stmt->execute();

        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        if(!$row)
        {
         echo "An expected error ";
         exit();
        } else {

          $query="UPDATE users SET usersPwd=? WHERE usersEmail=?;";
          $stmt=$pdo->prepare($query);

          if(!$stmt)
          {
            echo "There was an error";
            exit();
          } else
          {
            $hashedNewPwd=password_hash($pwd,PASSWORD_DEFAULT);
          
            $stmt->bindParam(1,$hashedNewPwd,PDO::PARAM_STR);
            $stmt->bindParam(2,$tokenEmail,PDO::PARAM_STR);
            $stmt->execute();

            $query="DELETE FROM pwdReset WHERE pwdResetEmail=?;";
            $stmt->$pdo->prepare($query);
  
            if(!$stmt)
            {
              echo "There was an error";
              exit();
            } else
            {
        
              $stmt->bindParam(1,$tokenEmail,PDO::PARAM_STR);
              $stmt->execute();
              header("Location:../signup.php?newpwd=newpasswordupdated");
              exit();
            }

            
          }

    
        }
      }
    }

   }

  }


} else{
  header("Location:../index.php");
}
?>