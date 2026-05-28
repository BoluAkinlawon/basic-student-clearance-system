# Graduate Clearance System

A web-based graduate clearance management system built with PHP and MySQL. Students register, log in, and check their clearance status. Admins can view all graduates, approve clearance, and manage records.

## Features

- Graduate self-registration and secure login
- Dashboard showing clearance approval status
- Printable clearance certificate (approved graduates only)
- Admin login and dashboard
- Admin can approve or delete graduate records
- Secure password hashing (bcrypt)
- PDO prepared statements (SQL injection protection)
- Session-based authentication with proper redirects
- XSS protection via htmlspecialchars()

## Tech Stack

- PHP 8+
- MySQL
- HTML5 / CSS3
- PDO (database layer)

## Setup

1. Clone the repository
2. Import `graduate.sql` into your MySQL database
3. Copy `.env.example` to `.env` and add your database credentials
4. Run on a local server (XAMPP / WAMP / Laragon)
5. Visit `http://localhost/graduate-clearance`

## Project Structure

```
graduate-clearance/
├── index.php
├── .env.example
├── css/style.css
├── includes/
│   ├── config.php
│   ├── header.php
│   └── footer.php
├── graduate/
│   ├── login.php
│   ├── register.php
│   ├── dashboard.php
│   ├── clearance.php
│   └── logout.php
└── admin/
    ├── login.php
    ├── dashboard.php
    ├── approve.php
    ├── delete.php
    └── logout.php
```

## Author

Bolutife Akinlawon — [GitHub](https://github.com/BoluAkinlawon) | [LinkedIn](https://www.linkedin.com/in/bolutife-akinlawon-623784193/)
