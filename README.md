# CARA MENJALANKAN PROJECT

## PERSYARATAN
- PHP (versi 8.2.x atau lebih baru)
- Composer (versi 2.5.7 atau lebih baru) : untuk mengelola dependensi PHP
- Node.js (versi 20.x atau lebih baru) & NPM (versi 10.x atau lebih baru) : untuk mengelola dependensi front-end
- Database (MySQL 5.7.33 atau lebih baru)

## LANGKAH
### 1. Masuk ke folder directory project laravel
### 2. Install Dependensi Backend
```
composer install
```
### 3. Install Dependensi Frontend
```
npm install
```
### 4. Salin File .env dan Sesuaikan (khususnya pada Database)
### 5. Jalankan Generate Application Key
```
php artisan key:generate
```
### 6. Jalankan migrasi Database
```
php artisan migrate
```
### 7. Jalankan seeder Database
```
php artisan db:seed
```
### 8. Compile Assets Frontend
```
npm run dev
```
atau jika mode produksi
```
npm run build
```
### 9.  Menjalankan Server Lokal
```
php artisan serve
```
