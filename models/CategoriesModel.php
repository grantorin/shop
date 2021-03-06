<?php
/**
 * Model for categories table
 */

/**
 * Get subcategories
 *
 * @param int $catID
 * @return array
 */
function get_cats_child($catID) {
	global $db;
	$sql = "SELECT *
            FROM `categories`
            WHERE `parent_id` = {$catID}" ;

	$rs = $db->query($sql); // use query

	return createSmartyRsArray($rs);
}


/**
 * Get Categories together subcategories
 *
 * @return array
 */
function get_cats() {
	global $db;
	$sql = "SELECT *
            FROM `categories`
            WHERE `parent_id` = 0";

    $rs = $db->query($sql); // use query
	if ($rs) {

		$smartyRs = array();

		/* extraction of an associative array from query */
		while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {

			$rsChildren = get_cats_child($row['id']);
			if($rsChildren) {
				$row['children'] = $rsChildren;
			}

			$smartyRs[] = $row;
		}

		return $smartyRs;
	}
}


/**
 * Get category by ID
 *
 * @param $catID
 * @return array|null
 */
function get_cat_id($catID) {
	global $db;

	$catID = intval($catID); // to integer
	$sql = "SELECT *
			FROM `categories`
			WHERE `id` = '{$catID}'";

	$rs = $db->query($sql); // use query

	return $rs->fetch(PDO::FETCH_ASSOC);
}