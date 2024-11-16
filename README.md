# Catalog Product

**Catalog Product** is a web-based application designed to manage and document all products within a company. This platform provides an efficient way to catalog, update, and review product data, supporting internal operations and decision-making.

Built using the Laravel framework, the application ensures a seamless and robust experience for managing a company’s product inventory.

---

## Features
- **Product Management**: Add, edit, and delete product entries.  
- **Search and Filter**: Easily search for specific products and apply filters to refine results.  
- **Detailed Product Information**: Store and display product details, including descriptions, pricing, and stock status.  
- **User Roles**: Role-based access for administrators and staff.  
- **Export Data**: Export product lists to CSV or PDF for reporting purposes.  

---

## System Requirements
Ensure your environment meets the following requirements:
- PHP >= 8.0
- Composer >= 2.0
- Laravel >= 9.0
- Node.js >= 16.0 and NPM
- MySQL/MariaDB Database
- A local development server (e.g., XAMPP, Laragon, or Valet)

---

## Installation and Setup Guide

### 1. Clone the Repository
Run the following command to clone the repository to your local machine:
```bash
git clone https://github.com/robbyulawal11/catalog-product.git
cd catalog-product
```

### 2. Install Dependencies
Install the required dependencies for PHP and JavaScript:
```bash
composer install
npm install
```

### 3. Configure Environment
Duplicate the `.env.example` file and rename it to `.env`:
```bash
cp .env.example .env
```
Update the `.env` file with your database credentials:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

### 4. Generate Application Key
Run the following command to generate the application key:
```bash
php artisan key:generate
```

### 5. Run Database Migrations
Set up the database tables by running migrations:
```bash
php artisan migrate
```

### 6. Build Frontend Assets
Compile the JavaScript and CSS files:
```bash
npm run dev
```
For a production-ready build:
```bash
npm run build
```

### 7. Start the Application
Run the Laravel development server:
```bash
php artisan serve
```

---

## Contributing
Contributions are welcome! If you wish to contribute:
1. Fork this repository.
2. Create a new branch (`git checkout -b feature-name`).
3. Commit your changes (`git commit -m "Add new feature"`).
4. Push to the branch (`git push origin feature-name`).
5. Open a pull request.

---

## License
This project is licensed under the [MIT License](https://opensource.org/licenses/MIT). See the LICENSE file for details.

---

## About
Catalog Product is developed to simplify product documentation and streamline company operations, making it easier to manage and utilize product data effectively.
