<?php

date_default_timezone_set('Asia/Jakarta');

function tgl_indonesia($date)
{
	/* array hari dan bulan */
	$nama_hari  = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");

	$nama_bulan = array(
		"Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober",
		"November", "Desember"
	);

	/*  Memisahkan format tanggal, bulan, tahun dengan substring */
	$tahun   = substr($date, 0, 4);
	$bulan   = substr($date, 5, 2);
	$tanggal = substr($date, 8, 2);
	$waktu   = substr($date, 11, 5);

	//w Urutan hari dalam seminggu
	$hari    = date("w", strtotime($date));

	$result  = $tanggal . " " . $nama_bulan[(int) $bulan - 1] . " " . $tahun . " ";
	//keterangan (int)$bulan-1 karena array dimulai dari index ke 0 maka bulan-1
	return $result;
}

function input_filter($input)
{
	$filter = stripslashes(htmlspecialchars($input, ENT_QUOTES));
	return $filter;
}

function character_filter($a)
{
	$b = array('-', '/', '\\', ',', '.', '#', ':', ';', '\'', '"', '[', ']', '{', '}', ')', '(', '|', '`', '~', '!', '@', '%', '$', '^', '&', '*', '=', '?', '+');
	$a = str_replace($b, '', $a);
	return $a;
}

function capital($a)
{
	$b = array('-', '/', '\\', ',', '.', '#', ':', ';', '\'', '"', '[', ']', '{', '}', ')', '(', '|', '`', '~', '!', '@', '%', '$', '^', '&', '*', '=', '?', '+');
	$a = str_replace($b, '', $a);
	$a = ucwords($a);
	return $a;
}

function rupiah($nominal)
{
	return 'Rp ' . number_format($nominal, 0, ',', '.');
}

if (!function_exists('get_hash')) {
	function get_hash($PlainPassword)
	{
		$option = [
			'cost' => 5, // proses hash sebanyak: 2^5 = 32x
		];
		return password_hash($PlainPassword, PASSWORD_DEFAULT, $option);
	}
}

if (!function_exists('hash_verified')) {
	function hash_verified($PlainPassword, $HashPassword)
	{
		return password_verify($PlainPassword, $HashPassword) ? true : false;
	}
}

function alpha_space($str)
{
	return (!preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
}
