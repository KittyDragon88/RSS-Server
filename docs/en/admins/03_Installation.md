# General Installation Instructions

These instructions are intended as general guidelines for installing RSSServer. You may wish to consult the [Step-by-step Tutorial for installing RSSServer on Debian 9/Ubuntu 16.04](06_LinuxInstall.md) if you don't currently have a web server and don't have experience setting one up.

Before you begin, make sure that you've read the [prerequisites](02_Prerequisites.md) for running RSSServer. As shorthand, `.` refers to the directory to which your RSSServer installation lives.

1. If the computer you're running on is not currently running a web server, you'll first need to install and configure a web server, a version of PHP, and an appropriate database, as listed in the prerequisites. [Example Apache and Nginx configuration files can be found here](10_ServerConfig.md).

2. Download your chosen version of RSSServer, or fetch it via git. It's advisable that you put RSSServer in `/usr/share/`, and symlink the `./public/` folder to the root of your web server.[^1]

3. Give ownership of the RSSServer folder to your web server user (often `www-data`). Give group read permissions to all files in `.`[^2], and group write permissions to `./data/`.

4. Install needed PHP modules.

5. Create a database for RSSServer to use. Note the username and password for this database, as it will be needed during installation!

6. Using your supported web browser of choice, navigate to the address you've installed your server to complete the installation from the GUI.[^3]

[^1]: Make sure to expose only the `./public/` folder to the Web, as the other directories contain personal and sensitive data.

[^2]: If you wish to allow updates from the web interface, also give group write permissions to this folder.

[^3]: Assuming your server is `http://example.net`, this address could be `http://example.net/public/` if you didn't follow our previous advice about not exposing the `./public/` folder.
