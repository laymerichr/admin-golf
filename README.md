⛳ Admin Golf - Management System (Administrator Module)
This project is the administrative module developed for the Spanish Golf Federation. It allows for the centralized management of users, tournaments, and memberships.

🛠️ Technologies Used
Backend: Laravel (PHP)

Frontend: AdminLTE (Bootstrap 4)

Database: MySQL

Package Management: Composer & NPM

🚀 Key Features
Statistical Dashboard: Real-time visualization of active federated members.

Tournament Management: Full CRUD for creating and editing events.

Roles & Permissions: Authentication system with different access levels.

Responsive Design: Optimized for tablets and desktop via the AdminLTE panel.

📦 Installation & Setup
Follow these steps to set up the project locally:

Clone the repository:

Bash
git clone https://github.com/laymerichr/admin-golf.git
cd admin-golf
Install dependencies:

Bash
composer install
npm install && npm run dev
Environment Configuration:
Copy the example file and configure your database settings:

Bash
cp .env.example .env
php artisan key:generate
Migrations & Seeding (Optional):

Bash
php artisan migrate --seed
Run the server:

Bash
php artisan serve
