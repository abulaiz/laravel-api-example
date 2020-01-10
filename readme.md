# Api Examples

Berikut ini langkah - langkah yang perlu diperhatikan setelah meng clone repository :
- Buat file .env berdasarkan file .env.example
- Lakukan konfigurasi pada file .env berkaitan dengan database name, user, dan password
- Install file vendor dengan "Composer install"
- Generate database menggunakakn "php artisan migrate --seed"

# List API

## Register
* Url = '/api/register'
* Method = POST
* Parameter 
 - name // Nama Lengkap
 - email // Email
 - password // Password
 - password_confirmation // Konfirmasi Password

## Login
* Url = '/api/login'
* Method = POST
* Parameter 
 - email // Email
 - password // Password

## User List
* Url = '/api/users'
* Method = GET

## Data List
* Url = '/api/datas'
* Method = GET

## Reation User and Data List
* Url = '/api/user_data'
* Method = GET