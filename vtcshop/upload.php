<?php
    define('_DIR_ROOT',__DIR__);
    if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
        $web_root = 'https://'.$_SERVER['HTTP_HOST'];
    }else {
        $web_root = 'http://'.$_SERVER['HTTP_HOST'];
    }
    $dir_root = str_replace('\\','/',_DIR_ROOT);
    $folder = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']), '',strtolower($dir_root));
    $web_root = $web_root.$folder;
    define('_WEB_ROOT', $web_root);

    $config_dir = scandir('config');
    if(!empty($config_dir)) {
        foreach ($config_dir as $item) {
            if($item!='.' && $item!='..' && file_exists('config/'.$item)) {
                require_once 'config/'.$item;
            }
        }
    }
    require_once "./systems/core/route.php";
    require_once "./site/App.php";
    
    if(!empty($conf['database'])) {
        $db_conf = ($conf['database']);
        
        if(!empty($db_conf)){
            require_once './systems/core/Connection.php';
            require_once './systems/core/Database.php';
        }
    }
    
    require_once './systems/core/ServiceProvider.php';
    require_once './systems/core/View.php';
    require_once "./systems/core/Model.php";
    require_once "./systems/core/Controller.php";

    require_once "./systems/core/Request.php";
    require_once "./systems/core/Response.php";
?>