<?php
/**
 * Komenda /join
 * @author Kubofonista
 * @version $Id$
 */

$l = explode(' ',$tresc);
$nick = $l[1];

if(empty($nick)) {
    $ggczat_tekst->WiadomoscSystemowa(eval($str_syntax_join_1),1,0);
    die;
}

if($jestzalogowany == true) {
	$ggczat_tekst->WiadomoscSystemowa(eval($str_jesteszalogowany_1),1,0);
	die;
}

$sprawdzenie_globalne = $ggczat->ZbanowanyGlobalnie($autor);

if($sprawdzenie_globalne) {
	$ggczat_tekst->WiadomoscSystemowa(eval($str_globalniezbanowany_1),1,0);
	die;
}

$nickiteraz = $ggczat->ZwrocOnlineNick();
$nick_prawdziwy = $nick;
$ggczat_tekst->WiadomoscSystemowa(eval($str_wit_1),1,0);
$ggczat_tekst->WiadomoscSystemowa(eval($str_wit_2),0,1);

$ggczat->DodajOnline($autor,$nick);

// Copyright by Kubofonista. All rights reserved //
?>