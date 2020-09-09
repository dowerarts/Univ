<?php

require_once 'function.php';
$no = 1;

echo "NPM Anda : ";
$npm = trim(fgets(STDIN));

echo "Nama Depan : ";
$nama1 = trim(fgets(STDIN));

echo "Nama Belakang : ";
$nama2 = trim(fgets(STDIN));

echo "Alamat : ";
$address = trim(fgets(STDIN));

echo "Nomor Handphone : ";
$nohp = trim(fgets(STDIN));

while (true) {
$cookie = curl('https://unindra.ac.id/daftar-hadir/', null, null);
$session = $cookie[2]['PHPSESSID'];
$episode = get_between($cookie[1], '<a href="', '">');
$berapa = get_between($cookie[1], '<button class="btn btn--radius btn--green">', '</button></a>');

echo "[1] Sedang Absen Di Episode $berapa\n";
sleep(5);
$headers = [
    'Host: unindra.ac.id',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0',
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
    'Accept-Language: id,en-US;q=0.7,en;q=0.3',
    'Content-Type: application/x-www-form-urlencoded',
    'Origin: https://unindra.ac.id',
    'Connection: close',
    'Referer: https://unindra.ac.id/daftar-hadir/'.$episode.'',
    'Cookie: PHPSESSID='.$session.'',
    'Upgrade-Insecure-Requests: 1',
];

$postdata = 'npm='.$npm.'&nama_depan='.$nama1.'&nama_belakang='.$nama2.'&fakultas=3&prodi=9&alamat='.$address.'&nomor_handphone='.$nohp.'&btn=';
$isidata = curl('https://unindra.ac.id/daftar-hadir/'.$episode.'/input-aksi.php', $postdata, $headers);

$hasil = get_between($isidata[1], 'alert (" ', '.");');

echo "[2] Absensi Hari Episode $berapa Dengan Data : $hasil\n";
echo "[3] Selesai Absensi\n";
echo "[4] Menunggu 1 Jam Lagi Untuk Absen\n";
sleep(3600);
}
