## Join us on the mailing lists

Do you want to ask us some questions? Do you want to discuss with us? Don't hesitate to subscribe to our mailing lists!

* The first mailing is destined to generic information, it should be adapted to users. [Join mailing@rssserver.org](https://rssserver.org/mailman/listinfo/mailing).
* The second mailing is mainly for developers. [Join dev@rssserver.org](https://rssserver.org/mailman/listinfo/dev)

## Report a bug

Have you found a bug? Don't panic, here are some steps to report it with ease:

1. Search for it on [the bug tracker] (don't forget to use the search bar).
2. If you find a similar bug, don't hesitate to post a comment to add more importance to the related ticket.
3. If you didn't find it, [open a new ticket].

If you have to create a new ticket, please try to keep in mind the following advice:

* Give an explicit title to the ticket so it will be easier to find it later.
* Be as exhaustive as possible in the description: what did you do? What is the bug? What are the steps to reproduce the bug?

We also need some information:

* Your RSSServer version (on the about page or in the `constants.php` file)
* Your server configuration: the type of hosting and the PHP version
* Your storage system (SQLite, MySQL, MariaDB, PostgreSQL)
* If possible, the related logs (PHP logs and RSSServer logs under `data/users/your_user/log.txt`)

## Fix a bug

Would you like to fix a bug? For optimum coordination between collaborators, you should follow these indications:

1. Be sure the bug is associated with a ticket and indicate that you'll work on it.
2. [Fork the project repository](https://help.github.com/articles/fork-a-repo/).
3. [Create a new branch](https://help.github.com/articles/creating-and-deleting-branches-within-your-repository/). The name of the branch should be clear, and ideally prefixed by the related ticket id. For instance, `783-contributing-file` to fix [ticket #783].
4. Make your changes to your fork and [send a pull request](https://help.github.com/articles/using-pull-requests/).

If you have to write code, please follow [our coding style recommendations](developers/01_First_steps.md).

**Tip:** if you're searching for easy-to-fix bugs, please have a look at the "[good first issue]" ticket label.

## Submit an idea

You have great ideas, yes! Don't be shy and open [a new ticket] on our bug tracker to ask if we can implement it. The greatest ideas often come from the shyest suggestions!

If your idea is nice, we'll have a look at it.

## Contribute to internationalization (i18n)

Learn how to contribute to translations in [the dedicated documentation](./internationalization.md).

## Contribute to documentation

The documentation needs a lot of improvements in order to be more useful to new contributors and we are working on it.
If you want to give some help, meet us in the main repositories [docs directory]!
