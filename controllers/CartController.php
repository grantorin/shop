<?php
/**
 * Cart controller {/cart/}
 */

include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';


/**
 * Add to cart products item
 *
 * @return string JSON (status add, count items)
 */
function addtocartAction() {
	$itemID = isset($_GET['id']) ? intval($_GET['id']) : null;

	if(!$itemID) return false;

	if (isset($_SESSION['cart']) && array_search($itemID, $_SESSION['cart']) === false) {
		$_SESSION['cart'][] = $itemID;
		$resData['cntItems'] = count($_SESSION['cart']);
		$resData['success'] = 1;
	} else {
		$resData['success'] = 0;
	}

	echo json_encode($resData);
}


/**
 * Remove from cart products item
 *
 * @return string JSON (status add, count items)
 */
function removefromcartAction() {
	$itemID = isset($_GET['id']) ? intval($_GET['id']) : null;

	if(!$itemID) exit();

	$resData = array();
	$key = array_search($itemID, $_SESSION['cart']);
	if ($key !== false) {
		unset($_SESSION['cart'][$key]);
		$resData['cntItems'] = count($_SESSION['cart']);
		$resData['success'] = 1;
	} else {
		$resData['success'] = 0;
	}

	echo json_encode($resData);
}


/**
 * Load Cart Page
 *
 * @param object $smarty
 */
function indexAction($smarty) {
	$itemsIDs = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

	$rsCategories = getAllMainCatsWithChildren();
	$rsProducts = getProductsFromArray($itemsIDs);

	$smarty->assign('pageTitle', __('Cart'));
	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('rsProducts', $rsProducts);

	loadTemplate($smarty, 'header');
	loadTemplate($smarty, 'cart');
	loadTemplate($smarty, 'footer');
}


/**
 * Load Order Page
 *
 * @param $smarty
 */
function orderAction($smarty) {
	$itemsIDs = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;

	if (!$itemsIDs) redirect('/');

	$itemsCnt = array();
	foreach ($itemsIDs as $item) {
		// key for POST array
		$postVar = 'itemCnt_' . $item;

		// create items array count products
		// key = ID product, value = count product
		// sample: $itemmsCnt[1] = 3
		$itemsCnt[$item] = isset($_POST[$postVar]) ? $_POST[$postVar] : null;
	}

	$rsProducts = getProductsFromArray($itemsIDs);

	// add item product additional field
	// realPrice = count product * price product
	// cnt = count buy product
	// &$item - if change $item -> change $rsProducts
	$i = 0;
	foreach ($rsProducts as &$item) {
		$item['cnt'] = isset($itemsCnt[$item['id']]) ? $itemsCnt[$item['id']] : 0;
		if ($item['cnt']) {
			$item['realPrice'] = $item['cnt'] * $item['price'];
		} else {
			unset($rsProducts[$i]);
		}
		$i++;
	}

	if (!$rsProducts) {
		echo __('Cart empty');
		return;
	}

	$_SESSION['saleCart'] = $rsProducts;

	$rsCategories = getAllMainCatsWithChildren();

	$helpers = array(
		'subtitle'      => __('Orders data'),
		'titleCustomer' => __('Shipping Data'),
		'isShippingRequired' => 1
	);

	if (!isset($_SESSION['user'])) {
		$helpers['hideLoginBox'] = true;
	}

	$smarty->assign('helpers', $helpers);
	$smarty->assign('pageTitle', __('Order'));
	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('rsProducts', $rsProducts);

	loadTemplate($smarty, 'header');
	loadTemplate($smarty, 'order');
	loadTemplate($smarty, 'footer');
}