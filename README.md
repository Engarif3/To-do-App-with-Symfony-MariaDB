# To-Do App (Symfony-MariaDB)

## Overview
This project is a task management application developed with **Symfony** and **MariaDB** as the backend technologies. It provides basic functionality to manage tasks effectively.

## Features
- Add, edit, and delete tasks.
- Sort tasks based on their status (**pending** or **completed**).
- Each task displays its current status below the task name.

## Technologies Used
- **Symfony**: Backend framework for application logic.
- **MariaDB**: Database management system.
- **Docker**: Containerization of the application.
- **Docker Compose**: Managing and orchestrating multiple containers.

## Architecture
The application consists of two Docker containers:
1. **Symfony App**: Hosts the backend application.
2. **MySQL Container**: Hosts the database.

Both containers communicate within the same Docker network named `to-do`.

## Prerequisites
- Docker and Docker Compose installed on your system.

## Getting Started
1. Clone the repository:
   ```bash
   git clone <Backend Repo URL>
   cd <repository-folder>
   ```

2. Start the application using Docker Compose:
   ```bash
   docker-compose up -d
   ```

3. Access the Symfony application locally:
   ```
   http://localhost:8000
   ```

## Usage
- Use the provided endpoints (if any) or console commands to manage tasks.
- Tasks can be added, edited, deleted, and sorted as required.

## Project Links
- [Backend Repository](<Backend Repo URL>)
