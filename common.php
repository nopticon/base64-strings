<?php

function w($a = '', $d = false) {
	if (!f($a) || !is_string($a)) return array();

	$e = explode(' ', $a);
	if ($d !== false) {
		foreach ($e as $i => $v) {
			$e[$v] = $d;
			unset($e[$i]);
		}
	}

	return $e;
}

//
// Thanks to:
// SNEAK: Snarkles.Net Encryption Assortment Kit
// Copyright (c) 2000, 2001, 2002 Snarkles (webgeek@snarkles.net)
//
// Used Functions: hex2asc()
//
function hex2asc($str) {
	$str2 = '';
	for ($n = 0, $end = strlen($str); $n < $end; $n += 2) {
		$str2 .=  pack('C', hexdec(substr($str, $n, 2)));
	}

	return $str2;
}

function encode($str) {
	return bin2hex(base64_encode($str));
}

function decode($str) {
	return base64_decode(hex2asc($str));
}

function f($s) {
	return !empty($s);
}

function _implode($glue, $pieces, $empty = false) {
	if (!is_array($pieces) || !count($pieces)) {
		return -1;
	}

	foreach ($pieces as $i => $v) {
		if (!f($v) && !$empty) unset($pieces[$i]);
	}

	if (!count($pieces)) {
		return -1;
	}

	return implode($glue, $pieces);
}