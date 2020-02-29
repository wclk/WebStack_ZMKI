<?php
/**
 * 基于开源项目<a href="https://github.com/WebStackPage/WebStackPage.github.io" rel="nofollow" target="_blank">WebStack</a>的一个主题，请尊重劳动成果 <ul><li>由<a href="https:www.zmki.cn" rel="nofollow" target="_blank">钻芒博客</a>二次,内容包括新增顶栏和优化底栏及悬浮窗等N项。</li> <li>适配全新暗黑模式，支持cooke保存。</li><li>设置参数已整合至后台，无需手动修改HTML。</li><li>基于SEOGO.ME运营狗2019.12.01版本 此版本于2020年2月9日23:07:54二开打包</li><ul>
 * 
 * @package WebStack
 * @author SEOGO运营狗
 * @version 4.0 _钻芒二开优化版0.2.29
 * @link https://www.seogo.me/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<?php $this->need('sidebar.php'); ?> 
<!--顶部美化开始-->  
   <div class="board">
          <div class="left">
       <ul class="user-info-menu left-links list-inline list-unstyled">	 
     <li><span class="board-title zmki_wap_zsy1"><a href="<?php $this->options->siteUrl();?>" ><i class="fa fa-home  "></i> 首页</a></span></li>
	 <li><span class="board-title"><a href="<?php $this->options->zmki_links(); ?>"><i class="fa fa-plus-square  " ></i> 收录提交</a></span></li>
	 <li><span class="board-title "><a href="<?php $this->options->zmki_url(); ?>" target="_blank"><i class="fa fa-heart xiaotubiao" style="color: red;"></i>&nbsp;<?php $this->options->zmki_name(); ?></a></span></li>
	 <li><div class="zmki_wap" id="tp-weather-widget"> </li>
	 <?php if($this->options->zmki_ah == '1'): ?>  
	 <li><div class="zmki_yldh zmki_wap_zsy2"  title="切换模式"><a href="javascript:switchNightMode()"  target="_self"><svg  class="icon zmki_dh" aria-hidden="true"><use xlink:href="#icon-yueliang2"></use></svg></a></div></li> 
	 <?php endif; ?>
		  </ul>
       </div>
   </div>
   	<li><a type="button" id="fullscreen" > </li>
   <script>(function(T,h,i,n,k,P,a,g,e){g=function(){P=h.createElement(i);a=h.getElementsByTagName(i)[0];P.src=k;P.charset="utf-8";P.async=1;a.parentNode.insertBefore(P,a)};T["ThinkPageWeatherWidgetObject"]=n;T[n]||(T[n]=function(){(T[n].q=T[n].q||[]).push(arguments)});T[n].l=+new Date();if(T.attachEvent){T.attachEvent("onload",g)}else{T.addEventListener("load",g,false)}}(window,document,"script","tpwidget","//widget.seniverse.com/widget/chameleon.js"))</script>
   <script>tpwidget("init", {
       "flavor": "slim",
       "location": "WX4FBXXFKE4F",
       "geolocation": "enabled",
       "language": "zh-chs",
       "unit": "c",
       "theme": "white",
       "container": "tp-weather-widget",
       "bubble": "enabled",
       "alarmType": "badge",
       "uid": "UD5EFC1165",
       "hash": "2ee497836a31c599f67099ec09b0ef62"
   });
   tpwidget("show");</script>
	<!--顶部美化结束-->
	<div class="main-content">    
	<?php if($this->options->isSearch == '1'): ?>
    <?php $this->need('search.php'); ?> 
	<?php endif; ?>
	<?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
	<?php $this->widget('Widget_Metas_Category_List')->to($categories); ?>
	<?php while ($categories->next()): ?>
	<?php if(count($categories->children) === 0): ?>
	<?php $this->widget('Widget_Archive@category-' . $categories->mid, 'order=order&pageSize=10000&type=category', 'mid=' . $categories->mid)->to($posts); ?>
	<h4 class="text-gray"><i class="linecons-tag" style="margin-right: 7px;" id="<?php $categories->name(); ?>"></i><?php $categories->name(); ?></h4>
	<div class="row">
    <?php while ($posts->next()): ?> 
    <div class="col-sm-3">
	<?php if($this->options->isLink == '1'): ?>
	<div class="xe-widget xe-conversations box2 label-info" onclick="window.open('<?php echo $posts->fields->url;?>', '_blank')" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?php echo $posts->fields->url;?>">
    <div class="xe-comment-entry">
          <a class="xe-user-img">
            <img src="<?php echo $posts->fields->logo;?>" class="img-circle" width="40">
          </a>
	<div class="xe-comment">
          <a href="#" class="xe-user-name overflowClip_1">
              <strong><?php $posts->title(); ?></strong>
          </a>
            <p class="overflowClip_2"><?php echo $posts->fields->text;?></p>
     </div>
     </div>
     </div>
     <?php endif; ?>
     <?php if($this->options->isLink == '0'): ?>
      <div class="xe-widget xe-conversations box2 label-info" >
        <div class="xe-user-img">
          <div class="xe-comment-entry">
            <a href="<?php $posts->permalink() ?>"><img src="<?php echo $posts->fields->logo;?>" class="img-circle" width="40">
            <div class="xe-comment"  data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?php echo $posts->fields->url;?>">
              <strong><?php $posts->title(); ?></strong>
              <p class="overflowClip_2"><?php echo $posts->fields->text;?></p>
              </div>
            </a>
          </div>
        </div>
      </div>
      <?php endif; ?>
	</div> 
  <?php endwhile; ?>
</div>   
<br />  
<?php else: ?>
<?php endif; ?>
<?php endwhile; ?>
<?php $this->need('footer.php'); ?>
<!--仿凡科 右侧悬浮窗 by:zmki   zmki.cn 2020年2月9日17:03:13-->
<style>
	.fk_service_qrimg_site {
    width: 119px;
    height: 119px;
    float: left;
    margin: 12px 12px 5px 12px;
    /* background: url(https://a-oss.zmki.cn/2019/20190827-5d652476ab305.png) no-repeat -41px -26px; */
    background-image: url(<?php $this->options->fk_zmki_gzhimg(); ?>);
    background-size: 100% 100%;
