

### Online Voting System


## Installation Steps

 1. Open up command prompt and cd to desktop or preferred directory then open terminal or powershell or cmd and type following below
```
git clone https://github.com/akashpoudelnp/ovs-starter.git
```
 2. Open the folder created "ovs-starter" in VSCode or any preffered editors, then type following command line by line one at a time
```
composer install
cp .env.example .env
php artisan key:generate
```
3  Create a new Database using xampp or laragon using phpmyadmin or any ways and set the DB_NAME DB_USER DB_PASSWORD accordingly in the ".env" FILE
```
php artisan migrate:fresh --seed
```
```
php artisan storage:link
```
## License
This Project is not licensed to be distributed or used for professional purposes by anyone except the team members mentioned above.
###OMC
