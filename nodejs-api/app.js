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

    static getColumns() {
        return ["id", "created_at", "updated_at", "user_id", "name"];
    }
}

class User extends Model {
    static get tableName() {
        return "users";
    }

    static getColumns() {
        return ["id", "created_at", "updated_at", "name", "email", "about_me"];
    }
}

class News extends Model {
    static get tableName() {
        return "news";
    }

    static getColumns() {
        return ["id", "created_at", "updated_at", "title", "content"];
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
    try {
        const categories = await performQuery(Category, req.query);
        res.json(categories);
    } catch (error) {
        res.status(500).json({ error });
        console.log(error);
    }
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

app.post("/api/categories", isAdmin, async (req, res) => {
    try {
        const categoryData = {
            ...req.body,
            created_at: new Date(),
            updated_at: new Date(),
        };

        const newCategory = await Category.query().insert(categoryData);
        res.json(newCategory);
    } catch (error) {
        res.status(500).json({ error });
        console.log(error);
    }
});

app.put("/api/categories/:id", isAdmin, async (req, res) => {
    try {
        const { id } = req.params;
        const updatedData = {
            ...req.body,
            updated_at: new Date(),
        };

        const updatedCategory = await Category.query().findById(id).patch(updatedData);
        res.json(updatedCategory);
    } catch (error) {
        res.status(500).json({ error });
        console.log(error);
    }
});

app.delete("/api/categories/:id", isAdmin, async (req, res) => {
    try {
        const { id } = req.params;
        await Category.query().deleteById(id);
        res.json({ message: "Category deleted successfully." });
    } catch (error) {
        res.status(500).json({ error });
        console.log(error);
    }
});

app.post("/api/news", isAdmin, async (req, res) => {
    try {
        const newsData = {
            ...req.body,
            created_at: new Date(),
            updated_at: new Date(),
        };

        const newNews = await News.query().insert(newsData);
        res.json(newNews);
    } catch (error) {
        res.status(500).json({ error });
        console.log(error);
    }
});

app.put("/api/news/:id", isAdmin, async (req, res) => {
    try {
        const { id } = req.params;
        const updatedData = {
            ...req.body,
            updated_at: new Date(),
        };

        const updatedNews = await News.query().findById(id).patch(updatedData);
        res.json(updatedNews);
    } catch (error) {
        res.status(500).json({ error });
        console.log(error);
    }
});

app.delete("/api/news/:id", isAdmin, async (req, res) => {
    try {
        const { id } = req.params;
        await News.query().deleteById(id);
        res.json({ message: "News deleted successfully." });
    } catch (error) {
        res.status(500).json({ error });
        console.log(error);
    }
});

app.get("/api/news", async (req, res) => {
    try {
        const news = await performQuery(News, req.query);
        res.json(news);
    } catch (error) {
        res.status(500).json({ error });
        console.log(error);
    }
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
    try {
        const users = await performQuery(User, req.query);
        res.json(users);
    } catch (error) {
        res.status(500).json({ error });
        console.log(error);
    }
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

app.get("/api/faq_categories", async (req, res) => {
    try {
        const faqCategories = await db("f_a_q_categories");
        res.json(faqCategories);
    } catch (error) {
        res.status(500).json({ error });
        console.log(error);
    }
});

app.get("/api/faq_categories/search", async (req, res) => {
    try {
        const faqCategories = await db("f_a_q_categories").where(req.query);
        res.json(faqCategories);
    } catch (error) {
        res.status(500).json({ error });
        console.log(error);
    }
});

app.get("/api/faq_questions", async (req, res) => {
    try {
        const faqQuestions = await db("f_a_q_questions");
        res.json(faqQuestions);
    } catch (error) {
        res.status(500).json({ error });
        console.log(error);
    }
});

app.get("/api/faq_questions/search", async (req, res) => {
    try {
        const faqQuestions = await db("f_a_q_questions").where(req.query);
        res.json(faqQuestions);
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
    query = applySorting(query, queryParams.sort, model);

    return await query;
}

async function performQuery(model, queryParams) {
    let query = model.query();

    let selectedFields = ["id", "created_at", "updated_at"];

    if (model === User) {
        selectedFields.push("name", "email", "about_me");
    } else if (model === Category) {
        selectedFields.push("user_id", "name");
    } else if (model === News) {
        selectedFields.push("title", "content");
    }

    query = query.select(selectedFields);
    query = applySorting(query, queryParams.sort, model);

    return await query;
}

function applySorting(query, sortField, model) {
    if (sortField) {
        const validColumns = model.getColumns();
        if (validColumns.includes(sortField)) {
            query = query.orderBy(sortField);
        } else {
            console.error(`Invalid sort field: ${sortField}`);
        }
    }
    return query;
}

const PORT = 3000;
app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});
