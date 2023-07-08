<?php get_header(); ?>

<main class="top-page">
	
	<!--ラインの表示-->
  <div class="fv line">
  <div class="line2">
    <div class="line3">
      <div class="line4">
          <div class="fv_text">
            <h1>masaki matsuoka</h1>
            <p>portfolio.</p>
          </div>
      </div>
    </div>
	  </div>
  </div>
	
  <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
 <?php the_content(); ?>
 <?php endwhile; endif; ?>
	
	<section id="top_products">
		
  <h2>Works</h2>
<div class="container_wide top_products">
	    <?php
  $args = array(
    'posts_per_page' => 3 // 表示件数の指定
  );
  $posts = get_posts( $args );
  foreach ( $posts as $post ): // ループの開始
  setup_postdata( $post ); // 記事データの取得
?>
	
	    <article>
		  <figure>
          <?php
                $image = get_field( 'work-photo1' ); //フィールド名「img_test」の画像オブジェクトの情報を取得

                if ( !empty( $image ) ) {
                  $url = $image[ 'url' ]; //画像のURL
                  $alt = $image[ 'alt' ]; //画像のalt
                  $title = $image[ 'title' ]; //画像のタイトル
                  $size = 'large'; //出力サイズを変数に格納
                  $imgThumb = $image[ 'sizes' ][ $size ]; //サムネイル画像のURL
                  $width = $image[ 'sizes' ][ $size . '-width' ]; //サムネイル画像の幅サイズ
                  ?>
          <a href="<?php the_permalink(); ?>"> <img src="<?php echo $imgThumb; ?>" width="<?php echo $width; ?>" alt="<?php echo $alt; ?>" /> </a>
          <?php } ?>
          </figure>
		<dl>
	      <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			
			 <?php if(get_field('work-scope')): ?>
          <dt>担当範囲</dt>
          <dd><?php the_field('work-scope'); ?></dd>
          <?php endif; ?>
          
          <?php if(get_field('technique')): ?>
          <dt>使用技術</dt>
          <dd><?php the_field('technique'); ?></dd>
          <?php endif; ?>
          
          <?php if(get_field('work-period')): ?>
          <dt>制作期間</dt>
            <dd><?php the_field('work-period'); ?></dd>
          <?php endif; ?>
			
			<?php if(get_field('work-process')): ?>
          <h4><a href="<?php the_field('work-process'); ?>"><span class="dashicons dashicons-arrow-right-alt"></span>制作過程はこちら</a></h4>
          
          <?php endif; ?>
			
			</dl>
			
		</article>
		
	    <?php
  endforeach; // ループの終了
  wp_reset_postdata(); 
?>
		
      </div><!--container_wide-->
	<div class="container_wide linkBT"><a href="<?php echo home_url(); ?>/products/">制作実績一覧を見る</a></div>
			
		
			
		</section>


<?php get_sidebar(); ?>
<?php get_footer(); ?>