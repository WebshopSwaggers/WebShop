<html>
  <head>
    <title>test</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  </head>
  <body>
  <div id="one"></div>
  </body>
</html>

<script>



var i = 1;
var x = 500;
function imageSwitch() {

  if(x > 0)
  {
     if(i == 1) {
         $("#one").html("<div style='margin-left:"+ x +"px;height:60px;width:110px;background:url(./images/ninja2.png) repeat 0 0'></div>");
         i = 2;
     }
     else if(i == 2) {
         $("#one").html("<div style='margin-left:"+ x +"px;height:58px;width:110px;background:url(./images/ninja1.png) repeat 0 0'></div>");
         i = 1;
     }

     x -= 20;
   }
}

     setInterval(imageSwitch, 100);

</script>
