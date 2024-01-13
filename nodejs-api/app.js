require("dotenv").config({ path: "../DankDevHub/.env" });
const express = require("express");
const bodyParser = require("body-parser");
const knex = require("knex");
const { Model } = require("objection");

// ! update the .env file with a new password
const SECRET_PASSWORD = process.env.SECRET_PASSWORD;

// ! using the .env from the PHP project, both should be in the same folder
const db = knex({
    client: process.env.DB_CONNECTION,
    connection: {
        host: process.env.DB_HOST,
        user: process.env.DB_USERNAME,
        password: process.env.DB_PASSWORD,
        database: process.env.DB_DATABASE,
    },
});
Model.knex(db);

class Category extends Model {
    static get tableName() {
        return "categories";
    }
}

class Post extends Model {
    static get tableName() {
        return "posts";
    }
}

class User extends Model {
    static get tableName() {
        return "users";
    }
}

class News extends Model {
    static get tableName() {
        return "news";
    }
}

const app = express();

app.use(bodyParser.json());

const isAdmin = (req, res, next) => {
    const { password } = req.headers;

    if (password === SECRET_PASSWORD) {
        next();
    } else {
        res.status(401).json({ error: "Unauthorized. Admin password is required." });
    }
};

app.get("/api/categories", async (req, res) => {
    const categories = await Category.query().select("id", "created_at", "updated_at", "user_id", "name");
    res.json(categories);
});

app.get("/api/categories/search", async (req, res) => {
    try {
        const categories = await performSearch(Category, req.query);
        res.json(categories);
    } catch (error) {
        res.status(500).json({ error });
        console.log(error);
    }
});

app.post("/api/news", isAdmin, async (req, res) => {
    try {
        const newNews = await News.query().insert(req.body);
        res.json(newNews);
    } catch (error) {
        res.status(500).json({ error });
        console.log(error);
    }
});

app.get("/api/news", async (req, res) => {
    const news = await News.query().select("id", "created_at", "updated_at", "title", "content");
    res.json(news);
});

app.get("/api/news/search", async (req, res) => {
    try {
        const news = await performSearch(News, req.query);
        res.json(news);
    } catch (error) {
        res.status(500).json({ error });
        console.log(error);
    }
});

app.get("/api/users", async (req, res) => {
    const users = await User.query().select("id", "created_at", "updated_at", "name", "email", "about_me");
    res.json(users);
});

app.get("/api/users/search", async (req, res) => {
    try {
        const users = await performSearch(User, req.query);
        res.json(users);
    } catch (error) {
        res.status(500).json({ error });
        console.log(error);
    }
});

async function performSearch(model, queryParams) {
    let query = model.query();

    let selectedFields = ["id", "created_at", "updated_at"];

    if (model === User) {
        selectedFields.push("name", "email", "about_me");
    } else if (model === Category) {
        selectedFields.push("user_id", "name");
    } else if (model === News) {
        selectedFields.push("title", "content");
    }

    Object.entries(queryParams).forEach(([key, value]) => {
        query = query.where(key, value);
    });

    query = query.select(selectedFields);

    return await query;
}

const PORT = 3000;
app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});
