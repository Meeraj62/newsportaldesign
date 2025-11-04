# News Portal - Modern Laravel News Platform

A comprehensive, professional news portal built with Laravel 12 and Blade templates, featuring a beautiful modern design inspired by Nepal's leading news websites.

## Features

### Frontend
- **Modern, Responsive Design** - Beautiful UI with Tailwind CSS
- **Homepage** with breaking news, featured articles, and latest news
- **Category Pages** - Browse articles by category
- **Article Pages** - Full article view with related articles
- **Search Functionality** - Search articles by title, excerpt, or content
- **Trending Articles** - Most viewed articles sidebar
- **Mobile-Friendly** - Fully responsive design

### Admin Panel
- **Dashboard** - Overview with statistics and quick actions
- **Article Management** - Full CRUD operations for articles
- **Category Management** - Manage news categories with colors
- **Tag Management** - Organize articles with tags
- **User Roles** - Admin, Editor, and Author roles
- **Image Upload** - Featured images for articles
- **Draft/Published Status** - Control article visibility
- **Featured & Breaking News** - Mark important articles

### Database Structure
- **Users** - With role-based access (admin, editor, author)
- **Categories** - Colored categories with ordering
- **Tags** - Article tagging system
- **Articles** - Full article management with relationships
- **Article-Tag** - Many-to-many relationship

## Installation

### Prerequisites
- PHP 8.4+
- Composer
- MySQL
- Node.js & NPM

### Setup Steps

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd newsportaldesign
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment Configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Setup**
   - Create a MySQL database named `newsportal`
   - Update `.env` file with your database credentials:
     ```
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=newsportal
     DB_USERNAME=your_username
     DB_PASSWORD=your_password
     ```

5. **Run Migrations and Seeders**
   ```bash
   php artisan migrate:fresh --seed
   ```

6. **Create Storage Link**
   ```bash
   php artisan storage:link
   ```

7. **Build Assets**
   ```bash
   npm run build
   ```

8. **Start Development Server**
   ```bash
   php artisan serve
   ```

Visit `http://localhost:8000` to view the application.

## Default Users

After seeding, you can log in with these accounts:

- **Admin**
  - Email: admin@newsportal.com
  - Password: password

- **Author**
  - Email: author@newsportal.com
  - Password: password

- **Editor**
  - Email: editor@newsportal.com
  - Password: password

## Categories

The seeder creates 8 default categories:
- Politics (Red)
- Business (Green)
- Technology (Blue)
- Sports (Orange)
- Entertainment (Pink)
- Health (Purple)
- Education (Indigo)
- World (Teal)

## Usage

### Creating Articles
1. Log in with an admin/editor/author account
2. Navigate to Admin Dashboard
3. Click "Create Article"
4. Fill in the form with title, content, category, tags
5. Upload a featured image (optional)
6. Set as featured or breaking news (optional)
7. Choose status (draft/published)
8. Click Save

### Managing Content
- **Articles**: `/admin/articles` - Manage all articles
- **Categories**: `/admin/categories` - Manage categories
- **Tags**: `/admin/tags` - Manage tags
- **Dashboard**: `/admin/dashboard` - View statistics

### Frontend Routes
- Homepage: `/`
- Article: `/articles/{slug}`
- Category: `/categories/{slug}`
- Search: `/search?q=query`

## Technology Stack

- **Framework**: Laravel 12
- **Authentication**: Laravel Breeze
- **Frontend**: Blade Templates + Tailwind CSS
- **Database**: MySQL
- **Assets**: Vite
- **PHP**: 8.4

## Design Inspiration

The design is inspired by modern Nepal news portals with:
- Clean, professional layout
- Color-coded categories
- Breaking news banners
- Featured article sections
- Trending sidebar
- Responsive grid layouts

## Project Structure

```
newsportaldesign/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/          # Admin controllers
│   │   │   ├── ArticleController.php
│   │   │   ├── CategoryController.php
│   │   │   └── HomeController.php
│   │   └── Middleware/
│   │       └── IsAdmin.php     # Admin access middleware
│   └── Models/
│       ├── Article.php
│       ├── Category.php
│       ├── Tag.php
│       └── User.php
├── database/
│   ├── migrations/             # Database migrations
│   └── seeders/                # Sample data seeders
├── resources/
│   ├── views/
│   │   ├── admin/              # Admin panel views
│   │   ├── articles/           # Article views
│   │   ├── categories/         # Category views
│   │   ├── layouts/            # Layout templates
│   │   └── home.blade.php      # Homepage
│   └── css/                    # Stylesheets
└── routes/
    └── web.php                 # Application routes
```

## License

Open-source software for educational and commercial use.
