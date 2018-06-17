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

/**
 *  Create assoc array from query
 *
 * @param $rs
 * @return array
 */
function createSmartyRsArray($rs) {

	if(!$rs) return false;

	$smartyRs = array();

	/* extraction of an associative array from query */
	while ($row = mysqli_fetch_assoc($rs)) {
		$smartyRs[] = $row;
	}

	return $smartyRs;
}


/**
 * Localization of the phrase
 *
 * @param $str
 * @return string
 */
function __($str) {
	return $str;
}