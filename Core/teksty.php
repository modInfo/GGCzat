<?php
/**
 * Plik zawierajacy teksty edytowalne.
 * @author Kubofonista
 */

#### ADRES TWOJEJ STRONY ####
$str_adres = 'return "http://ggczat.net/";'; //Prezentowany w licencji
#### EOF ADRES TWOJEJ STRONY ####

#### NIEZALOGOWANY ####
$str_niezal_1 = 'return "Nie jestes zalogowany!! Wpisz /join nick";';
#### EOF NIEZALOGOWANY ####

#### KOMENDA NIE ISTNIEJE ####
$str_nieist_1 = 'return "Podana komenda nie istnieje !";';
#### EOF KOMENDA NIE ISTNIEJE ####

#### DOLACZENIE DO CZATA ####
$str_wit_1 = 'return "{$nick_prawdziwy} Witaj na czacie! Zyczymy milej dyskusji :)
Nasza strona WWW to: http://ggczat.net
Czat oparty jest na silniku GGCzat Open (http://open.ggczat.net)

Aktualnie zalogowani są: {$nickiteraz}";'; // Powitanie
$str_wit_2 = 'return "<{$nick_prawdziwy}>: ---> dolaczyl do nas";'; // Informacja o dolaczeniu
$str_jesteszalogowany_1 = 'return "Nie mozesz dolaczyc do czata gdy jestes juz na nim ;)";'; // Juz jest na czacie
#### EOF DOLACZENIE DO CZATA ####

#### WYJSCIE Z CZATA ####
$str_z_1 = 'return "{$nick_prawdziwy} do zobaczenia! Zapraszamy ponownie. Odwiedz http://ggczat.net";'; // Pozegnanie
$str_z_2 = 'return "<{$nick_prawdziwy}>:  ---> uciekl z czata i slad po nim zaginal {$powod_wyjscia}";'; // Informacja o odejsciu
#### EOF WYJSCIE Z CZATA ####

#### ZLE UZYCIE KOMEND ####
$str_syntax_join_1 = 'return "Zła składnia komendy, wpisz /join nick";';
#### EOF ZLE UZYCIE KOMEND ####

#### GLOBAL BAN ####
$str_globalniezbanowany_1 = 'return "Niestety wlasciciel skryptu zbanowal GLOBALNIE twoj numer. Nie masz wstepu do zadnego czatu opartego na tym skrypcie. Powod mozesz sprawdzic piszac na numer glownego czatu: 6188632. Odwolac mozesz sie TYLKO na forum skryptu -> http://forum.ggczat.net";';
#### EOF GLOBAL BAN ####

?>