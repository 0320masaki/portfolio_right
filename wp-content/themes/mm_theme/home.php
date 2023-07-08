<?php get_header(); ?>
<main>
  <h1>Works</h1>
   
    <div class="container_wide postlist">
      <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
      <article <?php post_class(); ?>> 
        <h2><a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>
        </a></h2>
		  
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
		  
        
         </article>
      <?php endwhile; endif; ?>
    </div>
    <?php the_posts_pagination(
    array(
        'mid_size'      => 1, // 現在ページの左右に表示するページ番号の数
        'prev_next'     => true, // 「前へ」「次へ」のリンクを表示する場合はtrue
        'prev_text'     => __( '<span class="dashicons dashicons-arrow-left-alt2"></span>'), // 「前へ」リンクのテキスト
        'next_text'     => __( '<span class="dashicons dashicons-arrow-right-alt2"></span>'), // 「次へ」リンクのテキスト
        'type'          => 'list', // 戻り値の指定 (plain/list)
    )
); ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>