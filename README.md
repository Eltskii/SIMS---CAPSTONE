# Student Information Management System (SIMS)

## Live Demo

You can try the system here:

 ## Hosted demo:  https://bsub-sims.42web.io

> Note: This is a test/demo environment. Do not use real personal data.

## Demo Accounts

Use the following test credentials to log in and explore different roles:

| Role             | Username    | Password |
|------------------|------------|----------|
| Registrar/Admin  | `admin`    | `admin`  |
| Chairperson      | `ced`      | `admin`  |
| Instructor       | `instructor` | `admin` |

## Student accounts

- Students do  not  have a fixed demo account.
- You can create a student account by going through the  enrollment process  in the system.
A classic PHP/MySQL Student Information Management System intended for small schools or departments. The system runs on a simple LAMP/WAMP stack (Apache + PHP + MySQL) with no external PHP framework.

## Overview

SIMS centralizes basic student-related information and academic records. It provides:

-  User logins with roles  – separate accounts for administrators/registrars/chairpersons and students, with role-based access control.
-  Admin backend  – manage students, courses, subjects, departments, schedules, and grades.
-  Student area  – allow students to view their profile, enrolled subjects, schedules, and grades.
-  Shared infrastructure  – custom database wrapper and table-specific PHP classes for common academic entities.


The codebase is mainly procedural PHP with some simple object-oriented “model” classes, plus plain HTML/CSS/JS for the front end.

## Current Status & Limitations

This project is  functional but incomplete  and has several known limitations:

-  No modern framework 
  - Built with raw PHP and a custom structure (no Laravel / Symfony / Composer).
  - No formal MVC separation; routing is handled via query parameters (e.g. `?q=`, `?page=`, `?view=`).

-  Security is basic 
  - Uses PHP sessions and simple role checks.
  - Still needs:
    - Full conversion to prepared statements / parameterized queries.
    - Consistent output escaping to reduce XSS risk.
    - Stronger password handling and general hardening (CSRF tokens, stricter validation, etc.).

-  No automated tests 
  - There is  no  test framework configured (no `phpunit.xml`, no CI pipeline).
  - All verification is currently done manually through the browser.

-  Validation and error handling 
  - Input validation is minimal and scattered.
  - Error messages and edge-case handling are not yet standardized.

-  Legacy / unused files and folders 
  - Some files and directories are  present but not actually used  by the current system.
  - These include legacy assets, experimental modules, and old backups that have not been fully cleaned up.
  - They are safe to ignore, but future maintainers are encouraged to:
    - Identify unused code and assets.
    - Remove or archive them to reduce noise and confusion.

## Getting Started (Linux/macOS – LAMP)

1. Install a LAMP stack (Apache, PHP, MySQL/MariaDB).
2. Create a database (e.g. `bsu_db`) and import the main SQL dump from this repository.
3. Update the database configuration in the PHP config file (host, user, password, database name).
4. Place the project under your web server root (e.g. `htdocs/SIMS` or `public_html/SIMS`).
5. Access in the browser:
   - Public site: `http://localhost/SIMS/`
   - Admin backend: `http://localhost/SIMS/admin/`


## Getting Started (Windows – XAMPP/WAMP)

1. Install  XAMPP  or  WAMP  (includes Apache, PHP, and MySQL/MariaDB).
2. Start  Apache  and  MySQL  from the control panel.
3. Copy this project folder into your web root:
   - For XAMPP (default): `C:\xampp\htdocs\SIMS`
   - For WAMP (default): `C:\wamp64\www\SIMS`
4. Create a database (e.g. `bsu_db`) using  phpMyAdmin :
   - Open `http://localhost/phpmyadmin`
   - Create a new database named `bsu_db`
   - Import the provided SQL dump into `bsu_db`.
5. Configure database credentials in the PHP config file if they differ from defaults (host, user, password, DB name).
6. Test in the browser:
   - Public site: `http://localhost/SIMS/`
   - Admin backend: `http://localhost/SIMS/admin/`

All current testing is done  manually  via these browser-based flows (no automated test suite).