# Laravel Authentication Dashboard Application

## 📘 Laboratory Assignment
**Topic:** Laravel Migrations, Factories, Seeders, Routes, Views, and Authentication Scaffolding using Laravel Breeze

## 🎯 Objective
Create a Laravel application with user authentication and a protected dashboard page that displays user information.

## 🛠️ Implementation Details

### 1️⃣ Database Migration (Users Table)

**Migration File:** `database/migrations/2026_02_05_023807_add_username_and_fields_to_users_table.php`

Modified the existing users table to include:
- `username` (string, unique) - Added after id
- `is_active` (boolean, default: true) - Added after password
- `last_login` (timestamp, nullable) - Added after is_active

**Command to run migration:**
```bash
php artisan migrate
```

### 2️⃣ Factories and Seeders

**UserFactory (`database/factories/UserFactory.php`)**
Generates realistic dummy data with:
- Unique usernames using `fake()->unique()->userName()`
- Realistic names and emails
- Password hashing with default 'password'
- 90% probability of active status
- Optional last_login timestamps

**UserSeeder (`database/seeders/UserSeeder.php`)**
Creates 100 users total:
- 1 test user with known credentials
- 99 randomly generated users

**Commands to seed database:**
```bash
php artisan db:seed
```

**🧪 Test Credentials (11 Total Users):**

**Admin User:**
- Email: `admin@example.com`
- Password: `password`
- Username: `admin`

**Sample Test Users:**
1. Email: `john.doe@example.com` - Password: `password` - Username: `john_doe`
2. Email: `jane.smith@example.com` - Password: `password` - Username: `jane_smith`
3. Email: `mike.wilson@example.com` - Password: `password` - Username: `mike_wilson`
4. Email: `sarah.johnson@example.com` - Password: `password` - Username: `sarah_johnson`
5. Email: `david.brown@example.com` - Password: `password` - Username: `david_brown`
6. Email: `lisa.davis@example.com` - Password: `password` - Username: `lisa_davis`
7. Email: `robert.miller@example.com` - Password: `password` - Username: `robert_miller`
8. Email: `emily.garcia@example.com` - Password: `password` - Username: `emily_garcia`
9. Email: `james.rodriguez@example.com` - Password: `password` - Username: `james_rodriguez`
10. Email: `mary.martinez@example.com` - Password: `password` - Username: `mary_martinez`

### 3️⃣ Authentication Scaffolding (Laravel Breeze)

**Installation Commands:**
```bash
composer require laravel/breeze --dev
php artisan breeze:install
npm install
npm run dev
```

**Important Generated Files:**
- Authentication controllers in `app/Http/Controllers/Auth/`
- Authentication views in `resources/views/auth/`
- Profile management views in `resources/views/profile/`
- Authentication routes in `routes/auth.php`
- Main layout in `resources/views/layouts/app.blade.php`

### 4️⃣ Routing and Dashboard

**Routes (`routes/web.php`)**
```php
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
```

**Middleware Usage:**
- `auth` - Ensures user is authenticated
- `verified` - Ensures email is verified (if email verification is enabled)

**Login Redirect:**
Configured in `app/Http/Controllers/Auth/AuthenticatedSessionController.php` to redirect to `/dashboard` after successful login.

### 5️⃣ Dashboard View

**Dashboard Features (`resources/views/dashboard.blade.php`)**
- Bootstrap 5 styling via Vite asset compilation
- Displays logged-in user's:
  - Username
  - Name
  - Email
  - Account status (Active/Inactive)
  - Last login timestamp
- System overview cards showing:
  - Total users (100)
  - Security status
  - Last updated information
- Responsive grid layout
- Edit profile button linking to profile management

**Custom DashboardController (`app/Http/Controllers/DashboardController.php`)**
- Updates user's last_login timestamp on dashboard access
- Passes authenticated user data to view

## ✅ Functional Requirements Implemented

✅ Login using seeded users
✅ User registration
✅ Logout functionality
✅ Redirect to /dashboard after login
✅ Frontend styling via Vite with Bootstrap
✅ Protected dashboard route
✅ User information display
✅ Last login tracking

## 📦 Setup Instructions

1. **Clone/Download the project**
2. **Install PHP dependencies:**
   ```bash
   composer install
   ```
3. **Install Node dependencies:**
   ```bash
   npm install
   ```
4. **Configure environment:**
   - Copy `.env.example` to `.env`
   - Configure database settings in `.env`
5. **Generate application key:**
   ```bash
   php artisan key:generate
   ```
6. **Run database migrations:**
   ```bash
   php artisan migrate
   ```
7. **Seed the database:**
   ```bash
   php artisan db:seed
   ```
8. **Compile frontend assets:**
   ```bash
   npm run dev
   ```
9. **Start the development server:**
   ```bash
   php artisan serve
   ```
10. **Access the application:**
    Open `http://localhost:8000` in your browser

## 🧪 Testing the Application

1. Visit the homepage
2. Click "Log in" or "Register"
3. Use any of the test credentials:
   
   **Admin User:**
   - Email: `admin@example.com`
   - Password: `password`
   
   **Sample Users (any of these 10):**
   - john.doe@example.com
   - jane.smith@example.com
   - mike.wilson@example.com
   - sarah.johnson@example.com
   - david.brown@example.com
   - lisa.davis@example.com
   - robert.miller@example.com
   - emily.garcia@example.com
   - james.rodriguez@example.com
   - mary.martinez@example.com
   
   **All passwords:** `password`
4. You will be redirected to `/dashboard`
5. View your user information and system statistics

