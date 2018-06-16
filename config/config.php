<?

// Константы для обращения к контроллерам
define('PathPrefix', '../controllers/');
define('PathPostfix', 'Controller.php');

//> Smarty
$template = 'default';
// path to template files .tpl
define('TemplatePrefix', "../views/$template/");
define('TemplatePostfix', '.tpl');
// path to template files in to web space (www)
define('TemplateWebPath', "/template/$template/");
// Smarty init
require('../library/smarty/libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->setTemplateDir(TemplatePrefix);
$smarty->setCompileDir('../tmp/smarty/cache');
$smarty->setConfigDir('../library/smarty/configs');
$smarty->assign('templateWebPath', TemplateWebPath);
//<