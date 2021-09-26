# weMovies

========================

WeMovies is a cinema website, which looks like Allocine.

Requirements
------------

* PHP 7.3 or higher;
* and the [usual Symfony application requirements][2].

Installation
------------


```bash
$ git clone git@github.com:mouad1991/weMovies.git
```

Install packages:

```bash
$ composer install
```

Usage
-----

There's no need to configure anything to run the application. If you have
[installed Symfony][4] binary, run this command:

```bash
$ cd weMovies/
$ symfony serve
```

Then access the application in your browser at the given URL (<https://localhost:8000> by default).

If you don't have the Symfony binary installed, run `php -S localhost:8000 -t public/`
to use the built-in PHP web server or [configure a web server][3] like Nginx or
Apache to run the application.

