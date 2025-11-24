# WARP.md

This file provides guidance to WARP (warp.dev) when working with code in this repository.

## Project Overview

This is a classic PHP/MySQL Student Information Management System (SIMS) intended to run under a web server (e.g. Apache in XAMPP/LAMPP). There is no Composer, Node, or formal framework in use; the app is structured as a set of PHP entrypoints that share a common initialization layer.

High-level areas:
- **Public site** (project root) – landing page, enrollment forms, subject lists, registration, and student self-service views.
- **Admin backend** (`admin/`) – dashboards and CRUD for students, subjects, courses, departments, schedules, and reports, with role-based access control.
- **Student area** (`student/`) – student profile management, grade viewing, and other student-facing actions.
- **Shared infrastructure** (`include/`) – configuration, DB access, session, and table/model abstractions.
- **Static assets** (`css/`, `js/`, `img/`, `font/`, `jquery/`, `theme/`, `input-mask/`) – front-end styling and JS plugins.

There are no existing automated tests or linting configuration in this repo.

## How to Run the Application

There is **no build step**; the code is executed directly by PHP.

### Database

- The main schema is in `bsu_db.sql` (and additional dumps such as `admin/back-up/` or `student/database_bsu_db.sql`).
- By default, the app expects a MySQL database named `bsu_db` with credentials:
  - host: `localhost`
  - user: `root`
  - password: empty
- `include/config.php` optionally reads environment variables to override these defaults:
  - `DB_HOST`, `DB_USER`, `DB_PASS`, `DB_NAME`.

When setting up a new environment:
1. Create a database (e.g. `bsu_db`).
2. Import `bsu_db.sql` into it.
3. Ensure the PHP process can connect using either the defaults or `DB_*` environment variables.

### Running via Apache (recommended for LAMPP/XAMPP)

If Apache is configured with `DocumentRoot` pointing at `.../htdocs`, place this project under that root (e.g. `htdocs/SIMS`) and access:
- Public site: `http://localhost/SIMS/`
- Admin backend: `http://localhost/SIMS/admin/`

### Running via PHP built-in server (for quick testing)

From the project root:
```bash path=null start=null
php -S localhost:8000
```
Then open:
- Public site: `http://localhost:8000/index.php`
- Admin backend: `http://localhost:8000/admin/index.php`

## Linting and Syntax Checking

There is no project-level lint configuration, but you can use PHP’s built-in syntax checker on individual files during development, for example:
```bash path=null start=null
# Check a single file
php -l index.php

# Check a set of key include files
php -l include/config.php include/initialize.php include/database.php
```

If you introduce a linter or formatter (e.g. PHP_CodeSniffer, PHP-CS-Fixer), document its usage here.

## Tests

There is **no configured test framework** (no `phpunit.xml`, `composer.json`, or similar). All behavior is currently verified manually through the browser.

If you add automated tests in the future (e.g. PHPUnit, Pest), please:
- Add the relevant tooling files (`composer.json`, `phpunit.xml`, etc.).
- Document test commands here, including how to run a single test case.

## Code Architecture

### Core bootstrap and configuration

- **`include/initialize.php`** is the central bootstrap file. It:
  - Defines `DS`, `SITE_ROOT`, and `LIB_PATH` constants.
  - Includes `config.php`, common helpers (`function.php`), session handling, and a series of table-specific classes (`accounts.php`, `courses.php`, `subjects.php`, `students.php`, etc.).
  - Includes `database.php`, which instantiates a global `$mydb` (`Database`) instance.
- **`include/config.php`**:
  - Defines DB connection constants (`server`, `user`, `pass`, `database_name`), sourcing from `DB_*` environment variables when present.
  - Computes `web_root` based on the filesystem path and `$_SERVER['DOCUMENT_ROOT']`; this constant is widely used to build absolute URLs for redirects and links.
- **`include/database.php`**:
  - Implements a custom `Database` wrapper around `mysqli` with methods like `setQuery`, `executeQuery`, `loadResultList`, `loadSingleResult`, `getFieldsOnOneTable`, etc.
  - The global `$mydb` instance is used throughout the app for DB queries.
- **`include/function.php`**:
  - Provides utility functions (`redirect`, `output_message`, date formatting, etc.).
  - Registers an autoloader to load classes from `include/` by filename (`spl_autoload_register('__autoload_')`).

When adding new domain classes, keep them under `include/` and follow the existing pattern (one class per table-style file, loaded by `initialize.php`).

### Public routing and theming

