# DankDevHub API Documentation

## Introduction

DankDevHub API is designed to provide access to information related to categories, news, and users. It supports basic CRUD operations and allows searching based on specified parameters.

## Base URL

The base URL for the API is `http://localhost:3000`.

## Categories a.k.a. "Threads"

### Get all Categories

**Endpoint:** `/api/categories`  
**Method:** `GET`  
**Description:** Retrieve a list of all categories.

#### Response Examples:

```json
[
    {
        "id": 1,
        "created_at": "2024-01-12T15:27:35.000Z",
        "updated_at": "2024-01-12T15:27:35.000Z",
        "user_id": 1,
        "name": "Technology"
    }
    // ... (other categories)
]
```

#### Invoke-RestMethod Example (PowerShell):

```powershell
Invoke-RestMethod -Uri "http://localhost:3000/api/categories" -Method Get
```

### Search Categories

**Endpoint:** `/api/categories/search`  
**Method:** `GET`  
**Description:** Search for categories based on specified parameters. Users can use any combination of parameters.

#### Parameters:

-   `id` (optional): The ID of the category.
-   `user_id` (optional): The ID of the user associated with the category.
-   `name` (optional): The name of the category.
-   `created_at` (optional): The creation timestamp of the category.
-   `updated_at` (optional): The last update timestamp of the category.

#### Response Examples:

```json
[
    {
        "id": 1,
        "created_at": "2024-01-12T15:27:35.000Z",
        "updated_at": "2024-01-12T15:27:35.000Z",
        "user_id": 1,
        "name": "Technology"
    }
    // ... (other matching categories)
]
```

#### Invoke-RestMethod Example (PowerShell):

```powershell
Invoke-RestMethod -Uri "http://localhost:3000/api/categories/search?name=Technology" -Method Get
```

### Create Category (Admin Only)

**Endpoint:** `/api/categories`  
**Method:** `POST`  
**Description:** Create a new category. Only admins can perform this action.

#### Request Example (PowerShell):

```powershell
Invoke-RestMethod -Uri "http://localhost:3000/api/categories" -Method Post -Headers @{"Content-Type"="application/json"; "password"="secret"} -Body '{"user_id": 1, "name": "New Category"}'
```

#### Response Example (PowerShell):

```json
{
    "id": 2,
    "created_at": "2024-01-13T12:00:00.000Z",
    "updated_at": "2024-01-13T12:00:00.000Z",
    "user_id": 1,
    "name": "New Category"
}
```

### Update Category (Admin Only)

**Endpoint:** `/api/categories/:id`  
**Method:** `PUT`  
**Description:** Update an existing category. Only admins can perform this action.

#### Request Example (PowerShell):

```powershell
Invoke-RestMethod -Uri "http://localhost:3000/api/categories/2" -Method Put -Headers @{"Content-Type"="application/json"; "password"="secret"} -Body '{"name": "Updated Category"}'
```

#### Response Example (PowerShell):

```json
{
    "id": 2,
    "created_at": "2024-01-13T12:00:00.000Z",
    "updated_at": "2024-01-13T12:05:00.000Z",
    "user_id": 1,
    "name": "Updated Category"
}
```

### Delete Category (Admin Only)

**Endpoint:** `/api/categories/:id`  
**Method:** `DELETE`  
**Description:** Delete an existing category. Only admins can perform this action.

#### Request Example (PowerShell):

```powershell
Invoke-RestMethod -Uri "http://localhost:3000/api/categories/2" -Method Delete -Headers @{"password"="secret"}
```

#### Response Example (PowerShell):

```json
{
    "message": "Category deleted successfully."
}
```

## News

### Get all News

**Endpoint:** `/api/news`  
**Method:** `GET`  
**Description:** Retrieve a list of all news articles.

#### Response Examples:

```json
[
    {
        "id": 1,
        "created_at": "2024-01-12T15:26:41.000Z",
        "updated_at": "2024-01-12T15:26:46.000Z",
        "title": "Breaking News",
        "content": "Important information."
    }
    // ... (other news articles)
]
```

