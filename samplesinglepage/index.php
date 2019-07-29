<!doctype html>
<html>
<head>
<title>Animation Test</title>

<style url="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
<style>
body, h1, h2, h3, p {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
  color: #fff;
}

body {
  background-color:#000;
}

h1 {
  position: relative;
  margin-top: 10px;
  font-size: 36px;
  font-weight: normal;
}

h2 {
  position: relative;
  font-size: 22px;
  font-weight: normal;
  color: #cfcfcf;
}

#demoWrapper {
  width: 600px;
  height: 350px;
  -webkit-font-smoothing: antialiased;
  color: black;
  margin:auto;
}
#bg {
  position: absolute;
  width: 800px;
  height: 350px;
}
#content {
  padding-left: 15px;
  visibility: hidden;
}
#info {
  margin-top: 20px;
}
#feature {
  position: relative;
  float: left;
}
#description {
  position: relative;
  float: left;
  margin-left: 20px;
  width: 290px;
  font-size: 16px;
  line-height: 24px;
}
#nav {
text-align:right;
  margin:20px 10px;
}
#nav img {
  text-align:center;
  position: relative;
  margin-right: 20px;
 
}
button {
  padding: 10px;
  margin-top: 10px;
}

button:nth-child(1){
  margin-left:10px;
}

#slider{
  width: 580px;
  margin:10px auto;
  
}

.ui-widget-content {
  background-color:rgba(255, 255, 255, 0.2);
}
#cf {
  position:relative;
  height:281px;
  width:450px;
  margin:0 auto;
}

#cf img {
  position:absolute;
  left:0;
  -webkit-transition: opacity 1s ease-in-out;
  -moz-transition: opacity 1s ease-in-out;
  -o-transition: opacity 1s ease-in-out;
  transition: opacity 1s ease-in-out;
}

#cf img.top:hover {
  opacity:0;
}
</style>

<head>
<body>
<h2 class="title">TweenMax.to() Basic Usage</h2>
<div class="box orange">Orange</div>
<div class="box grey">Gray</div>
<div class="box green">Green</div>
<div id="demoWrapper">
  <div id="bg"></div>
    <div id="content">
      <h1>Freakishly Robust</h1>
      <h2>With features that makes other engines look like cheap toys</h2>
      <div id="info"><img src="//greensock.com/wp-content/uploads/custom/codepen/feature_robust.png" width="240" height="151" id="feature">
        <p id="description">Animate colors, beziers, css properties, arrays, scrolls and lots more. Round values, smoothly reverse() on the fly, use relative values, employ virtually any easing equation, and manage conflicting tweens like a pro. GSAP does all this and much more with ease.</p>
      </div>
      
  </div>
  <div style="clear:both"></div>
  <div id="nav"> <img src="//greensock.com/wp-content/uploads/custom/codepen/icon_robust.png" width="83" height="59"><img src="//greensock.com/wp-content/uploads/custom/codepen/icon_overwrite.png" width="43" height="59"><img src="//greensock.com/wp-content/uploads/custom/codepen/icon_compatible.png" width="73" height="59"><img src="//greensock.com/wp-content/uploads/custom/codepen/icon_support.png" width="83" height="59"><img src="//greensock.com/wp-content/uploads/custom/codepen/icon_plugin.png" width="76" height="59">
      </div>
  <div>
  
  <div id="cf">
  <img class="bottom" src="//greensock.com/wp-content/uploads/custom/codepen/feature_robust.png" />
  <img class="top" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/logo-man.svg" />
</div>


  <button id="play">play()</button>
  <button id="pause">pause()</button>
  <button id="reverse">reverse()</button>
  <button id="resume">resume()</button>
  <button id="stagger">play("stagger")</button>
  <button id="restart">restart</button>
</div>
<div id="sliderWrapper">
<div id="slider"></div>
</div>
</div>


<img id="logo" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/logo-man.svg"/>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="//s3-us-west-2.amazonaws.com/s.cdpn.io/16327/jquery.ui.touch-punch.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js"></script>
<script>
TweenMax.to("h2.title", 1, {opacity:0.3});
TweenMax.to(".box", 3, {x:300});

TweenMax.from("#logo", 3, {x:300, opacity:0, scale:0.5});

TweenLite.to(graph, 2.5, { ease: SteppedEase.config(12), y: -500 });

var head = $("h1"),
      content = $("#content"),
    subhead = $("h2"),
    feature = $("#feature"),
    description = $("#description"),
    icons = $("#nav img");
 
TweenLite.set(content, {visibility:"visible"})

//instantiate a TimelineLite    
var tl = new TimelineLite();

//add a from() tween at the beginning of the timline
tl.from(head, 0.5, {left:100, opacity:0});

//add another tween immediately after
tl.from(subhead, 0.5, {left:-100, opacity:0});

//use position parameter "+=0.5" to schedule next tween 0.5 seconds after previous tweens end
tl.from(feature, 0.5, {scale:.5, autoAlpha:0}, "+=0.5");

//use position parameter "-=0.5" to schedule next tween 0.25 seconds before previous tweens end.
//great for overlapping
tl.from(description, 0.5, {left:100, autoAlpha:0}, "-=0.25");

//add a label 0.5 seconds later to mark the placement of the next tween
tl.add("stagger", "+=0.5")
//to jump to this label use: tl.play("stagger");

//stagger the animation of all icons with 0.1s between each tween's start time
//this tween is added
tl.staggerFrom(icons, 0.2, {scale:0, autoAlpha:0}, 0.1, "stagger");

/* --- Control playback methods --- */



$("#play").click(function() {
        tl.play();
});
        
$("#pause").click(function() {
        tl.pause();
});
        
$("#reverse").click(function() {
        tl.reverse();
});
        
$("#resume").click(function() {
        tl.resume();    
});

$("#stagger").click(function() {
        tl.play("stagger"); 
});
        
$("#restart").click(function() {
        tl.restart();
});

//when the timeline updates, call the updateSlider function
tl.eventCallback("onUpdate", updateSlider);
    
$("#slider").slider({
  range: false,
  min: 0,
  max: 100,
  step:.1,
  slide: function ( event, ui ) {
    tl.pause();
    //adjust the timeline's progress() based on slider value
    tl.progress( ui.value/100 );
    }
}); 
        
function updateSlider() {
  $("#slider").slider("value", tl.progress() *100);
}   

tl.progress(1)

</script>
</body>

</html>