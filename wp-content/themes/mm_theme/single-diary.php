<?php get_header(); ?>
<main>
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

  
    <h1>
      制作過程
    </h1>
	<article>
<div class="container_wide diary-page">
	
	
	
<div class="diary-page_text">
	<dl>
		<h1><?php the_title();  ?></h1>
		
		<?php the_content(); ?>
      
        <?php if(get_field('site-url')): ?>
          <dt>サイトURL</dt>
          <dd><a href="<?php the_field('site-url'); ?>" target="_blank" rel="noopener"><?php the_field('site-url'); ?></a></dd>
          <?php endif; ?>
          
          <?php if(get_field('work-description')): ?>
          <dt>制作概要</dt>
          <dd><?php the_field('work-description'); ?></dd>
          <?php endif; ?>
          
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
		</dl>
      </div><!--diary-page_text-->
		
      <div class="diary-page_img">
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
          <a href="<?php echo $url; ?>" target="_blank" title="<?php echo $title; ?>"><img src="<?php echo $imgThumb; ?>" width="<?php echo $width; ?>" alt="<?php echo $alt; ?>" /> </a>
          <?php } ?>
          </figure>
      </div>
		
	
  </div>
	<?php the_post_navigation(
array(
        'prev_text'     => __( '<span class="dashicons dashicons-arrow-left-alt"></span>PREV'), // 「前へ」リンクのテキスト
        'next_text'     => __( 'NEXT<span class="dashicons dashicons-arrow-right-alt"></span>'), // 「次へ」リンクのテキスト
    )
); ?>
	<div class="container_wide detail linkBT"><a href="<?php echo home_url(); ?>/diary/">制作過程一覧ページへ戻る</a></div>
</article>
<?php endwhile; endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>