# News Taggable APP
News Taggable APP ile
- Haber Bülteni Ekleme<br>
- Video Galeri Ekleme<br>
- Resim Galeri Ekleme<br>
- İçeriklere Eklenicek Etiketleri Ekleme<br>
<br>  

Key oluşturmak için terminal ekranına
- **php artisan key:generate** <br>
 komutu çalıştırılmalıdır.

 database/migrations klasör altında migration create table dosyaları bulunmaktadır.
 
 Kurulum için terminal ekranına<br>
 - **php artisan migrate** <br>
 komutu çalıştırılmalıdır.

 Tablolara örnek veriler girmek için;
 database/seeders klasör altında seeder dosyaları bulunmaktadır.
 
 Kurulum için terminal ekranına<br>
 - **php artisan db:seed** <br>
 komutu çalıştırılmalıdır.
 
 Authentication ve authorization işlemleri için;
 - **composer install** <br>
  komutu çalıştırılmalıdır.

 
 Kurulumlar bittikten sonra cache temizlenmesi için aşağıdaki komutları çalıştırınız.
 - **php artisan route:cache**
 - **php artisan config:cache**
