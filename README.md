# Course Discovery System

A web application that allows users to discover, filter, and search for various online courses across different categories. Built with Laravel and designed to provide a seamless user experience.

## Table of Contents

- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Usage](#usage)
- [API Endpoints](#api-endpoints)
- [Testing](#testing)

## Features

- Browse and filter courses by category, price, difficulty, duration, and more.
- Search for courses using keywords.
- Create, update, and delete courses (admin functionality).
- Well-structured API for easy integration.

## Technologies Used

- **Backend**: Laravel
- **Database**: MySQL
- **Frontend**: HTML, CSS, JavaScript (optional frameworks like Vue.js or React can be integrated)
- **Testing**: PHPUnit

## Installation

1. Clone the repository:

   ```bash
   https://github.com/TheGeekScript/course-discovery-system.git

## Usage

- Access the application at http://localhost:8000
- Use the provided API endpoints to interact with the course data.

## API Endpoints

### Courses

1. **List Courses**
   - **Method**: `GET`
   - **Endpoint**: `/api/courses`
   - **Description**: Retrieve a list of all courses.
   - **Query Parameters**:
     - `search` (optional): Search for courses by title or description.
     - `category` (optional): Filter by course category.
     - `price` (optional): Filter by price (e.g., `free`, `paid`).
     - `difficulty` (optional): Filter by difficulty level (e.g., `Beginner`, `Intermediate`, `Advanced`).
     - `duration` (optional): Filter by duration (e.g., `less than 2 hours`).
     - `rating` (optional): Filter by rating (e.g., `4+ stars`).
   - **Response**:
     - **Status Code**: `200 OK`
     - **Body**:
       ```json
       [
           {
               "id": 1,
               "title": "Introduction to PHP",
               "description": "Learn the basics of PHP programming.",
               "price": 49.99,
               "instructor": "John Doe",
               "category": "Programming",
               "difficulty_level": "Beginner",
               "duration": 120,
               "rating": 4.5,
               "course_format": "Video",
               "certification_available": true,
               "release_date": "2023-10-01"
           },
           {
               "id": 2,
               "title": "Advanced JavaScript",
               "description": "Deep dive into JavaScript and its advanced features.",
               "price": 59.99,
               "instructor": "Jane Smith",
               "category": "Programming",
               "difficulty_level": "Advanced",
               "duration": 180,
               "rating": 4.8,
               "course_format": "Text-based",
               "certification_available": true,
               "release_date": "2023-09-15"
           }
       ]
       ```

2. **Create Course**
   - **Method**: `POST`
   - **Endpoint**: `/api/courses`
   - **Description**: Create a new course.
   - **Request Body**:
     ```json
     {
         "title": "Course Title",
         "description": "Course Description",
         "price": 49.99,
         "instructor": "Instructor Name",
         "category": "Category",
         "difficulty_level": "Beginner",
         "duration": 120,
         "rating": 4.5,
         "course_format": "Video",
         "certification_available": true,
         "release_date": "2023-10-01"
     }
     ```
   - **Response**:
     - **Status Code**: `201 Created`
     - **Body**:
       ```json
       {
           "id": 3,
           "title": "Course Title",
           "description": "Course Description",
           "price": 49.99,
           "instructor": "Instructor Name",
           "category": "Category",
           "difficulty_level": "Beginner",
           "duration": 120,
           "rating": 4.5,
           "course_format": "Video",
           "certification_available": true,
           "release_date": "2023-10-01"
       }
       ```

3. **Show Course**
   - **Method**: `GET`
   - **Endpoint**: `/api/courses/{id}`
   - **Description**: Retrieve a specific course by ID.
   - **Response**:
     - **Status Code**: `200 OK`
     - **Body**:
       ```json
       {
           "id": 1,
           "title": "Introduction to PHP",
           "description": "Learn the basics of PHP programming.",
           "price": 49.99,
           "instructor": "John Doe",
           "category": "Programming",
           "difficulty_level": "Beginner",
           "duration": 120,
           "rating": 4.5,
           "course_format": "Video",
           "certification_available": true,
           "release_date": "2023-10-01"
       }
       ```

4. **Update Course**
   - **Method**: `PUT`
   - **Endpoint**: `/api/courses/{id}`
   - **Description**: Update an existing course.
   - **Request Body**:
     ```json
     {
         "title": "Updated Course Title",
         "description": "Updated description.",
         "price": 59.99,
         "instructor": "Jane Smith",
         "category": "Programming",
         "difficulty_level": "Intermediate",
         "duration": 150,
         "rating": 4.7,
         "course_format": "Video",
         "certification_available": true,
         "release_date": "2023-11-01"
     }
     ```
   - **Response**:
     - **Status Code**: `200 OK`
     - **Body**:
       ```json
       {
           "id": 1,
           "title": "Updated Course Title",
           "description": "Updated description.",
           "price": 59.99,
           "instructor": "Jane Smith",
           "category": "Programming",
           "difficulty_level": "Intermediate",
           "duration": 150,
           "rating": 4.7,
           "course_format": "Video",
           "certification_available": true,
           "release_date": "2023-11-01"
       }
       ```

5. **Delete Course**
   - **Method**: `DELETE`
   - **Endpoint**: `/api/courses/{id}`
   - **Description**: Delete a specific course by ID.
   - **Response**:
     - **Status Code**: `204 No Content`
     - **Body**: `null`

## Testing

This project includes unit tests to ensure the functionality of the API endpoints. Follow the instructions below to run the tests.

### Prerequisites

- Ensure you have [PHP](https://www.php.net/downloads) and [Composer](https://getcomposer.org/download/) installed on your machine.
- Make sure to set up your testing environment in the `.env.testing` file.

### Running Tests

1. **Set Up the Testing Environment**:
   - Create a `.env.testing` file by copying your existing `.env` file:

     ```bash
     cp .env .env.testing
     ```

   - Update the `.env.testing` file with the appropriate database configuration for testing.

2. **Run Migrations**:
   - Before running the tests, ensure that the database is set up correctly by running the migrations:

     ```bash
     php artisan migrate --env=testing
     ```

3. **Run the Tests**:
   - You can run all tests using the following command:

     ```bash
     php artisan test
     ```

   - Alternatively, you can run PHPUnit directly:

     ```bash
     ./vendor/bin/phpunit
     ```

4. **Check Test Results**:
   - After running the tests, review the output in the terminal to see which tests passed and which failed. If any tests fail, check the error messages for details on what went wrong.
