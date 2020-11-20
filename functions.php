<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function themeConfig($form) {
    if ($check_info == '1') {
        echo '<font color=red>' . $message . '</font>';
        die;
    }
    $hosturl = $_SERVER['HTTP_HOST'];
    $check_host = 'http://tool.sq.zmki.cn/update.php';
    $check_message = $check_host . '?a=check_message&u=' . $_SERVER['HTTP_HOST'];
    $message = file_get_contents($check_message);
    $v_time = '0.7.19';
    if (!$_POST) {
        echo ' 
   <link href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.staticfile.org/jquery/2.0.0/jquery.js"></script>
   <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<hr>
   <p class="active-tab"><strong><svg  class="icon zmki_aliico" aria-hidden="true"><use xlink:href="#icon-project"></use></svg> typecho 导航主题webstack 钻芒博客二开美化版</strong> <span></span></p>
   <p class="previous-tab"><strong><svg  class="icon zmki_aliico" aria-hidden="true"><use xlink:href="#icon-chicken"></use></svg> 主题版本号: </strong>0.7.19 <span></span></p>
<hr>
<ul id="myTab" class="nav nav-tabs">
   <li class="active"><a href="#home" data-toggle="tab">版本与特性</a></li>
   <li><a href="#ios" data-toggle="tab">备份与恢复</a></li>
   <li><a href="#ejb" tabindex="-1" data-toggle="tab">关于主题</a></li> 
</ul>
<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="home">
      <p>
      
      ';
    }
    if ($v_time == $message) {
        echo '当前版本：' . 'V' . $v_time . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . '最新版本:' . 'V' . $message;
    } else if ($v_time > $message) {
        echo '当前版本：' . 'V' . $v_time . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . 'V' . $message;
    } else if ($v_time < $message) {
        echo '当前版本：' . 'V' . $v_time . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . '发现新版本:' . '<span style="color:red;"><b>V ' . $message . '</b></span>&nbsp&nbsp请更新，<a href="https://www.zmki.cn/5366.html" target="_blank">新版本特性</a>';
    }
    if (!$_POST) {
        echo '
        </p>
   </div>
   <div class="tab-pane fade" id="ios">
      <p>
    ';
    }
    $str1 = explode('/themes/', Helper::options()->themeUrl);
    $str2 = explode('/', $str1[1]);
    $name = $str2[0];
    $db = Typecho_Db::get();
    $sjdq = $db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:' . $name));
    $ysj = $sjdq['value'];
    if (isset($_POST['type'])) {
        if ($_POST["type"] == "备份模板设置数据") {
            if ($db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:' . $name . 'bf'))) {
                $update = $db->update('table.options')->rows(array('value' => $ysj))->where('name = ?', 'theme:' . $name . 'bf');
                $updateRows = $db->query($update);
                echo '<div class="tongzhi col-mb-12 home">备份已更新，请等待自动刷新！如果等不到请点击';
?>   
<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
<script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
<?php
            } else {
                if ($ysj) {
                    $insert = $db->insert('table.options')->rows(array('name' => 'theme:' . $name . 'bf', 'user' => '0', 'value' => $ysj));
                    $insertId = $db->query($insert);
                    echo '<div class="tongzhi col-mb-12 home">备份完成，请等待自动刷新！如果等不到请点击';
?>   
<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
<script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
<?php
                }
            }
        }
        if ($_POST["type"] == "还原模板设置数据") {
            if ($db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:' . $name . 'bf'))) {
                $sjdub = $db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:' . $name . 'bf'));
                $bsj = $sjdub['value'];
                $update = $db->update('table.options')->rows(array('value' => $bsj))->where('name = ?', 'theme:' . $name);
                $updateRows = $db->query($update);
                echo '<div class="tongzhi col-mb-12 home">检测到模板备份数据，恢复完成，请等待自动刷新！如果等不到请点击';
?>   
<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
<script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2000);</script>
<?php
            } else {
                echo '<div class="tongzhi col-mb-12 home">没有模板备份数据，恢复不了哦！</div>';
            }
        }
        if ($_POST["type"] == "删除备份数据") {
            if ($db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:' . $name . 'bf'))) {
                $delete = $db->delete('table.options')->where('name = ?', 'theme:' . $name . 'bf');
                $deletedRows = $db->query($delete);
                echo '<div class="tongzhi col-mb-12 home">删除成功，请等待自动刷新，如果等不到请点击';
?>   
<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
<script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
<?php
            } else {
                echo '<div class="tongzhi col-mb-12 home">不用删了！备份不存在！！！</div>';
            }
        }
    }
    echo '<form class="protected home col-mb-12" action="?' . $name . 'bf" method="post">
