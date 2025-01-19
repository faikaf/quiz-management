
# Quiz Management System

## Table of Contents
- [Introduction](#introduction)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Usage](#usage)


## Introduction
The Quiz Management System is a web-based application designed to simplify the process of quiz creation and management for administrators and provide an intuitive platform for students to attempt quizzes and track their performance. The system offers separate functionalities for students and administrators, ensuring role-based access control.

## Features
### Common Features
- **Sign In and Sign Up**: Secure login and registration system for both students and administrators.

### Administrator Features
- Add and delete subjects for quizzes.
- Create quiz questions.


### Student Features
- View personal profile and update details.
- Attempt quizzes based on available subjects.
- View quiz scores and track performance.

## Technologies Used
- **Frontend**: HTML, CSS, JavaScript ( frameworks: Bootstrap/Tailwind CSS)
- **Backend**: PHP 
- **Database**: MySQL

## Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/faikaf/quiz-management.git
   ```
2. Navigate to the project directory:
   ```bash
   cd quiz-management
   ```
3. Set up the database:
  create database quiz:
   CREATE TABLE questions (
    question_no INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(10) NOT NULL,
    question TEXT COLLATE utf8mb4_general_ci NULL,
    option1 VARCHAR(100) COLLATE utf8mb4_general_ci NULL,
    option2 VARCHAR(100) COLLATE utf8mb4_general_ci NULL,
    option3 VARCHAR(100) COLLATE utf8mb4_general_ci NULL,
    option4 VARCHAR(100) COLLATE utf8mb4_general_ci NULL,
    answer VARCHAR(100) COLLATE utf8mb4_general_ci NULL

);
create table subjects(
id int auto_inrement primary key,
name varchar(20)
);
    -fro admin and student records:
    create database user_registration;

  CREATE TABLE student_users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    qualification VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    score INT(11) NULL,
    attempts INT(11) NULL,
    UNIQUE INDEX (email) -- Ensures no duplicate emails
);
CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    authentication_code VARCHAR(10) NOT NULL,
    UNIQUE INDEX (username) -- Ensures unique usernames for each user
);

5. Install dependencies:
   - For PHP: Ensure you have a local server like XAMPP or WAMP running.
   
6. Start the application:
   - For PHP: Place the project folder in the server's root directory and access via `http://localhost/quiz-management`.
   
Screenshots

Below are some screenshots of the Quiz Management System:

Login Page
![Screenshot (52)](https://github.com/user-attachments/assets/d21c978d-e159-4e17-a147-d206c7916b46)
![Screenshot (53)](https://github.com/user-attachments/assets/7729768d-061a-4456-a52f-fe9cb6d4067e)
![Screenshot (54)](https://github.com/user-attachments/assets/8f32e1d7-02e4-459f-8dbe-4ebba6f3afb9)



Quiz Dashboard

![Screenshot (55)](https://github.com/user-attachments/assets/4e6bd1ab-dc9e-4732-996d-cb63d5cdca93)
![Screenshot (56)](https://github.com/user-attachments/assets/6b07ccdc-e1a0-43d6-a48a-0b60084ed77c)


Quiz Attempt
![Screenshot (59)](https://github.com/user-attachments/assets/718b7eb9-0fc0-42ea-bd53-0e9462330899)
![Screenshot (58)](https://github.com/user-attachments/assets/43f86834-8e9e-4291-969b-f7cab01480ae)
![Screenshot (57)](https://github.com/user-attachments/assets/9181a5a9-7274-487a-8b26-d6dda5bffdbe)
![Screenshot (61)](https://github.com/user-attachments/assets/25958b85-f64c-4c60-a6d9-3ef019535d08)
![Screenshot (60)](https://github.com/user-attachments/assets/df7933da-8348-40d9-a7d4-ae2f2839bc22)

## Usage
1. **Administrator**:
   - Log in using admin credentials.
   - Add subjects and create quiz questions.
   - Manage existing subjects and questions.
   - Authentication code is written within the signUp.
2. **Student**:
   - Register and log in to the system.
   - View profile information.
   - Attempt quizzes and view scores after submission.


