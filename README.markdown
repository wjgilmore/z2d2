README
===========
z2d2 is a companion project to Chapter 7 ("Integrating Doctrine 2") of the book, [Easy PHP Websites with the Zend Framework, Second Edition](http://www.wjgilmore.com), authored by W. Jason Gilmore and published by [WJ Gilmore, LLC](http://www.wjgilmore.com). This project provides readers with a Zend Framework-driven website configured to use Doctrine 2.

Chapter 7 introduces key Doctrine 2 features based on code found throughout this project. You'll learn:

* About the files and configuration parameters used to integrate Doctrine 2 into a Zend Framework 1.X-based website.

* How to create persistent classes (entities) using DocBlock annotations.

* How to generate and update table schemas based on the entity's Docblock annotations using the integrated Doctrine command-line interface.

* How to retrieve and manipulate data using Doctrine's native query methods, magic finders, and the Doctrine Query Language (DQL).

* How to create and manipulate model relationships, complete with a ManyToMany example involving providing users to create video game libraries.

* Why implementing repositories is a good idea, and how you can use repositories to build your own custom "magic finders".

INSTALLATION
===========
z2d2 is a skeleton Zend Framework project which includes complete Doctrine 2 integration. It does not however bundle the Zend Framework nor Doctrine 2, meaning you will need to download and install both in order to learn from z2d2. 

Installing the Zend Framework can be accomplished in several ways, although I suggest following the instructions located in the [Zend Framework QuickStart](http://framework.zend.com/manual/en/learning.quickstart.create-project.html).

You'll need to pay a bit more attention regarding installing Doctrine. z2d2 is only interested in *the libraries* associated with the four projects (Common, DBAL, ORM, Symfony) bundled into the Doctrine 2 download. There are a few ways to do this but if you're not familiar with Doctrine them one of the easiest ways follows:

1. Clone Doctrine 2

    $ git clone git://github.com/doctrine/doctrine2.git doctrine2-orm

2. Copy the following three directories into a directory named Doctrine found in the z2d2 `library` directory:

    lib/Doctrine/ORM
    lib/vendor/doctrine-common/lib/Doctrine/Common
    lib/vendor/doctrine-dbal/lib/Doctrine/DBAL

3. Copy the following directory into the z2d2 `library` directory:

    lib/vendor/Symfony

When done, your `library` directory should look like this:

    library/
      Doctrine/
      Common/
      DBAL/
      ORM/
    Symfony/
    WJG/

You'll also need to modify the Doctrine database connection parameters and entity/proxy/repository paths. These parameters are all found in the `application.ini.example` file. Rename this file to `application.ini` before making your changes.

Finally, you'll need to use the included Doctrine CLI to generate the schemas, done from within the `application` directory using the following command:

    $ ./scripts/doctrine orm:schema-tool:create

Keep in mind that CRUD operations are not incorporated into the application. Instead, you should review the examples found on the application home page, creating your own controllers and actions and executing the various examples.

SAMPLE CHAPTER
===========
A PDF version of Chapter 7, "Integrating Doctrine 2", is available for download from [WJGilmore.com](http://www.wjgilmore.com/). Keep in mind this is a late draft version, and probably contains mistakes. If you find mistakes, e-mail me with the details at `wj@wjgilmore.com`.

BUY THE BOOK
===========
"Easy PHP Websites with the Zend Framework, Second Edition" is available as a DRM-free PDF via WJGilmore.com, in Kindle format via Amazon.com, and in Nook format via BN.com. This book includes several sample projects, including all source code for GameNomad, a sample social networking website for video gamers which forms the basis for many of the book's examples.

ABOUT THE AUTHOR
===========
W. Jason Gilmore has been teaching developers from around the world about web development for over a decade, having written six books, including the bestselling "Beginning PHP and MySQL, Fourth Edition" and "Easy PHP Websites 
with the Zend Framework". He has published more than 150 articles within popular publications such as Developer.com, DevShed, JSMag, and Linux Magazine, and instructed hundreds of students in the United States and Europe.

Jason is cofounder of the popular [CodeMash Conference](http://www.codemash.org), and was a member of the 2008 MySQL Conference speaker selection board. 

LICENSE, COPYRIGHTS, AND OTHER LEGALESE
===========
Copyright (c) 2011 W.J. Gilmore, LLC

z2d2 is a companion project to the book "Easy PHP Websites with the Zend Framework" (http://www.wjgilmore.com). While I place no restrictions on its use, keep in mind that although it does not bundle the [Zend Framework](http://framework.zend.com) nor [Doctrine](http://www.doctrine-project.org), you'll logically want to install both in order to learn from z2d2. Therefore you should carefully review their respective software licenses should you decide to do anything with z2d2 other than use it for learning more about how I have gone about integrating Doctrine 2 into a Zend Framework project.

You can learn more about the Zend Framework license here:
[http://framework.zend.com/license](http://framework.zend.com/license)

You can learn more about Doctrine's license at [http://www.doctrine-project.org](http://www.doctrine-project.org).

