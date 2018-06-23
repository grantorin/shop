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
function makeNewOrder($name, $phone, $address) {
	global $db;
	$name    = htmlspecialchars(mysqli_real_escape_string ($db, $name));
	$phone   = htmlspecialchars(mysqli_real_escape_string ($db, $phone));
	$address = htmlspecialchars(mysqli_real_escape_string ($db, $address));

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

	$rs = mysqli_query($db, $sql); // use query

	if ($rs) {
		$sql = "SELECT id
				FROM `orders`
				ORDER BY id DESC
				LIMIT 1";
		$rs = mysqli_query($db, $sql);
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
function getOrdersWithProductsByUser($userID) {
	global $db;
	$userID = intval($userID);
	$sql = "SELECT * FROM `orders`
			WHERE `user_id` = '{$userID}'
			ORDER BY `id` DESC";

	$rs = mysqli_query($db, $sql);

	$smartyRs = array();
	while ($row = mysqli_fetch_assoc($rs)) {
		$rsChildren = getPurcheseForOrder($row['id']);
		if ($rsChildren) {
			$row['children'] = $rsChildren;
			$smartyRs[] = $row;
		}
	}

	return $smartyRs;
}