<input type="submit" name="type" class="btn btn-s" value="备份模板设置数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="还原模板设置数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="删除备份数据" /></form><br>';
    if (!$_POST) {
        echo ' 
  </p>
   </div>
   <div class="tab-pane fade" id="jmeter">
      <p>jMeter is an Open Source testing software. It is 100% pure 
      Java application for load and performance testing.</p>
   </div>
   <div class="tab-pane fade" id="ejb">
      <p>';
    }
    echo '
 
 <div class="zmki_ht_about">
 <div class="zmki_ht_about_img"><a href="https://jq.qq.com/?_wv=1027&k=z8DfLjVj" target="_blank"><img src="https://a-oss.zmki.cn/2020/20200214-a874495080831.png" width="80%" "/></a>
 <div class="zmki_ht_about_mian">
 <p style="font-size:15px;margin-top: 6px !important;"><b> typecho 导航主题webstack 钻芒博客二开美化版</b></p> 
 <p>主题发布地址:<a href="https://www.zmki.cn/5366.html"target="_blank">www.zmki.cn/5366.html</a></p>
 <p>ZMKI交流群:<a href="https://jq.qq.com/?_wv=1027&k=z8DfLjVj" target="_blank">737656800</a></p>
 <p>GitHub:<a href="https://github.com/wclk/WebStack_ZMKI"target="_blank">WebStack_zmki二开项目地址</a></p> 
 <p>GitHub:<a href="https://github.com/WebStackPage/WebStackPage.github.io"target="_blank">WebStack静态项目地址</a></p>
 <p>本主题由<a href="https://www.zmki.cn"target="_blank">钻芒博客</a>免费发布，禁止倒卖<svg  class="icon zmki_aliico" aria-hidden="true"><use xlink:href="#icon-chicken"></use></svg></p>
 </div>
 </div>
 </div>
 ';
    if (!$_POST) {
        echo '      </p>
   </div>
</div>';
    }
    print <<<EOT
<style>
.zmki_ht_about{
    margin:0px;
}
.zmki_ht_about a{ 
    color: #060606;
}
.zmki_ht_about_img{
    float:initial;
}
.zmki_ht_about img {
    float: initial;
    width: 50%;
    border-radius: 5px;
    box-shadow: 0 8px 10px -4px rgba(66, 172, 98, 0.34);
}
.zmki_ht_about_mian{
    width: 50%;
    float: right;
    padding:0px 0px 0px  20px ;
}
.zmki_ht_about_mian  h2 {
    color:#000;
    margin:0px;
}
.btn { 
    color:#000;
    padding: 0px 10px;
    border-radius: 4px;
    background-color: whitesmoke;
    box-shadow: 0 6px 7px -5px rgba(210, 210, 210, 0.6);
}
p{
    margin:15px 0px 10px 0px!important;
}
.zmki_aliico{
    width: 20px;
    float: initial;
    height: 20px;
    margin-bottom: -4px;
}
</style> 
<link rel="stylesheet" href="https://at.alicdn.com/t/font_1953461_6q2rg8z45q4.css">  
<script src="https://at.alicdn.com/t/font_1953461_6q2rg8z45q4.js"></script> 
<script>
   $(function(){
      $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
      // Get the name of active tab
      var activeTab = $(e.target).text(); 
      // Get the name of previous tab
      var previousTab = $(e.relatedTarget).text(); 
      $(".active-tab span").html(activeTab);
      $(".previous-tab span").html(previousTab);
   });
});
</script>
EOT;
    echo '<hr>
<svg  class="icon zmki_aliico" aria-hidden="true"><use xlink:href="#icon-sound"></use></svg>
<span>  V0.7.19 已去除主题设置里画蛇添足的 自定义站点名称和后缀功能，如设置直接移步至</span>';
?>   
<a href="<?php Helper::options()->adminUrl('options-general.php'); ?>">设置 </a>即可
<img src="<?php ?> ">

