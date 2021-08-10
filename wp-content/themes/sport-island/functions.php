<?php

$widgets = [
    'widget-info.php',
    'widget-text.php',
    'widget-custom-contacts.php'
];

foreach( $widgets as $w ){
    require_once(__DIR__ . "/inc/" . $w );
}
add_action( 'wp_enqueue_scripts', '_si_enqueue_scripts' );
add_action('after_setup_theme', 'si_setup');
add_action( 'widgets_init', '_si_register_my_widgets' );
add_action( 'init', 'si_register_types' );
add_action('add_meta_boxes', 'si_meta_boxes');
add_action('save_post', 'likes_save_meta');


// // add_post_meta( $id, $slug, $value );

function si_meta_boxes(){
    add_meta_box(
        'si-like',
        'Количество лайков: ',
        'si_meta_like_cb',
        'post'
    );
}

function si_meta_like_cb( $post_obj ){
    $likes = get_post_meta($post_obj->ID, 'si-like', true);
    $likes = $likes ? $likes : 0;
//    echo '<p>' . $likes . '</p>';
    echo "<input type=\"text\" name=\"si-like\" value=\"${likes}\">";
}

function likes_save_meta( $post_id ){
    if(isset($_POST['si-like'])){
        update_post_meta( $post_id, 'si-like', $_POST['si-like'] );
    }
}

function si_register_types(){

    register_post_type( 'services', [
        'labels' => [
            'name'               => 'Тип записи', // основное название для типа записи
            'singular_name'      => 'Тип записи', // название для одной записи этого типа
            'add_new'            => 'Добавить новую Тип записи', // для добавления новой записи
            'add_new_item'       => 'Добавить новую Тип записи', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать Тип записи', // для редактирования типа записи
            'new_item'           => 'Новая Тип записи', // текст новой записи
            'view_item'          => 'Смотреть Тип записи', // для просмотра записи этого типа.
            'search_items'       => 'Искать Тип записи', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Тип записи', // название меню
        ],
        'public'              => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-admin-site-alt3',
        'hierarchical'        => false,
        'supports'            => ['title', 'editor', 'thumbnail'],
        'has_archive' => true
    ]);

    register_post_type( 'trainers', [
        'labels' => [
            'name'               => 'Тренеры', // основное название для типа записи
            'singular_name'      => 'Тренеры', // название для одной записи этого типа
            'add_new'            => 'Добавить новую Тренеры', // для добавления новой записи
            'add_new_item'       => 'Добавить новую Тренеры', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать Тренеры', // для редактирования типа записи
            'new_item'           => 'Новая Тренеры', // текст новой записи
            'view_item'          => 'Смотреть Тренеры', // для просмотра записи этого типа.
            'search_items'       => 'Искать Тренеры', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Тренеры', // название меню
        ],
        'public'              => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-groups',
        'hierarchical'        => false,
        'supports'            => ['title', 'editor', 'thumbnail'],
        'has_archive' => true
    ]);

    register_post_type( 'schedule', [
        'labels' => [
            'name'               => 'Расписание', // основное название для типа записи
            'singular_name'      => 'Расписание', // название для одной записи этого типа
            'add_new'            => 'Добавить новую Расписание', // для добавления новой записи
            'add_new_item'       => 'Добавить новую Расписание', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать Расписание', // для редактирования типа записи
            'new_item'           => 'Новая Расписание', // текст новой записи
            'view_item'          => 'Смотреть Расписание', // для просмотра записи этого типа.
            'search_items'       => 'Искать Расписание', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Расписание', // название меню
        ],
        'public'              => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-book-alt',
        'hierarchical'        => false,
        'supports'            => ['title', 'editor', 'thumbnail'],
        'has_archive' => true
    ]);
}

function _si_register_my_widgets(){

    register_widget('SI_Widget_Text');
    register_widget('SI_Widget_Contacts');

	register_sidebar([
		'name'          => "Телефон в шапке в шапке " ,
		'id'            => "si-widget-header-tel",
        'before_widget' => "",
        'after_widget' => ""
    ]);

    register_sidebar([
		'name'          => "Телефон в подвале " ,
		'id'            => "si-widget-footer-tel",
        'before_widget' => "",
        'after_widget' => ""
    ]);

    register_sidebar([
		'name'          => "Сайдбар в начале подвала" ,
		'id'            => "si-widget-footer-start",
        'before_widget' => "",
        'after_widget' => ""
    ]);

    register_sidebar([
		'name'          => "Сайдбар в середине подвала " ,
		'id'            => "si-widget-footer-middle",
        'before_widget' => "",
        'after_widget' => ""
    ]);

    register_sidebar([
		'name'          => "Сайдбар в конце подвала " ,
		'id'            => "si-widget-footer-last",
        'before_widget' => "",
        'after_widget' => ""
    ]);
}

function si_setup(){
    register_nav_menu( 'si_menu_header', 'меню в шапке' );
    register_nav_menu( 'si_menu_footer', 'меню в подвале' ); 
    add_theme_support( 'post-thumbnails' );
    add_theme_support('category-thumbnails');
}

function _si_assets_path( $path ) {
    return get_template_directory_uri() . '/assets/' . $path;
}



function _si_enqueue_scripts(){

    wp_enqueue_script(
        'js', 
        _si_assets_path('js/bootstrap.min.js'),
        [],
        '1.1',
        true  
    );

    wp_enqueue_script(
        'js_1', 
        _si_assets_path('js/js.js'),
        [],
        '1.1',
        true  
    );

    wp_enqueue_style (
        'si_style',
        _si_assets_path('css/styles.css'),
        [],
        '1.0',
        'all'


    );

    wp_enqueue_style (
        '_si_style_1',
        _si_assets_path('css/si-styles.css'),
        [],
        '1.0',
        'all'


    );


}
?>