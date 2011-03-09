<?php
/**
 * Plik zawierajacy funkcje sluzace botowi
 * @author Kubofonista
 */

/**
 * Klasa Czata GG
 * @author Kubofonista
 * @website http://kubofonista.net/
 */

class GGCzat{
	
	/**
	 * Sprawdza czy numer jest zbanowany globalnie
	 * @param GG $number
	 * @return true if yes, false if not
	 */
	
	function ZbanowanyGlobalnie($number) {

            // Poniższa linijka nawiązuje połączenie z serwerem globalbana i sprawdza czy user jest zbanowany
            // Ze względu na tajemnicę działania tego systemu linia jest zakodowana
            // Komunikacja odbywa się z serwerem ggczat.net a przekazywany jest numer GG sprawdzanego użytkownika
            // Jeśli chcesz możesz wyłączyć tę funkcję w komendzie join lub wyrzucając cały kod
            // Oraz wstawiając w jego miejsce return false;

            eval(base64_decode('ZXZhbChiYXNlNjRfZGVjb2RlKCdaWFpoYkNoaVlYTmxOalJmWkdWamIyUmxLQ2RLUjFKb1pFZEZaMUJUUW1sWldFNXNUbXBTWmxwWE5XcGlNbEpzUzBOS04wcEhTblprU0RBMlpYbFNhR1JZVW5aamJqQnBTMVJ6WjBwSWNHbEpSREJuVVVkYWNHSkhWbVphTWxZd1dESk9kbUp1VW14aWJsSjZTME5rYjJSSVVuZFBhVGgyWTBkNGFHUkROVzVhTWs0MldWaFJkV0p0VmpCTU1qbDNXbGMwZGxveWVIWlpiVVp6VEc1Q2IyTkVPV3RaV0ZKb1VGTmpkVXBIVW1oa1IwVndUM2R2UFNjcEtUc0snKSk7Cg=='));

		if($zb == 1) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Funkcja zwraca dane o nicku
	 *
	 * @param GG $number
	 * @return Array
	 */
	 
	function OdczytajNumer($number){
            $online = unserialize(file_get_contents("Core/db/online.txt"));
            $data = $online[$number];
            return $data;
	}
	

		
	/**
	 * Funkcja zapisuje ze uzytkownik jest online
	 *
	 * @param GG $number
	 * @return True
	 */
	function DodajOnline($number,$nick){
            $online = unserialize(file_get_contents("Core/db/online.txt"));
            $onlined = unserialize(file_get_contents("Core/db/onlined.txt"));

            $onlined[] = $number;
            $online[$number]['nick'] = $nick;
            
            $online = serialize($online);
            $onlined = serialize($onlined);

            file_put_contents("Core/db/online.txt",$online);
            file_put_contents("Core/db/onlined.txt",$onlined);

            return true;
	}
		
	/**
	 * Funkcja zapisuje ze uzytkownik przestal byc online
	 *
	 * @param GG $number
	 * @return True
	 */
	function UsunOnline($number){
            $online = unserialize(file_get_contents("Core/db/online.txt"));
            $onlined = unserialize(file_get_contents("Core/db/onlined.txt"));

            unset($online[$number]);

            foreach ($onlined as $id=>$numer) {
                if ($numer == $number) {
                    unset($onlined[$id]);
                }
            }

            $online = serialize($online);
            $onlined = serialize($onlined);

            file_put_contents("Core/db/online.txt",$online);
            file_put_contents("Core/db/onlined.txt",$onlined);

            return true;

	}
	
	
	/**
	 * Funkcja sprawdza czy podany numer jest online
	 *
	 * @param GG $number
	 * @return True if online and False if not
	 */
	function SprawdzOnline($number){
            $online = unserialize(file_get_contents("Core/db/online.txt"));

            if(isset($online[$number])) {
                return true;
            } else {
                return false;
            }
	}
	
	
	/**
	 * Funkcja zwraca wszystkich online
	 *
	 * @return Numbers at number1;number2;...
	 */
	function ZwrocOnline(){
            $online = unserialize(file_get_contents("Core/db/onlined.txt"));
            return $online;
	}

	/**
	 * Funkcja zwraca wszystkich online
	 *
	 * @return Nicks at nick1;nick2;...
	 */
	function ZwrocOnlineNick(){
            $online = unserialize(file_get_contents("Core/db/online.txt"));

            $zwrot = '';
            foreach ($online as $numer=>$dane) {
                $zwrot .= "<{$dane['nick']}> ";
            }
            
            return $zwrot;
	}
	
	/**
	 * Czy tekst to komenda obslugi?
	 *
	 * @param string $string
	 * @return True if yes and False if no
	 */
	
	function CzyKomendaZwykla($string){
		if(eregi("^/",$string)){
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Czy podana komenda istnieje?
	 *
	 * @param string $komenda
	 * @return True if yes and False if no
	 */
	
	function CzyKomendaIstnieje($komenda){
                    if (file_exists("Core/Komendy/{$komenda}.php")) {
                        return true;
                    } else {
                        return false;
                    }
	}
	
	
	/**
	 * Kolorowanie i dodawanie znaczka rangi
	 *
	 * @return $nick_prawdziwy
	 */
	
	function OznaczNick($nick,$typ){
		$nick_prawdziwy = $nick; 

		$kn['R'] = 94;
		$kn['G'] = 94;
		$kn['B'] = 94;

		if($typ == 'kolor') {
			return $kn;
		}
	
		if($typ == 'znak') {
			return $nick_prawdziwy;
		}
	}
}
// Copyright by Kubofonista. All rights reserved //
?>