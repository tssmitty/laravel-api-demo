## About this repo

Simple events API with out of the box Laravel. 


## Pre Requisites

 - Composer
 - Valet
 - Homebrew
 - Node.js
 - NPM

## Local Environment Setup 

 - Make sure you have PHP >= 7.1
 - Make sure you have MySQL >= 5
 - 
** Note: if you don't have any of these configured on your machine... check out this tutorial.
( https://help.macstadium.com/articles/how-to-install-apache-mysql-and-php-using-homebrew-on-macos )


## Laravel Setup 

1. Clone this repo into an empty project
2. CD into new directory and run `composer update`
3. Then run `npm install`
4. Create the app key by running `php artisan key:generate`
5. Park your site and secure it by running `valet secure`
6. Create a Database (call it what you like)
7. Modify `.env` file to your newly database user and name (remove homestead refs) and then save this file
8. Open your terminal app of choice, CD to the newly cloned directory and run the following commands
	1. `php artisan migrate`
	2. `php artisan db:seed --class=EventsTableSeeder`	
	3. optional: `php artisan make:auth`
9. Review output using the following endpoints:
	- https://demo.dev/events
	- https://demo.dev/events/1
10. Enjoy!