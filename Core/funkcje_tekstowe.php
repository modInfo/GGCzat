<?php
/**
 * Plik zawierajacy funkcje sluzace obslugi tekstow
 * @author Kubofonista
 */


class GGCzat_Tekst {

	function __construct(){
                global $botapi;

                    include('Core/BotAPI2/MessageBuilder.php');
                    include('Core/BotAPI2/PushConnection.php');
		
                $this->P = new PushConnection($botapi['gg'], $botapi['user'], $botapi['pass']);
	}


	function RozeslijWiadomosc($odkogo,$co){
		global $zalogowani, $kolor_nicka;

                if(!empty($zalogowani)) {
                $M = new MessageBuilder();
                $M->addText($odkogo,FORMAT_NONE,$kolor_nicka['R'],$kolor_nicka['G'],$kolor_nicka['B']);
                $M->addText($co,FORMAT_NONE,0,124,199);
                $M->setAlternativeText($odkogo.$co);
                $M->setRecipients($zalogowani);

                //$this->P->push($M);
                $M->reply();

                }

		return true;
	}


	function WiadomoscSystemowa($tresc,$doautora=1,$dowszystkich=0){
		global $autor,$zalogowani,$zalogowani_raw;

                $M = new MessageBuilder();

                $kodowanie = @mb_detect_encoding($tresc, "UTF-8,CP1250,CP-1250");

                if($kodowanie != 'UTF-8') {
                    $tresc=iconv('CP1250','UTF-8',$tresc);
                }

                $M->addText('* GGCzat: ',FORMAT_BOLD_TEXT,255,0,0);
                $M->addText($tresc,FORMAT_BOLD_TEXT,0,125,86);
                $M->setAlternativeText("* GGCzat: {$tresc}");

		if ($doautora == 1 AND $dowszystkich == 0){
                    $M->setRecipients($autor);
		}

		if($doautora == 0 AND $dowszystkich == 1){
                    $M->setRecipients($zalogowani);
		}

		if($doautora == 1 AND $dowszystkich == 1){
                    $M->setRecipients($zalogowani_raw);
		}

                $this->P->push($M);

	}

	function WiadomoscMultiple($tresc,$tresc2) {
            $this->WiadomoscSystemowa($tresc,1,0);
            $this->WiadomoscSystemowa($tresc2,0,1);
	}

	function ZmienStatus($typ,$tresc) {

                    switch ($typ) {
                        case 'back': $flaga=STATUS_BACK; break;
                        case 'away': $flaga=STATUS_AWAY; break;
                        case 'dnd': $flaga=STATUS_DND; break;
                        case 'invisible': $flaga=STATUS_INVISIBLE; break;
                        case 'ffc': $flaga=STATUS_FFC; break;
                    }

                    $this->P->setStatus($tresc,$flaga);
	}


	function WyslijWiadomosc($dokogo,$tresc){

                $M = new MessageBuilder();
                $M->addText('* GGCzat: ',FORMAT_BOLD_TEXT,255,0,0);
                $M->addText($tresc,FORMAT_BOLD_TEXT,0,128,0);
                $M->setAlternativeText("* GGCzat: {$tresc}");
                $M->setRecipients($dokogo);

                $this->P->push($M);
		}
	}
?>