# 🔐 Laravel User Management System

[![Laravel Version](https://img.shields.io/badge/Laravel-^12.0-red.svg)](https://laravel.com)  
[![PHP Version](https://img.shields.io/badge/PHP-^8.3-blue.svg)](https://php.net)

A robust and scalable User Management System built using **Laravel 12**, applying **industry-standard design patterns** like DAO, BO, and Service Layer. This project demonstrates clean architecture, efficient caching, request validation, and RESTful API practices — ideal for production-ready systems or interview evaluations.

---

## ✨ Features

- ✅ Clean & modular architecture: DAO, BO, Service, Controller
- 🧪 Form Request Validation (create/update)
- ⚡ Efficient caching with auto-invalidation on update/delete
- 🔐 Password encryption using Laravel's `hashed` property
- 📡 Fully RESTful API with proper status codes
- 📚 PSR-12 standards and naming conventions

---

## ⚙️ Installation

1. **Clone the Repository**
```bash
git clone https://github.com/ankitmishra-dev/UserManagementSystem.git
cd UserManagementSystem
```

2. **Install Dependencies**
```bash
composer install
```

3. **Environment Setup**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Run Migrations and Seeder**
```bash
php artisan migrate --seed
```

5. **Run the App**
```bash
php artisan serve
```

---

## 📬 API Documentation

### 🔁 Available Endpoints

| Method | Endpoint                 | Description               |
|--------|--------------------------|---------------------------|
| POST   | `/api/v1/users`          | Create a new user         |
| PUT    | `/api/v1/users/{user}`   | Update an existing user   |
| DELETE | `/api/v1/users/{user}`   | Delete a user             |
| GET    | `/api/v1/users/{user}`   | Get a specific user       |
| GET    | `/api/v1/users`          | Get all users (paginated) |

---

### 📌 1. Create User

**Request**
```bash
curl --location 'http://usermanagementsystem.test/api/v1/users' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--data-raw '{
    "name": "Ankit Mishra",
    "email": "ankitmishra8268@gmail.com",
    "password": "iThinkSomeRandomPassword@123"
}'
```

**Response (201 Created)**
```json
{
    "data": {
        "id": 1,
        "name": "Ankit Mishra",
        "email": "ankitmishra8s268@gmail.com",
        "created_at": "2025-05-20T19:21:17.000000Z",
        "updated_at": "2025-05-20T19:21:17.000000Z"
    }
}
```

---

### ✏️ 2. Update User

**Request**
```bash
curl --location --request PUT 'http://usermanagementsystem.test/api/v1/users/1' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--data-raw '{
    "name": "Ankit Omprakash Mishra",
    "email": "ankitmishra8268@ithinklogistics.com",
    "password": "iThinkLogistics@400097"
}'
```

**Response (200 OK)**
```json
{
    "data": {
        "id": 1,
        "name": "Ankit Omprakash Mishra",
        "email": "ankitmishra8268@ithinklogistics.com",
        "created_at": "2025-05-20T18:54:52.000000Z",
        "updated_at": "2025-05-20T19:22:05.000000Z"
    }
}
```

---

### 🗑️ 3. Delete User

**Request**
```bash
curl --location --request DELETE 'http://usermanagementsystem.test/api/v1/users/1' \
--header 'Accept: application/json'
```

**Response (204 No Content)**  
_(Empty Response)_

---

### 🔍 4. Get Single User

**Request**
```bash
curl --location 'http://usermanagementsystem.test/api/v1/users/1' \
--header 'Accept: application/json'
```

**Response (200 OK)**
```json
{
    "data": {
        "id": 1,
        "name": "Ankit Mishra",
        "email": "ankitmishra8s268@gmail.com",
        "created_at": "2025-05-20T19:21:17.000000Z",
        "updated_at": "2025-05-20T19:21:17.000000Z"
    }
}
```

---

### 📃 5. Get All Users (Paginated)

**Request**
```bash
curl --location 'http://usermanagementsystem.test/api/v1/users?page=1&per_page=5' \
--header 'Accept: application/json'
```

**Response (200 OK)**
```json
{
    "data": [
        {
            "id": 2,
            "name": "Aayushman Hegde",
            "email": "xsing@example.com",
            "created_at": "2025-05-20T18:54:52.000000Z",
            "updated_at": "2025-05-20T18:54:52.000000Z"
        },
        {
            "id": 3,
            "name": "Tabeed Magar",
            "email": "bhatnagar.jack@example.org",
            "created_at": "2025-05-20T18:54:52.000000Z",
            "updated_at": "2025-05-20T18:54:52.000000Z"
        },
        {
            "id": 4,
            "name": "Farah Ben",
            "email": "leelawati35@example.org",
            "created_at": "2025-05-20T18:54:52.000000Z",
            "updated_at": "2025-05-20T18:54:52.000000Z"
        },
        {
            "id": 5,
            "name": "Tanuja Nakul Tata",
            "email": "habib88@example.org",
            "created_at": "2025-05-20T18:54:52.000000Z",
            "updated_at": "2025-05-20T18:54:52.000000Z"
        },
        {
            "id": 6,
            "name": "Nishi Jha",
            "email": "tmehrotra@example.org",
            "created_at": "2025-05-20T18:54:52.000000Z",
            "updated_at": "2025-05-20T18:54:52.000000Z"
        }
    ],
    "links": {
        "first": "http://usermanagementsystem.test/api/v1/users?page=1",
        "last": "http://usermanagementsystem.test/api/v1/users?page=13",
        "prev": null,
        "next": "http://usermanagementsystem.test/api/v1/users?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 13,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://usermanagementsystem.test/api/v1/users?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": "http://usermanagementsystem.test/api/v1/users?page=2",
                "label": "2",
                "active": false
            },
            {
                "url": "http://usermanagementsystem.test/api/v1/users?page=3",
                "label": "3",
                "active": false
            },
            {
                "url": "http://usermanagementsystem.test/api/v1/users?page=4",
                "label": "4",
                "active": false
            },
            {
                "url": "http://usermanagementsystem.test/api/v1/users?page=5",
                "label": "5",
                "active": false
            },
            {
                "url": "http://usermanagementsystem.test/api/v1/users?page=6",
                "label": "6",
                "active": false
            },
            {
                "url": "http://usermanagementsystem.test/api/v1/users?page=7",
                "label": "7",
                "active": false
            },
            {
                "url": "http://usermanagementsystem.test/api/v1/users?page=8",
                "label": "8",
                "active": false
            },
            {
                "url": "http://usermanagementsystem.test/api/v1/users?page=9",
                "label": "9",
                "active": false
            },
            {
                "url": "http://usermanagementsystem.test/api/v1/users?page=10",
                "label": "10",
                "active": false
            },
            {
                "url": "http://usermanagementsystem.test/api/v1/users?page=11",
                "label": "11",
                "active": false
            },
            {
                "url": "http://usermanagementsystem.test/api/v1/users?page=12",
                "label": "12",
                "active": false
            },
            {
                "url": "http://usermanagementsystem.test/api/v1/users?page=13",
                "label": "13",
                "active": false
            },
            {
                "url": "http://usermanagementsystem.test/api/v1/users?page=2",
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://usermanagementsystem.test/api/v1/users",
        "per_page": 5,
        "to": 5,
        "total": 62
    }
}
```

---

## 🧠 Notes

- ✅ Caching is applied to user fetches using `cache()->remember()`
- 🗑️ Cache is cleared on update/delete using `cache()->forget()`
- 🔐 Passwords are automatically hashed using the `hashed` property on the `User` model
- 🧪 Validation is handled in `StoreUserRequest` and `UpdateUserRequest` with custom rules
- 🧱 Modular architecture ensures extensibility

---

## 👨‍💻 Author

**Ankit Mishra** – [LinkedIn](https://linkedin.com/in/ankit-mishra99)  
_PHP Backend Developer | Laravel Developer_

---
