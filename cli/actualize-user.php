#!/usr/bin/php
<?php
require(__DIR__ . '/_cli.php');

$params = array(
	'user:',
);

$options = getopt('', $params);

if (!validateOptions($argv, $params) || empty($options['user'])) {
	fail('Usage: ' . basename(__FILE__) . " --user username");
}

$username = cliInitUser($options['user']);

fwrite(STDERR, 'RSSServer actualizing user “' . $username . "”…\n");

list($nbUpdatedFeeds, $feed, $nbNewArticles) = RSSServer_feed_Controller::actualizeFeed(0, '', true);

echo "RSSServer actualized $nbUpdatedFeeds feeds for $username ($nbNewArticles new articles)\n";

invalidateHttpCache($username);

done($nbUpdatedFeeds > 0);