- **`index.php`** is the main public entrypoint:
  - Requires `include/initialize.php`.
  - Reads the `q` query parameter to determine which content page to render and sets `$content` and `$title` accordingly.
    - Examples: `q=department` → `menu.php`, `q=enrol` → `enrollment_form.php`, `q=subjectlist` → `subjectlist.php`, `q=profile` → `student/profile.php`, etc.
  - Always ends by including `theme/templates.php`, which is responsible for the overall layout and for including the selected `$content` file.

Public-facing PHP scripts at the project root (`home.php`, `about.php`, `subjectlist.php`, `enrollment_form.php`, etc.) are mostly view/controller hybrids that rely on the initialized globals and classes.

### Admin area

- **Entry**: `admin/index.php` requires `../include/initialize.php` and performs access control:
  - Ensures `$_SESSION['ACCOUNT_ID']` is set.
  - Restricts access by `$_SESSION['ACCOUNT_TYPE']` (expects values like `Administrator`, `Registrar`, `Chairperson`).
- Routing:
  - Uses a `page` query parameter to switch views; currently only `page=1` and default map to `home.php`.
  - Includes `theme/templates.php` under `admin/` to render a layout around `$content`.
- **Dashboard**: `admin/home.php`:
  - Uses the global `$mydb` to compute counts of students, subjects, courses, instructors, departments, and enrollments.
  - Renders a dashboard with role-aware quick actions and links that are enabled/disabled based on `ACCOUNT_TYPE`.
- **Module structure**:
  - Each admin sub-module lives in its own subdirectory (e.g. `admin/student/`, `admin/subject/`, `admin/course/`, `admin/department/`, `admin/report/`).
  - Each module has an `index.php` that:
    - Requires `../../include/initialize.php`.
    - Enforces session/role checks.
    - Switches on a `view` query parameter to choose a sub-view (`list.php`, `add.php`, `edit.php`, etc.).
    - Sets `$content` and delegates to `../theme/templates.php` to wrap the chosen view.

When adding a new admin feature, follow this pattern: create a subdirectory with an `index.php` router plus specific view files, and wire it into the sidebar/menu.

### Student area

- **`student/controller.php`** drives student-related actions:
  - Requires `../include/initialize.php`.
  - Ensures either an admin session (`ACCOUNT_ID`) or a student session (`IDNO`) is present; otherwise redirects to `admin/index.php`.
  - Switches on an `action` query parameter (`add`, `edit`, `addgrade`, `delete`, `photos`) and delegates to functions like `doInsert`, `doEdit`, `doUpdateGrades`, `dodelete`, `doupdateimage`.
- **`student/profile.php`**, `studentgrades.php`, `printschedule.php`, etc., are view scripts that use the shared models (`Student`, `StudentDetails`, `Course`, `Subject`) via the autoloaded classes from `include/`.

Student photo handling currently writes into `student/student_image/` and is split between `student/controller.php` and admin/student views.

### Domain classes and business logic (`include/*.php`)

Although not all are listed here, key table-backed classes include:
- `accounts.php` – system user accounts and authentication.
- `students.php`, `studentdetails.php`, `studentsubjects.php`, `studentschedule.php` – core student records and enrollments.
- `courses.php`, `subjects.php`, `classes.php`, `schedules.php` – curriculum and scheduling.
- `departments.php`, `instructors.php`, `grades.php`, `semester.php`, `ay.php` – academic structure and grading.

These classes typically:
- Use the global `$mydb` for DB access via `setQuery` and the `Database` helper methods.
- Provide CRUD-style methods (e.g. `create`, `update`, `single_*` lookups) and sometimes more specialized queries.

When changing business rules, prefer updating these centralized classes rather than scattering SQL changes throughout views.

## Conventions and Gotchas

- **Global state**: The app relies heavily on globals (`$mydb`, `$_SESSION`, procedural helpers). Be mindful of side effects when reusing code across different entrypoints.
- **Routing via query parameters**: Most controllers use `$_GET['q']`, `$_GET['page']`, or `$_GET['view']`/`$_GET['action']` to choose which view or action to execute. Ensure new code validates these parameters and uses safe defaults.
- **URLs and paths**: Use the `web_root` constant when generating links or redirects so that paths remain correct if the app is moved under a different document root.
- **Database schema alignment**: Many behaviors assume columns and tables as defined in `bsu_db.sql`. When altering schemas, update both the SQL dump and the corresponding `include/*.php` domain classes.

## How Future Warp Instances Should Work Here

- Always start by including or inspecting `include/initialize.php` and the relevant domain class file when changing data-related behavior.
- For UI changes, locate the appropriate view under the public root, `admin/`, or `student/`, then ensure the change plays well with the surrounding `theme/templates.php` layout.
- When introducing new tooling (tests, linting, build pipelines), document the exact commands in this file and avoid changing existing behavior unless explicitly requested.