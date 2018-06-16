<?
/**
 * Index page Formation
 *
 * @param $smarty
 * @param $controllerName name controller
 * @param string $actionName name of the page function
 *
 */
function loadPage ($smarty, $controllerName, $actionName = 'index') {
    include_once PathPrefix . $controllerName . PathPostfix;

    $function = $actionName . 'Action';
    $function($smarty);
}

/**
 * Load Smarty Template
 *
 * @param $smarty
 * @param $templateName
 */
function loadTemplate($smarty, $templateName) {
    $smarty->display($templateName . TemplatePostfix);
}

/**
 * Debug
 *
 * @param null $value
 * @param int $die
 */
function d($value = null, $die = 1) {
    echo 'Debug: <br><pre>';
    print_r($value);
    echo '</pre>';

    if($die) die;
}