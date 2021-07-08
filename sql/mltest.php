<!DOCTYPE html>
<html>
<body>

<p>Click the button to create a P element with some text.</p>

<button onclick="myFunction()">Try it</button>

<script>
var i=1;
function myFunction() {
  var para = document.createElement("input");
  var para11 = document.createElement("input");
  var para1 = document.createElement("P");
   var para2 = document.createElement("P");
   var hr= document.createElement("hr");

  para.type="text";
  para.setAttribute("name", i);
 para.setAttribute("placeholder", "type");
 
 
 para11.type="text";
  para11.setAttribute("name", i+1);
 para11.setAttribute("placeholder", "type");
 
  para1.innerText = "Question";
   para2.innerText = "Answer";
    document.body.appendChild(para1);
  document.body.appendChild(para);
   document.body.appendChild(para2);
document.body.appendChild(para11);
document.body.appendChild(hr);

}
</script>

</body>
</html>
