<?php

require_once('./vendor/autoload.php');
require_once('./DBConnection.php');

$loader = new \Twig\Loader\FilesystemLoader('./templates');
$twig = new \Twig\Environment(
    $loader
    // , [
    //     'cache' => './compilation_cache',
    // ]
);

$db_conn = new DBConnection();

if (array_key_exists('url', $_GET)) {

    $url = $_GET['url'];
    $p_array = explode('/', $url);
    if (!file_exists($p_array[0] . '.php')) {
        echo "Sorry, wrong route";
        exit;
    }
    require_once($p_array[0] . '.php');
    $handle_obj = new $p_array[0]($db_conn, $twig);
    if (array_key_exists(1, $p_array)) {
        $method = $p_array[1] . 'Method';
    } else {
        $method = 'indexMethod';
    }

    if (array_key_exists(2, $p_array)) {
        $handle_obj->$method($p_array[2]);
    } else {
        $handle_obj->$method();
    }
    exit();
}



$restaruant = $db_conn->getAllrestaruants();
$categories = $db_conn->getAllCategories();

$new_category = array(
    0 => 'All'
);
foreach ($categories as $category)
    $new_category += array(
        $category['id'] => $category['name']
    );

try {
    echo $twig->render(
        'index.html.twig',
        array(
            'name' => 'Restaruant Rating',
            'restaruants' => $restaruant,
            'categories' => $new_category,
            'c_id' => 0
        )
    );
} catch (Exception $e) {
    echo $e->getMessage();
}
