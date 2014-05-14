<?php

return array(
	'login' => array(
		'header'	=> 'Logga in',
		'name'		=> 'E-post / användarnamn',
		'password'	=> 'Lösenord'
	),
	'register' => array(
		'header'					=> 'Registrera',
		'email'						=> 'E-post',
		'name'						=> 'Användarnamn',
		'password'					=> 'Lösenord',
		'confirmation_password'		=> 'Repetera lösenord',
		'birth_year'				=> 'Födelse år',
		'birth_year_pick'			=> 'Välj - födelse år',
		'length'					=> 'Längd (cm)',
		'length_pick'				=> 'Välj - längd',
		'gender'					=> 'Ditt kön',
		'gender_pick'				=> 'Välj - kön',
		'partner_gender'			=> 'Söker kön',
		'partner_gender_pick'		=> 'Välj - söker kön',
		'relationship_status'		=> 'Relationsstatus',
		'relationship_status_pick'	=> 'Välj - relationsstatus',
		'relationship_search'		=> 'Söker relation',
		'relationship_search_pick'	=> 'Välj - söker relation',
		'state'						=> 'Län',
		'state_pick'				=> 'Välj - län',
		'city'						=> 'Stad',
		'city_pick'					=> 'Välj - stad',
		'accepted_rules'			=> 'Jag godkänner reglerna',
		'read_rules'				=> 'Läs regler'
	),
	'password' => array(
		'header'	=> 'Nytt lösenord',
		'body'		=> 'Fyll i din e-post adress för att får ett nytt lösenord skickat till din e-post',
		'email'		=> 'E-post',
		'message'	=> 'Nytt lösenord skickat',
	),
	'activated' => array(
		'pass' => array(
			'header'=> 'Kontot aktiverat',
			'body'	=> 'Du kan nu logga in med ditt konto',
		),
		'fail' => array(
			'header'=> 'Fel - ditt konto har inte aktiverats',
			'body' => 'Någonting gick fel vid aktiveringen av ditt konto. Försök igen.'
		),
	),
	'rules' => array(
		'header' => 'Regler för LoveMeUp',
		'main' => array(
			'header' => 'Medlemskaps villkor',
			'rules'  => array(
				'1' => 'Sidan är helt gratis',
				'2' => 'Du måste vara över 18 år för att vara medlem på LoveMeUp',
				'3' => 'Profilbild måste visa ansiktet',
				'4' => 'Bilder som laddas upp tillhör LoveMeUp'
			) 
		),
		'illegal' => array(
		 	'header' => 'Följande är inte tillåtet på LoveMeUp',
			'rules'  => array(
				'1' => 'Ladda upp olagliga eller stötande bilder',
				'2' => 'Gå till personangrepp',
				'3' => 'Rasistiska uttalanden',
				'4' => 'Ange telefonnummer, e-post eller andra kontaktuppgifter på profilsidan',
				'6' => 'Återuppta kontakt med personer som avisat dig',
				'7' => 'Använda olämpliga ord i profil texten'
			)
		)
	)
);