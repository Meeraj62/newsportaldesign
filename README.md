# News Portal - Modern Nepal News Platform 🇳🇵

A comprehensive, professional news portal built with Laravel 12 and Blade templates, featuring a beautiful modern design with **Nepal-inspired color scheme** (Deep Red #B71C1C). Includes bilingual support (English/Nepali), dark mode, and all essential news portal features.

## ✨ Must-Have Features (Implemented)

### Frontend Features
- ✅ **Fast & Responsive UI** - Optimized with Tailwind CSS and dark mode support
- ✅ **Breaking News Ticker** - Animated ticker for breaking stories
- ✅ **Advanced Search** - Full-text search with category filters
- ✅ **Multilingual Support** - Nepali (नेपाली) and English interface
- ✅ **SEO Optimized** - Meta tags, Open Graph, Twitter cards, canonical URLs
- ✅ **Dark Mode** - Toggle between light and dark themes
- ✅ **Category Filters** - Browse news by specific categories
- ✅ **Trending Sidebar** - Most viewed articles

### Content Management
- ✅ **Full CMS** - Manage articles, categories, tags, and authors
- ✅ **Comment System** - User comments with moderation (pending/approved/rejected)
- ✅ **Bookmark Feature** - Save articles for later reading
- ✅ **Newsletter Subscription** - Email collection for newsletters
- ✅ **Media Management** - Image upload and storage
- ✅ **Analytics Dashboard** - View statistics and popular articles

### Security & Auth
- ✅ **Secure Login** - Laravel Breeze authentication
- ✅ **Role-Based Access** - Admin, Editor, and Author roles
- ✅ **Comment Moderation** - Approve/reject user comments
- ✅ **Protected Routes** - Middleware for admin access

## 🎨 Color Scheme - Nepal Media Tone

**Primary**: Deep Red (#B71C1C) - Energy and urgency
**Accent**: Light Gray (#E0E0E0) - Clean and professional
**Background**: White (#FFFFFF) - Maximum readability

Matches leading Nepali news brands like OnlineKhabar and Setopati.

## 🚀 Nice-to-Have Features (Implemented)

- ✅ **Dark Mode** - Smooth light/dark theme switching
- ✅ **Bookmark & Read Later** - Save favorite articles
- ✅ **Newsletter System** - Email subscription management
- ✅ **Multilingual UI** - Nepali and English labels throughout

## 📦 Database Structure

- **Users** - Role-based access (admin, editor, author), bio, avatar
- **Categories** - 8 pre-seeded with custom colors
- **Tags** - 20 pre-seeded popular tags
- **Articles** - Full content management with relationships
- **Comments** - User comments with moderation system
- **Bookmarks** - Save articles for later
- **Newsletters** - Email subscriptions

## 🛠️ Installation

### Prerequisites
- PHP 8.4+
- Composer
- MySQL
- Node.js & NPM

### Quick Setup

```bash
git clone <repository-url>
cd newsportaldesign
composer install
npm install
cp .env.example .env
php artisan key:generate
```

### Database Configuration

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=newsportal
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### Run Migrations & Seed Data

```bash
php artisan migrate:fresh --seed
php artisan storage:link
npm run build
php artisan serve
```

Visit `http://localhost:8000`

## 👥 Default User Accounts

| Role | Email | Password |
|------|-------|----------|
| Admin | admin@newsportal.com | password |
| Author | author@newsportal.com | password |
| Editor | editor@newsportal.com | password |

## 📁 Project Structure

```
newsportaldesign/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/              # Admin controllers
│   │   │   ├── ArticleController   # Article display
│   │   │   ├── BookmarkController  # Bookmark management
│   │   │   ├── CommentController   # Comment moderation
│   │   │   └── NewsletterController # Newsletter subscriptions
│   │   └── Middleware/
│   │       └── IsAdmin.php         # Admin access control
│   └── Models/
│       ├── Article.php             # Article model with scopes
│       ├── Category.php            # Category with colors
│       ├── Tag.php                 # Tag system
│       ├── Comment.php             # Comment moderation
│       ├── Bookmark.php            # User bookmarks
│       └── Newsletter.php          # Email subscriptions
├── database/
│   ├── migrations/                 # All database tables
│   └── seeders/                    # Sample data generators
├── resources/
│   ├── views/
│   │   ├── admin/                  # Admin panel views
│   │   ├── articles/               # Article views
│   │   ├── categories/             # Category views
│   │   ├── layouts/                # App and guest layouts
│   │   └── home.blade.php          # Homepage with ticker
│   └── css/
│       └── app.css                 # Tailwind configuration
└── tailwind.config.js              # Nepal-inspired colors
```

## 🎯 Key Features Explained

### Breaking News Ticker
Auto-scrolling ticker at the top of homepage displaying latest breaking news.

### Dark Mode
Click the toggle button in sidebar to switch themes. Preference saved in localStorage.

### Comment System
- Users can comment on articles
- All comments require moderation
- Admin can approve/reject/delete comments
- Anonymous comments supported (with name/email)

### Bookmark Feature
- Authenticated users can bookmark articles
- Click bookmark icon on any article
- View all bookmarked articles at `/bookmarks`

### Newsletter
- Users subscribe via homepage form
- Email validation and duplicate prevention
- Admin can export subscriber list

### SEO Optimization
- Automatic meta tags generation
- Open Graph for social media
- Twitter Cards support
- Canonical URLs
- Schema.org ready

### Multilingual Support
- Interface labels in Nepali and English
- Easy to extend for more languages
- Category names and navigation bilingual

## 🌐 Routes

### Public Routes
- `/` - Homepage with breaking news ticker
- `/articles/{slug}` - Article detail page
- `/categories/{slug}` - Category page
- `/search?q=query` - Search results
- `/bookmarks` - User bookmarks (auth required)

### Admin Routes (Auth + Role Required)
- `/admin/dashboard` - Analytics dashboard
- `/admin/articles` - Article management
- `/admin/categories` - Category management
- `/admin/tags` - Tag management

### API Routes
- `POST /newsletter/subscribe` - Newsletter subscription
- `POST /articles/{article}/comments` - Submit comment
- `POST /bookmarks/toggle/{article}` - Toggle bookmark

## 🎨 Design Philosophy

Inspired by leading Nepali news portals with:
- Clean, professional layout
- Deep red primary color (#B71C1C) for energy
- Color-coded categories for easy navigation
- Breaking news prominence
- Trending articles sidebar
- Mobile-first responsive design
- Dark mode for better readability

## 🔧 Technology Stack

- **Framework**: Laravel 12
- **Authentication**: Laravel Breeze
- **Frontend**: Blade Templates + Tailwind CSS (with Nepal colors)
- **Database**: MySQL
- **Assets**: Vite
- **PHP**: 8.4
- **Dark Mode**: CSS variables with localStorage

## 📊 Admin Features

- **Dashboard**: Statistics on articles, views, and content
- **Article Management**: CRUD with image upload
- **Category Management**: Custom colors and ordering
- **Tag Management**: Organize content
- **Comment Moderation**: Approve/reject user comments
- **User Management**: Manage authors and editors
- **Analytics**: View counts and trending articles

## 🚀 Performance Features

- Eager loading relationships (N+1 prevention)
- Database indexing on foreign keys
- Image optimization recommendations
- Asset bundling with Vite
- Dark mode without page reload

## 📝 License

Open-source software for educational and commercial use.

---

**Made with ❤️ in Nepal** 🇳🇵
