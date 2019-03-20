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
- usuing
2. Create a Database 
3. Open your terminal app of choice, CD to the newly cloned directory and run the following command
	php artisan migrate
	php artisan db:seed --EventsTableSeeder
4. 