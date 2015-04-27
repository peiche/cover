##Building Cover yourself

###Getting started

I've tried to make this as streamlined as possible, but if you have something to contribute, please drop me a line! (There are multiple avenues to do so: raise an issue, fork the project, or send me a message -- @peiche on Github, @wavetree on Twitter.)

- [Sass](http://sass-lang.com)
- [Grunt](http://gruntjs.com)
- [Bower](http://bower.io)

If you're new to any of these projects, check out the sites for installation help.

Once you've got these installed, run the following command at the root of the project to install the required Grunt plugins.

```
$ npm install
```

_Windows users, please note that you will have to run the Command Prompt utility as a system administrator._

Run this next command to have Bower pull the third party projects in.

```
$ bower install
```

Cover uses Font Awesome to display icons, as well as jQuery plugins Skrollr and Headroom.js. Utilizing Bower this way prevents me from having to commit these projects' code into my own, while at the same time allowing me to bundle them in a build.

Now that we've got everything pulled in, we can run Grunt commands to validate and build the WordPress theme.

Run the following command to validate the uncompiled .scss files against scss-lint, and the unminified .js files (only Cover's own, not the third party plugins) against jslint.

```
$ grunt validate
```

We haven't built anything yet, of course. This was just running the linters. Run the next command to compile the project's stylesheet and JavaScript.

```
$ grunt build
```

The build process copies files from external sources (fonts from Font Awesome, and js from Skrollr and Headroom.js), compiles the .scss (including Font Awesome styles) into a single stylesheet, and minifies the JavaScript. But we have one more command to run before we have a fully working WordPress theme.

```
$ grunt pot
```

This command will scan the php files in your theme and generate the .pot file necessary for translating the static text strings. This command will fail unless you have the `xgettext` command available. Once it's been run, it will generate cover.pot.

At this point, you have a working WordPress theme. But uploading a theme file by file is a pain, not to mention tedious. So we have one more command to run.

```
$ grunt zip
```

This will bundle together all the files required for the theme into a nice little zip file. It will exclude all the things we don't need, like the Sass stylesheets and the unminified JavaScript, as well as unneeded files and directories (for example, .scss-lint.yml, package.json, node_modules, and bower_components, to name a few).

Congratulations! You have a shiny new WordPress theme, in the form of a zip file. You can now upload this via the WordPress admin panel. Enjoy!