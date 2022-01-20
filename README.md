<h1>Testing Restful's API<h1>
<p>Restful's API dengan menggunakan Framework Laravel</p>

buka command line lalu ikuti langkah di bawah ini
- git clone project pada folder yang disiapkan
    
    <img src="https://user-images.githubusercontent.com/59255271/150265937-656e5918-0793-4478-b810-5c13845b0344.png" />

- install composer dengan dibawah ini
    <img src="https://user-images.githubusercontent.com/59255271/150266533-89659507-d8de-49c0-9f24-8505e88d21a4.png" />

- ketika sudah di clone dan composer di install, buat file .env pada folder project lalu copy isinya dari .env.example dan settings database dengan seperti di bawah ini
    
    <img src="https://user-images.githubusercontent.com/59255271/150266587-f5736c71-3a7d-4fda-896f-fd4634d43273.png" />

- buat database dengan nama yang ada pada file .env lalu ketikkan <b>php artisan migrate</b>
    <img src="https://user-images.githubusercontent.com/59255271/150266741-4f539a5a-7e14-44a2-b5bd-829e495e2fc4.png" />

- untuk menjalankan projek bisa aktifkan dengan php artisan serve
    <img src="https://user-images.githubusercontent.com/59255271/150266790-ee2864ea-11fa-49fd-aad8-493be08fd795.png" />

- setelah berhasil dijalankan buka aplikasi postman pada pc lalu import file collection pada folder yang sudah di clone
- dan jalankan run collection
    
