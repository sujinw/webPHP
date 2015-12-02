{{include file='header.tpl'}}
<div id="content" class="white">
<h1>
	<img src="templates/img/icons/posts.png" alt="" />
	分类列表
</h1>
<div class="bloc">
	<div class="title"></div>
	<div class="content">
		<table>
			<thead>
				<tr>
					<th>
						<input type="checkbox" class="checkall"/>
					</th>
					<th>分类ID</th>
					<th>名称</th>
					<th>分类图标</th>
					<th>创建时间</th>
					<th><img src="templates/img/th-comment.png" alt="" />Actions</th>
				</tr>
			</thead>
			<tbody>
			{{foreach from=$data key=myid item=i}}
				<tr>
					<td>
						<input type="checkbox" />
					</td>
					<td>
						{{$i.id}}
					</td>
					<td>
						{{$i.name}}
					</td>
					<td>
						{{$i.fenlei_img}}
					</td>
					<td>{{$i.time|date_format:"%Y-%m-%d"}}</td>
					<td class="actions">
						<a href="#" title="Edit this content">
							<img src="templates/img/icons/actions/edit.png" alt="" />
						</a>
						<a href="#" title="Delete this content">
							<img src="templates/img/icons/actions/delete.png" alt="" />
						</a>
					</td>
				</tr>
				{{/foreach}}
				
			</tbody>
		</table>
		<div class="left input">
			<select name="action" id="tableaction">
				<option value="">Action</option>
				<option value="delete">Delete</option>
			</select>
		</div>
		<div class="pagination">
			<a href="#" class="prev">«</a>
			<a id="page1" href="" class=""></a>
			<a id="page2" href="" ></a>
			...
			<a id="pageLast1" href=""></a>
			<a id="pageLast2" href=""></a>
			<a href="#" class="next">»</a>
		</div>
	</div>
</div>
<script type="text/javascript">
// index.php?action=UserList&page=1
$(window).ready(function(){
    var count = {{$count}};
    var page = {{$page}}
	var pageBtn = $('.pagination>a');

	if((page+1) >= (count-1)){
		page = page-1;
	}
 
    //console.log(pageBtn)
    $('#page1').attr('href','index.php?action=fenleiList&page='+ parseInt(page)).text(parseInt(page));
    $('#page2').attr('href','index.php?action=fenleiList&page='+ parseInt(page+1)).text(parseInt(page)+1);
    if(count > 4){
    	$('#pageLast1').attr('href','index.php?action=fenleiList&page='+ parseInt(count-1)).text(parseInt(count)-1);
   		$('#pageLast2').attr('href','index.php?action=fenleiList&page=' + parseInt(count)).text(parseInt(count));
    }else{
    	$('#pageLast1').remove();
    	$('#pageLast2').remove();
    }

    if (page==1) {
    	$("#page1").addClass('current')
    }else{
    	$("#page2").addClass('current')
    };

    console.log($(pageBtn[page]))
})
     


</script>