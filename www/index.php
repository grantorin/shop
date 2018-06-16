<?

include_once '../config/config.php'; // Initializing settings
include_once '../library/mainFunctions.php'; // Common Functions

// определяем с каким контроллером работаем
$controllerName = isset($_GET['controller'])
    ? ucfirst($_GET['controller']) // first letter to Uppercase, other to lowercase
    : 'Index';

// определяем с каким екшеном работаем
$actionName = isset($_GET['action'])
    ? $_GET['action'] // first letter to Uppercase, other to lowercase
    : 'index';

loadPage($controllerName, $actionName);