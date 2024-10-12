How to run the project:

a) git clone the source

b) create a MYSQL database instance and put the credentials in the .env file 
(if you dont have an env file, create one based on .env.example)

c) run composer install

d) run php artisan key:generate 

e) run npm install

f) run php artisan migrate:fresh --seed to create the database and fetch all the data from the API