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
2. Create a Database (call it what you like)
3. Modify the `.env.example` file to reflect your database user and name (remove homestead refs) and then save this file as simply `.env` 
4. Open your terminal app of choice, CD to the newly cloned directory and run the following commands
	1. `php artisan migrate`
	2. `php artisan db:seed --EventsTableSeeder`	
	3. `php artisan make:auth`
5. Open the follow endpoint address in a browser: https://demo.dev/api/events to review the paginted events API