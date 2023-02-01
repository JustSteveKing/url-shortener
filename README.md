# URL Shortener

To get started with this application you will need to start by cloning this repo.

Once the repo is cloned, run the following command in your terminal:

```bash
cp .env.example .env
```

This application was set up to use SQlite, so run the following command to create the database:

```bash
touch database/database.sqlite
```

You will need to change the `DB_DATABASE` to the absolute path of the database file we created.

Migrate the database using the following command, running the seeders at the same time.

```bash
php artisan migrate --seed
```

To run the local server you can run:

```bash
php artisan serve
```

This will start a local PHP server for you to use. From here there are the following endpoints:

## API Endpoints

- `GET /api/entries`: Get a list of URL Entries.
- `POST /api/entries`: Create a new Entry.
- `GET /api/entries/{hash}`: Return a single Entry.
- `PUT|PATCH /api/entries/{hash}`: Update an Entry.
- `DELETE /api/entries/{hash}`: Delete an Entry.

## Web Endpoints

- `GET /{hash}`: Visit the URL from an Entry, using the `hash` attribute.

Each time an Entry is visited, it will dispatch a background job to store this View. This part of the application will store the user agent and the entry ID in the `views` table, and increment the `view_count` attribute on the entry model.
