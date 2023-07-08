<?php get_header(); ?>
<main>
  <h1>Process</h1>
   
    <div class="container_wide diary-list">
	  
      <?php
        $args = array(
          'post_type' => 'diary', /* カスタム投稿名で入力 */
          'posts_per_page' => -1, /* 表示する数 */ );
        ?>
        <?php $my_query = new WP_Query( $args ); ?>
        <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
        <!-- ▽ ループ開始 ▽ -->
      <article <?php post_class(); ?>><a href="<?php the_permalink(); ?>">
        <h2>
          <?php the_title(); ?>
        </h2>
		  
        
         </a></article>
      <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        <!-- △ ループ終了 △ --> 
    </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>