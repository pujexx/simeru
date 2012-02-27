<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'http://simeru.uad.ac.id/?mod=auth&sub=auth&do=process');
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS, 'user=mhs&pass=mhs&submit=Log In&id=');
curl_setopt ($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
$store = curl_exec ($ch);
//get jadwal
curl_setopt($ch, CURLOPT_URL, 'http://simeru.uad.ac.id/?mod=laporan_baru&sub=jadwal_prodi&do=daftar');
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS, 'fakultas=4&prodi=18&submit=Cari');
$content = curl_exec ($ch);
curl_close ($ch);
//$content;
//$html = new simple_html_dom();
//$html->load($content);
//$table_jadwal = $html->find('.content-table',0);
//$table_jadwal[0]->class ="table-form";

echo $content;

?>
