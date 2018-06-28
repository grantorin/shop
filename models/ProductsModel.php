<?php
/**
 * Model for products table
 */


/**
 * Get last Products from table {products}
 *
 * @param null|int $limit
 * @return array
 */
function get_products_last($limit = null) {
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
 * @param int $catID
 * @return array
 */
function get_products_by_cat($catID) {
	global $db;

	$catID = intval($catID); // to integer
	$sql = "SELECT *
			FROM `products`
			WHERE `category_id` = '{$catID}'";

	$rs = mysqli_query($db, $sql); // use query

	return createSmartyRsArray($rs);
}


/**
 * Get Product from DB by ID
 *
 * @param int $itemId
 * @return array
 */
function get_product_by_id($itemId) {
	global $db;

	$itemId = intval($itemId); // to integer
	$sql = "SELECT *
			FROM `products`
			WHERE `id` = '{$itemId}'";

	$rs = mysqli_query($db, $sql); // use query

	return mysqli_fetch_assoc($rs);
}


/**
 * Get Products from DB by IDs
 *
 * @param array $itemsIDs
 * @return array
 */
function get_products_from_array($itemsIDs) {
	global $db;

	$itemsIDs = implode($itemsIDs, ', ');
	$sql = "SELECT *
			FROM `products`
			WHERE `id` IN ({$itemsIDs})";

	$rs = mysqli_query($db, $sql); // use query

	return createSmartyRsArray($rs);
}