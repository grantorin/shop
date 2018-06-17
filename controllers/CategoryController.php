<?php
/**
 * Category page Controller {/category/1}
 */

include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

/**
 * Load Category Page
 *
 * @param object $smarty
 */
function indexAction($smarty) {

	$catID = isset($_GET['id']) ? $_GET['id'] : null;

	if(!$catID) exit('Not set category GET_parameter id!');

	$rsProducts = null;
	$rsChildCats = null;
	$rsCategory = getCatById($catID);

	// if Category lead show childrens categories
	// else show products
	if(intval($rsCategory['parent_id']) == 0) {
		$rsChildCats = getChildrenForCat($catID);
	} else {
		$rsProducts = getProductsByCat($catID);
	}

	$rsCategories = getAllMainCatsWithChildren();

	if(isset($rsChildCats)) {
		$smarty->assign('pageTitle', __('Категория:') . ' ' . $rsCategory['name']);
		$smarty->assign('rsChildCats', $rsChildCats);
	}

	if (isset($rsProducts)) {
		$smarty->assign('pageTitle', __('Товары категории') . ' ' . $rsCategory['name']);
		$smarty->assign('rsProducts', $rsProducts);
	}

	$smarty->assign('rsCategory', $rsCategory); // this category array

	$smarty->assign('rsCategories', $rsCategories); // all categories array

	loadTemplate($smarty, 'header');
	loadTemplate($smarty, 'category');
	loadTemplate($smarty, 'footer');
}