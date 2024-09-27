# Customer Management System

A comprehensive Laravel-based system for managing customers, payments, and debts with advanced filtering, reporting, and chart visualization capabilities. This application helps businesses track customer data, monitor transactions, and generate PDF reports, offering an intuitive and easy-to-use interface.

## Features

- **Customer Management**: Track customer details like name, phone, company, VAT number, and partners.
- **Payments & Debts Tracking**: Record payments and debts with detailed information (amount, date, type: cash, check, IOU).
- **Dashboard Overview**: Displays key metrics, total payments, debts, and a list of customers with their balances.
- **Interactive Charts**: Visualize payments, debts, and balance breakdowns by date and type.
- **PDF Report Generation**: Export detailed customer reports and a summary of payments and debts between selected date ranges.
- **Search & Filtering**: Search customers by name, phone, company, VAT number, or partners, and filter transactions by date range.
- **Responsive Design**: Mobile-friendly interface using Tailwind CSS.

## Installation

To install and run the project locally, follow these steps:

1. **Clone the repository**:
   ```bash
   git clone https://github.com/your-repo/customer-management-system.git

2. **Navigate to the project directory**:
    ```bash
    cd customer-management-system

3. **Install dependencies**:
    ```bash
    composer install
    npm install

4. **Copy the environment file and configure your database:**:
    ```bash
    cp .env.example .env

5. **Generate application key**:
    ```bash
    php artisan key:generate

6. **Install dependencies**:
    ```bash
    Run database migrations

7. **Run database seeders (optional)**:
    ```bash
    php artisan db:seed

8. **Start the development server**:
    ```bash
    php artisan serve

9. **Build frontend assets (optional)**:
    ```bash
    npm run dev

# Usage
Once installed, you can access the application at http://localhost:8000. The system allows you to:

- **Add, edit, and manage customer data.**
- **Record payments and debts for each customer.**
- **View the overall balance of payments and debts on the dashboard.**
- **Search customers by various fields (name, phone, company, etc.).**
- **Generate and download PDF reports for customers or date-based transaction summaries.**
- **Visualize payments and debts using line and pie charts.**

# Example Use Cases
- **Track how much each customer owes and their payments over time.**
- **Generate reports to export and share with accounting teams.**
- **Visualize trends in customer payments and debts over specific date ranges.**


## Technologies Used
- **Backend**: Laravel (PHP framework)
- **Frontend**: Blade templates, Tailwind CSS
- **Database**: MySQL
- **Charts**: Chart.js
- **PDF Generation**: DomPDF
- **Version Control**: Git

# Contribution
Contributions are welcome! If you'd like to contribute, feel free to fork the repository and submit a pull request.


## Contact
For any inquiries or feedback, feel free to reach out:

- **Email**: mohamedbarqb@gmail.com
- **LinkedIn**: www.linkedin.com/in/mohammad-barq