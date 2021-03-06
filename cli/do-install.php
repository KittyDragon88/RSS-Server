#!/usr/bin/php
<?php
require(__DIR__ . '/_cli.php');

if (!file_exists(DATA_PATH . '/do-install.txt')) {
	fail('RSSServer seems to be already installed! Please use `./cli/reconfigure.php` instead.');
}

$params = array(
		'environment:',
		'base_url:',
		'language:',
		'title:',
		'default_user:',
		'allow_anonymous',
		'allow_anonymous_refresh',
		'auth_type:',
		'api_enabled',
		'allow_robots',
		'disable_update',
	);

$dBparams = array(
		'db-type:',
		'db-host:',
		'db-user:',
		'db-password:',
		'db-base:',
		'db-prefix:',
	);

$options = getopt('', array_merge($params, $dBparams));

if (!validateOptions($argv, array_merge($params, $dBparams)) || empty($options['default_user'])) {
	fail('Usage: ' . basename(__FILE__) . " --default_user admin ( --auth_type form" .
		" --environment production --base_url https://rss.example.net --allow_robots" .
		" --language en --title RSSServer --allow_anonymous --allow_anonymous_refresh --api_enabled" .
		" --db-type mysql --db-host localhost:3306 --db-user rssserver --db-password dbPassword123" .
		" --db-base rssserver --db-prefix rssserver_ --disable_update )");
}

fwrite(STDERR, 'RSSServer install…' . "\n");

$config = array(
		'salt' => generateSalt(),
		'db' => RSSServer_Context::$system_conf->db,
	);

foreach ($params as $param) {
	$param = rtrim($param, ':');
	if (isset($options[$param])) {
		$config[$param] = $options[$param] === false ? true : $options[$param];
	}
}

if ((!empty($config['base_url'])) && Base_Request::serverIsPublic($config['base_url'])) {
	$config['pubsubhubbub_enabled'] = true;
}

foreach ($dBparams as $dBparam) {
	$dBparam = rtrim($dBparam, ':');
	if (isset($options[$dBparam])) {
		$param = substr($dBparam, strlen('db-'));
		$config['db'][$param] = $options[$dBparam];
	}
}

performRequirementCheck($config['db']['type']);

if (!RSSServer_user_Controller::checkUsername($options['default_user'])) {
	fail('RSSServer error: invalid default username “' . $options['default_user']
		. '”! Must be matching ' . RSSServer_user_Controller::USERNAME_PATTERN);
}

if (isset($options['auth_type']) && !in_array($options['auth_type'], array('form', 'http_auth', 'none'))) {
	fail('RSSServer invalid authentication method (auth_type must be one of { form, http_auth, none }): '
		. $options['auth_type']);
}

if (file_put_contents(join_path(DATA_PATH, 'config.php'),
	"<?php\n return " . var_export($config, true) . ";\n") === false) {
	fail('RSSServer could not write configuration file!: ' . join_path(DATA_PATH, 'config.php'));
}

if (function_exists('opcache_reset')) {
	opcache_reset();
}

Base_Configuration::register('system', DATA_PATH . '/config.php', RSSSERVER_PATH . '/config.default.php');
RSSServer_Context::$system_conf = Base_Configuration::get('system');

Base_Session::_param('currentUser', '_');	//Default user

$ok = false;
try {
	$ok = initDb();
} catch (Exception $ex) {
	$_SESSION['bd_error'] = $ex->getMessage();
	$ok = false;
}

if (!$ok) {
	@unlink(join_path(DATA_PATH, 'config.php'));
	fail('RSSServer database error: ' . (empty($_SESSION['bd_error']) ? 'Unknown error' : $_SESSION['bd_error']));
}

echo '• Remember to create the default user: ', $config['default_user'] , "\n",
	"\t", './cli/create-user.php --user ', $config['default_user'], " --password 'password' --more-options\n";

accessRights();

if (!deleteInstall()) {
	fail('RSSServer access right problem while deleting install file!');
}

done();