<hr>
<?php
    // 大logo
    $Biglogo = new Typecho_Widget_Helper_Form_Element_Text('Biglogo', NULL, '/usr/themes/WebStack/images/logo@2x.png', _t('大LOGO地址(必填)'), _t('大logo地址，尺寸178*40'));
    $form->addInput($Biglogo);
    echo '<svg  class="icon zmki_aliico" aria-hidden="true"><use xlink:href="#icon-set"></use></svg> <b>提示：主题设置选择后回车可快捷保存</b><hr>';
    // 手机端每行显示数量
    $zmki_wapsl = new Typecho_Widget_Helper_Form_Element_Radio('zmki_wapsl', array('0' => _t('单栏'), '1' => _t('双栏'), '2' => _t('三栏')), '0', _t('<svg  class="icon zmki_aliico" aria-hidden="true"><use xlink:href="#icon-phone"></use></svg> 手机端栏目数量'), _t("选择相应的栏目数量,手机端每行将显示不同数量的布局。此功能可避免页面过于庸长，默认单栏，推荐双栏显示 <br>注意：如调整失效，请刷新请浏览器缓存"));
    $form->addInput($zmki_wapsl);
    // PC端每行显示数量
    $zmki_pcsl = new Typecho_Widget_Helper_Form_Element_Radio('zmki_pcsl', array('0' => _t('单栏'), '1' => _t('双栏'), '2' => _t('三栏'), '3' => _t('四栏'), '4' => _t('五栏'), '5' => _t('六栏'), '6' => _t('七栏'), '7' => _t('八栏')), '3', _t('<svg  class="icon zmki_aliico" aria-hidden="true"><use xlink:href="#icon-pc"></use></svg> PC端栏目数量'), _t("选择相应的栏目数量,PC每行将显示不同数量的布局。默认4栏，为美观考虑推荐设置4-6栏<br>注意：如调整失效，请刷新请浏览器缓存"));
    $form->addInput($zmki_pcsl);
    // 暗黑开关
    $zmki_ah = new Typecho_Widget_Helper_Form_Element_Radio('zmki_ah', array('0' => _t('禁用'), '1' => _t('启用')), '1', _t('暗黑模式开关'), _t("是否开启前台暗黑模式开关，开启后网站会在晚22点-早6点夜间自动开启黑暗模式; 请放心，此功能会保存cooke方便使用"));
    $form->addInput($zmki_ah);
    // 顶部模块
    $zmki_top_main = new Typecho_Widget_Helper_Form_Element_Radio('zmki_top_main', array('0' => _t('禁用'), '1' => _t('启用')), '1', _t('<span style="color: #608cee; margin-right:0px;">顶部</span><span style="color: #fb5962;margin-right:0px;">多色</span><span style="color: #fbb359;margin-right:0px;">模块</span><span style="color: #53bf6b;margin-right:0px;">开关</span>'), _t("是否开启网站顶部四项多色小模块"));
    $form->addInput($zmki_top_main);
    // echo '<img style="border: 0;height: 20px;margin-bottom: -2px;" src="https://a-oss.zmki.cn/2019/20190827-5d65409f3fbff.png">';
    // 顶部模块 蓝色 文字自定义
    $zmki_top_main_one_name = new Typecho_Widget_Helper_Form_Element_Text('zmki_top_main_one_name', NULL, '配置手册', _t('<span style="color: #608cee; margin-right:0px;">蓝色模块文字</span>'), _t('输入顶部蓝色模块内的文字，默认 配置手册'));
    $form->addInput($zmki_top_main_one_name);
    $zmki_top_main_one_icon = new Typecho_Widget_Helper_Form_Element_Text('zmki_top_main_one_icon', NULL, 'fa fa-safari', _t('<span style="color: #608cee; margin-right:0px;">蓝色模块</span>图标'), _t('可自定义蓝色模块内文字前的fontawesome图标，使用帮助请查看:<a href="https://www.zmki.cn/5366.html">www.zmki.cn/5366.html</a>，蓝色默认 fa fa-safari'));
    $form->addInput($zmki_top_main_one_icon);
    $zmki_top_main_one_url = new Typecho_Widget_Helper_Form_Element_Text('zmki_top_main_one_url', NULL, 'https://www.zmki.cn/5366.html', _t('<span style="color: #608cee; margin-right:0px;">蓝色模块</span>跳转链接'), _t('输入蓝色模块跳转的链接,'));
    $form->addInput($zmki_top_main_one_url);
    // 顶部模块 红色 文字自定义
    $zmki_top_main_two_name = new Typecho_Widget_Helper_Form_Element_Text('zmki_top_main_two_name', NULL, '向日葵全家桶', _t('<span style="color: #fb5962; margin-right:0px;">红色模块文字</span>'), _t('输入顶部红色模块内的文字，默认 向日葵全家桶'));
    $form->addInput($zmki_top_main_two_name);
    $zmki_top_main_two_icon = new Typecho_Widget_Helper_Form_Element_Text('zmki_top_main_two_icon', NULL, 'fa fa-star', _t('<span style="color: #fb5962; margin-right:0px;">红色模块</span>图标'), _t('可自定义红色模块内文字前的fontawesome图标，使用帮助请查看:<a href="https://www.zmki.cn/5366.html">www.zmki.cn/5366.html</a>，红色默认 fa fa-star'));
    $form->addInput($zmki_top_main_two_icon);
    $zmki_top_main_two_url = new Typecho_Widget_Helper_Form_Element_Text('zmki_top_main_two_url', NULL, 'https://www.k1v.cn', _t('<span style="color: #fb5962; margin-right:0px;">红色模块</span>跳转链接'), _t('输入红色模块跳转的链接,'));
    $form->addInput($zmki_top_main_two_url);
    // 顶部模块 黄色 文字自定义
    $zmki_top_main_three_name = new Typecho_Widget_Helper_Form_Element_Text('zmki_top_main_three_name', NULL, '关于导航', _t('<span style="color: #fbb359; margin-right:0px;">黄色模块文字</span>'), _t('输入顶部黄色模块内的文字，默认 关于导航'));
    $form->addInput($zmki_top_main_three_name);
    $zmki_top_main_three_icon = new Typecho_Widget_Helper_Form_Element_Text('zmki_top_main_three_icon', NULL, 'fa fa-registered', _t('<span style="color: #fbb359; margin-right:0px;">黄色模块</span>图标'), _t('可自定义黄色模块内文字前的fontawesome图标，使用帮助请查看:<a href="https://www.zmki.cn/5366.html">www.zmki.cn/5366.html</a>，黄色默认 fa fa-registered'));
    $form->addInput($zmki_top_main_three_icon);
    $zmki_top_main_three_url = new Typecho_Widget_Helper_Form_Element_Text('zmki_top_main_three_url', NULL, 'https://tool.zmki.cn/index.php/about.html', _t('<span style="color: #fbb359; margin-right:0px;">黄色模块</span>跳转链接'), _t('输入黄色模块跳转的链接,'));
    $form->addInput($zmki_top_main_three_url);
    // 顶部模块 绿色 文字自定义
    $zmki_top_main_four_name = new Typecho_Widget_Helper_Form_Element_Text('zmki_top_main_four_name', NULL, '更多主题', _t('<span style="color: #53bf6b; margin-right:0px;">绿色模块文字</span>'), _t('输入顶部绿色模块内的文字，默认 更多主题'));
    $form->addInput($zmki_top_main_four_name);
    $zmki_top_main_four_icon = new Typecho_Widget_Helper_Form_Element_Text('zmki_top_main_four_icon', NULL, 'fa fa-diamond', _t('<span style="color: #53bf6b; margin-right:0px;">绿色模块</span>图标'), _t('可自定义绿色模块内文字前的fontawesome图标，使用帮助请查看:<a href="https://www.zmki.cn/5366.html">www.zmki.cn/5366.html</a>，绿色默认 fa fa-diamond'));
    $form->addInput($zmki_top_main_four_icon);
    $zmki_top_main_four_url = new Typecho_Widget_Helper_Form_Element_Text('zmki_top_main_four_url', NULL, 'https://www.zmki.cn/', _t('<span style="color: #53bf6b; margin-right:0px;">绿色模块</span>跳转链接'), _t('输入绿色模块跳转的链接,'));
    $form->addInput($zmki_top_main_four_url);
    // 顶栏 钻芒博客 文字自定义
    $zmki_name = new Typecho_Widget_Helper_Form_Element_Text('zmki_name', NULL, '钻芒博客', _t('<svg  class="icon zmki_aliico" aria-hidden="true"><use xlink:href="#icon-prompt"></use></svg>  顶栏AD文字'), _t('输入你的首页顶栏收录提交右侧自定义文字，默认 钻芒博客'));
    $form->addInput($zmki_name);
    // 顶栏 钻芒博客 链接自定义
    $zmki_url = new Typecho_Widget_Helper_Form_Element_Text('zmki_url', NULL, 'https://www.zmki.cn/', _t('顶栏AD链接'), _t('输入你的首页顶栏收录提交右侧文字调整的url，默认 https://www.zmki.cn/'));
    $form->addInput($zmki_url);
    $zmki_links = new Typecho_Widget_Helper_Form_Element_Text('zmki_links', NULL, '/links.html', _t('收录提交URL链接'), _t('默认访问/links.html  请前往管理-独立页面设置页面并填入内容，开启评论用做收录提交页，并返回此处填写链接'));
    $form->addInput($zmki_links);
    $Isabout = new Typecho_Widget_Helper_Form_Element_Text('Isabout', NULL, '/about.html', _t('关于我们URL链接'), _t('默认访问/about.html  与上一条同理'));
    $form->addInput($Isabout);
    $isSearch = new Typecho_Widget_Helper_Form_Element_Radio('isSearch', array('0' => _t('禁用'), '1' => _t('启用')), '1', _t('<svg  class="icon zmki_aliico" aria-hidden="true"><use xlink:href="#icon-battery"></use></svg> 搜索功能'), _t("是否启用搜索"));
    $form->addInput($isSearch);
    $isLink = new Typecho_Widget_Helper_Form_Element_Radio('isLink', array('0' => _t('禁用'), '1' => _t('启用')), '1', _t('跳转功能'), _t("是否启用直接跳转"));
    $form->addInput($isLink);
    // 右侧悬浮窗开启
    $fk_zmki = new Typecho_Widget_Helper_Form_Element_Radio('fk_zmki', array('0' => _t('禁用'), '1' => _t('启用')), '1', _t('<svg  class="icon zmki_aliico" aria-hidden="true"><use xlink:href="#icon-position"></use></svg> 右侧悬浮窗'), _t("是否开启右侧悬浮窗"));
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
    $zmki_time_no = new Typecho_Widget_Helper_Form_Element_Radio('zmki_time_no', array('0' => _t('禁用'), '1' => _t('启用')), '1', _t('是否开启网站运算时间'), _t("选择开启即会在网站底部栏显示网站已运行时间。如开启请不要忘记设置下边的创建时间"));
    $form->addInput($zmki_time_no);
    // 网站运行时间
    $zmki_time = new Typecho_Widget_Helper_Form_Element_Text('zmki_time', NULL, '1/1/2019 11:13:14', _t('网站运行时间'), _t('默认: 1/1/2019 11:13:14  请按照前边的实例按格式填写创建时间，分别是月/日/年 时:分:秒 '));
    $form->addInput($zmki_time);
    // 统计代码
    $zmki_tongji = new Typecho_Widget_Helper_Form_Element_Text('zmki_tongji', NULL, ' ', _t('统计代码'), _t('body标签内，请放入CNZZ或百度统计代码'));
    $form->addInput($zmki_tongji);
    // 底部版权
    $zmki_r = new Typecho_Widget_Helper_Form_Element_Text('zmki_r', NULL, 'ZMKi', _t('网站底部版权'), _t('V0.4.3已新增自定义底部版权，请保留前方作者链接。谢谢！默认 ZMKI'));
    $form->addInput($zmki_r);
    // 友情链接
    $zmki_footer_links = new Typecho_Widget_Helper_Form_Element_Radio('zmki_footer_links', array('1' => _t('禁用'), '0' => _t('启用')), '1', _t('<svg  class="icon zmki_aliico" aria-hidden="true"><use xlink:href="#icon-user-girl"></use></svg>  底部友情链接 <svg  class="icon zmki_aliico" aria-hidden="true"><use xlink:href="#icon-user-boy"></use></svg>'), _t('是否开启底部友情链接, 如开启必须安装插件 否则首页报错。不使用关闭即可 插件下载:<a href="https://cdn.zmki.cn/typecho/%E5%8F%8B%E6%83%85%E9%93%BE%E6%8E%A5%E6%8F%92%E4%BB%B6.zip">点击下载配套插件</a>'));
    $form->addInput($zmki_footer_links);
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
