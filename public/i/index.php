<?php

require(__DIR__ . '/../../constants.php');
require(LIB_PATH . '/lib_rss.php');	//Includes class autoloader

if (file_exists(DATA_PATH . '/do-install.txt')) {
	require(APP_PATH . '/install.php');
} else {
	session_cache_limiter('');
	Base_Session::init('RSSServer');
	Base_Session::_param('keepAlive', 1);	//To prevent the PHP session from expiring

	if (!file_exists(DATA_PATH . '/no-cache.txt')) {
		require(LIB_PATH . '/http-conditional.php');
		$currentUser = Base_Session::param('currentUser', '');
		$dateLastModification = $currentUser === '' ? time() : max(
			@filemtime(join_path(USERS_PATH, $currentUser, 'log.txt')),
			@filemtime(join_path(DATA_PATH, 'config.php'))
		);
		if (httpConditional($dateLastModification, 0, 0, false, PHP_COMPRESSION, true)) {
			exit();	//No need to send anything
		}
	}

	try {
		$front_controller = new RSSServer();
		$front_controller->init();
		$front_controller->run();
	} catch (Exception $e) {
		echo '### Fatal error! ###<br />', "\n";
		Base_Log::error($e->getMessage());
		echo 'See logs files.';
		syslog(LOG_INFO, 'RSSServer Fatal error! ' . $e->getMessage());
	}
}
