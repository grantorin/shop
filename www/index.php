<?
error_reporting(E_ALL & ~E_NOTICE);

session_start();

// if session empty to create session array
if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}

include_once '../config/config.php';         // Initializing settings
include_once '../config/db.php';             // Initializing settings db
include_once '../library/mainFunctions.php'; // Common Functions

// определяем с каким контроллером работаем
$controllerName = isset($_GET['controller'])
    ? ucfirst($_GET['controller']) // first letter to Uppercase, other to lowercase
    : 'Index';

// определяем с каким екшеном работаем
$actionName = isset($_GET['action'])
    ? $_GET['action']
    : 'index';

$smarty->assign('cartCntItems', count($_SESSION['cart']));

loadPage($smarty, $controllerName, $actionName);