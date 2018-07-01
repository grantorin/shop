<?
error_reporting(E_ALL & ~E_NOTICE);

session_start();

// if session empty to create session array
if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}

require_once '../config/config.php';         // Initializing settings
require_once '../config/db.php';             // Initializing settings db
require_once '../library/mainFunctions.php'; // Common Functions

// set controller name
$controllerName = isset($_GET['controller'])
    ? ucfirst($_GET['controller']) // first letter to Uppercase, other to lowercase
    : 'Index';

// set action name
$actionName = isset($_GET['action'])
    ? $_GET['action']
    : 'index';

if (isset($_SESSION['user'])) {
	$smarty->assign('arUser', $_SESSION['user']);
}

$smarty->assign('cartCntItems', count($_SESSION['cart']));

loadPage($smarty, $controllerName, $actionName);