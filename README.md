# LIMAN-KVM
Liman-kvm eklentisi KVM ile oluşturduğunuz sanallaştırılmış ortamı yönetme imkanı sağlar. Sanallaştırma hakkında daha fazla bilgi edinmek isterseniz linkten yazıma ulaşabilirsiniz. 

[Liman-Kvm Eklentisi Kurulumu](docs/CONTRIBUTING.md)

## Liman-Kvm Eklentisi Kurulumu

### Eklentinin Limana Yüklenmesi

1. Görselde belirtildiği gibi kodu zip dosyası indirilebilir.
![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/5b-zip.png)

2. Sol alt kısımda sistem ayarları butonuna tıkladıktan sonra eklentiyi limana eklemek için eklentiler sekmesinde yeşil artı butonuna basılır.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/1f.png)

3. Açılan pencerede indirilen zip dosyası seçilip yüklenmeli.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/1b.png)

### Sunucuyu Ekleme
1. Tüm Sunucuları Gör sekmesine gelip sunucu ekle butonuna basın.

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

Şimdi eklentiler sekmesinden eklentiyi sunucuya ekleyelim.

### Eklentinin Sunucuya Eklenmesi

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

####  Sanal Makine Oluşturma

Birlikte yeni bir sanal makine oluşturalım.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/5a.png)

Yeni butonuna tıklayıp oluşturmak istediğimiz makine bilgilerini giriyoruz. 

VM İsmi alanına yazdığımız isim oluşturacağımız makinenin ismi, aynı zamanda oluşturulacak sanal hard diskin tutulacağı qcow2 formatındaki dosyanın adı olacak. 

Kvm sunucumuzda makinelerde çalıştırmak istediğiniz işletim sistemi iso dosyalarını daha önceden indirdikten sonra, iso dosyası yoluna bu makine için dilediğimiz iso dosyasının yolunu yazıp oluştur butonuna tıklıyoruz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/4g.png)

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/4a.png)

İstediğiniz makineye sağ tıklayıp menüdeki seçeneklerle makineyi başlatabilir, kapatabilir ve benzeri işlemleri yapabilirsiniz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/4b.png)

Makine ismine tıkladığınızda cpu bilgileri, disk boyutu, hafıza ve port bilgilerine ulaşabilir ve düzenleyebilirsiniz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/4c.png)

#### Varolan Sanal Makineden Kopya Oluşturma 

Master Image Oluştur butonuna tıklayıp, ilgili alanlara kopyalamak istediğiniz draft makinenin ismini ve oluşturulacak makineye vermek istediğiniz ismi giriniz. Master Image'a verdiğiniz isim daha önce belirtildiği gibi hem makine ismi hem de oluşturulacak diskin ismi olacak. 

Draft makinede herhangi bir değişiklik yapılmayacaktır, sadece klonlama işlemi için makine kapatılır. İşlemin bitince tabloda yeni makinenizi görebilirsiniz. 

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/4k.png)

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/4l.png)


### Disk Görüntüleri

Sanal makine oluşturulurken sanal sabit disk sürücüsü oluşturulur, bu disk görüntülerini de qcow2 dosya formatında tutuyoruz. Makine silindiğinde ona ait disk görüntüsü de silinir.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/diskimage.png)


### Iso Dosyaları

Makine için vereceğiniz iso dosyalarını görüntüleyebilirsiniz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/6a.png)


### VDI Atama

Vdi ata butonuna bastıktan sonra;

Kullanıcıya atamak istediğimiz sanal makineyi menüden seçin.

Domaindeki kullanıcınızın adını girin ve kaydedin.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/5b.png)

## Sanal Uygulama Yöneticisi Arayüzünden VDI Erişimi

Adres çubuğuna `KvmSunucusuIP:5000` yazılarak giriş ekranına ulaşılır.
Domaindeki kullanıcı adı ve şifresi ile giriş yaptıktan sonra kullanıcıya atanmış olan vdiları görebilirsiniz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/5c.png)

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/arayuz.png)

Açılmak istenen sanal masaüstüne tıklandığında .vv uzantılı bir dosya indirilir. Bu dosya sanal makinenin grafik konsoluna erişebilmek için gerekli konfigürasyon ayarlarını içerir. Konsolu görüntüleyebilmek için öncelikle virt-viewer kurulumu yapılmalıdır.

> Virt-viewer, sanal bir makinenin grafik konsolunu görüntülemek için minimal bir araçtır. Konsola VNC veya SPICE protokolü kullanılarak erişilir.

 [Link](https://command-not-found.com/remote-viewer) üzerinden sisteminizin dosya tabanına uygun komutu seçerek kurulum yapılabilir.

Virt-viewer kurulumun ardından indirilen .vv dosyası açıldığında konsola ulaşılabilir.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/vv.png)

Kurulum tamamlayın. Ardından makine domaine alınabilir. Böylelikle makineye oluşturulan yerel kullanıların yanı sıra domaindeki kullanıcılar ile de giriş yapılabilir.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/6d.png)










