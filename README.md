# Warehouse Management System

A warehouse inventory and tracking management system built with CodeIgniter 4.

## 🚀 Getting Started

### 1. Database Setup
```bash
mysql -u root -p -e "CREATE DATABASE warehouse;"
php spark migrate
php spark db:seed UserSeeder
```

### 2. Start Application
```bash
php spark serve --port=8080
```

### 3. Access System
Open browser: **http://localhost:8080**

## 🔑 Login Accounts

| Username | Password | Role |
|----------|----------|------|
| `manager` | `password` | Warehouse Manager |
| `staff` | `password` | Warehouse Staff |
| `auditor` | `password` | Inventory Auditor |
| `procurement` | `password` | Procurement Officer |

## 📝 How to Login

1. Go to **http://localhost:8080**
2. Enter username and password from table above
3. Select the matching role from dropdown
4. Click **Login**

**Example:**
- Username: `manager`
- Password: `password`
- Role: Warehouse Manager

## ⚙️ Requirements

- PHP 8.1+
- MySQL
- Composer

## 🛠️ Installation

```bash
git clone [your-repo-url]
cd warehouse-management-system
composer install
cp .env.example .env
```

Edit `.env`:
```
app.baseURL = 'http://localhost:8080/'
database.default.database = warehouse
```

## 📋 Features

- Multi-role authentication
- Inventory management
- Purchase order tracking
- Audit management
- Shipping/receiving

---

**CodeIgniter 4 Framework**
