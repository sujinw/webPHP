{{include file='head.tpl'}}
        <div class="id_box user_bg">
            <div class="log-on">
                <a href="javascript:;" onclick="logout()">注销</a>
            </div>
            <img src="http://passport.mydrivers.com/comments/getusertouxiang.aspx?uid=1137582&size=medium" width="120" height="120"/>
            <span class="name">{{$result[0]['user_nickname']}}</span>

            <div class="name_edit" id="div_about">
                <span class="name_sm"></span>
                <span class="dji">用户等级：{{$result[0]['user_level']}}</span>
            </div>

            <div class="name_edit1" id="div_aboutedit" style="display:none;">
                <span class="name_sm1">
                    <input name="" type="text" value="" id="txtAbout" class="edit_qm" />
                </span>
                <span id="span_info" class="editqm">{{$result[0]['user_qm']}}</span>
                <span class="really">
                    <input type="submit" id="btneditabout" value="确定" class="button_style3" />
                </span>
            </div>

        </div>

        <div class="id_jf">
            <li>
                积分
                <span>10</span>
            </li>
            <li>
                鲜花
                <span>0</span>
            </li>
            <li>
                鸡蛋
                <span>0</span>
            </li>
        </div>
        <div class="userlist">
            <li class="user_bg">
                <a href="myarticle.aspx" class="t1">我的文章</a>
            </li>
            <li class="user_bg" id="mycomments">
                <a href="mycomments.aspx" class="t2">我的评论</a>
            </li>
            <li class="user_bg">
                <a href="myfav.aspx" class="t3">我的收藏</a>
            </li>
            <li class="user_bg">
                <a href="#" class="t4">我的订阅</a>
            </li>
        </div>
{{include file='foot.tpl'}}

</body>
</html>