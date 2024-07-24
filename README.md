
# Restaurant Management Web Application

The Restaurant Management System is a web-based application designed to streamline the operations of a restaurant. The system includes functionalities for both customers and administrators, providing an efficient way to manage food orders, user accounts, and restaurant settings.

## Key Features:

- Customer Interface:

- Menu Display: Customers can view the restaurant's menu items.
- Add to Cart: Customers can add items to their cart and proceed to checkout.
- User Authentication: Users can log in and sign up to place orders.
- Order Management: Customers can view their order history and track current orders.
- Table Reservation: Users can book tables online.

## Admin Portal:

- Dashboard: Provides an overview of key metrics such as members online, items sold, orders this week, and total earnings.
- Admin Settings: Allows admins to configure notifications and theme preferences.
- Order Management: Admins can view and manage customer orders.
- User Management: Admins can view customer details and manage user accounts.

## Settings Management:

- Theme Customization: Admins can choose between default, dark, and light themes, which apply site-wide.
- Notification Settings: Admins can enable or disable notifications.

## Technical Stack:

- Frontend: HTML, CSS (including Bootstrap and custom themes), JavaScript.
- Backend: PHP, MySQL for database management.
- Server: Apache, running on a local XAMPP server environment.

## Installation
### Prerequisites
- XAMPP (or any LAMP/WAMP/MAMP stack)
- Git

### Steps : 
### Clone the repository: 

https://github.com/yourusername/restaurant-management-system.git

- Move the project to the XAMPP htdocs directory:
- mv restaurant-management-system /path/to/xampp/htdocs/

### Start Apache and MySQL from the XAMPP control panel

### Create a database:

- Open phpMyAdmin.
- Create a new database named food_website.
- Import the database:
  Import the food_website.sql file located in the project's root directory (Restaurant-Management/Flavour Fleet/food_website.sql) into the food_website database.

### Open the project in the browser:

- Navigate to http://localhost/restaurant-management in your web browser.

## Usage
### Admin Login
- Use the following credentials to log in as an admin:
- Username: abhishek@admin.com
- Password: 333
- You can change or add admin username and password via the database or by going the account option in admin panel.

- Sign up or log in to place orders, view the menu, and manage your cart.

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.




