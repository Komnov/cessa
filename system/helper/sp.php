<?php
if (!defined('JSON_UNESCAPED_SLASHES')) {
	define('JSON_UNESCAPED_SLASHES', 0xFFFF);
}

/**
  * Use our custom json_encode function in case of older PHP versions
  *
  **/
if (!function_exists("json_enc")) {
	function json_enc($value, $options = 0, $depth = 512) {
		if (version_compare(phpversion(), '5.5.0') >= 0) {
			return json_encode($value, $options, $depth);
		} elseif (version_compare(phpversion(), '5.4.0') >= 0) {
			return json_encode($value, $options);
		} else {
			return json_encode($value);
		}
	}
}

/**
  * Remaps an array keys to SQL id fields
  *
  **/
if (!function_exists("array_remap_key_to_id")) {
	function array_remap_key_to_id($key, $results) {
		$new_array = array();

		foreach ($results as $result) {
			if (isset($result[$key])) {
				$new_array[$result[$key]] = $result;
			}
		}

		return $new_array;
	}
}

/**
  * Decode data string
  *
  **/
if (!function_exists("bdecode")) {
    function bdecode($s) {
        return json_decode(base64_decode($s));
    }
}

/**
  * Find the nth last position of needle in haystack and return the string after that
  *
  **/
if (!function_exists("strrnchr")) {
	function strrnchr($haystack, $needle, $occurance, $pos = 0) {
		$rev_haystack = strrev($haystack);
		for ($i = 1; $i <= $occurance; $i++) {
			$pos = strpos($rev_haystack, $needle, $pos);
			if ($pos === false) {
				return $haystack;
			} else {
				$pos += 1;
			}
		}
		return strrev(substr($rev_haystack, 0, $pos - 1));
	}
}
