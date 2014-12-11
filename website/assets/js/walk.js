

var i = 1;
var x = 800;
var width = 140;
function imageSwitchNinja() {

  if(x < 50) {
    width = width - 40;
  }

  if(x > 0) {

    if(i == 1) {
      $("#one").html("<div style='margin-left:"+ x +"px;height:58px;width:"+ width +"px;background:url(./images/ninja2.png) repeat 0 0; background-position: right'></div>");
      i = 2;
    }
    else if(i == 2) {
      $("#one").html("<div style='margin-left:"+ x +"px;height:55px;width:"+ width +"px;background:url(./images/ninja1.png) repeat 0 0; background-position: right'></div>");
      i = 1;
    }

    x -= 20;
  }
  else
    {
      $("#one").html("");
      $("#box").css('height','0px');
    }
  }



  var i2 = 1;
  var x2 = 700;
  var width2 = 80;
  function imageSwitchmob() {

    if(x2 < 50) {
      width2 = width2 - 40;
    }

    if(x2 > 0) {
      $("#one2").html("<div style='margin-top:-55px;margin-left:"+ x2 +"px;height:60px;width:"+ width2 +"px;background:url(./images/bigmob.gif) repeat 0 0; background-size: 80px 60px; background-position: right;  -moz-transform: scaleX(-1);-o-transform: scaleX(-1);-webkit-transform: scaleX(-1);transform: scaleX(-1);filter: FlipH;'></div>");
      x2 -= 20;
    }
    else
      {
        $("#one2").html("");
      }
    }

    setInterval(imageSwitchmob, 100);
    setInterval(imageSwitchNinja, 100);
