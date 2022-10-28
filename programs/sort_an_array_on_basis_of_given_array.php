<?php 
//sort an array on basis of given array by surya
function sort_arr_on_basis_of_given_array($arr){
	$sizes = array('STANDARD','STANDARD SHR','STANDARD REG','STANDARD TAL','2XS','2XS SHR','2XS REG','2XS TAL', 'XS','XS SHR','XS REG','XS TAL','1X','1X SHR','1X REG','1X TAL','2X','2X SHR','2X REG','2X TAL','3X','3X SHR','3X REG','3X TAL','4X','4X SHR','4X REG','4X TAL','5X','5X SHR','5X REG','5X TAL','6X','6X SHR','6X REG','6X TAL','7X','7X SHR','7X REG','7X TAL','8X','8X SHR','8X REG','8X TAL','S','S SHR','S REG','S TAL', 'M','M SHR','M REG','M TAL', 'L','L SHR','L REG','L TAL', 'XL','XL SHR','XL REG','XL TAL', '2XL','2XL SHR','2XL REG','2XL TAL', '3XL','3XL SHR','3XL REG','3XL TAL', '4XL','4XL SHR','4XL REG','4XL TAL', '5XL','5XL SHR','5XL REG','5XL TAL','6XL','6XL SHR','6XL REG','6XL TAL','7XL','7XL SHR','7XL REG','7XL TAL','8XL','8XL SHR','8XL REG','8XL TAL','9XL','9XL SHR','9XL REG','9XL TAL','10XL','10XL SHR','10XL REG','10XL TAL', 'S/M','S/M SHR','S/M REG','S/M TAL','L/XL','L/XL SHR','L/XL REG','L/XL TAL','2XL3XL','2XL3XL SHR','2XL3XL REG','2XL3XL TAL');
	
	$index_arr = array();
	for($i=0; $i<count($arr); $i++){
		for($j=0; $j<count($sizes); $j++){
			if($arr[$i] == $sizes[$j]){
				$index_arr[$arr[$i]] = $j; 
			}
		}
	}
	//echo "<pre>"; print_r($index_arr); //die;
	asort($index_arr);
	//echo "<pre>"; print_r($index_arr); //die;
	$fa = array_flip($index_arr);
	//echo "<pre>"; print_r($fa); //die;
	$final_arr = array_values($fa);
	//echo "<pre>"; print_r($final_arr); die;
	return $final_arr;

}
//echo "<pre>"; print_r($sizes); //die;
//$arr = array('L/XL REG','STANDARD','2XL3XL','2XL3XL REG','2XL3XL TAL','2XL3XL SHR','2XS','2XS SHR');
$arr = array('8X TAL','S','6XL SHR','10XL','10XL SHR','2XS','2XL3XL REG','XS TAL','1X');
$final_arr = sort_arr_on_basis_of_given_array($arr);
echo "<pre>"; print_r($final_arr); die;
?>