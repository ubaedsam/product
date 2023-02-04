1. Install Laravel versi 8 :
script :
composer create-project laravel/laravel:^8.0 product --prefer-dist (untuk menjalankan script ini harus menginstall composer di komputer masing-masing)
fungsi :
berfungsi untuk menginstall bundle program project laravel versi 8 dengan data lengkap sebagai berikut contohnya sudah mendapatkan key pada program

2. create table stocks, products, kategoris di dalam program laravel versi 8 lewat migration :
script :
- php artisan make:migration create_stocks_table (berfungsi untuk membuat tabel stocks di dalam program lewat migration)
Data : id, product_id, stock, timestamps, dan foreign key product_id (yang terhubung ke tabel id products)
- php artisan make:migration create_products_table (berfungsi untuk membuat tabel products di dalam program lewat migration)
Data : id, kategori_id, tahun_keluaran, warna, harga, timestamps, dan foreign key kategori_id (yang terhubung ke tabel id kategoris)
- php artisan make:migration create_kategoris_table (berfungsi untuk membuat tabel product di dalam program lewat migration)
Data : id, nama, deskripsi, timestamps

3. jalankan perintah script php artisan migrate untuk menyimpan data table ke dalam database

4. create factory stocks, products, kategoris di dalam program laravel versi 8 lewat factory :
script :
- php artisan make:factory StockFactory ( berfungsi untuk membuat data sembarang/palsu pada table stocks)
- php artisan make:factory ProductFactory ( berfungsi untuk membuat data sembarang/palsu pada table products)
- php artisan make:factory KategorisFactory ( berfungsi untuk membuat data sembarang/palsu pada table kategoris)

5. Setelah mengisi data pada file factory lakukan seeding terlebih dahulu untuk menyimpan data sembarang/palsu tersebut :
script :
php artisan db:seed
Data seed stock
// Menambah data stock sebanyak 5 data
Stock::factory(5)->create();

// Menambah data product sebanyak 5 data
Product::factory(5)->create();

// Menambah data kategori sebanyak 5 data
Kategoris::factory(5)->create();

6. buatlah model dan controller stocks, products dan kategoris di dalam program :
script :
- php artisan make:controller StockController --model=Stock --resource
- php artisan make:controller ProductController --model=Product --resource
- php artisan make:controller KategorisController --model=Kategoris --resource

7. install library laravel sanctum di dalam program dan konfigurasi datanya
script :
- composer require laravel/sanctum
Konfigurasi :
- Atur Kernel
- Atur Route

8. Buat File Resource stocks, products dan kategoris di dalam program untuk melakukan pengolahan data lewat API (REST API)
- php artisan make:resource StockResource
- php artisan make:resource ProductResource
- php artisan make:resource KategorisResource

9. membuat file auth controller untuk proses sistem login untuk mengakses pengolahan data stocks, products dan kategoris lewat API
- php artisan make:controller AuthController --resource

10. lakukan proses sistem login terlebih dahulu sebelum melakukan pengolahan data lewat API :
Register
- pertama method harus post
- kedua url (http://127.0.0.1:8000/api/register)
- ketiga pada headers yaitu key (Accept) value (application/json)
- keempat masukan data register ke dalam body berbentuk json (untuk menambah user)
- kelima send (untuk mengirim request data lewat api)

Login
- pertama method harus post
- kedua url (http://127.0.0.1:8000/api/login)
- ketiga pada headers yaitu key (Accept) value (application/json)
- keempat masukan data login yaitu email dan password ke dalam body pada form-data
- kelima send (untuk mengirim request data lewat api sekaligus mendapatkan value token key untuk mengelola data setelah login)

Lihat stock product
- pertama method harus get
- kedua url (http://localhost:8000/api/stocks)
- ketiga pada headers yaitu key (Authorization) value (Bearer dan value token key yang di dapatkan setelah melakukan login)
- keempat send (untuk menampilkan semua data stock yang berelasi ke dalam tabel product

Lihat semua produk per kategori
- pertama method harus get
- kedua url (http://localhost:8000/api/products/3)
- ketiga pada headers yaitu key (Authorization) value (Bearer dan value token key yang di dapatkan setelah melakukan login)
- keempat send (untuk menampilkan semua data product berdasarkan kategori_idnya

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
