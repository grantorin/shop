<?php
/**
 * Cart controller {/cart/}
 */

include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';


/**
 * Add to cart products item
 *
 * @param integer $itemID
 * @return json (status add, count items)
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
 * @param integer $itemID
 * @return json (status add, count items)
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