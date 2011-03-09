<?php
/**
 * Plik obslugujacy bota wykonywany dla kazdej wiadomosci
 * @author Kubofonista
 */

error_reporting(0); // Zadne bledy maja nie byc wysylane do uzytkownika

#### USTALENIE KLUCZOWYCH ZMIENNYCH ####
$autor = $_GET['from']; // Autor wiadomosci - numer GG
$bot = $_GET['to']; // Numer GG bota.
$ip = $_SERVER['REMOTE_ADDR']; // Adres IP serwera GG
if(!isset($RAW_POST_DATA)){
	$tresc = $GLOBALS['HTTP_RAW_POST_DATA']; // Jeden sposob
} else {
	$tresc = $RAW_POST_DATA; // A tutaj drugi
}
#### EOF USTALENIE KLUCZOWYCH ZMIENNYCH ####

#### ZABEZPIECZENIE PRZED NIEAUTORYZOWANYM DOSTEPEM ####
if(!preg_match('/^91\.197\.15\.[0-9]{1,3}$/', $ip)) { // 91.197.15.* jest tylko dozwolone
	die('=== ZABEZPIECZENIE SKRYPTU ===
Jesli otrzymujesz ta wiadomosc na czacie to powiadom Administratora i zignoruj ponizszy tekst.
<br /><br />
Jesli wywolujesz ten skrypt z przegladarki to informuje Cie, ze Twoje IP zostalo zapisane.<br />
Pamietaj, ze Kto bez uprawnienia uzyskuje dostęp do informacji dla niego nieprzeznaczonej [...] omijajac [...] <br />
informatyczne lub inne szczególne jej zabezpieczenie, podlega grzywnie, karze ograniczenia wolnosci albo pozbawienia wolnosci do lat 2.<br />
<br />
Niniejsze wynika z Art. 267 Kodeksu Karnego § 1
<br /><br />
A adres tego pliku nie jest informacja dla Ciebie przeznaczona.<br />
=== Powered by Kubofonista GGCzat Open (http://open.ggczat.net) ===');
}

// Dodatkowe zabezpieczenie
eval(base64_decode('ZXZhbChiYXNlNjRfZGVjb2RlKCdaWFpoYkNoaVlYTmxOalJmWkdWamIyUmxLQ2RoVjFsdldtMXNjMXBXT1c1YVdGSm1XVEk1ZFdSSFZuVmtTRTF2U2pCT2RtTnRWWFprYlZaNVdESnNkVnBwTlhkaFNFRnVTMU5CYUZCVFFXNU9SMVpxVFhwQk5FNXFRbXRQVjFFeVRsZEthMDFYV1hoUFZFcHNUVVJKTVUxRVRUQlplbGt5VGpKUmJrdFRRamREYVVGblNVTkNhMkZYVlc5S01IaEtVVEJXVDFFd2NFSkpSVFZDU1VVNVVWVnJPVWhWYTBaT1ZERmtRbFJyYkVaSlJXUklTVVZPWVZGV1VXZFVNVUpHVkdsQ1lWUXhUbFZSWTFkQ1VWTkNZWGhaUmtKVVZVWlBVVkZ3UkZkclJsVkpSbkJRVlRGU1FuaFpSV2RYYTBaRFZFVTVURlF4WkVKVWJHdHpTVVpDVTFReFRrcFVWbXRuVkhsQ1RGUXdOVlZSVlhSVlNVVTFRa2xGUmtWVmExWlVTVWQwTVZsdFJrRmFNbVJxWlcxR01FeHROV3hrUTJOd1QzZHdPVU5uY0hCYWFXaDBXa1JXWmxwdGJITmFVMmR1VVRJNWVWcFRPVXhpTWpGc1ltMVNOVXd6V214amFUVjNZVWhCYmt0VFFXaFFVMEZ1VDBSb2FsbDZaekpaTWxwb1dXMVZNRTB5V21sTlJFVjZXV3BrYUU0eVZYaE5la3BwVGpKS2FWbHFZMjVMVTBJM1EybEJaMGxEUW10aFYxVnZTakI0U2xFd1ZrOVJNSEJDU1VVMVFrbEZaRWhSTVhCQ1ZrTkNVRlZGVms5SlJuQlFWVEZTUW5oWlJrSkpSbkpHWjFWR1RsRlZOVUpKUmtKUVZVWktZVkpXYjJkU1ZWSmFVVEJ5UlcxRFFsRlVSV3hNVmxOQ1lVbEZiRTlTYXpsVFZGVkdSRk56VTBWSlJUaG5VVlpXVlZReFNtRlNVMEpFVjJ0R1ZWWlJjR0ZTTURsRlZHdHNSa2xHYjJkVVJXeEVVbFUxUkZOelUwVkpSVFZLVWxOQ1RsUTRWemRVYTBWblYydEdWVkZWY0VKNFNWbG5Wa1ZXU0ZSNWQyZDRZblJHU1VWT1lWRldVV2RUYTFaVVZrTkNUMUZUUWxSVFZYaFBVMVYwVmtsRlpFaFJNWEJDVmtOQ1VGVkZWazlEYTBaRFYxTkNVRkpGU2sxVU1IUlFWakJJUldocFFrUlhhMFpWU1VVMVFsUkZXRVoxTVd0blZVWktZVmRXWkZOM05VNUVVMk5UUjBsRk9WTlhWV1JLVkd0R1RWUnpVMFZKUm5CQ1ZqQkdVMVpGTDBadGMxTkhTVVYwVUZSVlZrOVNSbXRuVEROYWJHTnBZM0JQZDNBNVEyYzlQU2NwS1RzSycpKTsK'));

#### EOF ZABEZPIECZENIE PRZED NIEAUTORYZOWANYM DOSTEPEM ####

#### ZABEZPIECZENIE PRZED PRZESLANIEM OBRAZKA ####
if(strpos($tresc,'--message boundary') !== false OR strpos($tresc,'Content-Type: image/image') !== false OR strpos($tresc,'Content-transfer-encoding: base64') !== false) {
	die('Wysylanie obrazkow do tego bota jest zablokowane
	=== Powered by Kubofonista GGCzat Open (http://ggczat.net) ===');
}
#### EOF ZABEZPIECZENIE PRZED PRZESLANIEM OBRAZKA ####

#### ZALACZANIE BIBLIOTEK ####
include_once('Core/config.php'); // Główna konfiguracja
include_once('Core/funkcje_ogolne.php'); // Biblioteka z funkcjami kluczowymi
include('Core/teksty.php'); // Biblioteka z tekstami zmienialnymi
include('Core/funkcje_tekstowe.php'); // Biblioteka z funkcjami tekstowymi BotAPI v 2.0

if(!file_exists('Core/config.php')) { die('Skrypt niezainstalowany poprawnie. Przeczytaj plik README.mkd'); }

#### EOF ZALACZANIE BIBLIOTEK ####

$ggczat = new GGCzat(); // Ustalamy klase GGCzata
$ggczat_tekst = new GGCzat_Tekst(); // Ustalamy klase tekstowa

$jestzalogowany = $ggczat->SprawdzOnline($autor); // Przypisujemy kto jest zalogowany

#### POBIERAMY DANE NUMERU KTORY PISZE DO BOTA ####
$onumerze = $ggczat->OdczytajNumer($autor); // Zwyczajnie odczytujemy dane z bazy
$nick_goscia = $onumerze['nick'];
#### USTALAMY PREFIXY DLA NICKOW OBSLUGI ####
$nick_prawdziwy = $ggczat->OznaczNick($nick_goscia,'znak');
$kolor_nicka = $ggczat->OznaczNick($nick_goscia,'kolor');
#### EOF USTALAMY PREFIXY DLA NICKOW OBSLUGI ####

#### KTO JEST ZALOGOWANY NA CZAT ####
$zalogowani_raw = $ggczat->ZwrocOnline(); // Pobieramy liste numerow online BotAPI v 2.0
$zalogowani = $zalogowani_raw;

foreach($zalogowani as $id=>$numer) {
	if($numer == $autor) {
		unset($zalogowani[$id]);
	}
}
#### EOF KTO JEST ZALOGOWANY NA CZAT ####

#### SPRAWDZAMY CZY WIADOMOSC TO KOMENDA ####
$czykomenda = $ggczat->CzyKomendaZwykla($tresc); // Dla staffu
#### EOF SPRAWDZAMY CZY WIADOMOSC TO KOMENDA ####

#### SPRAWDZAMY CZY UZYTKOWNIK JEST ZALOGOWANY ####
if($jestzalogowany == false AND (strpos($tresc,'/join') !== 0 AND $tresc != '/ver')){ // I czy nie chce do nas dolaczyc
		$ggczat_tekst->WiadomoscSystemowa(eval($str_niezal_1),1,0); // Jezeli nie to wyswietlamy komunikat
		die;
}
#### EOF SPRAWDZAMY CZY UZYTKOWNIK JEST ZALOGOWANY ####

#### AKCJE JEZELI KOMENDA DLA OBSLUGI ####

if($czykomenda == true){
	$rozbicie = explode(' ',$tresc); // Rozbijamy na komende i argumenty
	$komenda_r = $rozbicie[0]; // Sama komenda to argument 1
	$komenda = str_replace('/', '',$komenda_r); // Komenda bez znacznika /
	$istnienie = $ggczat->CzyKomendaIstnieje($komenda); // Sprawdzamy istnienie
	
	if ($istnienie == true){ // Gdy istnieje
		include("Core/Komendy/{$komenda}.php"); // Wykonujemy komende
		die; // Konczymy dzialanie skryptu
		
	} else { // Jesli komenda nie istnieje
		$ggczat_tekst->WiadomoscSystemowa(eval($str_nieist_1),1,0); // Wyswietlamy taki komunikat
		die;
	}
}
#### EOF AKCJE JEZELI KOMENDA DLA OBSLUGI ####

#### ROZSYLANIE WIADOMOSCI NORMALNEJ ####

// Jezeli spelnione zostaly wszystkie wymagania oraz nie jest to komenda //
// A takze uzytkownik jest zalogowany to wtedy mozemy rozeslac jego wiadomosc //

$ggczat_tekst->RozeslijWiadomosc("<{$nick_prawdziwy}> ",$tresc); // No i stalo sie...

// Koniec. Wiadomosc rozeslana :) //

#### EOF ROZSYLANIE WIADOMOSCI NORMALNEJ ####

// Copyright by Kubofonista. All rights reserved //
?>