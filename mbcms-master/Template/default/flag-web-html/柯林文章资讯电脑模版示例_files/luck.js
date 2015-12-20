/*
 @ name：luck弹层组件-pc版
 @ author：前端老徐
 @ time：2015/5/20
 @ e-mail：442413729@qq.com
 @ weibo:http://weibo.com/qdlaoxu
 @ address:http://www.loveqiao.com/
*/
;!function(a){
	"use strict";
	var skin={
			url:'luck/skin/',//皮肤路径
			name:'default'   //皮肤名称
		},
		c=document,count=0,delay=null;
	//定义主类
	function Class(opt){
		this.config=opt;
	}
	Class.pt = Class.prototype;
	Class.pt.windowSize=true;
	Class.pt.createElement=function(tag,cla,id){
		var obj=c.createElement(tag);
			id?obj.id=id:'';
			cla?obj.className=cla:'';
		return obj;
	}
	Class.pt.view=function() {
		var opt=this.config,luck_layer,luck_shade,luck_box,luck_title,luck_close,luck_con,luck_btn,luck_resize
		
		//主框架
		luck_layer = this.createElement("div",'luck-layer');
		luck_shade = this.createElement("div",'luck-shade');
		if(opt.shadeClose){
			luck_shade.onclick=function(){
				luck.close(luck_layer);	
			}	
		}
		luck_box   = this.createElement("div",'luck-box','luck-box-'+count);
		if(opt.width){
			luck_box.style.width=opt.width;	
		}
		if(opt.height){
			luck_box.style.height=opt.height;	
		}
		if(opt.style){
			luck_box.setAttribute('style',config.style)	
		}
		
		//标题
		if(opt.title){
			luck_title = this.createElement("div",'luck-title');
			luck_title.innerHTML='<span>'+opt.title+'</span>';
			if(opt.move==false){
				luck_title.setAttribute('move','false');
				$(luck_title).addClass('noMove');
			}
			luck_box.appendChild(luck_title);
		}
		
		//关闭按钮
		if(opt.cloBtn!=false){
			luck_close = this.createElement("div",'luck-close luck-ico');
			luck_close.onclick=function(){a.luck.close(luck_layer)};
			luck_box.appendChild(luck_close);
		}
		
		//最大化切换
		if(opt.resize){
			var _this=this;
			luck_resize = this.createElement("div",'luck-resize luck-ico');
			luck_resize.onclick=function(){
				_this.resize.call(_this,luck_layer)	
			};	
			luck_box.appendChild(luck_resize);
		}
		
		//内容
		luck_con   = this.createElement("div",'luck-con');
		luck_box.appendChild(luck_con);
		if(opt.content){
			luck_con.innerHTML=opt.content;
		}else{
			luck_con.innerHTML='<div style="line-height:40px; padding-left:20px;"><a href="http://luck.loveqiao.com/">Luck弹层组件</a></div>';
		}
		
		//按钮
		luck_btn=this.createElement("div",'luck-btn');
		if(typeof opt.yes=='function'){
			var luck_yes=this.createElement("button",'luck-yes');
			if(opt.btn&&opt.btn[0]){
				luck_yes.innerHTML=opt.btn[0];
			}else{
				luck_yes.innerHTML='确定';
			}
			luck_yes.onclick=function(){
				opt.yes(luck_layer);
				luck.close(luck_layer);
			}
			luck_btn.appendChild(luck_yes);
		}
		if(typeof opt.no=='function'){
			var luck_no=this.createElement("button",'luck-no');
			if(opt.btn&&opt.btn[1]){
				luck_no.innerHTML=opt.btn[1];
			}else{
				luck_no.innerHTML='取消';
			}
			luck_no.onclick=function(){
				opt.no(luck_layer);
				a.luck.close(luck_layer)
			}
			luck_btn.appendChild(luck_no);
		}
		if(typeof opt.yes=='function'||typeof opt.no=='function'){
			luck_box.appendChild(luck_btn);
		}
		
		//组合
		luck_layer.appendChild(luck_shade);
		luck_layer.appendChild(luck_box);
		return luck_layer;
	}
	Class.pt.R=function(id){
		return document.getElementById(id)	
	}
	//定位坐标
	Class.pt.offset=function(n){
		var w1=$(window).width(),
			h1=$(window).height(),
		 	obj=this.R('luck-box-'+n),
			w2=obj.offsetWidth,
			h2=obj.offsetHeight;
		obj.style.left=w1/2-w2/2+'px';
		obj.style.top=h1/2-h2/2+'px';
		$(obj).addClass('show');
	}
	//拖拽层
	Class.pt.move = function(n){
		var layer=$("#luck-box-"+n);
		var moveobj=layer.children('.luck-title');
		if(moveobj.attr('move')!='false'){
			var _move=false;//移动标记
			var _x,_y;//鼠标离控件左上角的相对位置
			moveobj.mousedown(function(e){
				_move=true;
				_x=e.pageX-parseInt(layer.css("left"));
				_y=e.pageY-parseInt(layer.css("top"));
				layer.addClass('move')
			});
			$(document).mousemove(function(e){
				if(_move){
					var x=e.pageX-_x,//移动时根据鼠标位置计算控件左上角的绝对位置
						y=e.pageY-_y,
						setRig = $(window).width()-layer.outerWidth(),
						setTop = $(window).height()-layer.outerHeight();
					//控制层不被拖到窗体外
					(x<0)&&(x=0);
					(y<0)&&(y=0);
					(x>setRig)&&(x=setRig);
					(y>setTop)&&(y=setTop);
					//console.log(layer.outerHeight())
					layer.css({top:y,left:x});//控件新位置
				}
			}).mouseup(function(){
				_move=false;
				layer.removeClass('move')
			});
		}
	}
	Class.pt.resize=function(o){
		var obj=$(o),flag=typeof this.config.resize=='function';
		if(this.windowSize){
			$('html,body').addClass('hideScroll');
			obj.addClass('luck-full');
			this.windowSize=false;
			if(flag){
				this.config.resize(obj,'big')	
			}
		}else{
			$('html,body').removeClass('hideScroll')
			obj.removeClass('luck-full');
			this.windowSize=true;
			if(flag){
				this.config.resize(obj,'small')	
			}
		}
	}
	
    a.luck = {
        open:function(opt) {
			var luckCla=new Class(opt);
			var o=luckCla.view();
            c.body.appendChild(o);
			luckCla.offset(count);//居中定位
			luckCla.move(count);//绑定拖动事件
            if (opt.time) {//定时关闭
                setTimeout(function() {
                    a.luck.close(o);
                },opt.time);
            }
			count++
			return o
        },
		alert:function(tit,con,ico){
			a.luck.open({
				title:tit,
				content:'<span class="luck-dialog luck-ico-'+(ico?ico:0)+'"><i class="luck-ico"></i>'+con+'</span>',
				//cloBtn:false,
				yes:function(obj){}
			})	
		},
		confirm:function(tit,con,calback,btnTxt){
			a.luck.open({
				title:tit,
				content:'<span class="luck-dialog luck-ico-3"><i class="luck-ico"></i>'+con+'</span>',
				//cloBtn:false,
				btn:btnTxt,
				yes:function(obj){
					if(typeof calback=='function'){
						calback(true)
					}
				},
				no:function(obj){
					if(typeof calback=='function'){
						calback(false)
					}
				}
			})
		},
		prompt:function(tit,con,calback){
			a.luck.open({
				title:tit,
				content:'<textarea class="luck-prompt" placeholder="'+con+'"></textarea>',
				//cloBtn:false,
				yes:function(obj){
					if(typeof calback=='function'){
						calback($(obj).find('textarea').val())
					}
				},
				no:function(obj){
					if(typeof calback=='function'){
						calback(false)	
					}
				}
			})
		},
		iframe:function(tit,url,w,h){
			a.luck.open({
				title:tit,
				content:'<iframe width="'+w+'" height="'+h+'" style="display:block" src="'+url+'" frameborder="0"></iframe>'
			})
		},
        close:function(o) {
			try{
				if(o){
					c.body.removeChild(o);
				}else{
					$('.luck-layer').remove();	
				}
			}catch(e){}
        }
    };
	
	//模块加载器	
	function use(module, callback, charset){
		var i = 0, head = document.getElementsByTagName('head')[0];
		var module = module.replace(/\s/g, '');
		var iscss = /\.css$/.test(module);
		var node = document.createElement(iscss ? 'link' : 'script');
		var id = module.replace(/\.|\//g, '');
		if(iscss){
			node.type = 'text/css';
			node.rel = 'stylesheet';
		}
		if(charset){
			node.setAttribute("charset",charset);
		}
		node[iscss ? 'href' : 'src'] = /^http:\/\//.test(module) ? module : module;
		node.id = id;
		if(!document.getElementById(id)){
			head.appendChild(node);
		}
		if(callback){
			if (node.readyState){
				node.onreadystatechange = function(){
					if(node.readyState == "loaded" || node.readyState == "complete"){
						node.onreadystatechange = null;
						callback();
					}
				};
			}
			else {
				node.onload = function(){
					callback();
				};
			}
		}
	}
	//获取样式路径
	function getStyle(){
		var obj=null,len=document.scripts.length,str='';
		for(var i=0;i<len;i++){
			obj=document.scripts[i];
			if(obj.src.indexOf('luck.js')>=0){
				str=obj.src
				break
			}
		}
		return str.split('luck.js')[0]+'skin/default/luck.css';
	}

	//入口
	use(skin.url?(skin.url+skin.name+'/luck.css'):getStyle());
}(window);

function luck2(){
	luck.open({
		content:'<div class="w-account-ctn a-module-login">\
		<legend>登录帐号</legend>\
		<form name="f" action="/waplogin.aspx" method="post">\
		<p><input type="text" name="logname" class="login-input" value="" placeholder="用户名"></p>\
		<p><input type="password" name="logpass" class="login-input" value="" placeholder="密码"></p>\
		<input type="hidden" name="action" value="login">\
		<input type="hidden" name="classid" value="0">\
		<input type="hidden" name="siteid" value="1000">\
		<input type="hidden" name="sid" value="-3-0-0-0-320">\
		<input type="hidden" name="backurl" value="myfile.aspx?siteid=1000">\
		<label><input class="w-checkbox" type="checkbox" name="savesid" checked="checked" value="0" > 下次自动登录</label>\
		<input type="submit" name="g" class="login-btn" value="登 录">\
		<div class="a-field-switcher">\
                    <a class="a-pull-left" href="/wapreg.aspx?siteid=1000&classid=0">新用户注册</a>\
                    <a class="a-pull-right" href="/wapgetpw.aspx?siteid=1000">忘记密码？</a>\
                </div>\
				<ul class="sanfang-btn">\
				<li><a href="#"><i class="a-icon-qq"></i>QQ 登录</a></li>\
				<li><a href="#"><i class="a-icon-weixin"></i>微信登录</a></li>\
				</ul>\
		</form>\
    </div>'
	});
}
