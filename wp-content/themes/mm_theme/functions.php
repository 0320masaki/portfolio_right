<?php 
//必要機能の有効化
function mythme_setup(){
//theme.min.cssを有効化
add_theme_support('wp-block-styles');
//縦横比を維持したレスポンシブを有効化
add_theme_support('responsive-embeds');
//editor-style.cssを読み込む
add_theme_support('editor-styles');
add_editor_style('editor-style.css');
//ページのタイトルを有効化
add_theme_support('title-tag');
//link , style , scriptのHTML5対応を有効化
add_theme_support('html5',array('style','script'));
//アイキャッチ画像を有効化
add_theme_support('post-thumbnails');
//全幅・幅広を有効化
add_theme_support('align-wide');
//メニューのロケーションを登録
register_nav_menus(array('primary'=>'ナビゲーション'));
//2段組を有効化
add_theme_support('mycols');
}
add_action('after_setup_theme','mythme_setup');
//色々読み込む
function mytheme_enqueue(){
//Google fontsを読み込む
wp_enqueue_style('myfonts','https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;700&family=Noto+Sans+JP:wght@500&display=swap',array(),null);
//Dashiconsを読み込む
wp_enqueue_style('dashicons');
//style.cssを読み込む
wp_enqueue_style('mytheme-style',get_stylesheet_uri(),array(),filemtime(get_theme_file_path('style.css')));
}
add_action('wp_enqueue_scripts','mytheme_enqueue');
//ウィジェットを登録
function mytheme_widgets(){
register_sidebar(array('id'=>'sidebar-1','name'=>'コンタクトフォーム','before_widget'=>'<section id="%1$s" class="widget %2$s">','after_widget'=>'</section>'));
}
add_action('widgets_init','mytheme_widgets');
//デフォルト投稿にカスタムタクソノミーを追加
function add_taxonomy() {
register_taxonomy(
'design', //タクソノミースラッグ
'post', //利用する投稿タイプ（通常の投稿の場合は「post」、固定ページの場合は「page」）
array(
'label' => 'デザイン',
'singular_label' => 'デザイン',
'labels' => array(
'all_items' => 'デザイン',
'add_new_item' => '新規追加'
),
'public' => true,
'show_ui' => true,
'show_in_nav_menus' => true,
'hierarchical' => true //階層を持たせる場合は「true」、持たせない場合は「false」
)
);
register_taxonomy(
'front', //タクソノミースラッグ
'post', //利用する投稿タイプ（通常の投稿の場合は「post」、固定ページの場合は「page」）
array(
'label' => 'フロント',
'singular_label' => 'フロント',
'labels' => array(
'all_items' => 'フロント',
'add_new_item' => '新規追加'
),
'public' => true,
'show_ui' => true,
'show_in_nav_menus' => true,
'hierarchical' => true //階層を持たせる場合は「true」、持たせない場合は「false」
)
);
}
add_action( 'init', 'add_taxonomy' );
//カスタム投稿タイプの追加(diary)
function diary_custom_post_type(){
$labels = array(
'name' => '制作過程一覧',
'singular_name' => '制作過程一覧',
'add_new_item' => '制作過程を追加',
'add_new' => '新規追加',
'new_item' => '新規追加',
'view_item' => '制作過程を表示',
'not_found' => '制作過程情報は未登録です。',
'not_found_in_trash' => 'ゴミ箱に制作過程情報はありません。',
'search_items' => '制作過程情報を検索'
);
$args = array(
'labels' => $labels,
'public' => true,
'show_ui' => true,
'query_var' => true,
'rewrite' => true,
'capability_type' => 'post',
'hierarchical' => false,
'menu_position' => 5,
'has_archive' => true,
'supports' => array( 'title','editor',"thumbnail" ),
'taxonomies' => array( 'diary-cat', 'diary-tag'),
'rewrite' => true
);
register_post_type( 'diary', $args );
//カスタムタクソノミーを追加
//カテゴリータイプ
$args = array(
'label' => 'カテゴリー',
'public' => true,
'show_ui' => true,
'hierarchical' => true
);
register_taxonomy( 'diary-cat', 'diary', $args );
}
add_action( 'init', 'diary_custom_post_type' );
//フォーム編集
function custom_tag_filter($tag){
	if ( ! is_array( $tag ) ){
		return $tag;
	}
	$name = $tag['name'];
	//ラジオボタンの場合
	if(isset($_GET['radio'])){
		if($name == 'your-radio'){
			$tag['options'][] = "default:" . $_GET['radio'];
		}
	}
	return $tag;
}
add_filter('wpcf7_form_tag', 'custom_tag_filter', 11);
add_theme_support('menus');
