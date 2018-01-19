<?php 

	/* count number of item */

	function CountItems($item, $table) {

		$db = new Database();
		$getRows = $db->getRows("SELECT $item FROM $table");
		$count = count($getRows);
		return $count;
	}

	/*statement check items function*/

	function chickItem($select, $from, $value) {

		$db = new Database();
		$getRow = $db->getRows("SELECT $select FROM $from WHERE $select = $value");
		$count = count($getRow);
		return $count;

	}	


 ?>