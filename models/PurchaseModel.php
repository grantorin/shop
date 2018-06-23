<?php
/**
 * Model for purchase table
 */


/**
 * Create products with reference to the order
 *
 * @param integer $orderID
 * @param array $cart
 * @return bool
 */
function setPurcheseForOrder ($orderID, $cart) {
	global $db;

	$sql = "INSERT INTO `purchase`
			(`order_id`, `product_id`, `price`, `amount`)
			VALUES ";

	$values = array();
	foreach ($cart as $item) {
		$values[] = "('{$orderID}', '{$item['id']}', '{$item['price']}', '{$item['cnt']}')";
	}

	$sql .= implode($values, ', ');
	$rs = mysqli_query($db, $sql);

	return $rs;
}