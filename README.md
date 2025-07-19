# PHP Composer Practice Project

A simple PHP web application demonstrating modern PHP development practices including Composer autoloading, MVC architecture, routing, and file uploads.

## 📋 Table of Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Project Structure](#project-structure)
- [Usage](#usage)
- [Architecture](#architecture)
- [Routes](#routes)
- [Contributing](#contributing)
- [Author](#author)

## ✨ Features

- **Custom MVC Framework**: Built from scratch with separation of concerns
- **PSR-4 Autoloading**: Uses Composer for automatic class loading
- **Custom Router**: Simple but effective routing system with GET/POST support
- **View System**: Template-based view rendering with data binding
- **File Upload**: Demonstrates file handling and storage
- **Exception Handling**: Custom exceptions for route and view not found scenarios
- **Modern PHP**: Uses PHP 8+ features including strict types and union types

## 🔧 Requirements

- PHP 8.0 or higher
- Composer
- Web server (Apache/Nginx) or PHP built-in server
- Write permissions for the `storage/` directory

## 🚀 Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/Ziad-Elganzory/php-native-practice.git
   cd php-composer
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Set up web server**
   
   **Option A: Using XAMPP/WAMP**
   - Place the project in your `htdocs` folder
   - Access via `http://localhost/php-composer/public`
   
   **Option B: PHP Built-in Server**
   ```bash
   cd public
   php -S localhost:8000
   ```

4. **Ensure storage permissions**
   ```bash
   chmod 755 storage/
   ```

## 📁 Project Structure

```
php-composer/
├── app/                          # Application core
│   ├── Controllers/              # Request handlers
│   │   ├── HomeController.php    # Home page and file upload
│   │   └── InvoiceController.php # Invoice management
│   ├── Exceptions/               # Custom exceptions
│   │   ├── RouteNotFoundException.php
│   │   └── ViewNotFoundException.php
│   ├── Router.php                # Custom routing system
│   └── View.php                  # View rendering engine
├── public/                       # Web accessible files
│   └── index.php                 # Application entry point
├── storage/                      # File uploads and storage
├── vendor/                       # Composer dependencies
├── views/                        # Template files
│   ├── templates/                # Shared templates
│   │   ├── header.php
│   │   └── footer.php
│   ├── invoices/                 # Invoice views
│   │   ├── index.php
│   │   └── create.php
│   └── index.php                 # Home page view
├── composer.json                 # Composer configuration
├── composer.lock                 # Dependency lock file
└── README.md                     # This file
```

## 🎯 Usage

### Home Page
Visit the root URL to see the welcome page with sample data binding.

### File Upload
The home page includes a file upload form that demonstrates:
- File validation
- Moving uploaded files to storage
- Displaying file information

### Invoice Management
- **View Invoices**: `/invoices` - Lists all invoices
- **Create Invoice**: `/invoices/create` - Form to create new invoices
- **Store Invoice**: POST to `/invoices/create` - Handles form submission

## 🏗️ Architecture

### MVC Pattern
- **Models**: Data layer (to be implemented)
- **Views**: Template files in `views/` directory
- **Controllers**: Handle requests and business logic

### Router System
The custom router supports:
- Method-based routing (GET, POST)
- Controller-action mapping
- Callable route handlers
- Automatic class instantiation

### View Engine
- Template inheritance with header/footer
- Data binding to views
- Automatic file path resolution
- Exception handling for missing views

### Autoloading
Uses PSR-4 autoloading standard:
- `App\` namespace maps to `app/` directory
- Composer handles all class loading automatically

## 🛣️ Routes

| Method | Route              | Controller              | Action | Description        |
|--------|--------------------|-------------------------|--------|--------------------|
| GET    | `/`                | HomeController          | index  | Home page          |
| POST   | `/upload`          | HomeController          | upload | File upload        |
| GET    | `/invoices`        | InvoiceController       | index  | List invoices      |
| GET    | `/invoices/create` | InvoiceController       | create | Show create form   |
| POST   | `/invoices/create` | InvoiceController       | store  | Process form       |

## 🔧 Extending the Application

### Adding New Routes
```php
// In public/index.php
$router->get('/new-route', [NewController::class, 'method']);
```

### Creating Controllers
```php
<?php
namespace App\Controllers;

use App\View;

class NewController
{
    public function method()
    {
        return View::make('template-name', ['data' => 'value']);
    }
}
```

### Adding Views
Create PHP files in the `views/` directory. Views automatically include header and footer templates.

## 📝 Learning Objectives

This project demonstrates:
- ✅ Composer dependency management
- ✅ PSR-4 autoloading standards
- ✅ Object-oriented PHP design
- ✅ MVC architectural pattern
- ✅ Custom routing implementation
- ✅ Template-based view system
- ✅ File upload handling
- ✅ Exception handling
- ✅ Modern PHP features (strict types, union types)

## 👨‍💻 Author

**Ziad Elganzory**
- Email: ziad.m.elganzory@gmail.com
- GitHub: [@Ziad-Elganzory](https://github.com/Ziad-Elganzory)

## 📄 License

This is a practice project for educational purposes.

---

*This project serves as a foundation for understanding modern PHP development practices and can be extended with additional features like database integration, authentication, and more advanced routing capabilities.*