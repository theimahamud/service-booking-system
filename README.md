# Service Booking System API

A simple, API-based service booking system built with Laravel. Customers can register, view services, and make bookings. Admins can manage services and view all bookings. This project demonstrates clean code structure, authentication with Laravel Sanctum, RESTful design, validation, seeding, and API documentation.

## Features

- User authentication with Laravel Sanctum
- Admin role support
- Service creation, listing, updating, and deletion (Admin only)
- Customer registration and login
- Booking services for authenticated users
- Form request validations
- Seeders for Admin and initial services
- API Resource formatting
- API Documentation via Postman

## Project Setup Instructions

1. **Clone the Repository**  
   ```bash
   git clone https://github.com/yourusername/service-booking-system.git
   cd service-booking-system
   ```

2. **Install Dependencies**  
   ```bash
   composer install
   ```

3. **Environment Configuration**  
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Setup**  
   Update your `.env` with your DB credentials and run:
   ```bash
   php artisan migrate --seed
   ```

5. **Run the Server**  
   ```bash
   php artisan serve
   ```

## Models & Relationships

- **User**: `id`, `name`, `email`, `password`, `is_admin`
- **Service**: `id`, `name`, `description`, `price`, `status`
- **Booking**: `id`, `user_id`, `service_id`, `booking_date`, `status`

## Authentication

- Laravel Sanctum for API token authentication
- Admin seeded with credentials (`admin@test.com` / `password`)

## API Endpoints

### Public Routes
| Method | Endpoint       | Description           |
|--------|----------------|-----------------------|
| POST   | /api/register  | Register as customer  |
| POST   | /api/login     | Login as customer/admin   |

### Authenticated - Customer
| Method | Endpoint       | Description                      |
|--------|----------------|----------------------------------|
| GET    | /api/services  | List available services          |
| POST   | /api/bookings  | Book a service                   |
| GET    | /api/bookings  | List logged-in user's bookings   |

### Authenticated - Admin
| Method | Endpoint               | Description                |
|--------|------------------------|----------------------------|
| POST   | /api/services          | Create a new service       |
| PUT    | /api/services/{id}     | Update a service           |
| DELETE | /api/services/{id}     | Delete a service           |
| GET    | /api/admin/bookings    | View all bookings          |

## Validation Rules

- FormRequest used for all post and put methods endpoints
- Bookings cannot be created for past dates

## Database Seeder

- Preloaded services
- Default Admin user

## API Documentation

- Postman Collection included in `postman/` directory

## Bonus Features

- API Resources for response formatting
- Laravel form request validation
- Modular structure with Controllers, Resources, and Requests

## Live Demo

> Hosted Link (Github): https://github.com/theimahamud/service-booking-system

## Sample Admin Credentials

```
Email: admin@test.com
Password: password
```

## Screenshots

> Include screenshots here if available

## Contribution

Contributions are welcome. Fork the repo and submit a pull request.

## License

MIT

---

**Developed with ❤️ using Laravel.**
