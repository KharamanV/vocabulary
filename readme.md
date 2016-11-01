![alt text](https://hyperhost.ua/info/wp-content/uploads/2016/06/laravel.png "Logo Title Text 1")
# Documentation [![21edbf88dbb75ea1b0a902b9099cc357[1].png](https://s18.postimg.org/faqi33sah/21edbf88dbb75ea1b0a902b9099cc357_1.png)](https://postimg.org/image/jwmmbgdth/)
---
### Prepare DB
1. Create database with name "code_care_task" (without quotes);
2. Set your MySQL auth parameters in .env file
3. Open cmd and move to root project directory
    * Run migrations by artisan command (``` php artisan migrate ```)
    * Run seeds (```php artisan db:seed```)

### Vendor
1. Open cmd and move to root project directory
    * Run composer (```composer install```), and wait until all packages will be downloaded
### Task Scheduling
> Task, which creates XML file from users info - located in ```\App\Console\Commands\CreateXMLUsers``` namespace. 
> XML file will be stored at ```storage/app/users.xml```

To start the scheduler, you must create a cron job on your server manualy, and run  ```* * * * * php /path/to/artisan schedule:run >> /dev/null 2>&1```, where ```php``` is path to php.exe, and where ```/path/to/artisan``` is path to php artisan.

Or, you can move to ```/cron ``` directory from root folder, edit ```crontab``` file, and replace some paths. After this, you can run scheduler by executing ```crontab.exe``` binary.
