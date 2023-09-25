### Installation

1. Clone the repository:
   git clone https://github.com/SergiiShcherban/task-list-laravel
2. Navigate to the project directory: 
   cd task-list-laravel/
3. Install Composer dependencies:
   composer install
4. Create you own empty DB
5. Create a copy of the .env.example file and rename it to .env. Update the database and other configuration settings in the .env file.
6. Run database migrations: 
   php artisan key:generate
7. Run database migrations:
   php artisan migrate
8. Fill the project with random data
   php artisan db:seed
9. Run project
   php artisan serve  
