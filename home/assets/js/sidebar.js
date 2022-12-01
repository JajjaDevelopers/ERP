const btnOpen=document.getElementById("openbtn");
const btnClose=document.getElementById("closebtn");
const elSideBar=document.getElementById("sidebar")
const elMain=document.getElementById("main")
const elFooter=document.getElementById("footer")
console.log(elSideBar);
console.log(elMain);
btnClose.addEventListener("click",()=>{
  // alert("God is graciously Good");
  elSideBar.style.display="none";
  elMain.style.marginLeft="0";
  elFooter.style.marginLeft="0";
  btnOpen.style.display="block";
  btnClose.style.display="none";
})

btnOpen.addEventListener("click",()=>{
  // alert("God is graciously Good");
  elSideBar.style.display="block";
  elMain.style.marginLeft="300px";
  elFooter.style.marginLeft="300px";
  btnOpen.style.display="none";
  btnClose.style.display="Block";
})

