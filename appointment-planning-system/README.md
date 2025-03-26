## Telemedicine Appointment API

This is a RESTful API for managing telemedicine appointments, available time slots, and doctor specializations. The application is containerized using Docker and provides endpoints to interact with the system.

### Features:

1. Retrieve available time slots for telemedicine appointments

2. Create, retrieve, and cancel appointments

3. Retrieve doctors and their specializations

### Technologies Used:

1. PHP (Laravel Framework)

2. MySQL (Database)

3. Docker (Containerization)

### Getting Started:

### Prerequisites

Docker installed on your system

### Setup and Run:

Build and start the Docker containers:

```bash
docker-compose up -d --build
```

Open a terminal in the app container

```bash
docker exec -it appointment-planning-system-app bash
```

Run the laravel Server:

```bash
php artisan serve --host=0.0.0.0 --port=8001
```

Run migrations to set up the database:

```bash
php artisan migrate
```

Fill the database Tables:

```bash
php artisan db:seed
```

The API will be available at http://127.0.0.1:8001/api/

### API Endpoints:

#### Time Slots

`GET /api/time-slots/available`

-   Response(JSON)

```json
[
    {
        "id": 1,
        "doctor_id": 1,
        "start_time": "2025-03-26 09:00:00",
        "end_time": "2025-03-26 09:30:00",
        "is_available": 1
    }
]
```

#### Appointments

-   Create an appointment
-   `POST /api/appointments`
-   Body (JSON)

```json
{
    "doctor_id": 1,
    "patient_name": "Robert",
    "patient_email": "robert@gmail.com",
    "date_time": "2025-03-28 10:00:00",
    "status": "pending"
}
```

-   Response success

```json
{
    "patient_name": "Robert",
    "patient_email": "robert@gmail.com",
    "date_time": "2025-03-28 10:00:00",
    "status": "pending",
    "id": 2
}
```

-   Get all appointments
-   `GET /api/appointments`
-   Resoponse success

```json
[
    {
        "id": 1,
        "patient_name": "lea",
        "patient_email": "lea@gmail.com",
        "date_time": "2025-03-26 10:00:00",
        "status": "pending"
    }
]
```

-   Get a specific appointment
-   `GET /api/appointments/{id}`
-   Resoponse success

```json
{
    "id": 2,
    "patient_name": "Robert",
    "patient_email": "robert@gmail.com",
    "date_time": "2025-03-28 10:00:00",
    "status": "pending"
}
```

-   Response error 404 not found

-   Cancel an appointment
-   UPDATE /api/appointments/{id}

-   Response success (JSON)

```json
{
    "id": 2,
    "patient_name": "Robert",
    "patient_email": "robert@gmail.com",
    "date_time": "2025-03-28 10:00:00",
    "status": "canceled"
}
```

-   Response error 404 not found

#### Doctors

-   Get all doctors with their specializations
-   `GET /api/doctors`
-   Response success

```json
[
    {
        "id": 1,
        "name": "Dr. Ali",
        "specialization": {
            "id": 1,
            "name": "Orthopedics"
        }
    },
    {
        "id": 2,
        "name": "Dr. Anna",
        "specialization": {
            "id": 2,
            "name": "Cardiology"
        }
    }
]
```

### Tables:

doctors (id, name, specialization_id)

specializations (id, name)

appointments (id, doctor_id, patient_name, patient_email, date_time, status)

time_slots (id, doctor_id, start_time, end_time, is_available)
