# OOP CRUD (PHP)

A minimal Create-Read-Update-Delete application in PHP that manages a list of users through a reusable object-oriented mysqli `Database` class.

![PHP](https://img.shields.io/badge/PHP-OOP-777BB4?logo=php&logoColor=white) ![MySQL](https://img.shields.io/badge/MySQL-mysqli-4479A1?logo=mysql&logoColor=white)

## Overview

Built in May 2021 as an early learning project to practice OOP in PHP and basic database operations.

## Features

- List all users in a table (name, email, status) with an Update link per row
- Create a user with name, email and status
- Edit a user's details on the update page
- Delete a user from the same page
- `Database` class with `select`, `insert`, `update` and `delete` methods
- Database settings as constants in `config.php`

## Tech Stack

- PHP (OOP)
- MySQL via mysqli
- HTML with inline CSS

## Getting Started

1. Copy the project to your web root, e.g. `htdocs/OOP_CRUD`.
2. Create the database and table (the config expects a database named `chat`):

   ```sql
   CREATE TABLE users (
     user_id INT AUTO_INCREMENT PRIMARY KEY,
     fname VARCHAR(100) NOT NULL,
     email VARCHAR(150) NOT NULL,
     status VARCHAR(255)
   );
   ```

3. Update the credentials in `config.php`.
4. Open `http://localhost/OOP_CRUD/`.

## Project Structure

```text
index.php     # List users
create.php    # Add user form
update.php    # Edit / delete user
Database.php  # mysqli wrapper class
config.php    # DB constants
inc/          # header, footer
```

## Author

Built by **Ashraf Siddik**, Shopify developer & CRO specialist.
- Website: [ashraf-siddik.com](https://ashraf-siddik.com)
- GitHub: [@coderasraf](https://github.com/coderasraf)
