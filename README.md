<p align="center">
    <h1 align="center">RICT Management System</h1>
</p>

## Introduction

<p> Management System To Manage Course, Student, Payment, Mentor, Homework, Attendance, Visitor, Certificate, Role & Permission & Student, Mantor, Admin Authentication, Authorization, And Profile Management. </p>

Admin Dashboard
<img src="https://github.com/rhishi-kesh/RICT-Management-System/blob/main/admin.png" alt="Rhishi-kesh">

Mentor Dashboard
<img src="https://github.com/rhishi-kesh/RICT-Management-System/blob/main/mentor.png" alt="Rhishi-kesh">

Student Dashboard
<img src="https://github.com/rhishi-kesh/RICT-Management-System/blob/main/student.png" alt="Rhishi-kesh">

## Contributor

-   <a href="https://github.com/rhishi-kesh" target="_blank">Rhishi kesh</a>
-   <a href="https://github.com/syful2021" target="_blank">Syful Islam</a>

## Installation

To Install & Run This Project You Have To Follow Thoose Following Steps:

```sh
git clone https://github.com/rhishi-kesh/RICT-Management-System.git
```

```sh
cd RICT-Management-System
```

```sh
npm install
```

```sh
composer install
```

Open your `.env` file and change the database name (`DB_DATABASE`) to whatever you have, username (`DB_USERNAME`) and password (`DB_PASSWORD`) field correspond to your configuration

```sh
php artisan key:generate
```

```sh
php artisan migrate
```

```sh
php artisan storage:link
```

```sh
php artisan db:seed
```
Open `app/Providers/AppServiceProvider.php` file and uncomment the following text
<p>
// view()->share('systemInformation', SystemInformation::first());
</p>

```sh
php artisan optimize
```

```sh
npm run dev
```
Open another tab and run below command

```sh
php artisan serve
```
For Student Login `http://127.0.0.1:8000` <br>
Student gmail = `student123@gmail.com` & password = `student111`

For Admin Login `http://127.0.0.1:8000/admin` <br>
Admin gmail = `admin123@gmail.com` & password = `admin111`

For Mentor Login `http://127.0.0.1:8000/mentor` <br>
Mentor gmail = `mentor123@gmail.com` & password = `mentor111`
