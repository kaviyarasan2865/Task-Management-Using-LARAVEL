# Task-Management-Using-LARAVEL

Employee Task Management System 

It is a task management system built with Laravel. It allows administrators to manage employees and assign tasks to them. Employees can log in, view their assigned tasks, and update their status.

Installation:

1. Clone the repository:

git clone https://github.com/yourusername/empp.git

2. Navigate into the project directory:

cd empp

3. Install Composer dependencies:

composer install

4. Copy the .env.example file to .env:

cp .env.example .env

5. Generate application key:

php artisan key:generate

6. Configure your .env file:

   - Set your database connection details:

     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=task
     DB_USERNAME=your_database_username
     DB_PASSWORD=your_database_password

7. Run database migrations to create tables:

php artisan migrate

8. Seed the database to create admin user:

php artisan db:seed

9. Serve the application:

php artisan serve

Usage:

1. Visit the application in your web browser using "php artisan serve" commandd in terminal (where your path should be the laravel file).
2. Log in as an admin using the provided credentials (which will be seeded by "php artisan db:seed").
3. Add employees (you can edit and delete employee) and assign tasks to them (you can update status and delete  of task).
4. Employees can log in using their email and password.
5. Employees can Edit their details and update them
6. Employees can view their assigned tasks and update their status.

Features:

- Admin Dashboard: Manage employees, assign tasks.
- Employee Management: Add, edit, and delete employees.
- Task Assignment: Assign tasks to employees.
- Employee Login: Employees receive login credentials automatically upon creation.
- Task Management by Employees: Employees can view and update their assigned tasks without page reloads using AJAX.

Contributing:

Contributions are welcome! Please feel free to fork the repository and submit pull requests with any improvements or features.

