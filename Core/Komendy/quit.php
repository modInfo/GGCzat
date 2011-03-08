<?php
/**
 * Komenda /quit
 * @author Kubofonista
 * @version $Id$7
*/

$l = explode(' ',$tresc,2);

$czyjest = $ggczat->SprawdzOnline($autor);

if(!$czyjest) {
    $ggczat_tekst->WiadomoscSystemowa('Nie jestes na czacie!',1,0);
    die;
}

if(!empty($l[1])){
$powod_wyjscia = "({$l[1]})";
}

$ggczat->UsunOnline($autor);
$ggczat_tekst->WiadomoscMultiple(eval($str_z_1),eval($str_z_2));
?>