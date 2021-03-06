<?php
/**
 * Model for [products] table
 */


/**
 * Get last Products from table {products}
 *
 * @param null|int $limit
 * @param int $offset
 * @return array
 */
function get_products_last($limit = null, $offset = 1) {
	global $db;

	$sqlCnt = "SELECT count(id) AS cnt
            FROM `products`";

	$rs = $db->query($sqlCnt);
	$cnt = createSmartyRsArray($rs);

	$sql = "SELECT *
            FROM `products`
            ORDER BY `id` DESC
            LIMIT {$offset}, {$limit}";

	$rs = $db->query($sql);

	$rows = createSmartyRsArray($rs);

	return array($rows, $cnt[0]['cnt']);
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

	$rs = $db->query($sql); // use query

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

	$rs = $db->query($sql); // use query

	return $rs->fetch(PDO::FETCH_ASSOC);
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

	$rs = $db->query($sql); // use query

	return createSmartyRsArray($rs);
}