# Preparing the release

In order to get as much feedback as possible before a release, it's preferable to announce it on GitHub by creating a dedicated ticket ([see examples] ). This should be done **at least one week in advance**.

It's also recommended to make the announcement on mailing@rssserver.org.

# Check the dev status

Before releasing a new version of RSSServer, you must ensure that the code is stable and free of major bugs. Ideally, our tests should be automated and executed before any publication.

You must also **make sure that the CHANGELOG file is up to date** with the updates of the version to be released.

# Git process

```bash
$ git checkout master
$ git pull
$ vim constants.php
# Update version number x.y.y.z of RSSSERVER_VERSION
$ git commit -a
Version x.y.z
$ git tag -a x.y.z
Version x.y.z
$ git push && git push --tags
```

# Updating `update.rssserver.org`

It's important to update update.rssserver.org since this is the default service for automatic RSSServer updates.

The repository managing the code is located on GitHub: [RSSServer/update.rssserver.org] .

## Writing the update script

The scripts are located in the `./scripts/` directory and must take the form `update_to_x.y.z.z.php`. This directory  also contains `update_to_dev.php` intended for updates of the `master` branch (this script must not include code specific to a particular version!) and `update_util.php`, which contains a list of functions useful for all scripts.

In order to write a new script, it's better to copy/paste the last version or to start from `update_to_dev.php`. The first thing to do is to define the URL from which the RSSServer package will be downloaded (`PACKAGE_URL`). The URL is in the form  of `https://codeload.github.com/RSSServer/RSSServer/zip/x.y.z`.

There are then 5 functions that have to be executed:

* `apply_update()` takes care of saving the directory containing the data, checking its structure, downloading the RSSServer package, deploying it and cleaning it all up. This function is pre-filled but adjustments can be made if necessary (e.g., reorganization of the `./data` structure). It returns `true` if no problem has occurred or a string indicating a problem;
* `need_info_update()` returns `true` if the user must intervene during the update or `false` if not;
* `ask_info_update()` displays a form to the user if `need_info_update()` has returned `true`;
* `save_info_update()` is responsible for saving the information filled out by the user (from the `ask_info_update()` form);
* `do_post_update()` is executed at the end of the update and takes into account the code of the new version (e.g., if the new version changes the `Base_Configuration` object, you will benefit from these improvements).

## Updating the versions file

Once the script has been written and versioned, it's necessary to update the `./versions.php' file which contains a mapping table indicating which versions are updated to which other versions.

Here's an example of a `versions.php` file:

```php
<?php
return array(
	// STABLE
	'0.8.0' => '1.0.0',
	'0.8.1' => '1.0.0',
	'1.0.0' => '1.0.1',  // doesn't exist (yet)
	// DEV
	'1.1.2-dev' => 'dev',
	'1.1.3-dev' => 'dev',
	'1.1.4-dev' => 'dev',
);
```

And here's how this table works:

* on the left you can find the N version, on the right the N+1 version;
* the `x.y.z.z-dev` versions are **all** updated to `master`;
* stable versions are updated to stable versions;
* it's possible to skip several versions at once, provided that the update scripts support it;
* it's advisable to indicate the correspondence of the current version to its potential future version by specifying that this version does not yet exist. As long as the corresponding script does not exist, nothing will happen.

It's **very strongly** recommended to keep this file organized according to version numbers by separating stable and dev versions.

## Deployment

Before updating update.rssserver.org, it's better to test with dev.update.rssserver.org, which corresponds to pre-production. So update dev.update.rssserver.org and change the `RSSSERVER_UPDATE_WEBSITE` URL of your RSSServer instance. Start the update and check that it's running correctly.

When you're satisfied, update update.rssserver.org with the new script, test it again, and then move on.

# Updating the RSSServer services

Two services need to be updated immediately after the update.

* rss.rssserver.org;
* demo.rssserver.org (public login: `demo` / `demodemo`).

# Publicly announce the release

When everything's working, it's time to announce the release to the world!

* on GitHub by creating[a new release]
* on the rssserver.org blog, at least for stable versions (write the article on[RSSServer/rssserver.org])
* on Twitter ([@RSSServer](https://twitter.com/RSSServer) account)
* and on mailing@rssserver.org

# Starting the next development version

```bash
$ git checkout master
$ vim constants.php
# Update the RSSSERVER_VERSION
$ vim CHANGELOG.md
# Prepare the changelog for the next version
$ git add CHANGELOG.md && git commit && git push
```

Also remember to update update.rssserver.org so that it takes the current development version into account.
