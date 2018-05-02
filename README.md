# Fuzzy

Fuzzy merupakan suatu pemetaan ruang input ke dalam ruang output yang umumnya diterapkan pada permasalahan yang mengandung unsur ketidakpastian dan ketidaktepatan (Munir, 2011).

## Installation

### Composer
<pre><code>composer require reyzeal/fuzzy</code></pre>

### Fuzzy Object
Project fuzzy ini disusun menggunakan konsep object oriented programming, sehingga penggunaannya harus melakukan pembuatan instance dari `Class Reyzeal/Fuzzy`. Sedangkan untuk penentuan jenis inferensi fuzzy dapat dilakukan dengan menuliskan nama FIS pada parameter kedua. Contoh, `new Fuzzy('Kelulusan','Tsukamoto')`.

<img src="https://github.com/reyzeal/fuzzy/blob/master/img/1.gif">

### Membership
1. Trapesium (trapmf)

2. Segitiga (trimf)

3. Kurva Pertumbuhan (smf)

4. Kurva Penyusutan (zmf)

5. Kurva Pi (pimf)

6. (gbellmf)

7. (gaussmf)

### Input Output
#### Input
Penggunaan input pada Object Fuzzy dilakukan dengan memanggil metode `input()`. Karena setiap input terdiri atas fungsi keanggotaan yang terhimpun dalam suatu kategori, maka gunakan metode `addCategory(string $nama)` untuk menambah suatu kategori dan `addMembership(string $nama,string $mf,Array $parameter)` untuk menambahkan setiap fungsi keanggotaannya.
<img src="https://github.com/reyzeal/fuzzy/blob/master/img/2.gif">

#### Output
Penggunaan output pada Object Fuzzy dilakukan dengan memanggil metode `output()`. Hampir sama seperti input, output terdiri atas fungsi keanggotaan yang terhimpun dalam suatu kategori tertentu. Maka, untuk menambahkan suatu kategori dapat dilakukan dengan `addCategory(string $nama)`. Sedangkan untuk menambahkan setiap fungsi keanggotaannya dapat dilakukan dengan menggunakan fungsi `addMembership(string $nama,string $mf,Array $parameter)`.

<img src="https://github.com/reyzeal/fuzzy/blob/master/img/3.gif">

### Rules
Setiap kaidah yang diperlukan dalam fuzzy dikelola melalui metode `rules()`. Untuk menambahkan suatu kaidah tertentu maka perlu memanggil metode `add(string $rule)` untuk menambahkan kondisi dari kaidah tersebut dan metode `then(string $consequency)`.

<img src="https://github.com/reyzeal/fuzzy/blob/master/img/4.gif">

Untuk menulis rule `IF temperature IS high AND pressure IS high THEN engine IS slow` maka bentuknya menjadi:
<pre><code>$fuzzy->rules()->add('temperature_high AND pressure_high')->then('engine_slow');</code></pre>
### Calculation
Hasil kalkulasi dapat didapatkan dengan memberikan input berupa array asosiatif yang berisi nilai masing-masing kategori input. Seperti misalnya pada bagian input memiliki kategori `temperature` dan `pressure`. Maka nilai yang diberikan berupa `['suhu'=>90,'tekanan'=>0.2]`.

<img src="https://github.com/reyzeal/fuzzy/blob/master/img/5.gif">

## Fuzzification

## Rule Evaluation

## Aggregation

## Fuzzy Inference System

### Mamdani

### Tsukamoto

### Sugeno

## Masalah
Jika sekiranya menemukan masalah, silahkan hubungi [Rizal Ardhi Rahmadani](mailto:rizal.ardhi.rahmadani@gmail.com).

## Lisensi

Fuzzy framework ini open-source dengan lisensi [MIT](https://opensource.org/licenses/MIT)