# DankDevHub API Documentation

## Introduction

DankDevHub API is designed to provide access to information related to categories, news, and users. It supports basic CRUD operations and allows searching based on specified parameters.

## Base URL

The base URL for the API is `http://localhost:3000`.

## Categories

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
        "content": "Important information."
    }
    // ... (other matching news articles)
]
```

#### Invoke-RestMethod Example (PowerShell):

```powershell
Invoke-RestMethod -Uri "http://localhost:3000/api/news/search?title=Breaking News" -Method Get
```

### Admin-Only Features

To perform certain actions, such as creating, updating, and deleting news articles, users must be authenticated as administrators. To authenticate as an admin, include the admin password in the headers of the request.

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

#### Update News Article (Admin Only)

**Endpoint:** `/api/news/:id`  
**Method:** `PUT`  
**Description:** Update an existing news article. Only admins can perform this action.

#### Request Example (PowerShell):

```powershell
Invoke-RestMethod -Uri "http://localhost:3000/api/news/1" -Method Put -Headers @{"Content-Type"="application/json"; "password"="secret"} -Body '{"title": "Updated Rules", "content": "Follow the guidelines"}'
```

#### Response Example (PowerShell):

```json
{
    "id": 1,
    "created_at": "2024-01-13T12:00:00.000Z",
    "updated_at": "2024-01-13T12:05:00.000Z",
    "title": "Updated Rules",
    "content": "Follow the guidelines"
}
```

#### Delete News Article (Admin Only)

**Endpoint:** `/api/news/:id`  
**Method:** `DELETE`  
**Description:** Delete an existing news article. Only admins can perform this action.

#### Request Example (PowerShell):

```powershell
Invoke-RestMethod -Uri "http://localhost:3000/api/news/1" -Method Delete -Headers @{"password"="secret"}
```

#### Response Example (PowerShell):

```json
{
    "message": "News deleted successfully."
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
        "about_me": "A

 passionate developer."
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
