<?php
	

	$file = 'data.txt';
	if(is_file($file)){
		$content = file_get_contents($file);
	}
	$_arr_data = str_word_count($content,1);

	//die(print_r($_arr_data));

	$str = 'INSERT INTO `examples_tags` (`id`, `file_id`, `tag`, `item`) VALUES';

	$count_record = 20000;

	$file_id = 1;

	$iter = NULL;
	$__arr = array();
	$_str = NULL;
	for($iter = 1; $iter <= $count_record ; $iter++)
	{

		$d1 = getRandomValFromArray($_arr_data);
		$d2 = getRandomValFromArray($_arr_data);
		$_str = "({$iter}, {$file_id}, '{$d1}', '{$d2}')";

		array_push($__arr, $_str);

		$file_id++;
		if($file_id == 50){$file_id = 1;}
		
	}

	$str = $str . implode(", ", $__arr) .';';
	file_put_contents('dimas.sql', $str);

	exit;



	function getRandomValFromArray($arr)
	{
		shuffle($arr);
		$rand_keys = array_rand($arr, 1);
		return $arr[$rand_keys];
    }//end of function 

	function getRandomStr($_needed_word = 1)
	{
		
		$from = rand(1, count($_arr));
		$out = array_slice($_arr, $from, $_needed_word);  
		return implode(" ", $out);
	}

