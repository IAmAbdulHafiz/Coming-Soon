# Coming Soon Page

This repository contains a customizable "Coming Soon" page developed by Abdul-Hafiz Yussif for Nebatech Software Solution Ltd. This page serves as a placeholder for projects under development, helping keep visitors informed with a countdown timer and progress bar while showcasing the client's organization name.

## Features

- Dynamic organization name display
- Countdown timer
- Progress bar
- Responsive design

## Technologies Used

- HTML
- CSS
- JavaScript
- PHP
- MySQL

## Setup Instructions

### Prerequisites

- A web server with PHP support (e.g., Apache)
- MySQL database

### Database Setup

1. Create a database named `countdown_db` (or any name you prefer).
2. Create a table named `countdown` with the following schema:

   ```sql
   CREATE TABLE countdown (
       id INT PRIMARY KEY,
       end_time BIGINT NOT NULL
   );
   ```

### File Structure
- index.html or default.php: Main HTML/PHP file
- style.css: CSS file for styling
- myscript.js: JavaScript file for countdown logic
- countdown-end-time.php: PHP script for handling end time storage and retrieval
- db.php: PHP script for database connection

### Configuration
1. Update the database connection details in db.php:

```
<?php
$servername = "your_server_name";
$username = "your_username";
$password = "your_password";
$dbname = "countdown_db"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
```

2. Ensure the paths to your CSS and JavaScript files are correct in default.php:
```
<link rel="stylesheet" href="style.css">
<script src="myscript.js" defer></script>
```

### Usage
1. Upload all files to your web server.
2. Access the default.php file in your browser.
3. The countdown timer should display and count down to the specified end time.

### Author
Abdul-Hafiz Yussif
Nebatech Software Solution Ltd
Website: www.nebatech.com
Email: info@nebatech.com

License
This project is licensed under the MIT License - see the LICENSE file for details.