<?php 
define("DS",DIRECTORY_SEPARATOR);
define("ROOT_PATH",dirname(__DIR__).DS);

define("APP",ROOT_PATH.'APP'.DS);

define("CORE",APP.'Core'.DS);
define("CONFIG",APP.'Config'.DS);
define("CONTROLLERS",APP.'Controllers'.DS);
define("MODELS",APP.'Models'.DS);
define("VIEWS",APP.'Views'.DS);
define("UPLOADS",ROOT_PATH.'public'.DS.'uploads'.DS);

define("Middleware",APP.'Middleware'.DS);
define("Validation",CORE . 'Validation' .DS);


// configuration files 
require_once(CONFIG.'config.php');
// require_once(CONFIG.'helpers.php');



// autoload all classes 
$modules = [ROOT_PATH,APP,CORE,CONTROLLERS,MODELS,CONFIG,Middleware,Validation];
set_include_path(get_include_path(). PATH_SEPARATOR.implode(PATH_SEPARATOR,$modules));
spl_autoload_register('spl_autoload');

/*
انا مش عارف ليه ال8 سطور الزيادة دول حسنوا حياتي 
مش فاهم ايه الجديد وانا اضفت ايه 
بس اشتغل
 */
spl_autoload_register(function($className) {
    $modelPaths = [
        MODELS . $className . '.php',
    ];
    foreach ($modelPaths as $path) {
        require_once $path;
    }
});




new App();