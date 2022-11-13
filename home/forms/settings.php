<?php
include "header.php";
?>
<div class="container">
<div class="card">
  <div class="card-header">
    <h1>Settings</h1>
    <p class="text-warning">
    <?php
      include "../alerts/settingerrors.php";
    ?>
    </p>
  </div>
  <div class="card-body">
    <ol>
      <li><a href="#" id="passwordchange" class="link">Change Password</a></li>
      <li><a href="#" id="usernamechange" class="link">Change username</a></li>
    </ol>
    <div id="displayform" class="justify-content-center text-success" style="border:none;">
    </div>
  </div>
</div>
<script>
  let file;
  // var pwdChange=document.getElementById("pwdchange");
  // var userName=document.getElementById("usernamechange");
  var display=document.getElementById("displayform");
  var link=document.querySelectorAll(".link");
  let linkId;
  link.forEach(linkClick=>linkClick.addEventListener("click",(event)=>{
    // alert("God is amazingly good!");
    linkId=event.target.id;
    console.log(linkId);
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
      display.innerHTML=data;
    }
    request.send();
  }));
</script>
</div>
<?php
include "footer.php";
?>