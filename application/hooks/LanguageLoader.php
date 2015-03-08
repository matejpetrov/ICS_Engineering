<?php

//klasa koja pravi load na potrebniot jazik, vo zavisnost na koja strana se naogame (angliska ili makedonska).
//Dokolku nemame definirano jazik (na primer za prvapt pristapuvame do stranata), togas default jazikot go stavame
//da bide angliski, sto znaci deka ke se napravi load na angliskata verzija na stranata. 
class LanguageLoader
{
	function initialize(){
		$ci =& get_instance();
		$ci->load->helper('language');
		$ci->load->library('session');
		
		$site_lang = $ci->session->userdata('site_lang');
		if ($site_lang) {
			$ci->lang->load('menus', $ci->session->userdata('site_lang'));
			$ci->lang->load('additional', $ci->session->userdata('site_lang'));
			$ci->lang->load('contact', $ci->session->userdata('site_lang'));
			$ci->lang->load('about_us', $ci->session->userdata('site_lang'));
			$ci->lang->load('services', $ci->session->userdata('site_lang'));
			$ci->lang->load('products', $ci->session->userdata('site_lang'));
		} 
		else {
			$ci->lang->load('menus', 'english');
			$ci->lang->load('additional', 'english');
			$ci->lang->load('contact', 'english');
			$ci->lang->load('about_us', 'english');
			$ci->lang->load('services', 'english');
			$ci->lang->load('products', 'english');
		}
		
	}
}

?>