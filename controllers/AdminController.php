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

	$rsCategories = get_cats_primary();

	$helpers = array(
		'activeMenu' => array(
			'index' => 1,
			'categories' => 0,
			'products' => 0,
			'orders' => 0
		)
	);

	$smarty->assign('helpers', $helpers);
	$smarty->assign('titlePage', __('Info'));
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

	$res = set_cat($catName, $catParentID);

	if ($res) {
		$resData['success'] = 1;
		$resData['message'] = __('Category Add');
	} else {
		$resData['success'] = 0;
		$resData['message'] = __('Category Add Error');
	}

	echo json_encode($resData);
}


/**
 * Load Category Page Admin
 *
 * @param object $smarty
 */
function categoryAction ($smarty) {

	$rsCategories = get_cats();
	$rsCategoriesPrimary = get_cats_primary();

	$helpers = array(
		'activeMenu' => array(
			'index' => 0,
			'categories' => 1,
			'products' => 0,
			'orders' => 0
		)
	);

	$smarty->assign('helpers', $helpers);
	$smarty->assign('titlePage', __('Categories'));
	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('rsCategoriesPrimary', $rsCategoriesPrimary);

	loadTemplate($smarty, 'header-admin');
	loadTemplate($smarty, 'category-admin');
	loadTemplate($smarty, 'footer-admin');
}


/**
 * Update category from AJAX
 */
function updatecategoryAction() {

	$catID = intval($_POST['catID']);
	$catParentID = intval($_POST['catParent']);
	$catName = trim($_POST['cat']);

	$res = update_cat($catID, $catParentID, $catName);

	if ($res) {
		$resData['success'] = 1;
		$resData['message'] = __('Category Update');
	} else {
		$resData['success'] = 0;
		$resData['message'] = __('Category Update Error');
	}

	echo json_encode($resData);
}