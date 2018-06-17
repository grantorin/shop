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
function getChildrenForCat($catID) {
	global $db;
	$sql = 'SELECT *
            FROM categories
            WHERE parent_id = ' . $catID;

	$rs = mysqli_query($db, $sql); // use query

	return createSmartyRsArray($rs);
}


/**
 * Get Categories together subcategories
 *
 * @return array
 */
function getAllMainCatsWithChildren() {
	global $db;
	$sql = 'SELECT *
            FROM categories
            WHERE parent_id = 0';
    $rs = mysqli_query($db, $sql); // use query
	if ($rs) {

		$smartyRs = array();

		/* extraction of an associative array from query */
		while ($row = mysqli_fetch_assoc($rs)) {

			$rsChildren = getChildrenForCat($row['id']);
			if($rsChildren) {
				$row['children'] = $rsChildren;
			}

			$smartyRs[] = $row;
		}

		return $smartyRs;
	}
}