## ⚙️ Technical Specifications

- **Laravel Version:** 12.x
- **PHP Version:** 8.2+
- **Database:** SQLite (configured) or MySQL/PostgreSQL
- **Frontend Framework:** Bootstrap 5
- **Asset Compilation:** Vite
- **Authentication:** Laravel Breeze
- **Testing Framework:** PestPHP

## 📁 Project Structure
```
LaravelDashboard/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/
│   │   │   │   ├── AuthenticatedSessionController.php
│   │   │   │   ├── ConfirmablePasswordController.php
│   │   │   │   ├── EmailVerificationNotificationController.php
│   │   │   │   ├── EmailVerificationPromptController.php
│   │   │   │   ├── NewPasswordController.php
│   │   │   │   ├── PasswordController.php
│   │   │   │   ├── PasswordResetLinkController.php
│   │   │   │   ├── RegisteredUserController.php
│   │   │   │   └── VerifyEmailController.php
│   │   │   ├── Controller.php
│   │   │   ├── DashboardController.php
│   │   │   └── ProfileController.php
│   │   └── Requests/
│   │       ├── Auth/
│   │       │   └── LoginRequest.php
│   │       └── ProfileUpdateRequest.php
│   ├── Models/
│   │   └── User.php
│   ├── Providers/
│   │   └── AppServiceProvider.php
│   └── View/
│       ├── AppLayout.php
│       └── GuestLayout.php
├── bootstrap/
│   ├── app.php
│   ├── cache/
│   └── providers.php
├── config/
│   ├── app.php
│   ├── auth.php
│   ├── cache.php
│   ├── database.php
│   ├── filesystems.php
│   ├── logging.php
│   ├── mail.php
│   ├── queue.php
│   ├── services.php
│   └── session.php
├── database/
│   ├── factories/
│   │   └── UserFactory.php
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 0001_01_01_000001_create_cache_table.php
│   │   ├── 0001_01_01_000002_create_jobs_table.php
│   │   ├── 2026_02_05_023807_add_username_and_fields_to_users_table.php
│   │   └── 2026_02_05_181245_create_sessions_table.php
│   ├── seeders/
│   │   ├── DatabaseSeeder.php
│   │   └── UserSeeder.php
│   └── .gitignore
├── public/
│   ├── .htaccess
│   ├── favicon.ico
│   ├── index.php
│   └── robots.txt
├── resources/
│   ├── css/
│   │   └── app.css
│   ├── js/
│   │   ├── app.js
│   │   └── bootstrap.js
│   └── views/
│       ├── auth/
│       │   ├── confirm-password.blade.php
│       │   ├── forgot-password.blade.php
│       │   ├── login.blade.php
│       │   ├── register.blade.php
│       │   ├── reset-password.blade.php
│       │   ├── verify-email.blade.php
│       │   └── welcome.blade.php
│       ├── components/
│       │   ├── application-logo.blade.php
│       │   ├── auth-session-status.blade.php
│       │   ├── danger-button.blade.php
│       │   ├── dropdown-link.blade.php
│       │   ├── dropdown.blade.php
│       │   ├── input-error.blade.php
│       │   ├── input-label.blade.php
│       │   ├── modal.blade.php
│       │   ├── nav-link.blade.php
│       │   ├── primary-button.blade.php
│       │   ├── responsive-nav-link.blade.php
│       │   ├── secondary-button.blade.php
│       │   └── text-input.blade.php
│       ├── dashboard.blade.php
│       ├── layouts/
│       │   ├── app.blade.php
│       │   ├── guest.blade.php
│       │   └── navigation.blade.php
│       ├── profile/
│       │   ├── edit.blade.php
│       │   └── partials/
│       │       ├── delete-user-form.blade.php
│       │       ├── update-password-form.blade.php
│       │       └── update-profile-information-form.blade.php
│       └── welcome.blade.php
├── routes/
│   ├── auth.php
│   ├── console.php
│   └── web.php
├── storage/
│   ├── app/
│   │   ├── private/
│   │   ├── public/
│   │   └── .gitignore
│   ├── framework/
│   │   ├── cache/
│   │   ├── sessions/
│   │   ├── testing/
│   │   ├── views/
│   │   └── .gitignore
│   ├── logs/
│   └── .gitignore
├── tests/
│   ├── Feature/
│   │   ├── Auth/
│   │   │   ├── AuthenticationTest.php
│   │   │   ├── EmailVerificationTest.php
│   │   │   ├── PasswordConfirmationTest.php
│   │   │   ├── PasswordResetTest.php
│   │   │   ├── PasswordUpdateTest.php
│   │   │   └── RegistrationTest.php
│   │   ├── ExampleTest.php
│   │   └── ProfileTest.php
│   ├── Unit/
│   │   └── ExampleTest.php
│   ├── Pest.php
│   └── TestCase.php
├── .env
├── .gitattributes
├── .gitignore
├── artisan
├── composer.json
├── composer.lock
├── package-lock.json
├── package.json
├── phpunit.xml
├── postcss.config.js
├── tailwind.config.js
└── vite.config.js
```

## 🔧 Troubleshooting

**Common Issues:**
- Missing `.env` file: Copy `.env.example` to `.env`
- Missing application key: Run `php artisan key:generate`
- Database connection errors: Check `.env` database configuration
- Assets not loading: Run `npm install` and `npm run dev`
- Migration errors: Ensure database exists and is accessible

**Developed for Educational Purposes**
*This application demonstrates Laravel authentication, migrations, factories, seeders, and MVC architecture.*
