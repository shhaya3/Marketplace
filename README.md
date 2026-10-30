# BizMarket

A Laravel web application where local businesses can browse industry-specific website templates, preview each one as a full live website, and send an enquiry. An admin panel lets the site owner manage templates and categories and follow up on leads.

Built as an internship project at Easy2IT Techno Solutions LLP, Nagpur. The project runs locally and has not been deployed to a server.

## Features

**Public site**
- 11 industry template previews: hospital, school, restaurant, hotel, real estate, chartered accountant, lawyer, manufacturer, temple, coaching and e-commerce
- Browse by category, search by keyword, paginated results (12 per page)
- Template detail pages with features and page lists
- Enquiry form with server-side validation
- Responsive layout with a mobile navigation drawer
- SEO: meta tags, Open Graph, sitemap, robots.txt, JSON-LD, and `noindex` on previews

**Admin panel**
- Admin-only access (guests are sent to login, non-admin users receive 403)
- Dashboard with statistics, recent enquiries and charts: enquiry status, the last 14 days, and top templates by views
- Enquiry management in Unread, Read and Resolved queues, with CSV and PDF export
- Create, edit and delete templates and categories
- Content manager for each template's features and pages
- A category cannot be deleted while it still has templates; deleting a template keeps its enquiries

**JSON API**
- Template listing with search, category filter and pagination

## Tech stack

| Area | Technology |
| --- | --- |
| Backend | PHP 8.4, Laravel 13 |
| Database | MySQL or MariaDB (SQLite in memory for tests) |
| Frontend | Blade, hand-written CSS, JavaScript |
| Build | Vite |
| Charts | Chart.js |
| PDF export | barryvdh/laravel-dompdf |
| Tests | PHPUnit 12 |

## Requirements

- PHP 8.4 with the usual Laravel extensions
- Composer
- Node.js and npm
- MySQL or MariaDB

## Setup

```bash
git clone https://github.com/shhaya3/Business-Website-Marketplace.git
cd Business-Website-Marketplace

composer install
npm install

cp .env.example .env
php artisan key:generate
```

Create an empty database, then set `DB_DATABASE`, `DB_USERNAME` and `DB_PASSWORD` in `.env`.

```bash
php artisan migrate --seed
npm run build
php artisan serve
```

Open http://127.0.0.1:8000.

For development with live asset reloading, run `npm run dev` in a second terminal instead of `npm run build`.

### Using the SQL dump instead of migrations

A full export of the schema and sample data is in `database/marketplace_db.sql`. Import it into an empty database from phpMyAdmin or the command line if you prefer not to run the migrations.

### Admin account

The database seeder creates the demo admin account. Replace its credentials before any real deployment.

To make an existing user an admin:

```bash
php artisan tinker
>>> App\Models\User::where('email', 'you@example.com')->update(['role' => 'admin']);
```

Sign in at `/login`; the admin panel is at `/admin`.

### Demo data

To fill the admin dashboard with 30 sample enquiries:

```bash
php artisan db:seed --class=DemoEnquirySeeder
```

To remove the demo data and reset the database:

```bash
php artisan migrate:fresh --seed
```

## Running the tests

```bash
php artisan test --testdox
```

The suite has 54 tests (138 assertions) and uses an in-memory SQLite database, so it does not touch your development data.

| Suite | Tests | Covers |
| --- | --- | --- |
| Pagination, search and status | 17 | page size, filters across pages, API cap, search, access control, enquiry status changes, dashboard chart |
| Category create, edit, delete | 16 | validation, slugs, active flag, delete blocked when templates exist |
| Template create, edit, delete | 17 | validation, status values, slugs, category rules, delete |
| Template deletion keeps enquiries | 2 | enquiries remain after their template is deleted |
| Home page and sample | 2 | home page loads |

## Project structure

```
app/Http/Controllers/          Public controllers
app/Http/Controllers/Admin/    Dashboard, templates, categories, enquiries, template content
app/Http/Middleware/           AdminMiddleware (role check)
app/Models/                    Category, Template, Enquiry, TemplateFeature, TemplatePage, ...
database/migrations/           Schema
database/seeders/              Demo data
database/factories/            Model factories
resources/views/               Blade views (public, admin, template previews)
resources/css/                 Stylesheets
resources/js/                  Scripts, including admin charts
tests/Feature/                 Automated tests
```

## Database

Main tables: `categories`, `templates`, `template_features`, `template_pages`, `template_screenshots`, `enquiries` and `users`. Each template belongs to a category. Enquiries optionally reference a template; if the template is deleted the link is cleared and the enquiry is kept.

## Known limitations

- Forgot-password is a placeholder, and the application sends no emails
- The JSON API exists, but the public pages still reload when searching or filtering
- Template screenshots and images cannot be managed from the admin panel
- Preview images are loaded from a public photo service; production sites need locally hosted images
- No browser tests or accessibility audit
- Not deployed to a staging or production server

## Branches

- `main`: stable
- `develop`: ongoing work

## Author

Sohail Ansari