<?php
/**
 * Cart controller {/cart/}
 */

include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';


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

	$rsCategories = get_cats();
	$rsProducts = get_products_from_array($itemsIDs);

	$smarty->assign('titlePage', __('Cart'));
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

	$rsProducts = get_products_from_array($itemsIDs);

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

	$rsCategories = get_cats();

	$helpers = array(
		'subtitle'      => __('Orders data'),
		'titleCustomer' => __('Shipping Data'),
		'isShippingRequired' => 1
	);

	if (!isset($_SESSION['user'])) {
		$helpers['hideLoginBox'] = true;
	}

	$smarty->assign('helpers', $helpers);
	$smarty->assign('titlePage', __('Order'));
	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('rsProducts', $rsProducts);

	loadTemplate($smarty, 'header');
	loadTemplate($smarty, 'order');
	loadTemplate($smarty, 'footer');
}


/**
 * Save Order from AJAX
 *
 * @return string JSON|null
 */
function saveorderAction () {

	$cart = isset($_SESSION['saleCart']) ? $_SESSION['saleCart'] : null;

	if (!$cart) {
		$resData['success'] = 0;
		$resData['message'] = __('Not Products or Sale');
		echo json_encode($resData);
		return;
	}

	$name    = isset($_POST['name'])    ? trim($_POST['name'])    : null;
	$phone   = isset($_POST['phone'])   ? trim($_POST['phone'])   : null;
	$address = isset($_POST['address']) ? trim($_POST['address']) : null;

	$orderID = set_order($name, $phone, $address);

	if (!$orderID) {
		$resData['success'] = 0;
		$resData['message'] = __('Error create order');
		echo json_encode($resData);
		return;
	}

	$res = setPurcheseForOrder($orderID, $cart);

	if ($res) {
		$resData['success'] = 1;
		$resData['message'] = __('Save Order');
		unset($_SESSION['saleCart']);
		unset($_SESSION['cart']);
	} else {
		$resData['success'] = 0;
		$resData['message'] = __('Save Order Error, order #: ' . $orderID);

	}

	echo json_encode($resData);
}