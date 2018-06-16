<?

// определяем с каким контроллером работаем
$controllerName = isset($_GET['controller'])
    ? ucfirst($_GET['controller']) // first letter to Uppercase, other to lowercase
    : 'Index';

echo '<br>' . $controllerName;

// определяем с каким екшеном работаем
$actionName = isset($_GET['action'])
    ? $_GET['action'] // first letter to Uppercase, other to lowercase
    : 'index';

echo '<br>' . $actionName;

include_once '../controllers/' . $controllerName . 'Controller.php';

// формируем название вызываемой функции в контроллере
$function = $actionName . 'Action';

echo '<br>' . $function;

$function(); // вызываем как функцию

// Константы для обращения к контроллерам
define('PathPrefix', '../controllers/');
define('PathPostfix', 'Controller.php');

function loadPage ($controllerName, $actionName = 'index') {
    include_once PathPrefix . $controllerName . PathPostfix;

    $function = $actionName . 'Action';
    $function();
}

loadPage($controllerName, $actionName);