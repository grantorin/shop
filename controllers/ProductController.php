<?php
/**
 * Product single page Controller {/product/1}
 */

include_once '../models/ProductsModel.php';
include_once '../models/CategoriesModel.php';

/**
 * Load Product Page
 *
 * @param object $smarty
 */
function indexAction($smarty) {

	$itemID = isset($_GET['id']) ? $_GET['id'] : null;

	if(!$itemID) exit('Not set product GET_parameter id!');

	$rsProduct = getProductById($itemID);

	$rsCategories = get_cats();

	$smarty->assign('itemInCart', 0);
	// if this product in session array
	if (in_array($itemID, $_SESSION['cart'])) {
		$smarty->assign('itemInCart', 1);
	}

	$smarty->assign('titlePage', '');
	$smarty->assign('rsCategories', $rsCategories); // all categories array
	$smarty->assign('rsProduct', $rsProduct); // all one item product array

	loadTemplate($smarty, 'header');
	loadTemplate($smarty, 'product');
	loadTemplate($smarty, 'footer');
}