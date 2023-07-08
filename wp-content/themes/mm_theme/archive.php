<?php get_header(); ?>
<main class="container">
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<article>
  
    <h1>
      Detail
    </h1>
<div class="detail">
	
	
	<dl>
		<div class="detail_text">
		<h2><?php the_title();  ?></h2>
      
        <?php if(get_field('site-url')): ?>
          <dt>サイトURL</dt>
          <dd><a href="<?php the_field('site-url'); ?>"><?php the_field('site-url'); ?></a></dd>
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
      </div>
      <div class="detail_img">
        <figure>
          <?php
                $image = get_field( 'work-photo1' ); //フィールド名「img_test」の画像オブジェクトの情報を取得

                if ( !empty( $image ) ) {
                  $url = $image[ 'url' ]; //画像のURL
                  $alt = $image[ 'alt' ]; //画像のalt
                  $title = $image[ 'title' ]; //画像のタイトル
                  $size = 'medium'; //出力サイズを変数に格納
                  $imgThumb = $image[ 'sizes' ][ $size ]; //サムネイル画像のURL
                  $width = $image[ 'sizes' ][ $size . '-width' ]; //サムネイル画像の幅サイズ
                  ?>
          <a href="<?php echo $url; ?>" title="<?php echo $title; ?>"> <img src="<?php echo $imgThumb; ?>" width="<?php echo $width; ?>" alt="<?php echo $alt; ?>" /> </a>
          <?php } ?>
          </figure>
      </div>
		
	</dl>
  </div>
</article>
<?php endwhile; endif; ?>
	<?php the_posts_pagination(
    array(
        'mid_size'      => 1, // 現在ページの左右に表示するページ番号の数
        'prev_next'     => true, // 「前へ」「次へ」のリンクを表示する場合はtrue
        'prev_text'     => __( 'PREV'), // 「前へ」リンクのテキスト
        'next_text'     => __( 'NEXT'), // 「次へ」リンクのテキスト
        'type'          => 'list', // 戻り値の指定 (plain/list)
    )
); ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>