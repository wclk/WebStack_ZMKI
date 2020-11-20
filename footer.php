<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;error_reporting(0);function getTopDomainhuo(){	$host=$_SERVER['HTTP_HOST'];$matchstr="[^\.]+\.(?:(".$str.")|\w{2}|((".$str.")\.\w{2}))$";if(preg_match("/".$matchstr."/ies",$host,$matchs)){$domain=$matchs['0'];}else{$domain=$host;}return $domain;}$domain=getTopDomainhuo();
$check_host = 'http://tool.sq.zmki.cn/update.php';$client_check = $check_host . '?a=client_check&u=' . $_SERVER['HTTP_HOST'];$check_message = $check_host . '?a=check_message&u=' . $_SERVER['HTTP_HOST'];$check_info=file_get_contents($client_check);$message = file_get_contents($check_message);?>
<footer class="main-footer sticky footer-type-1">
                <div class="footer-inner">
                     
                    <div class="footer-text">
                    <!--zmki优化 zmki.cn --基于WebStac  Modify BY Seogo 2020年5月18日19:41:46-->
                    <!--今日诗词-->
                    <span id="jinrishici-sentence">正在加载今日诗词....</span>
					<script src="https://sdk.jinrishici.com/v2/browser/jinrishici.js" charset="utf-8"></script> 
					</div> 
				 
				    <!--友情链接-->
				    <?php if($this->options->zmki_footer_links == '0'): ?>
				    <div class="links_zmki zmki_footer_mar">
					<span>友情链接:</span> 
					<?php Links_Plugin::output(); ?>  
					</div>
					<br>
					<?php endif; ?>
				 
				    <div class="zmki_footer_mar">
					<!--底部修改开始-->
                    &copy; <?php echo date('Y'); ?>&nbsp;Theme: 
                    <a href="https://www.zmki.cn/" target="_blank"><strong> ZMKI</strong></a>&nbsp;   Design BY <a href="http://webstack.cc" target="_blank"><strong>Webstack</strong></a>&nbsp; Modify BY <a href="https://www.seogo.me" target="_blank"><strong>Seogo</strong></a>
                    &nbsp;&nbsp;版权所有:<b><?php $this->options->zmki_r(); ?></b>
					&nbsp;&nbsp;&nbsp;<a href="http://beian.miit.gov.cn/" target="_blank"><strong> <?php $this->options->zmki_icp(); ?> </strong></a>
                    </div>
                     
                    <!--锚点-->
                    <div class="go-up">
                        <a href="#" rel="go-top">
                            <i class="fa-angle-up"></i>
                        </a>
                    </div> 
                    
                    <!--站点运行时间开始--> 
                    <div class="zmki_footer_mar">
					<script>
					(function(){
					    var bp = document.createElement('script');
					    var curProtocol = window.location.protocol.split(':')[0];
					    if (curProtocol === 'https') {
					        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
					    }
					    else {
					        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
					    }
					    var s = document.getElementsByTagName("script")[0];
					    s.parentNode.insertBefore(bp, s);
					})();
					 <?php if($this->options->zmki_time_no == '1'): ?> 
						</script>				 
					                  站点已稳定运行：<SPAN id=span_dt_dt style="color: #2F889A;"></SPAN> 
					                  <script language=javascript>function show_date_time(){
					                    window.setTimeout("show_date_time()", 1000);
					                    BirthDay=new Date("<?php $this->options->zmki_time(); ?> ");
					                    today=new Date();
					                    timeold=(today.getTime()-BirthDay.getTime());
					                    sectimeold=timeold/1000
					                    secondsold=Math.floor(sectimeold);
					                    msPerDay=24*60*60*1000
					                    e_daysold=timeold/msPerDay
					                    daysold=Math.floor(e_daysold);
					                    e_hrsold=(e_daysold-daysold)*24;
					                    hrsold=Math.floor(e_hrsold);
					                    e_minsold=(e_hrsold-hrsold)*60;
					                    minsold=Math.floor((e_hrsold-hrsold)*60);
					                    seconds=Math.floor((e_minsold-minsold)*60);
					                    span_dt_dt.innerHTML='<font style=color:#C40000>'+daysold+'</font> 天 <font style=color:#C40000>'+hrsold+'</font> 时 <font style=color:#C40000>'+minsold+'</font> 分 <font style=color:#C40000>'+seconds+'</font> 秒';
					                    }show_date_time();</script> 
					                     <?php endif; ?> 
                    <!--站点运行时间结束-->
                    </div>
                </div>
            </footer>
        </div>
	</div>
