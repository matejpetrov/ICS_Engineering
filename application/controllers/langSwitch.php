<?php

 
class LangSwitch extends CI_Controller{
	
	public function __construct() {
		parent::__construct();		
	}
	
	//funkcija koja go zacuvuva vo sesija odbraniot jazik od korisnikot. Potoa ne prenasocuva na 
	//base_url(), ova ke go povika LanguageLoader-ot, koj e hook koj se povikuva po kreiranje na controller-ot
	//i toj od sesijata ke go procita jazikot i ke napravi load na pravilniot. 	
	public function switchLanguage($language = "") {
		
		$language = ($language != "") ? $language : "english";
		$this->session->set_userdata('site_lang', $language);
		$cookie = array(
				'name'   => 'language',
				'value'  => $language,
				'expire' => '86500',
				'path'   => '/',
				'prefix' => 'ics_',
				'secure' => false
				);
			set_cookie($cookie);																	
		//tuka treba da ja prikazeme stranata na koja sme bile prethodno na drugiot jazik. 
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}
	
}