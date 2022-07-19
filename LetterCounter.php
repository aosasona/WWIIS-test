<?php

declare(strict_types=1);

class LetterCounter
{
	// Write your code here
	public function __construct()
	{
		// Do nothing on instantiation
	}

	public function countLettersInString(string $string)
	{
		$new_string = preg_replace("/\s+|\n+/", '', trim($string)); // Remove all whitespace and line-breaks
		$string_array = str_split(strtolower($new_string));
		$letters_count = [];

		foreach ($string_array as $letter) {
			if (isset($letters_count[$letter])) {
				$letters_count[$letter] .= '*';
			} else {
				$letters_count[$letter] = '*';
			}
		}

		$final_array = [];
		foreach ($letters_count as $letter => $count) {
			$count_text = "{$letter}:{$count}";
			array_push($final_array, $count_text);
		}

		$final_text = implode(',', $final_array);
		echo $final_text;
	}
}


// Test area
$lc = new LetterCounter();
$lc->countLettersInString("WWIIS Services Ltd");
