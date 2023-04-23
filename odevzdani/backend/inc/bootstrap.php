<?php
define("PROJECT_ROOT_PATH", __DIR__ . "/../");

// config 
require_once PROJECT_ROOT_PATH . "/inc/config.php";

// base controller
require_once PROJECT_ROOT_PATH . "/Controller/Api/BaseController.php";

// populator
require_once PROJECT_ROOT_PATH . "/Controller/Populator.php";

// generator
require_once PROJECT_ROOT_PATH . "/Controller/Generator.php";

// task model 
require_once PROJECT_ROOT_PATH . "/Model/TaskModel.php";


