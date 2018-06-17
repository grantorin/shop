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