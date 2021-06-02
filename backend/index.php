<?php
require_once "../config/config.php";
require_once "../config/connection.php";
$requestUri= isset($_GET['uri']) ? $_GET['uri'] : 'dashboard';
$requestUri = str_replace('.php','',$requestUri);
$requestUri .= ".php";
?>
<?php
$pagePath=root_path('/backend/pages/'. $requestUri);
require_once root_path('backend/layouts/header.php');
require_once root_path('backend/layouts/top-header.php');
require_once root_path('backend/layouts/aside.php');



if (file_exists($pagePath) && is_file($pagePath)){
    require_once $pagePath;
}else{
//    echo "<h1>Page not found 404 {$requestUri}</h1>";
    require_once(root_path('/backend/pages/404.php'));

}
require_once root_path('backend/layouts/footer.php');


?>