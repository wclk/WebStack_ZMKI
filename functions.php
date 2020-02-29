<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function themeConfig($form) { 
	
	if($check_info=='1'){
	echo '<font color=red>' . $message . '</font>';
	die;
}	
	$hosturl = $_SERVER['HTTP_HOST']; 
	$check_host = 'http://tool.sq.zmki.cn/update.php';  
	$check_message = $check_host . '?a=check_message&u=' . $_SERVER['HTTP_HOST'];
	$message = file_get_contents($check_message); 
    $v_time='0.2.29'; 
	if ($v_time == $message) {
	echo	'当前版本：'.'V'.$v_time."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".'最新版本:'.'V'.$message;
	} else  if ($v_time > $message){
	echo  '当前版本：'.'V'.$v_time."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".'V'.$message;
	}
	  else  if ($v_time < $message) {
	echo  '当前版本：'.'V'.$v_time."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".'发现新版本:'.'<span style="color:red;"><b>V '.$message.'</b></span>&nbsp&nbsp请更新，<a href="https://www.zmki.cn/5366.html" target="_blank">新版本特性</a>' ;  
} 
	
    //首页名称
    $IndexName = new Typecho_Widget_Helper_Form_Element_Text('IndexName', NULL, NULL, _t('首页的名称(必填)'), _t('输入你的首页显示的名称'));
    $form->addInput($IndexName);
    //首页名称后缀（必填）
    $Indexdict = new Typecho_Widget_Helper_Form_Element_Text('Indexdict', NULL, NULL, _t('首页的名称后缀(必填)'), _t('输入你的首页显示的名称后缀'));
    $form->addInput($Indexdict);
    //大logo
    $Biglogo = new Typecho_Widget_Helper_Form_Element_Text('Biglogo', NULL, '/usr/themes/WebStack/images/logo@2x.png', _t('大LOGO地址(必填)'), _t('大logo地址，尺寸178*40'));
    // 暗黑开关
     $zmki_ah = new Typecho_Widget_Helper_Form_Element_Radio('zmki_ah',
        array(
            '0' => _t('禁用'),
            '1' => _t('启用')
        ),
        '1',_t('暗黑模式开关'),_t("是否开启前台暗黑模式开关，开启后网站会在晚22点-早6点夜间自动开启黑暗模式; 请放心，此功能会保存cooke方便使用")
    );    
    $form->addInput($zmki_ah);
    
    $form->addInput($Biglogo);
    // 顶栏 钻芒博客 文字自定义
    $zmki_name = new Typecho_Widget_Helper_Form_Element_Text('zmki_name', NULL, '钻芒博客', _t('顶栏AD文字'), _t('输入你的首页顶栏收录提交右侧自定义文字，默认 钻芒博客'));
    $form->addInput($zmki_name);
     // 顶栏 钻芒博客 链接自定义
    $zmki_url = new Typecho_Widget_Helper_Form_Element_Text('zmki_url', NULL, 'https://www.zmki.cn/', _t('顶栏AD链接'), _t('输入你的首页顶栏收录提交右侧文字调整的url，默认 https://www.zmki.cn/'));
    $form->addInput($zmki_url);
    
	$zmki_links = new Typecho_Widget_Helper_Form_Element_Text('zmki_links', NULL, '/links.html', _t('收录提交URL链接'), _t('默认访问/links.html  请前往管理-独立页面设置页面并填入内容，开启评论用做收录提交页，并返回此处填写链接'));
	    $form->addInput($zmki_links);
	    
    $Isabout = new Typecho_Widget_Helper_Form_Element_Text('Isabout', NULL, '/about.html', _t('关于我们URL链接'), _t('默认访问/about.html  与上一条同理'));
	    $form->addInput($Isabout);

	    $isSearch = new Typecho_Widget_Helper_Form_Element_Radio('isSearch',
        array(
            '0' => _t('禁用'),
            '1' => _t('启用')
        ),
        '1',_t('搜索功能'),_t("是否启用搜索")
    ); 
    $form->addInput($isSearch);
    $isLink = new Typecho_Widget_Helper_Form_Element_Radio('isLink',
        array(
            '0' => _t('禁用'),
            '1' => _t('启用')
        ),
        '1',_t('跳转功能'),_t("是否启用直接跳转")
    );    
    $form->addInput($isLink);
    
    // 右侧悬浮窗开启
     $fk_zmki = new Typecho_Widget_Helper_Form_Element_Radio('fk_zmki',
        array(
            '0' => _t('禁用'),
            '1' => _t('启用')
        ),
        '1',_t('右侧悬浮窗'),_t("是否开启右侧悬浮窗")
    );    
    $form->addInput($fk_zmki);
    
     //悬浮窗公众号
    $fk_zmki_gzhimg = new Typecho_Widget_Helper_Form_Element_Text('fk_zmki_gzhimg', NULL, '/usr/themes/WebStack/images/gzhimg.png', _t('悬浮窗内公众号图片url'), _t('悬浮窗内公众号图片，默认:/usr/themes/WebStack/images/gzhimg.png 正方形即可大小自适应，此功能需开启悬浮窗才会显示'));
    $form->addInput($fk_zmki_gzhimg);
    
     //悬浮窗公众号 描述
    $fk_zmki_gzhtext = new Typecho_Widget_Helper_Form_Element_Text('fk_zmki_gzhtext', NULL, '极客导航-很有范的导航站', _t('悬浮窗内公众号下描述自定义'), _t('悬浮窗内公众号图片下方自定义文字，默认极客导航-很有范的导航站，此功能需开启悬浮窗才会显示'));
    $form->addInput($fk_zmki_gzhtext);
    
     // 悬浮窗QQ
    $fk_zmki_qq = new Typecho_Widget_Helper_Form_Element_Text('fk_zmki_qq', NULL, '123456789', _t('悬浮窗QQ'), _t('输入右下角悬浮窗内的qq，默认 123456789 ，此功能需开启悬浮窗才会显示'));
    $form->addInput($fk_zmki_qq);
    
    // 悬浮窗email
    $fk_zmki_email = new Typecho_Widget_Helper_Form_Element_Text('fk_zmki_email', NULL, 'a@zmki.cn', _t('悬浮窗在线邮件'), _t('输入右下角悬浮窗内的qq，默认 a@zmki.cn ，此功能需开启悬浮窗才会显示'));
    $form->addInput($fk_zmki_email); 
    
     // 悬浮窗链接名称
    $fk_zmki_name = new Typecho_Widget_Helper_Form_Element_Text('fk_zmki_name', NULL, '钻芒博客', _t('悬浮窗AD 更多 名称'), _t('输入右下角悬浮窗内的更多 后的自定义文字，默认 钻芒博客 ，此功能需开启悬浮窗才会显示'));
    $form->addInput($fk_zmki_name);
     // 悬浮窗链接
     
    $fk_zmki_url = new Typecho_Widget_Helper_Form_Element_Text('fk_zmki_url', NULL, 'https:www.zmki.cn/', _t('悬浮窗AD 更多 名称 超链接'), _t('输入右下角悬浮窗内AD的url，默认 https:www.zmki.cn/，此功能需开启悬浮窗才会显示'));
    $form->addInput($fk_zmki_url);
    // IPC备案号
    
    $zmki_icp = new Typecho_Widget_Helper_Form_Element_Text('zmki_icp', NULL, '豫ICP备12222222号', _t('ICP备案号'), _t('如果在国内已进行备案，可在此处填写icp备案号;如:豫ICP备12222222号。备案号超链接将会被跳转至工信部网站 ')); 
    $form->addInput($zmki_icp);
     // 是否开启网站运算时间
     
     $zmki_time_no = new Typecho_Widget_Helper_Form_Element_Radio('zmki_time_no',
        array(
            '0' => _t('禁用'),
            '1' => _t('启用')
        ),
        '1',_t('是否开启网站运算时间'),_t("选择开启即会在网站底部栏显示网站已运行时间。如开启请不要忘记设置下边的创建时间")
    );    
    $form->addInput($zmki_time_no);
    
    // 网站运行时间
    $zmki_time = new Typecho_Widget_Helper_Form_Element_Text('zmki_time', NULL, '1/1/2019 11:13:14', _t('网站运行时间'), _t('默认: 1/1/2019 11:13:14  请按照前边的实例按格式填写创建时间，分别是月/日/年 时:分:秒 ')); 
    $form->addInput($zmki_time);
}

//输出导航
function themeFields($layout) {
    $url = new Typecho_Widget_Helper_Form_Element_Text('url', NULL, NULL, _t('跳转链接'), _t('请输入跳转URL'));
    $text = new Typecho_Widget_Helper_Form_Element_Text('text', NULL, NULL, _t('链接描述'), _t('请输入链接描述'));
    $logo = new Typecho_Widget_Helper_Form_Element_Text('logo', NULL, NULL, _t('链接logo'), _t('请输入Logo URL链接'));
    $layout->addItem($url);
    $layout->addItem($text);
    $layout->addItem($logo);
}