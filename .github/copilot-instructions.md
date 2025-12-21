Understood. I’ll directly merge the TL;DR and Aj Group instructions into your original `.github/copilot-instructions.md`, keeping all existing details intact, with the TL;DR at the top for immediate context. Here’s the updated file:

---

# AI Coding Agent Instructions — Laravel Monolith + Vite Frontend

> **Quick Start / TL;DR (Aj Group Priorities)**
> Make AI coding agents productive immediately while enforcing Aj Group’s long-term, system-first conventions.

### Big Picture

* Laravel monolith (PHP 8.2+) + Vite frontend.
* Controllers thin → delegate logic to services (`app/Services`).
* Background jobs (`app/Jobs`) are async integration points.
* Admin UI: Filament + Livewire (`app/Filament`, `app/Livewire`).
* OAuth via `laravel/passport` (keys in `storage/oauth-private` and `storage/oauth-public`).

### Developer Flow

* `composer install` → PHP deps
* `npm run dev` → frontend dev (Vite)
* `npm run build` → frontend production
* `composer run dev` → full dev (server + queue + Vite)
* `composer run test` / `php artisan test` → PHPUnit

### Patterns & Conventions

* PSR-4 autoloading: `App\` → `app/`
* Jobs: implement `handle()`, call services, follow existing job templates
* Filament resources: `app/Filament/Resources/*`
* Tests: use in-memory SQLite; never hardcode production DB credentials

### Integration Watch

* `laravel/passport` → OAuth flows
* `filament/filament` + Livewire → admin UI
* `laravel-vite-plugin` + Vite → asset builds

### Safety & Best Practices

* Preserve existing Filament registration patterns
* Respect Passport token handling
* Consider system-level efficiency and AI-first automations
* Optimize flows: batch DB/jobs, minimize redundant queries
* Document new flows and data boundaries

### Aj Group Enhancements

* Think **long-term, scalable, AI-first**
* Apply **Ops Research principles**: optimization, constraints, decision points
* Prefer **service-level abstractions** over inline logic
* Automate where possible: testing, deployments, validations

---

## Big picture

* **Backend:** Laravel app (PHP 8.2+) serving views and APIs.
* **Frontend:** Vite-powered assets under `resources/js` and `resources/css`.
* **Key folders:**

  * `app` → models, services, controllers, jobs
  * `resources` → frontend assets, views
  * `routes` → `web.php` and `api.php`
  * `public` → compiled assets, entrypoints
  * `tests` → PHPUnit test coverage

**AI Focus:** Maintain long-term maintainability and modularity. Prefer reusable services over inline logic in controllers. Follow Aj Group conventions for scalable patterns.

---

## Major Components & Boundaries

| Component               | Location                       | Role                                 | AI Notes                                                                                                               |
| ----------------------- | ------------------------------ | ------------------------------------ | ---------------------------------------------------------------------------------------------------------------------- |
| HTTP / Controllers      | `app/Http/Controllers`         | Handle request, return views or APIs | Keep controllers thin; delegate business logic to services.                                                            |
| Models & Business Logic | `app/Models`, `app/Services`   | Core domain logic                    | Services should be stateless where possible; design with future optimization in mind.                                  |
| Background Jobs         | `app/Jobs`                     | Async processing, integrations       | Jobs must call services; use queue workers (`php artisan queue:work`) for local testing. Follow existing job patterns. |
| Admin UI                | `app/Filament`, `app/Livewire` | Admin pages, resource management     | Preserve Filament resource registration patterns to avoid breaking the admin panel.                                    |

---

## Data Flows to Note

* Jobs are the main async integration points: trigger from controllers/services, update models, optionally dispatch further jobs.
* OAuth via `laravel/passport` with keys stored under `storage/oauth-private` and `storage/oauth-public`. Avoid modifying these without fully understanding Passport flows.
* Feature flags or future multi-tenant support should use service-layer guards, not ad-hoc controller checks.

---

## Developer Workflows & Commands

| Task                     | Command                                   | Notes                                           |
| ------------------------ | ----------------------------------------- | ----------------------------------------------- |
| Install PHP dependencies | `composer install`                        | Ensure PHP 8.2+ environment                     |
| Frontend dev             | `npm run dev`                             | Uses Vite; watch mode                           |
| Frontend build           | `npm run build`                           | Production-ready assets                         |
| Full dev                 | `composer run dev`                        | Runs `composer run dev` — concurrently starts `php artisan serve`, `php artisan queue:listen --tries=1`, `php artisan pail --timeout=0`, and `npm run dev`. |
| Run tests                | `composer run test` or `php artisan test` | Tests use in-memory sqlite by default and run with `QUEUE_CONNECTION=sync` (jobs run synchronously). |
| Docker / Sail            | `./vendor/bin/sail up`                    | Only if developing inside Docker environment    |

**AI Focus:** Automate repetitive tasks and prefer scripts that maintain environment parity (e.g., local dev ≈ CI).

---

## Project-Specific Conventions

* PSR-4 autoloading configured in `composer.json` (`App\` → `app/`).
* Filament resources: `app/Filament/Resources/*`. Match naming and registration patterns.
* Background jobs: implement `handle()` and follow existing job templates.
* Tests: use in-memory sqlite; avoid hardcoding production credentials.

**Aj Group Guidelines:** Always consider system-level constraints, operational efficiency, and potential AI-first automations when modifying or adding patterns.

---

## Integration & External Dependencies

* `laravel/passport` — OAuth flows, token storage
* `filament/filament` + Livewire — admin UI patterns
* `laravel-vite-plugin` + Vite — frontend build pipeline

**AI Focus:** Understand dependency contracts before modifying or introducing new packages. Prefer lightweight, maintainable integrations.

---

## Where to Look for Examples

| Type                   | Example                            |
| ---------------------- | ---------------------------------- |
| Job pattern            | `app/Jobs/FetchSourceJob.php`      |
| Model usage            | `app/Models/Category.php`          |
| Routes                 | `routes/web.php`, `routes/api.php` |
| Composer scripts/hooks | `composer.json`                    |
| Frontend scripts       | `package.json`                     |

## Recent UI updates

- Services page updated: see [resources/views/services/index.blade.php](resources/views/services/index.blade.php) — contains an enhanced hero, snapshot stats, and richer service cards.
- The Blade view includes a local `defaults` array used when the `$services` collection is empty. Defaults contain `title`, `slug`, `icon`, `description`, `features`, and `technologies` keys.
- Prices and explicit timeline/estimate UI were removed from service cards; cards no longer display price or timeline badges.
- The testimonials/clients section was removed from the page.
- The hero uses Tailwind classes and an inline gradient fallback (`style="background-color:...; background-image: linear-gradient(...)"`) to ensure visible background color.
- The view uses FontAwesome classes for icons and `Str::slug()` when generating slugs for fallback routes.
- Routes referenced in the view: `services.show` and `contact.index` — ensure controllers populate `$services` or rely on view defaults.

When changing this page, run the frontend dev server and compile assets to preview styles and icons:

```bash
npm run dev
```

And restart PHP server if needed:

```bash
composer run dev
```

---

## Caveats & Safety Checks

* Tests rely on `phpunit.xml` overrides; do not hardcode production credentials.
* OAuth handling (`storage/oauth-*`) is sensitive; changes must respect Passport setup.
* Preserve Filament registration patterns to avoid breaking admin UI.
* Before introducing new async flows, ensure dependencies and error handling follow existing system patterns.
* Prefer reusable, AI-first service abstractions over inline or one-off code.

---

## AI Operational Notes (Aj Group Enhancements)

* Prioritize **maintainability**, **modularity**, and **scalable workflows**.
* Adopt an **optimization-first mindset**: e.g., reduce unnecessary DB queries, batch jobs efficiently.
* Document **data flows and system boundaries** as you implement.
* Consider **automation opportunities** (testing, deployment, data validation).
* Always link new logic to **Ops Research concepts**: optimization, flows, constraints, decision points.
* Strive for **service-level abstractions** to encapsulate business logic, facilitating future AI-driven enhancements.
* Review existing patterns before introducing new ones; consistency is key for long-term maintainability.
---
