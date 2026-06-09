# 🌍 Mlaku Travel API - UAS Project

A robust RESTful API built with Laravel for managing a travel booking system. This project was developed as a Final Semester Exam (Ujian Akhir Semester - UAS) project, providing comprehensive endpoints for destinations, tours, bookings, and secure authentication.

## 🚀 Features

* **🔐 Authentication System:** Secure user registration, login, and logout using API tokens.
* **🔑 API Key Management:** Endpoint access control using securely generated API keys.
* **📍 Destination Management:** Full CRUD operations to manage travel destinations.
* **🗺️ Tour Packages:** Endpoints to manage tour details and itineraries.
* **🎫 Booking System:** Allow users to book destinations and tours easily.

## 🛠️ Technology Stack

* **Framework:** Laravel (PHP)
* **Database:** MySQL
* **Architecture:** RESTful API

## 📋 Prerequisites

Before you begin, ensure you have met the following requirements:
* PHP >= 8.2
* Composer
* MySQL Database Server
* Git

## ⚙️ Installation Guide

1. **Clone the repository**
   ```bash
   git clone https://github.com/EkaRizqiRomadhon/UAS---API-.git
   cd "UAS API"
   ```

2. **Install Dependencies**
   ```bash
   composer install
   ```

3. **Environment Setup**
   Copy the example environment file and configure your database credentials:
   ```bash
   cp .env.example .env
   ```
   *Make sure to update `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` in your `.env` file.*

4. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations**
   ```bash
   php artisan migrate
   ```

6. **Start the Development Server**
   ```bash
   php artisan serve
   ```
   The API will be accessible at `http://localhost:8000/api`

## 📚 API Endpoints Overview

Here is a brief overview of the main API routes available in this project:

| Endpoint | Method | Description |
| :--- | :---: | :--- |
| `/api/register` | `POST` | Register a new user |
| `/api/login` | `POST` | Authenticate user and get token |
| `/api/logout` | `POST` | Logout and invalidate token |
| `/api/destinations` | `GET, POST, PUT, DELETE` | Manage destinations |
| `/api/tours` | `GET, POST, PUT, DELETE` | Manage tours |
| `/api/bookings` | `GET, POST` | Manage user bookings |

*(Note: Endpoints may require Bearer Token / API Key authorization in the request headers).*

## 👨‍💻 Contributors

* **Eka Rizqi Romadhon**
* **D Septian R**

---
*Built for Web API Development UAS Project*
