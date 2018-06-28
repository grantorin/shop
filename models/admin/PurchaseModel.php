<?php
/**
 * Model for purchase table
 */



/**
 * Get purchese for order
 *
 * @param integer $orderID
 * @return array
 */
function get_purchases_for_order($orderID) {
	global $db;

	$sql = "SELECT `pe`.*, `ps`.`name`
			FROM `purchase` AS `pe`
			JOIN `products` AS `ps` ON `pe`.`product_id` = `ps`.`id`
			WHERE `pe`.`order_id` = {$orderID} ";

	$rs = mysqli_query($db, $sql);

	return createSmartyRsArray($rs);
}