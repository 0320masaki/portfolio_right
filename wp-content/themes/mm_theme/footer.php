

<footer>
  <div class="container_wide footer-area">
  <?php if ( is_front_page() ) : ?>
<?php if(has_nav_menu('primary')): ?>
<nav>
  <?php wp_nav_menu(array('theme_location'=>'primary',)); ?>
	</nav>
<?php endif; ?> 
	
<?php else : ?>
<?php if(has_nav_menu('primary')): ?>
<nav>
  <?php wp_nav_menu(array('menu' => 'nav2')); ?>
	</nav>
<?php endif; ?>
	<?php endif; ?>
    <p><small>©2022&nbsp;masaki&nbsp;matsuoka&nbsp;Portfolio&nbsp;All&nbsp;Rights&nbsp;Reserved.</small></p>
  </div>
</footer>
</div> <!--id="luxy"-->
<?php wp_footer(); ?>
	

<!-- jQueryを読み込む -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- プラグインを読み込む -->
<script type="text/javascript"  src="<?php echo get_template_directory_uri(); ?>/js/luxy.js"></script>
<script>
	
$(function(){
	
  
	
  if (window.matchMedia("(max-width: 1024px)").matches) {
    //画面横幅が1024px以下のときの処理
  } else {
    //画面横幅が1024px以上のときの処理
	  luxy.init({
        wrapper: '#luxy', //慣性スクロールを包括する要素のID
        targets : '.luxy-el', //パララックスの要素のclass名
        wrapperSpeed:  0.08 //スクロールスピード
    });
	  
   
  };
	  

});
	
	$(function(){
  $('a[href^="#"]').click(function(){//href属性に#を含むaタグをクリックした時
    var href= $(this).attr("href");//クリックした要素のhref属性を取得
    var target = $(href == "#" || href == "" ? 'html' : href);//リンク先を取得
    var position = target.offset().top-50;//リンク先までの距離を取得
    $("html, body").animate({scrollTop:position}, 100);//スムーススクロール
    return false;
  });
});
	
</script>


</body>
</html>
