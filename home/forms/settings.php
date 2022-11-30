<?php $pageTitle="Settings"; ?>
<?php include "header.php";?>
<div class="container" style="background-color:green; width:80%; border:1px solid green; border-radius:15px;">
  <div class="row">
    <div class="col-6">
      <div class="card mt-4">
      <div class="card-header">
        <h1>Settings</h1>
        <div class="container" style="color:red" id="errors">
        <?php
          include "../alerts/settingerrors.php";
        ?>
        </div>
      </div>
      <div class="card-body" id="settingsDiv">
        <ol style="list-style-type: none;">
          <li><a href="#" id="passwordchange" class="link">Change Password</a></li>
          <li><a href="#" id="usernamechange" class="link">Change username</a></li>
        </ol>
        <!-- <div id="displayform" class="justify-content-center text-success" style="border:none;">
        </div> -->
      </div>
    </div>

    </div>
  </div>
  <div class="row">
    <div class="col-6" id="passwordform" class="justify-content-center text-success">

    </div>
    <div class="col-6" id="changenameform" class="justify-content-center text-success">

    </div>
  </div>
</div>

<script>
  let file;
  var divEl=document.getElementById("settingsDiv").getElementsByTagName("ol")[0];
  var elLink1=divEl.getElementsByTagName("li")[0].getElementsByTagName("a")[0];
  var elLink2=divEl.getElementsByTagName("li")[1].getElementsByTagName("a")[0];
  // console.log(elLink2);
  // var userName=document.getElementById("usernamechange");
  var passwordForm=document.getElementById("passwordform");
  var changenameForm=document.getElementById("changenameform");
  var link=document.querySelectorAll(".link");
  let linkId;
  link.forEach(linkClick=>linkClick.addEventListener("click",(event)=>{
    // alert("God is amazingly good!");
    linkId=event.target.id;
    // console.log(linkId);
    if(linkId=="passwordchange")
    {
      file="passwordchange";
    }else{
      file="usernamechange";
    };

      var request=new XMLHttpRequest();
      request.open("GET",file+".php",true);
      request.onload=()=>{
      var data=request.responseText;
      if(linkId=="passwordchange")
      {
        passwordForm.innerHTML=data;
        elLink2.style.display="none";

      }else{
        changenameForm.innerHTML=data;
        elLink1.style.display="none";
      }
    }
    request.send();
  }));

  var divElement=document.getElementById("errors");
  //function to erase message after sometime
  function messageErase()
  {
    divElement.style.display="none";
  }
  setTimeout(messageErase,8000);//erases message after 8 seconds
</script>
<?php include "footer.php";?>