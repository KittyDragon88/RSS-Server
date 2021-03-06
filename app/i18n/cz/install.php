<?php

return array(
	'action' => array(
		'finish' => 'Dokončit instalaci',
		'fix_errors_before' => 'Chyby prosím před přechodem na další krok opravte.',
		'keep_install' => 'Zachovat předchozí instalaci',
		'next_step' => 'Přejít na další krok',
		'reinstall' => 'Reinstalovat RSSServer',
	),
	'auth' => array(
		'form' => 'Webový formulář (tradiční, vyžaduje JavaScript)',
		'http' => 'HTTP (pro pokročilé uživatele s HTTPS)',
		'none' => 'Žádný (nebezpečné)',
		'password_form' => 'Heslo<br /><small>(pro přihlášení webovým formulářem)</small>',
		'password_format' => 'Alespoň 7 znaků',
		'type' => 'Způsob přihlášení',
	),
	'bdd' => array(
		'_' => 'Databáze',
		'conf' => array(
			'_' => 'Nastavení databáze',
			'ko' => 'Ověřte informace o databázi.',
			'ok' => 'Nastavení databáze bylo uloženo.',
		),
		'host' => 'Hostitel',
		'password' => 'Heslo',
		'prefix' => 'Prefix tabulky',
		'type' => 'Typ databáze',
		'username' => 'Uživatel',
	),
	'check' => array(
		'_' => 'Kontrola',
		'already_installed' => 'Zjistili jsme, že RSSServer je již nainstalován!',
		'cache' => array(
			'nok' => 'Zkontrolujte oprávnění adresáře <em>./data/cache</em>. HTTP server musí mít do tohoto adresáře práva zápisu',
			'ok' => 'Oprávnění adresáře cache jsou v pořádku.',
		),
		'ctype' => array(
			'nok' => 'Není nainstalována požadovaná knihovna pro ověřování znaků (php-ctype).',
			'ok' => 'Je nainstalována požadovaná knihovna pro ověřování znaků (ctype).',
		),
		'curl' => array(
			'nok' => 'Nemáte cURL (balíček php-curl).',
			'ok' => 'Máte rozšíření cURL.',
		),
		'data' => array(
			'nok' => 'Zkontrolujte oprávnění adresáře <em>./data</em>. HTTP server musí mít do tohoto adresáře práva zápisu',
			'ok' => 'Oprávnění adresáře data jsou v pořádku.',
		),
		'dom' => array(
			'nok' => 'Nemáte požadovanou knihovnu pro procházení DOM.',
			'ok' => 'Máte požadovanou knihovnu pro procházení DOM.',
		),
		'favicons' => array(
			'nok' => 'Zkontrolujte oprávnění adresáře <em>./data/favicons</em>. HTTP server musí mít do tohoto adresáře práva zápisu',
			'ok' => 'Oprávnění adresáře favicons jsou v pořádku.',
		),
		'fileinfo' => array(
			'nok' => 'Nemáte PHP fileinfo (balíček fileinfo).',
			'ok' => 'Máte rozšíření fileinfo.',
		),
		'http_referer' => array(
			'nok' => 'Zkontrolujte prosím že neměníte HTTP REFERER.',
			'ok' => 'Váš HTTP REFERER je znám a odpovídá Vašemu serveru.',
		),
		'json' => array(
			'nok' => 'Pro parsování JSON chybí doporučená knihovna.',
			'ok' => 'Máte doporučenou knihovnu pro parsování JSON.',
		),
		'mbstring' => array(
			'nok' => 'Cannot find the recommended library mbstring for Unicode.',	// TODO - Translation
			'ok' => 'You have the recommended library mbstring for Unicode.',	// TODO - Translation
		),
		'base' => array(
			'nok' => 'Nemáte template Base.',
			'ok' => 'Máte template Base.',
		),
		'pcre' => array(
			'nok' => 'Nemáte požadovanou knihovnu pro regulární výrazy (php-pcre).',
			'ok' => 'Máte požadovanou knihovnu pro regulární výrazy (PCRE).',
		),
		'pdo' => array(
			'nok' => 'Nemáte PDO nebo některý z podporovaných ovladačů (pdo_mysql, pdo_sqlite, pdo_pgsql).',
			'ok' => 'Máte PDO a alespoň jeden z podporovaných ovladačů (pdo_mysql, pdo_sqlite, pdo_pgsql).',
		),
		'php' => array(
			'nok' => 'Vaše verze PHP je %s, ale RSSServer vyžaduje alespoň verzi %s.',
			'ok' => 'Vaše verze PHP je %s a je kompatibilní s RSSServer.',
		),
		'users' => array(
			'nok' => 'Zkontrolujte oprávnění adresáře <em>./data/users</em>. HTTP server musí mít do tohoto adresáře práva zápisu',
			'ok' => 'Oprávnění adresáře users jsou v pořádku.',
		),
		'xml' => array(
			'nok' => 'Pro parsování XML chybí požadovaná knihovna.',
			'ok' => 'Máte požadovanou knihovnu pro parsování XML.',
		),
	),
	'conf' => array(
		'_' => 'Obecná nastavení',
		'ok' => 'Nastavení bylo uloženo.',
	),
	'congratulations' => 'Gratulujeme!',
	'default_user' => 'Jméno výchozího uživatele <small>(maximálně 16 alfanumerických znaků)</small>',
	'delete_articles_after' => 'Smazat články starší než',
	'fix_errors_before' => 'Chyby prosím před přechodem na další krok opravte.',
	'javascript_is_better' => 'Práce s RSSServer je příjemnější se zapnutým JavaScriptem',
	'js' => array(
		'confirm_reinstall' => 'Reinstalací RSSServer ztratíte předchozí konfiguraci. Opravdu chcete pokračovat?',
	),
	'language' => array(
		'_' => 'Jazyk',
		'choose' => 'Vyberte jazyk RSSServer',
		'defined' => 'Jazyk byl nastaven.',
	),
	'not_deleted' => 'Nastala chyba, soubor <em>%s</em> musíte smazat ručně.',
	'ok' => 'Instalace byla úspěšná.',
	'step' => 'krok %d',
	'steps' => 'Kroky',
	'this_is_the_end' => 'Konec',
	'title' => 'Instalace · RSSServer',
);