#### Invoke-RestMethod Example (PowerShell):

```powershell
Invoke-RestMethod -Uri "http://localhost:3000/api/news" -Method Get
```

### Search News

**Endpoint:** `/api/news/search`  
**Method:** `GET`  
**Description:** Search for news articles based on specified parameters. Users can use any combination of parameters.

#### Parameters:

-   `id` (optional): The ID of the news article.
-   `title` (optional): The title of the news article.
-   `created_at` (optional): The creation timestamp of the news article.
-   `updated_at` (optional): The last update timestamp of the news article.

#### Response Examples:

```json
[
    {
        "id": 1,
        "created_at": "2024-01-12T15:26:41.000Z",
        "updated_at": "2024-01-12T15:26:46.000Z",
        "title": "Breaking News",
        "content

": "Important information."
    }
    // ... (other matching news articles)
]
```

#### Invoke-RestMethod Example (PowerShell):

```powershell
Invoke-RestMethod -Uri "http://localhost:3000/api/news/search?title=Breaking News" -Method Get
```

### Admin-Only Features

To perform certain actions, such as creating news articles, users must be authenticated as administrators. To authenticate as an admin, include the admin password in the headers of the request.

#### Admin Password:

-   Default: "secret"

#### Create News Article (Admin Only)

**Endpoint:** `/api/news`  
**Method:** `POST`  
**Description:** Create a new news article. Only admins can perform this action.

#### Request Example (PowerShell):

```powershell
Invoke-RestMethod -Uri "http://localhost:3000/api/news" -Method Post -Headers @{"Content-Type"="application/json"; "password"="secret"} -Body '{"title": "Rules", "content": "Just be human"}'
```

#### Response Example (PowerShell):

```json
{
    "id": 1,
    "created_at": "2024-01-13T12:00:00.000Z",
    "updated_at": "2024-01-13T12:00:00.000Z",
    "title": "Rules",
    "content": "Just be human"
}
```

## Users

### Get all Users

**Endpoint:** `/api/users`  
**Method:** `GET`  
**Description:** Retrieve a list of all users.

#### Response Examples:

```json
[
    {
        "id": 1,
        "created_at": "2024-01-12T15:27:35.000Z",
        "updated_at": "2024-01-12T15:27:35.000Z",
        "name": "John Doe",
        "email": "john.doe@example.com",
        "about_me": "A passionate developer."
    }
    // ... (other users)
]
```

#### Invoke-RestMethod Example (PowerShell):

```powershell
Invoke-RestMethod -Uri "http://localhost:3000/api/users" -Method Get
```

### Search Users

**Endpoint:** `/api/users/search`  
**Method:** `GET`  
**Description:** Search for users based on specified parameters. Users can use any combination of parameters.

#### Parameters:

-   `id` (optional): The ID of the user.
-   `name` (optional): The name of the user.
-   `email` (optional): The email of the user.
-   `about_me` (optional): Information about the user.
-   `created_at` (optional): The creation timestamp of the user.
-   `updated_at` (optional): The last update timestamp of the user.

#### Response Examples:

```json
[
    {
        "id": 1,
        "created_at": "2024-01-12T15:27:35.000Z",
        "updated_at": "2024-01-12T15:27:35.000Z",
        "name": "John Doe",
        "email": "john.doe@example.com",
        "about_me": "A passionate developer."
    }
    // ... (other matching users)
]
```

#### Invoke-RestMethod Example (PowerShell):

```powershell
Invoke-RestMethod -Uri "http://localhost:3000/api/users/search?name=John Doe" -Method Get
```

### Sorting Users

**Endpoint:** `/api/users`  
**Method:** `GET`  
**Description:** Retrieve a list of all users with optional sorting based on specified parameters.

#### Parameters:

-   `sort` (optional): The field to use for sorting (e.g., "user_id", "email", "created_at").

#### Response Examples:

