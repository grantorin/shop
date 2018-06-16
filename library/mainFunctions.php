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