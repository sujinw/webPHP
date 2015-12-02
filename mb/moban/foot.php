<div class="footer" style="background:#335877;"><footer><div class="banben">
<?php
if($name){
echo '<a href="/name">地盘</a><a href="/ly" class="a">反馈</a><a href="ft.php">发布</a>';
}else{
?><a href="/zc/login.php">登录</a><a href="/ly" class="a">反馈</a><a href="/zc/reg.php">注册</a>
<?php } ?></div><p class="red"><?php
$TGDZ=array(array ('甲', '乙', '丙', '丁', '戊', '己', '庚', '辛', '壬', '癸' ),array ('子', '丑', '寅', '卯', '辰', '巳', '午', '未', '申', '酉', '戌', '亥' ));
$Year=date('Y');
$Year_JiSuan=$Year - 1900 + 36;
$TianGanDiZhi=$TGDZ[0][$Year_JiSuan%10].$TGDZ[1][$Year_JiSuan%12];
echo "{$Year}-{$TianGanDiZhi}年";
?>鬼故事在线交流网站</p><p>Copyright ©沃の-http://guigs.cn
</p></footer></div><div id="top" onclick="scrollTo(0,0)" style="display: block; "><img src="<?php echo $hosturl; ?>/image/top.png" alt="鬼故事顶部"></div>