{{include file='header.tpl'}}
<!-- content -->
 <div id="content" class="white">
            <h1><img src="templates/img/icons/posts.png" alt="" /> 网站全局设置</h1>

<div class="bloc">
    <div class="content">
        <form name="websitesitting" action="index.php?action=DoAction&type=websitesitting" method="post">
        	<div class="input long">
            <label for="input1">网站标题</label>
            <input type="text" name="webtitle" id="input1" placeholder="{{$webresult['webtitle']}}" />
            <img src='templates/img/icons/menu/dark/info.png' alt="" />一般不超过80个字符
        </div>
        <div class="input long">
            <label for="input1">网站logo</label>
            <input type="text" name="weblogo" id="input2"  placeholder="{{$webresult['weblogo']}}"/>
            <img src='templates/img/icons/menu/dark/info.png' alt="" />一般不超过80个字符
        </div>
        <div class="input long">
            <label for="input1">SEO关键字</label>
            <input type="text" name="webseo" id="input3"  placeholder="{{$webresult['webseo']}}"/>
            <img src='templates/img/icons/menu/dark/info.png' alt="" />一般不超过100个字符，关键词用英文逗号隔开
        </div>
        <div class="input long">
            <label for="input1">SEO描述</label>
            <input type="text" name="webdes" id="input4"  placeholder="{{$webresult['webdes']}}"/>
            <img src='templates/img/icons/menu/dark/info.png' alt="" />一般不超过200个字符
        </div>
        <div class="input long">
            <label for="input1">版权信息</label>
            <textarea name="webcopyright" id="textarea1" rows="7" cols="4" placeholder="{{$webresult['webcopyright']}}"></textarea>
        </div>
        <div class="submit long" style="height:35px">
        	<input type="submit" value="提交保存" style="height: 100%">
        </div>
        
        </form>
    </div>