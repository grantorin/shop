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


/**
 * Get purchese for order
 *
 * @param integer $orderID
 * @return array
 */
function getPurcheseForOrder($orderID) {
	global $db;

	$sql = "SELECT `pe`.*, `ps`.`name`
			FROM `purchase` as `pe`
			JOIN `products` as `ps` ON `pe`.`product_id` = `ps`.`id`
			WHERE `pe`.`order_id` = {$orderID} ";

	$rs = mysqli_query($db, $sql);

	return createSmartyRsArray($rs);
}