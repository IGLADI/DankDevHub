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
  },
  // ... (other categories)
]
```

### Search Categories
**Endpoint:** `/api/categories/search`  
**Method:** `GET`  
**Description:** Search for categories based on specified parameters. Users can use any combination of parameters.

#### Parameters:
- `id` (optional): The ID of the category.
- `user_id` (optional): The ID of the user associated with the category.
- `name` (optional): The name of the category.
- `created_at` (optional): The creation timestamp of the category.
- `updated_at` (optional): The last update timestamp of the category.

#### Response Examples:
```json
[
  {
    "id": 1,
    "created_at": "2024-01-12T15:27:35.000Z",
    "updated_at": "2024-01-12T15:27:35.000Z",
    "user_id": 1,
    "name": "Technology"
  },
  // ... (other matching categories)
]
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
    "content": "Important information.",
  },
  // ... (other news articles)
]
```

### Search News
**Endpoint:** `/api/news/search`  
**Method:** `GET`  
**Description:** Search for news articles based on specified parameters. Users can use any combination of parameters.

#### Parameters:
- `id` (optional): The ID of the news article.
- `title` (optional): The title of the news article.
- `created_at` (optional): The creation timestamp of the news article.
- `updated_at` (optional): The last update timestamp of the news article.

#### Response Examples:
```json
[
  {
    "id": 1,
    "created_at": "2024-01-12T15:26:41.000Z",
    "updated_at": "2024-01-12T15:26:46.000Z",
    "title": "Breaking News",
    "content": "Important information.",
  },
  // ... (other matching news articles)
]
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
    "created_at": "2024-01-12T15:26:26.000Z",
    "updated_at": "2024-01-12T15:26:26.000Z",
    "name": "John Doe",
    "email": "john.doe@example.com",
    "about_me": "A software developer.",
  },
  // ... (other users)
]
```

### Search Users
**Endpoint:** `/api/users/search`  
**Method:** `GET`  
**Description:** Search for users based on specified parameters. Users can use any combination of parameters.

#### Parameters:
- `id` (optional): The ID of the user.
- `name` (optional): The name of the user.
- `created_at` (optional): The creation timestamp of the user.
- `updated_at` (optional): The last update timestamp of the user.

#### Response Examples:
```json
[
  {
    "id": 1,
    "created_at": "2024-01-12T15:26:26.000Z",
    "updated_at": "2024-01-12T15:26:26.000Z",
    "name": "John Doe",
    "email": "john.doe@example.com",
    "about_me": "A software

 developer.",
  },
  // ... (other matching users)
]
```