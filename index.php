<?php
//$phpversion= PHP_VERSION;
//if ($phpversion>7){
//    $requestUri =$_GET['uri'] ?? 'home';
//
//}else{
require_once "config/config.php";
$requestUri= isset($_GET['uri']) ? $_GET['uri'] : 'Home';
$requestUri = str_replace('.php','',$requestUri);
$requestUri .= ".php";
?>

<?php
$pagePath = root_path('frontend/pages/'. $requestUri);
require_once root_path('frontend/layouts/header.php');
require_once root_path('frontend/layouts/top-header.php');

if (file_exists($pagePath) && is_file($pagePath)){
    require_once $pagePath;
}else{
    echo "<h1>Page not found 404 {$requestUri}</h1>";
}
require_once root_path('frontend/layouts/footer.php');
?>

