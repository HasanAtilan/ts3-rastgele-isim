<?php
$isim = array("Merhaba Dünya","Bugün Hava Nasıl","Selam");
$soyisim = "";
$ts3query = teamspeak_socket_init();
while (1) {
	$rastgeleyazimiz = $isim[rand(0,count($isim)-1)];
	while ($soyisim == $rastgeleyazimiz) {
		$rastgeleyazimiz = $isim[rand(0,count($isim)-1)];
	}
	echo teamspeak_socket_send($ts3query,"auth apikey=TS3 TELNET ANAHTARINIZI GİRİNİZ");
	echo teamspeak_socket_send($ts3query,"clientupdate client_nickname=".teamspeak_escape($rastgeleyazimiz));
	$soyisim = $rastgeleyazimiz;
	sleep(2); // Sleep ve Rand Kullandım Süre Giriniz Örnek: 2 ( Örnek 2 Saniyede Bir  Veya 15 Saniyede Bir Kendini Yeniler Rastgele İsim Verir)
}
fclose($ts3query);
?>