```json
[
    {
        "id": 1,
        "created_at": "2024-01-12T15:27:35.000Z",
        "updated_at": "2024-01-12T15:27:35.000Z",
        "name": "John Doe",
        "email": "john.doe@example.com",
        "about_me": "A passionate developer."
    }
    // ... (other users)
]
```

#### Invoke-RestMethod Example (PowerShell):

```powershell
Invoke-RestMethod -Uri "http://localhost:3000/api/users?sort=user_id" -Method Get
```

## FAQ Categories

### Get all FAQ Categories

**Endpoint:** `/api/faq_categories`  
**Method:** `GET`  
**Description:** Retrieve a list of all FAQ categories.

#### Response Examples:

```json
[
    {
        "id": 1,
        "name": "General",
        "updated_at": "2024-01-14T00:19:25.000Z",
        "created_at": "2024-01-14T00:19:25.000Z"
    }
    // ... (other FAQ categories)
]
```

#### Invoke-RestMethod Example (PowerShell):

```powershell
Invoke-RestMethod -Uri "http://localhost:3000/api/faq_categories" -Method Get
```

### Search FAQ Categories

**Endpoint:** `/api/faq_categories/search`  
**Method:** `GET`  
**Description:** Search for FAQ categories based on specified parameters. Users can use any combination of parameters.

#### Parameters:

-   `id` (optional): The ID of the FAQ category.
-   `name` (optional): The name of the FAQ category.
-   `created_at` (optional): The creation timestamp of the FAQ category.
-   `updated_at` (optional): The last update timestamp of the FAQ category.

#### Response Examples:

```json
[
    {
        "id": 1,
        "name": "General",
        "updated_at": "2024-01-14T00:19:25.000Z",
        "created_at": "2024-01-14T00:19:25.000Z"
    }
    // ... (other matching FAQ categories)
]
```

#### Invoke-RestMethod Example (PowerShell):

```powershell
Invoke-RestMethod -Uri "http://localhost:3000/api/faq_categories/search?name=General" -Method Get
```

## FAQ Questions

### Get all FAQ Questions

**Endpoint:** `/api/faq_questions`  
**Method:** `GET`  
**Description:** Retrieve a list of all FAQ questions.

#### Response Examples:

```json
[
    {
        "id": 1,
        "question": "How do I delete my account?",
        "f_a_q_category_id": 2,
        "created_at": "2024-01-14T00:19:25.000Z",
        "updated_at": "2024-01-14T00:19:25.000Z",
        "is_faq": 1,
        "answer": "There is a big red button in the nav bar that says \"Delete Account\", click it and then confirm your choice."
    }
    // ... (other FAQ questions)
]
```

#### Invoke-RestMethod Example (PowerShell):

```powershell
Invoke-RestMethod -Uri "http://

localhost:3000/api/faq_questions" -Method Get
```

### Search FAQ Questions

**Endpoint:** `/api/faq_questions/search`  
**Method:** `GET`  
**Description:** Search for FAQ questions based on specified parameters. Users can use any combination of parameters.

#### Parameters:

-   `id` (optional): The ID of the FAQ question.
-   `question` (optional): The question text of the FAQ question.
-   `f_a_q_category_id` (optional): The ID of the FAQ category associated with the question.
-   `created_at` (optional): The creation timestamp of the FAQ question.
-   `updated_at` (optional): The last update timestamp of the FAQ question.
-   `is_faq` (optional): Indicates whether the question is an FAQ (1 for true, 0 for false).

#### Response Examples:

```json
[
    {
        "id": 1,
        "question": "How do I delete my account?",
        "f_a_q_category_id": 2,
        "created_at": "2024-01-14T00:19:25.000Z",
        "updated_at": "2024-01-14T00:19:25.000Z",
        "is_faq": 1,
        "answer": "There is a big red button in the nav bar that says \"Delete Account\", click it and then confirm your choice."
    }
    // ... (other matching FAQ questions)
]
```

#### Invoke-RestMethod Example (PowerShell):

```powershell
Invoke-RestMethod -Uri "http://localhost:3000/api/faq_questions/search?question=delete" -Method Get
```
