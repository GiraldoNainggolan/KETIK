## Instalation

1. Download or clone this project.
    ```git
    https://github.com/GiraldoNainggolan/Peminjaman-Ruang-FT-UTM.git
    ```
2. Navigate to the `KETIK` folder.
    ```sh
    cd KETIK
    ```
3. Install the required components using Composer.
    ```sh
    composer install
    ```
4. Copy the `.env.example` file to `.env`.
    ```sh
    cp .env.example .env
    ```
5. Generate the `APP_KEY`.
    ```sh
    php artisan key:generate
    ```
6. Install Storage.
    ```sh
    php artisan storage:link
    ```
7. Perform the database migration.
    ```sh
    php artisan migrate:fresh --seed
    ```
8. After successful migration, run the application.
    ```sh
    php artisan serve
    ```
9. Open your browser and go to `127.0.0.1:8000` to use the application.
10. Login:
    - email: mahasiswa@gmail.com password: mahasiswa -> User
    - email: admin@gmail.com password: admin -> Admin


Link to Website :

jajanutmcuy.online
