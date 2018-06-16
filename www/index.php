<?

// определяем с каким контроллером работаем
$controllerName = isset($_GET['controller'])
    ? ucfirst($_GET['controller']) // first letter to Uppercase, other to lowercase
    : 'Index';

echo $controllerName;

// определяем с каким екшеном работаем
$actionName = isset($_GET['action'])
    ? $_GET['action'] // first letter to Uppercase, other to lowercase
    : 'index';

echo $actionName;

include_once '../controllers/' . $controllerName . 'Controller.php';