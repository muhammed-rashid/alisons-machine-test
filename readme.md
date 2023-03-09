laravel version : 8
php version 7.4

1.clone file from github
2.composer install

add credentials in env

1.email credentials
2.sms gateway credentails

i have used queue to send email, so need to add queue driver in env

QUEUE_CONNECTION=database

migrate tables using 'php artisan migrate'
seed the database 'php artisan db:seed'

compile assets using laravel mix 'npm run watch' - (used to compile js and scss)

then cache configurations

'php artisan config:cache'

'php artisan serve'
'php artisan queue:work'

i have used a free sms gateway , so it only send sms to a specific mobile number




