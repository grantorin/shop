<?

// Constants for controllers
define('PathPrefix', '../controllers/');
define('PathPostfix', 'Controller.php');

//> Smarty
$template = 'default';
$template_admin = 'admin';

// path to template files .tpl
define('TemplatePrefix', "../views/$template/");
define('TemplateAdminPrefix', "../views/$template_admin/");
define('TemplatePostfix', '.tpl');

// path to template files in to web space (www)
define('TemplateWebPath', "/templates/$template/");
define('TemplateAdminWebPath', "/templates/$template_admin/");

// Smarty init
require('../library/smarty/libs/Smarty.class.php');

$smarty = new Smarty();
$smarty->setTemplateDir(TemplatePrefix);
$smarty->setCompileDir('../tmp/smarty/cache');
$smarty->setConfigDir('../library/smarty/configs');
$smarty->assign('templateWebPath', TemplateWebPath);
//<