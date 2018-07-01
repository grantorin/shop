<?php
/**
 * Model for orders table
 */

require_once 'PurchaseModel.php';

/**
 * Get orders with products by user
 *
 * @return array
 */
function get_orders () {
	global $db;

	$sql = "SELECT o.*, u.name, u.email, u.phone, u.address
			FROM `orders` AS `o`
			LEFT JOIN `users` AS `u` ON o.user_id = u.id
			ORDER BY id DESC";

	$rs = $db->query($sql);

	$smartyRs = array();
	while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {
		$rsChildren = get_purchases_for_order($row['id']);
		if ($rsChildren) {
			$row['children'] = $rsChildren;
			$smartyRs[] = $row;
		}
	}

	return $smartyRs;
}

/**
 * Update the Order Status of the manager
 *
 * @param int $itemID
 * @param string $date
 * @return bool|mysqli_result
 */
function update_order_status ($itemID, $date) {
	global $db;


	$sql = "UPDATE `orders`
			SET `date_payment` = '{$date}', `status` = 1
			WHERE id = '{$itemID}'";

	$rs = $db->query($sql);

	return $rs;
}