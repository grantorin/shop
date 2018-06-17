<?php
/**
 * Model for categories table
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
			$smartyRs[] = $row;
		}

		return $smartyRs;
	}
}