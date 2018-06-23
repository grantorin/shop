<?php
/**
 * Admin controller {/admin/}
 */


include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';

// Set global path for admin
$smarty->setTemplateDir(TemplateAdminPrefix);
$smarty->assign('templateWebPath', TemplateAdminWebPath);


function indexAction ($smarty) {

	$smarty->assign('titlePage', __('Admin'));

	loadTemplate($smarty, 'header-admin');
	loadTemplate($smarty, 'index-admin');
	loadTemplate($smarty, 'footer-admin');
}