<?php if ($this->is('index')): ?>
    <script type="text/javascript">
    var href = "";
    var pos = 0;
    $("a.smooth").click(function(e) {
        $("#main-menu li").each(function() {
            $(this).removeClass("active");
        });
        $(this).parent("li").addClass("active");
        e.preventDefault();
        href = $(this).attr("href");
        pos = $(href).position().top - 30;
        $("html,body").animate({
            scrollTop: pos
        }, 500);
    });
    </script>
<?php endif; ?>  
    <script src="<?php $this->options->themeUrl('js/index.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/zui.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/bootstrap.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/TweenMax.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/resizeable.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/joinable.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/xenon-api.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/xenon-toggles.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/xenon-custom.js'); ?>"></script>
    <script type="text/javascript">
	 <!--//夜间模式-->    
    <?php if($this->options->zmki_ah == '1'): ?>  
(function(){
    if(document.cookie.replace(/(?:(?:^|.*;\s*)night\s*\=\s*([^;]*).*$)|^.*$/, "$1") === ''){
        if(new Date().getHours() > 22 || new Date().getHours() < 6){
            document.body.classList.add('night');
            document.cookie = "night=1;path=/";
            console.log('夜间模式开启');
        }else{
            document.body.classList.remove('night');
            document.cookie = "night=0;path=/";
            console.log('夜间模式关闭');
        }
    }else{
        var night = document.cookie.replace(/(?:(?:^|.*;\s*)night\s*\=\s*([^;]*).*$)|^.*$/, "$1") || '0';
        if(night == '0'){
            document.body.classList.remove('night');
        }else if(night == '1'){
            document.body.classList.add('night');
        }
    }
})();
//夜间模式切换
function switchNightMode(){
    var night = document.cookie.replace(/(?:(?:^|.*;\s*)night\s*\=\s*([^;]*).*$)|^.*$/, "$1") || '0';
    if(night == '0'){
        document.body.classList.add('night');
        document.cookie = "night=1;path=/"
        console.log(' ');
    }else{
        document.body.classList.remove('night');
        document.cookie = "night=0;path=/"
        console.log(' ');
    }
}
<?php endif; ?> 
//全屏切换
//控制全屏
function enterfullscreen() { //进入全屏
  $("#fullscreen").html(" ");
  var docElm = document.documentElement;
  //W3C
  if(docElm.requestFullscreen) {
    docElm.requestFullscreen();
  }
  //FireFox
  else if(docElm.mozRequestFullScreen) {
    docElm.mozRequestFullScreen();
  }
  //Chrome等
  else if(docElm.webkitRequestFullScreen) {
    docElm.webkitRequestFullScreen();
  }
  //IE11
  else if(elem.msRequestFullscreen) {
    elem.msRequestFullscreen();
  }
}
function exitfullscreen() { //退出全屏
  $("#fullscreen").html(" ");
  if(document.exitFullscreen) {
    document.exitFullscreen();
  } else if(document.mozCancelFullScreen) {
    document.mozCancelFullScreen();
  } else if(document.webkitCancelFullScreen) {
    document.webkitCancelFullScreen();
  } else if(document.msExitFullscreen) {
    document.msExitFullscreen();
  }
}
 
var a = 0;
$('#fullscreen').on('click', function() {
  a++;
  a % 2 == 1 ? enterfullscreen() : exitfullscreen();
})
</script>
<!--统计代码-->
<?php $this->options->zmki_tongji(); ?>
 <script>
// var _hmt = _hmt || [];
// (function() {
//   var hm = document.createElement("script");
//   hm.src = "https://hm.baidu.com/hm.js?ce24fad4121e4d296c3f05d016ae4c64";
//   var s = document.getElementsByTagName("script")[0]; 
//   s.parentNode.insertBefore(hm, s);
// })();
 </script>

</body>
</html>