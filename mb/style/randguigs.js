/*沃のQQ:790431300*/
var sezhi=localStorage.sezhi;
var rand=Math.round(Math.random()*7000);if(window.DeviceMotionEvent){var speed = 39;var x = y = z = lastX = lastY = lastZ = 0;window.addEventListener('devicemotion',function(){var acceleration =event.accelerationIncludingGravity;x = acceleration.x;y = acceleration.y;if(Math.abs(x-lastX) > speed || Math.abs(y-lastY) > speed){if(sezhi=="随机故事"){setTimeout("tishi()","0");setTimeout("javascript:location.href='../article/guigushi.php?id='+rand","4000");}if(sezhi=="回首页"){setTimeout("javascript:location.href='../?id='+rand","4000");}if(sezhi=="打开设置"){setTimeout("javascript:location.href='../sezhi.php'","4000");}if(sezhi=="故事栏目"){setTimeout("javascript:location.href='../article/classify.php'","400");}}lastX = x;astY = y;},false);}function tishi(){document.getElementById('tishi').style.display='block';}function xiaoxi(){document.getElementById('xiaoxi').style.display='none';}