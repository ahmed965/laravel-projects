# Fitness coach

The fitness coach is a Rest Api application that allows us to read, create, update and delete training plans and their exercices.

## Available routes

### GET fetch all training plans and their exercices

{main-url}/api/training-plan

### Example Response

```json
{
    "training-plans": [
        {
            "id": 1,
            "time_per_week": 6,
            "level": "beginner",
            "goal": "muscle build-up",
            "started_at": "2024-02-13",
            "finished_at": "2024-02-13",
            "exercices": [
                {
                    "id": 1,
                    "name": "push-up",
                    "number_of_repetitions": 10,
                    "pivot": {
                        "training_plan_id": 1,
                        "exercice_id": 1
                    }
                }
            ]
        },
        {
            "id": 32,
            "time_per_week": 3,
            "level": "advanced",
            "goal": "muscle build-up",
            "started_at": "2024-02-13",
            "finished_at": "2024-02-13",
            "exercices": [
                {
                    "id": 1,
                    "name": "push-up",
                    "number_of_repetitions": 10,
                    "pivot": {
                        "training_plan_id": 32,
                        "exercice_id": 1
                    }
                }
            ]
        }
    ]
}
```

### GET fetch training plan with its exercices by id

{main-url}/trainng-plan/api/1

### Examples of responses

200

```json
{
    "training plan": {
        "id": 1,
        "time_per_week": 6,
        "level": "beginner",
        "goal": "muscle build-up",
        "started_at": "2024-02-13",
        "finished_at": "2024-02-13",
        "exercices": [
            {
                "id": 1,
                "name": "push-up",
                "number_of_repetitions": 10,
                "pivot": {
                    "training_plan_id": 1,
                    "exercice_id": 1
                }
            },
            {
                "id": 2,
                "name": "squat",
                "number_of_repetitions": 10,
                "pivot": {
                    "training_plan_id": 1,
                    "exercice_id": 2
                }
            }
        ]
    }
}
```

404

```
{
    "message": "training plan with id 5 is not found"
}
```

### POST add training plan with its exercies

{main-url}/api/trainng-plan

### Example Request Body

```json
{
    "time_per_week": 2,
    "level": "beginner",
    "goal": "muscle build-up",
    "started_at": "2024-02-13",
    "finished_at": "2024-02-13",
    "exercices": [1, 2]
}
```

### Example Response

201

```json
{
    "message": "training plan with exercises is successfully created"
}
```

422

```json
{
    "message": "The time per week field must be an integer.",
    "errors": {
        "time_per_week": ["The time per week field must be an integer."]
    }
}
```

### PUT update training plan with its exercice by id

{main-url}/trainng-plan/api/3

### Example Request Body

```json
{
    "time_per_week": 4,
    "level": "beginner",
    "goal": "muscle build-up",
    "started_at": "2024-02-13",
    "finished_at": "2024-02-13",
    "exercices": [1, 2]
}
```

### ### Examples responses

200

```json
{
    "message": "training plan id 1 with exercises is successfully updated"
}
```

404

```
{
    "message": "No query results for model [App\\Models\\TrainingPlan] 40",
    "exception":"Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException..."
}
```

422

```json
{
    "message": "The time per week field must be an integer.",
    "errors": {
        "time_per_week": ["The time per week field must be an integer."]
    }
}
```

### DELETE remove training plan with its exercices by id

{main-url}/trainng-plan/api/3

### Examples Responses

200

```json
{
    "message": "training plan id 3 with exercises is successfully deleted"
}
```

404

```
{
    "message": "No query results for model [App\\Models\\TrainingPlan] 40",
    "exception":"Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException..",
}
```
