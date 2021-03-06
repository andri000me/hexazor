<a id="readme"></a>

<p align="center">
  <img src="docs/_assets/images/logo.svg" alt="Hexazor"/>
</p>

<h1 align="center"> Hexazor</h1>
<p align="center">
	<img src="https://img.shields.io/github/v/release/esyede/hexazor?include_prereleases" alt="Release"/>
	<img src="https://travis-ci.org/esyede/hexazor.svg?branch=master" alt="TravisCI"/>
	<img src="https://github.styleci.io/repos/230306506/shield" alt="StyleCI"/>
	<img src="https://img.shields.io/github/languages/top/esyede/hexazor" alt="Lang"/>
	<img src="http://img.shields.io/:license-mit-blue.svg?style=flat-square" alt="MIT"/>
	<img src="https://img.shields.io/github/languages/code-size/esyede/hexazor" alt="Code"/>
	<img src="https://img.shields.io/github/issues-raw/esyede/hexazor" alt="Issue"/>
	<img src="https://img.shields.io/github/issues-closed/esyede/hexazor" alt="Closed"/>
	<img src="https://img.shields.io/github/issues-pr/esyede/hexazor" alt="Closed"/>
	<img src="https://img.shields.io/github/downloads/esyede/hexazor/total" alt="Downloads"/>
</p>
<p align="center">
	<a href="https://esyede.github.io/hexazor">https://esyede.github.io/hexazor</a>
</p>

<br>
<br>


## Apa itu Hexazor?

> Framework mungil dan sederhana


Hexazor adalah framework yang sederhana dan ekspresif. Pengguna yang baru menggunakan Hexazor akan menikmati kemudahan pengembangan yang sama dengan yang ditemukan dalam kerangka kerja PHP yang paling populer saat ini.

Pengguna yang lebih berpengalaman akan mendapatkan kesempatan untuk memodulasi kode mereka dengan cara yang elegan, memungkinkan organisasi Anda memperbarui dan membentuk aplikasi dari waktu ke waktu sesuai kebutuhan. Ekspresifitasnya memungkinkan Anda dan tim untuk mengembangkan kode yang ringkas dan mudah dibaca.


## Ikhtisar Fitur

- Mendukung autoloading standar PSR-4 dan PSR-0.
- Bisa digunakan dengan ataupun tanpa [Composer](https://getcomposer.org).
- Routing sederhana menggunakan Closure atau Controller.
- CLI tool (`php hexazor make:controller`, `make:model` dll.)
- View dan templating mini mirip Blade.
- Abstraksi database dengan ORM dan Query Builder.
- Schema Builder untuk pembangunan skema database.
- Migrasi database (via CLI tool, `migrate:install`, `migrate:rollback` dll.).
- Fake fixture data untuk seeding database.
- Database seeding (via CLI, `db:seed`, `db:seed --class=FooSeeder`).
- Otentikasi (`Auth::attempt()`, `Auth::login()` dll.).
- Tersedia pustaka yang cukup banyak.
- Ukuran framework relatif kecil (< 400Kb zip).
- Bisa berjalan di shared hosting.
- Dan lain - lain.


### Kebutuhan Sistem

Berikut adalah kebutuhan dasar yang diperlukan untuk dapat menjalankan Hexazor:

- PHP versi 5.4.0 atau yang lebih baru
- Ekstensi Mbstring
- Ekstensi OpenSSL
- Apache Webserver (atau menggunakan PHP dev server, `php hexazor serve`).


## Selayang Pandang

**Routing:**
```php
Route::get('/', 'HomeController@index')->name('home');
```

**View**
```blade
{{-- resources/views/welcome.blade.php --}}

<p>Halo {{ $name }}</p>
```


**Controller:**
```php
namespace App\Http\Controllers;

use App\Http\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $name = 'Budi';

        return view('welcome', compact('name'));
    }
}
```

**Model:**
```php

namespace App;

defined('DS') or exit('No direct script access allowed.');

use System\Database\ORM\Model;

class User extends Model
{
    // ..
}
```

Pemanggilan dari dalam controller:
```php
use App\User;


$user = User::first();

$users = User::whereIn('id', [1, 2, 3])
    ->orWhere('email', '=', $email)
    ->take(10)
    ->get();
```

## Unit Testing

Untuk menjalankan unit testing pustaka - pustaka Hexazor, silahkan isi dulu application keynya via console:
```bash
php hexazor key:generate
```

Lalu silahkan jalankan test casenya:

```bash
phpunit tests/
```

## Dokumentasi

Dokumentasi resmi dari Hexazor bisa dibaca di [Halaman Dokumentasi](https://esyede.github.io/hexazor).


## Informasi Lisensi

Hexazor adalah perangkat lunak bersumber terbuka yang dilisensikan di bawah [Lisensi MIT.](http://www.opensource.org/licenses/mit-license.php)
