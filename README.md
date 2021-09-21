# Liman Crontab Eklentisi

## Dosya Sistemi

### Dosya hiyerarşisi:
1. Crontab için gerekli php fonksiyonları app/Controllers/CrontabManagerController.php dosyasındadır.
2. Görsel arayüz views/crontab/main.blade.php içerisindedir.
3. Js fonksiyonları views/crontab/scripts.blade.php içerisindedir.

## Ekran Görüntüleri

### Arayüz
Crontabların listelenmesi için aşağıdaki komut kullanılmaktadır. Komut çıktısı string işlemleri sonrasında listelenmektedir.
> crontab -l

Crontabların hepsinin silinmesi için aşağıdaki komut kullanılmaktadır.
> crontab -r

![Alt Text](https://github.com/tugbaficici/liman-crontab/blob/main/ss/ss1.png?raw=true)
### Arayüz Sağ tık Menü
Seçilen crontabın silinmesi için aşağıdaki komut kullanılmaktadır.
> crontab -l | grep -v '* * * * * pwd'  | crontab -

Seçilen crontabın güncellenmesi için şu anlık ilgili kayıt silinerek yenilen eklenmektedir.

![Alt Text](https://github.com/tugbaficici/liman-crontab/blob/main/ss/ss2.png?raw=true)
### Crontab Ekle Modalı
Crontabların tutulduğu dosyanın üzerine ekleme yapılabilmesi için aşağıdaki komut kullanılmaktadır.
> (crontab -l ; echo "*/5 * * * 1-5 echo hello") | crontab -

![Alt Text](https://github.com/tugbaficici/liman-crontab/blob/main/ss/ss3.png?raw=true)
### Crontab Güncelleme Modalı
![Alt Text](https://github.com/tugbaficici/liman-crontab/blob/main/ss/ss4.png?raw=true)
