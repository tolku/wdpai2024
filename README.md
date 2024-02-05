# Travelchan Forum Application

Travelchan is a compact, simple, and stylish forum application that allows people to exchange their adventures while traveling, tell stories, and engage in discussions on a sleek website.

## Installation

To install this project, you will need:

- PHP version 7.4+ and additional PHP interpreter (if not already installed)
- PostgreSQL database with provided code (available in the repository in db.sql)
- Docker and Docker Compose to build and run Docker images

1. Clone the repository:

`````
git clone https://github.com/tolkuski/travelchan.git
cd travelchan
`````

2.Create a config.php file in the source directory with the following variables set:<?php
````
define('USERNAME', 'your_username');
define('PASSWORD', 'your_password');
define('HOST', 'your_host');
define('DATABASE', 'your_database');
   ````

3.Build and run Docker images with Docker Compose:
```
docker-compose up -d
```

## Features

- Account creation and authentication
- Adding and viewing posts
- Viewing user profiles
- Including images in posts

## Contant Information
For any inquiries or support, please contact Tomasz Olkuski at tomasz.olkuski@student.pk.edu.pl.

## License
This project is open for everyone to use. Please refer to the LICENSE file for more details.