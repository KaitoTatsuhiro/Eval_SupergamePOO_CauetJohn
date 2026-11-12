<?php
require_once 'Model/Model.php';
require_once 'Model/ModelPlayer.php';

require_once 'View/View.php';
require_once 'View/ViewHome.php';

require_once 'Controller/Controller.php';
require_once 'Controller/ControllerHome.php';

require_once 'utils/utils.php';

require_once 'env.php';
$pdo = new pdo("mysql:host={$_ENV['dbhost']};dbname={$_ENV['dbname']}", $_ENV['login'], $_ENV['password'],[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$modelPlayer = new ModelPlayer($pdo);
$viewHome = new ViewHome();
$controller = new ControllerHome($modelPlayer,$viewHome);
$controller->registerPlayer();
$controller->displayPlayers();
$controller->render();
