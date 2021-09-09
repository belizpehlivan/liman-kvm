# LIMAN-KVM
Liman-kvm eklentisi KVM ile oluşturduğunuz sanallaştırılmış ortamı yönetme imkanı sağlar. Sanallaştırma hakkında daha fazla bilgi edinmek isterseniz linkten yazıma ulaşabilirsiniz. 

## Liman-Kvm Eklentisi Kurulumu

### Eklentinin Limana Yüklenmesi

1. Görselde belirtildiği gibi kodu zip dosyası halinde indiriyoruz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/5b-zip.png)

2. Sol alt kısımda sistem ayarları butonuna tıkladıktan sonra eklentiyi eklemek için eklentiler sekmesinde yeşil artı butonuna basıyoruz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/1f.png)

3. Açılan pencerede indirdiğimiz zip dosyasını seçip yüklüyoruz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/1b.png)

### Sunucuyu Ekleme
1. Tüm Sunucuları Gör sekmesine gelip sunucu ekle butonuna basıyoruz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/1g.png)

2. Bağlantı Bilgileri ayarlarında Kvm Kurulu sunucumuzun IP adresini ve portunu yazıyoruz. Portu 22 olarak ayarlıyoruz. Bağlantıyı Kontrol Et butonundan bağlantımızın doğruluğunu kontrol ediyoruz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/1a-sunucu.png)

3. Genel Ayarlar sekmesinde sunucunuza dilediğiniz ismi verebilirsiniz. Bulunduğunuz şehri girip, işetim sistemi olarak GNU/Linux seçeneğini işaretliyoruz. Ayarları onayladıktan sonra Anahtar kısmına geçiyoruz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/1c.png)

4. Anahtar türünü SSH seçiyoruz. Sunucumuzda bulunan kullanıcı adı ve şifeyi girip portu 22 olarak bırakıyoruz. Ayarları onaylayıp Özet kısmında bilgilerimizi kontrol ettikten sonra sunucumuzu ekleyebiliriz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/1server.png)

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/2server.png)

5. Karşımıza çıkan ekranda sunucumuzun bilgilerini görebiliriz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/1e.png)

Şimdi eklentiler sekmesinden eklentiyi sunucuya ekleyebiliriz.

### Eklentiyi Sunucuya Eklenmesi

1. Tüm sunucuları gör butonuna tıklayıp, açılan ekranda kvm sunucumuzu seçiyoruz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/2a.png)

2. Eklentiler sekmesinde artı butonuna tıkladıktan sonra açılan pencerede Liman-Kvm eklentisini seçip ekle butonuna basıyoruz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/2b.png)

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/2c.png)

3. Kvm sunucumuzun eklentileri arasında Liman-Kvm'i görebilirsiniz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/2d.png)

Sol tarafta Sunucular altında kvm sunucumuzu seçip eklentiyi kullanmaya başlayabilirsiniz.

## Liman-Kvm Kullanımı

Eklentiyi kullanmaya başlamadan önce yapılacak ilk adımlardan bir aşağıda gösterildiği gibi eklenti ayarlarına tıklayıp kvm sunucumuzun ip adresini yazıp kaydetmek.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/3a.png)

Ardından konfigürasyon ayarlarını yapmamız gerekiyor.
Oluşturacağımız sanal makineleri domainimizdeki kullanıcılara atama işlemini yapabilmek için domainimizi barındıran ldap kurulu sunucumuzun bilgilerini giriyoruz.
Host IP alanına kvm sunucumuzun ip adresini yazıyoruz.
Kaydet butonuyla konfigürasyon ayarlarını güncelleyip, ldap bağlantısını kontrol et butonu ile kontrol yapıyoruz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/3b.png)

Yan tarafta Kvm sunucunuzun donanım bilgilerini inceleyebilirsiniz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/1d.png)


### Sanal Makineler

Sanal Makineler sekmesinde oluşturduğunuz sanal makineleri görüntüleyebilir, bilgilerini güncelleyebilir ve yönetebilirsiniz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/4f.png)

#### Sanal Makine Oluşturma

Birlikte yeni bir sanal makine oluşturalım.

Yeni butonuna tıklayıp oluşturmak istediğimiz makine bilgilerini giriyoruz. 

VM İsmi alanına yazdığımız isim oluşturacağımız makinenin ismi, aynı zamanda oluşturulacak sanal hard diskin tutulacağı qcow2 formatındaki dosyanın adı olacak. 

Kvm sunucumuzda makinelerde çalıştırmak istediğiniz işletim sistemi iso dosyalarını daha önceden indirdikten sonra, iso dosyası yoluna bu makine için dilediğimiz iso dosyasının yolunu yazıp oluştur butonuna tıklıyoruz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/4g.png)

İstediğiniz makineye sağ tıklayıp menüdeki seçeneklerle makineyi başlatabilir, kapatabilir ve benzeri işlemleri yapabilirsiniz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/4b.png)



![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/4e.png)




![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/4k.png)

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/4l.png)




![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/2e.png)

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/3a.png)




![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/4a.png)



![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/4c.png)

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/4d.png)

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/5a.png)

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/5b.png)

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/5c.png)

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/6a.png)

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/6b.png)
