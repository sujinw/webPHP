var lz = {
    bind: function(obj, type, fn) { //事件绑定
        if (obj.addEventListener) {
            obj.addEventListener(type, fn, false);
        } else if (obj.attachEvent) {
            obj.attachEvent('on' + type, fn);
        } else {
            obj['on' + type] = fn;
        }
    },
    setCookie: function(name, value) { //设置cookie
        var Days = 30;
        var exp = new Date();
        exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
        document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString() + ";path=/";
    },
    getCookie: function(name) { //获取cookie
        var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
        if (arr = document.cookie.match(reg))
            return unescape(arr[2]);
        else
            return null;
    }
};
(function ($){
	$.bind(window, 'load', function (){
		var sTip = $.getCookie('indextip');
		if(!sTip && KELINKAPI.classid != 0){
			var oIndexTip = document.getElementById('index-tip');
			oIndexTip.style.display = 'block';
			$.bind(oIndexTip, 'click', function (){
				this.style.display = 'none';
				$.setCookie('indextip','true');
			});
		}
	});
})(lz);