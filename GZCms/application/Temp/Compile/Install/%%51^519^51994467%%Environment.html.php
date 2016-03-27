<?php /* Smarty version 2.6.26, created on 2016-03-23 11:05:59
         compiled from E:/WEBPROJECT/PHP/GZCms/application/Install/Tpl/Index/Environment.html */ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GZCMS 简体中文 UTF8 版</title>
    <link rel="stylesheet" type="text/css" href="<?php echo @__PUBLIC__; ?>

	/css/hdjs.css?v=1">
	<link rel="stylesheet" type="text/css" href="<?php echo @__PUBLIC__; ?>
/css/install.css?v=1">
	<script type="text/javascript" src="<?php echo @__PUBLIC__; ?>
/js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="<?php echo @__PUBLIC__; ?>
/js/hdjs.js"></script>
</head>
<body>
<div class="step">
    <div class="bg"></div>
    <div class="environment">

        <div class="title">GZCMS 安装向导</div>
        <div class="process">
            <ul>
                <li>许可协议</li>
                <li class="current">环境检测</li>
                <li>数据库设定</li>
                <li>生成数据</li>
                <li>安装完成</li>
            </ul>
        </div>
        <!--协议说明-->
        <div class="install">
            <div class="check set">
                <table width="100%">
                    <tr>
                        <th class="w250">环境检测</th>
                        <th>当前状态</th>
                    </tr>
                    <tr>
                        <td>服务器域名</td>
                        <td><?php echo $_SERVER['HTTP_HOST']; ?>
</td>
                    </tr>
                    <tr>
                        <td>服务器解译引擎</td>
                        <td><?php echo $_SERVER['SERVER_SOFTWARE']; ?>
</td>
                    </tr>
                    <tr>
                        <td>PHP版本</td>
                        <td><?php echo @PHP_VERSION; ?>
</td>
                    </tr>
                    <tr>
                        <td>系统安装目录</td>
                        <td><?php echo @ROOT_PATH; ?>
</td>
                    </tr>
                    </tr>
                </table>
            </div>

            <div class="check set">
                <table>
                    <tr>
                        <th class="w250">需开启的变量或函数</th>
                        <th class="w80">当前状态</th>
                        <th>说明</th>
                    </tr>
                    <tr>
                        <td>safe_mode</td>
                        <td><?php echo $this->_tpl_vars['safe']; ?>
</td>
                        <td> <span class="desc">
                        本系统不支持在非win主机的安全模式下运行
                    </span></td>
                    </tr>
                    <tr>
                        <td>GD 库</td>
                        <td><?php echo $this->_tpl_vars['gd']; ?>
</td>
                        <td> <span class="desc">
                        不支持将导致与图片相关的功能无法使用
                    </span></td>
                    </tr>
                    <tr>
                        <td>CURL库</td>
                        <td><?php echo $this->_tpl_vars['curl']; ?>
</td>
                        <td> <span class="desc">
                        不符合要求将导致采集、远程资料本地化等功能无法使用
                    </span></td>
                    </tr>
                    <tr>
                        <td>MySQLI扩展</td>
                        <td><?php echo $this->_tpl_vars['mysqli']; ?>
</td>
                        <td> <span class="desc">
                        不支持将无法使用本系统
                    </span></td>
                    </tr>
                    <tr>
                        <td>mb_substr</td>
                        <td><?php echo $this->_tpl_vars['mb_substr']; ?>
</td>
                        <td> <span class="desc">
                        不支持将导致中文字符处理出现问题
                    </span></td>
                    </tr>
                </table>
            </div>
            <div class="check set">
                <table>
                    <tr>
                        <th class="w250">目录、文件权限检查</th>
                        <th class="w100">写入</th>
                        <th>读取</th>
                    </tr>
                    <?php $_from = $this->_tpl_vars['dirctory']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['d']):
?>
                        <tr>
                            <td><?php echo $this->_tpl_vars['d']; ?>
</td>
                            <td><?php if (is_writable ( $this->_tpl_vars['d'] )): ?><span class="hd-validate-success">可写</span><?php else: ?><span class="hd-validate-error">不可写</span><?php endif; ?>
                            <td><?php if (is_readable ( $this->_tpl_vars['d'] )): ?><span class="hd-validate-success">可读</span><?php else: ?><span class="hd-validate-error">不可读</span>'<?php endif; ?></td>
                            </td>
                        </tr>
                    <?php endforeach; endif; unset($_from); ?>
                </table>
            </div>
        </div>
        <!--协议说明-->
        <div class="btn">
            <button class="hd-btn" onclick="<?php echo @__APP__; ?>
?m=install&a=copyright">上一步</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button class="hd-btn hd-btn-primary" onclick="check();">下一步</button>
        </div>
    </div>
</div>
<script>
    function check() {
        if ($(".hd-validate-error").length > 0) {
            alert("您的系统环境不可以安装HDCMS");
            return false;
        } else {
            location.href = "<?php echo @__APP__; ?>
?m=install&a=database";
        }
    }
</script>
</body>
</html>