</style>
 <?php if($this->options->fk_zmki == '1'): ?>  
<div class="wapnone fk_service">
	<ul>
		<?php if($this->options->zmki_ah == '1'): ?>  
		<li class="fk_service_box fk_service_zmkiah" onclick="window.location.href='javascript:switchNightMode()'">
			<div class="fk_service_zmkiah_cont"> <span class="fk_service_triangle"></span>全新暗黑模式，夜间使用保护眼睛 </div>
		</li>
		 <?php endif; ?> 
		<li>
			<div class="fk_service_consult_cont1" style="display: none;"> <span class="fk_service_triangle"></span> 在线咨询 </div>
		</li>
		<li class="fk_service_box fk_service_consult">
			<div class="fk_service_consult_cont"> <span class="fk_service_triangle"></span>
				<div class="fk_service_consult_cont_top"> <span class="fk_service_hint"> <span class="fk_service_icon"></span>
						<span> 如遇问题，请联系站长 </span> </span> <span class="fk_service_button" onclick="window.open('https://wpa.qq.com/msgrd?v=3&uin=<?php $this->options->fk_zmki_qq(); ?>&site=qq&menu=yes')">QQ联系</span>
					<span class="fk_service_button" onclick="window.open('https://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=<?php $this->options->fk_zmki_email(); ?>')">在线邮件</span>
				</div> <span class="fk_service_phone"> QQ 请注明来意 ：<?php $this->options->fk_zmki_qq(); ?> </span> <span class="fk_service_check_site"> <span class="fk_service_icon"></span>
					<span onclick="window.open('<?php $this->options->fk_zmki_url(); ?>')">更多：<?php $this->options->fk_zmki_name(); ?></span> </span>
			</div>
		</li> 
		 <li class="fk_service_box fk_service_qr">
			<div class="fk_service_qr_cont"> <span class="fk_service_triangle"></span>
				<div class="fk_service_qrimg"> <span class="fk_service_qrimg_site"></span> 微信扫一扫关注 </div>
				<div class="fk_service_qrtext"><span><?php $this->options->fk_zmki_gzhtext(); ?></span></div>
			</div>
		</li>
		<li class="fk_service_box fk_service_zmkiqp"  onclick="javascript:document.getElementById('fullscreen').click();" > 
		<div class="fk_service_zmkiqp_cont"> <span class="fk_service_triangle"></span>切换全屏</div>
		</li>
		<li class="fk_service_box fk_service_feedback" onclick="window.location.href='<?php $this->options->zmki_links(); ?>'">
			<div class="fk_service_feedback_cont"> <span class="fk_service_triangle"></span> 提交收录，站长收到留言后即刻处理！ </div>
		</li> 
		<li class="fk_service_box fk_service_upward " onclick="javascript:document.getElementById('01').click();" style="display: block;" >
				<a id="01" href="/#" rel="go-top" class="fk_service_box fk_service_upward ">1</a>
			<div class="fk_service_upward_cont"> <span class="fk_service_triangle"></span> <span> 返回顶部 </span> </div>
			<a class="to-top" style="cursor: pointer; position: fixed; right: 38px; bottom: 38px;" id="d41d8cd98f00b204e9800998ecf8427e" "><i class="icon-up-small"></i></a>
			 <?php endif; ?>
			</li>		 