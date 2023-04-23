<?php


require __DIR__ . "/inc/bootstrap.php";

$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$uri = explode("/", $uri);

require PROJECT_ROOT_PATH . "/Controller/Api/TaskController.php";
$objFeedController = new TaskController();

// konstrukce nazvu metody z URI
// /index.php/alltasks -> getalltasks()
$strMethodName = "get" . $uri[2];


try
{
    $objFeedController->{$strMethodName}();
}
catch (Error $e)
{
    echo $e->getMessage();
}
