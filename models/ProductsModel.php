<?php
/**
 * Model for products table
 */


/**
 * Get last Products from table {products}
 *
 * @param null $limit
 * @return array
 */
function getLastProducts($limit = null) {
	global $db;
	$sql = "SELECT *
            FROM `products`
            ORDER BY `id` DESC";

	if($limit) {
		$sql .= " LIMIT {$limit}";
	}

	$rs = mysqli_query($db, $sql); // use query

	return createSmartyRsArray($rs);
}


/**
 * Get Products by category
 *
 * @param $itemId
 * @return array
 */
function getProductsByCat($itemId) {
	global $db;

	$itemId = intval($itemId); // to integer
	$sql = "SELECT *
			FROM `products`
			WHERE `category_id` = '{$itemId}'";

	$rs = mysqli_query($db, $sql); // use query

	return createSmartyRsArray($rs);
}


/**
 * Get Product from DB by ID
 *
 * @param $itemId
 * @return array
 */
function getProductById($itemId) {
	global $db;

	$itemId = intval($itemId); // to integer
	$sql = "SELECT *
			FROM `products`
			WHERE `id` = '{$itemId}'";

	$rs = mysqli_query($db, $sql); // use query

	return mysqli_fetch_assoc($rs);
}