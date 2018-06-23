<?php
/**
 * Admin controller {/admin/}
 */


include_once '../models/admin/CategoriesModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';


// Set global path for admin
$smarty->setTemplateDir(TemplateAdminPrefix);
$smarty->assign('templateWebPath', TemplateAdminWebPath);


/**
 * Load Index Page Admin
 *
 * @param object $smarty
 */
function indexAction ($smarty) {

	$rsCategories = getAllMainCategories();

	$smarty->assign('titlePage', __('Admin'));
	$smarty->assign('rsCategories', $rsCategories);

	loadTemplate($smarty, 'header-admin');
	loadTemplate($smarty, 'index-admin');
	loadTemplate($smarty, 'footer-admin');
}


/**
 * Insert category from AJAX
 */
function addnewcatAction () {

	$catName     = $_POST['cat'];
	$catParentID = $_POST['catParent'];

	$res = insertCat($catName, $catParentID);

	if ($res) {
		$resData['success'] = 1;
		$resData['message'] = __('Category Add');
	} else {
		$resData['success'] = 0;
		$resData['message'] = __('Category Add Error');
	}

	echo json_encode($resData);
}