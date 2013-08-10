# PHP Account Activation By URI

## Description

Using URI to activate account for member registration.

## Installation

Download and edit `config.php`.

Edit email content in `register.php`

Copy files to your application.

Run this SQL on your Database schema:

	CREATE TABLE IF NOT EXISTS `users` (
	  `ID` int(11) NOT NULL AUTO_INCREMENT,
	  `username` varchar(30) NOT NULL,
	  `password` varchar(50) NOT NULL,
	  `activate_status` varchar(100) NOT NULL,
	  PRIMARY KEY (`ID`)
	) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


Change it into what you want.

Have fun with this. :)

## Files

	activator.php 			Activation account script
	config.php 				Configuration file
	class/class.MySQL.php 	MySQL class
	index.php 				A registration form example
	register.php 			Registration script

### About class.MySQL.php

You can go [here](https://github.com/a1phanumeric/PHP-MySQL-Class) to get more information.

p.s. I increase password sercuity when update or insert it to database (on line 158 and 262).

## License

Exculsive MySQL class. This script has no license and free to use.