# How to run ArtistApp

Step 1: Run `git clone https://github.com/AbdullahiHussein10/ArtistApp.git`

Step 2: Move into that specific directory where the project has been cloned.

Step 3: Run cp .env.example .env or copy .env.example .env.

Step 4: Run `php artisan key:generate` to generate the key for your application.

Step 5: Create your database and set it into your .env file together with correct database credentials.

Step 6: Run php artisan migrate to migrate all your tables to your database.

Step 7: Run php artisan serve to serve your application.

Step 8: Go to link localhost:8000 on the Postman App.

Step 9: Test the api end points using the PostMan App.
