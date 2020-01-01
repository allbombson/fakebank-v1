# Online Banking

An Online Banking Platform Built With Laravel for the purpose of scam baiting (?)

## Installation

Note: Requires composer

### Part 1
1. Clone repo.

2. Run `composer install`.

3. Create a new database for the project.

4. Copy `.env.example` to `.env` and edit, saving environment variables according to local settings (notably, linking `DB_DATABASE` to the database created in Step 3, `DB_USERNAME` and `DB_PASSWORD` to those matching local MySql settings, and `APP_URL` to the addresss of your local server for the project). You also want to set up MAIL_* with ur Mail server settings.

5. Run `php artisan migrate` to migrate your database for the project to the one u made in step 3.

6. If no `APP_KEY` is present in `.env`, (as per Laravel installation instructions) run `php artisan key:generate`

7. Run `php artisan db:seed` to seed your test database with premade data to get you started.

8. Serve the project via local server details in Part 2.

### Part 2

1. Set public as your root dir for files.

2. Syslink or Alias /uploads to /storage/app/public/uploads/. EG: Alias /uploads "C:/Users/allbombson/Desktop/XAMPP/htdocs/storage/app/public/uploads/" in my Apache config.



## Credits
allbombson (Thomas Lane)

Ambrose Bako (Who just stole code ive seen 5000 times but at least this one works)
## License
The MIT License (MIT).

