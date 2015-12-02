{{include file='header.tpl'}}   
  {{if $listData|@count eq 0}}<div class="txtimg overflow clearfix area mg-auto">     
	<a href="news-show.html">
	<img src="templates/images/danshinimeiyou.jpg" title="">
	<span class="txtimg-title">哎呀！没有文章呢！</span>
	</a>
	</div> 
  {{/if}}
   <div class="title2 clearfix area mg-auto">
      <h2>文章列表</h2>
   </div>
   <div class="img-list-wrap clearfix area overflow mg-auto">
        <ul class="clearfix">
        {{foreach from=$listData key=k item=list }}
            <li>
                <a href="index.php?action=view&type=article&articleid={{$list.id}}">
                    <img src="{{$list.fm_img}}" alt="" />
                    <div class="imglist-title clearfix">
                        <span class="imglist-title-inner">{{$list.title}}</span>
                    </div>
                </a>
            </li>
        {{/foreach}}
        </ul>
    </div>
   <div id="addMore"><a href="{{$nextPage}}">下一页</a></div>
    <!--底部-->
  <div style="margin-top:15px;display: block;border-bottom: solid 1px #FFF;border-top: solid 1px #cacaca;text-indent: -9999px;height: 0px;">line</div>
  {{include file='foot.tpl'}}
 <script type="text/javascript">

 </script>

</body> 
</html>