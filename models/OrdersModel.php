<?php
/**
 * Model for orders table
 */


/**
 * Create New Order and return IDs record
 *
 * @param string $name
 * @param string $phone
 * @param string $address
 * @return integer|bool
 */
function set_order ($name, $phone, $address) {
	global $db;
	$name    = htmlspecialchars($name);
	$phone   = htmlspecialchars($phone);
	$address = htmlspecialchars($address);

	$userID = $_SESSION['user']['id'];
	$comment = "User ID:  {$userID}<br>
				Name: {$name}<br>
				Phone: {$phone}<br>
				Address: {$address}";

	$dateCreated = date('Y.m.d H:i:s');
	$userIP = $_SERVER['REMOTE_ADDR'];

	$sql = "INSERT INTO
			`orders` (`user_id`, `date_created`, `date_payment`, `status`, `comment`, `user_ip`)
			VALUE ('{$userID}', '{$dateCreated}', null, '0', '{$comment}', '{$userIP}')";

	$rs = $db->query($sql); // use query

	if ($rs) {
		$sql = "SELECT id
				FROM `orders`
				ORDER BY id DESC
				LIMIT 1";
		$rs = $db->query($sql);
		$rs = createSmartyRsArray($rs);

		// return query id
		if (isset($rs[0])) {
			return $rs[0]['id'];
		}

		return false;
	}
}


/**
 * Get orders with products by user
 *
 * @param integer $userID
 * @return array
 */
function get_orders_user($userID) {
	global $db;
	$userID = intval($userID);
	$sql = "SELECT * FROM `orders`
			WHERE `user_id` = '{$userID}'
			ORDER BY `id` DESC";

	$rs = $db->query($sql);

	$smartyRs = array();
	while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {
		$rsChildren = get_purchese_for_order($row['id']);
		if ($rsChildren) {
			$row['children'] = $rsChildren;
			$smartyRs[] = $row;
		}
	}

	return $smartyRs;
}