# LIMAN-KVM

Liman-KVM eklentisi,
- Masaüstü sanallaştırma ortamını yönetme imkanı sunar.
- Eklenti ile yeni sanal makine oluşturabilir, makine ayarlarını düzenleyebilir ve yönetebilirsiniz.
- Etki alanınız ile bağlantı kurup, kullanıcılara sanal masaüstü atayabilirsiniz. 

>**KVM(Kernel-based Virtual Machine)**, Linux tabanlı sistemler için geliştirilmiş bir sanallaştırma altyapısıdır. 

>**Sanal Masaüstü Altyapısı (Virtual Desktop Infrastructure)**, Masaüstü ortamları merkezi bir sunucuda barındırılır ve yönetilir. Makinede bulunan verilere ve uygulamalara ağ üzerinden kullanıcılara temin edilir. Böylelikle farklı yerlerde veya farklı zamanlarda masaüstlerine erişim sağlanabilir.

1. KVM Kurulumu
2. Liman-Kvm Eklentisi Kurulumu
   - Eklentinin Limana Yüklenmesi
   - Sunucu Ekleme
   - Eklentinin Sunucuya Eklenmesi
   
3. Liman-Kvm Kullanımı
   - Sanal Makineler 
      Sanal Makine Oluşturma
      Varolan Sanal Makineden Klonlama
   - Disk Görüntüleri 
   - Iso Dosyaları
   - VDI Atama
 
4. Sanal Uygulama Yöneticisi Arayüzünden VDI Erişimi

## 1. KVM Kurulumu
Öncelikle bilgisayarımıza KVM kurulumu yapmalıyız.

KVM kullanabilmemiz için sanallaştırma teknolojisini destekleyen Intel(Vtx) üzerinde Linux çekirdeği çalıştıran bir x86 makinesine veya AMD-V teknolojisine sahip işlemciye ihtiyacımız var.

Bilgisayarımızın sanallaştırmayı destekleyip desteklemediğini bu [link](https://www.cyberciti.biz/faq/linux-xen-vmware-kvm-intel-vt-amd-v-support/) üzerinden yardım alarak öğrenebilirsiniz.

Ben Debian işletim sistemine sahip bir bilgisayar üzerinde kurulum yaptım. Kurulum için [linkteki](https://www.server-world.info/en/note?os=Debian_10&p=kvm&f=1) adımları takip ederek KVM kurulumunu yapabilirsiniz.

Ldap kullanılarak domaindeki kullanıcılara sanal masaüstü(vdi) atama işlemi ve atanan masaüstlerinin arayüzden domain kullanıcılarıyla giriş yapılarak ulaşımı [Rıdvan Tülemen](https://github.com/StarBuckR)'in yazdığı apiler yardımı ile yapılmaktadır. [Linke](https://github.com/StarBuckR/authpy) giderek kodu, kvm kurulu makinenize indirdikten sonra, açıklamalarda bulunan adımları /path/to/authpy içinde root kullanıcısında tamamlamanız gerekmektedir. 

## 2. Liman-Kvm Eklentisi Kurulumu

### 2.1. Eklentinin Limana Yüklenmesi

- Görselde belirtildiği gibi [eklenti](https://github.com/belizpehlivan/liman-kvm) zip dosyası şeklinde indirilmeli.
![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/5b-zip.png)

- Sol alt kısımda sistem ayarları butonuna tıkladıktan sonra eklentiyi limana eklemek için eklentiler sekmesinde yeşil artı butonuna basalım.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/1f.png)

- Açılan pencerede indirilen zip dosyasını seçip yükleyelim.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/1b.png)

### 2.2. Sunucu Ekleme

- Tüm Sunucuları Gör sekmesine gelip 'Sunucu Ekle' butonuna basıyoruz..

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/1g.png)

- Bağlantı Bilgileri ayarlarında IP adresine Kvm Kurulu sunucunun ipsi ve porta 22 yazılmalı. Ldap bağlantısını kontrol etmek için 'Bağlantıyı Kontrol Et' butonunu kullanabiliriz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/1a-sunucu.png) 

- Genel Ayarlar sekmesinde sunucunuza dilediğiniz ismi verebilirsiniz. Bulunduğunuz şehri girip, işetim sistemi olarak GNU/Linux seçeneğini işaretliyoruz. Ayarları onayladıktan sonra Anahtar kısmına geçiyoruz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/1c.png)

- Anahtar türünü SSH seçiyoruz. Sunucumuzda bulunan kullanıcı adı ve şifeyi girip portu 22 olarak bırakıyoruz. Ayarları onaylayıp Özet kısmında bilgilerimizi kontrol ettikten sonra sunucumuzu ekleyebiliriz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/1server.png)

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/2server.png)

- Karşımıza çıkan ekranda sunucumuzun bilgilerini görebiliriz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/1e.png)

Şimdi eklentiler sekmesinden eklentiyi sunucuya ekleyelim.

### 2.3. Eklentinin Sunucuya Eklenmesi

- 'Tüm Sunucuları Gör' butonuna tıklayıp, açılan ekranda kvm sunucumuzu seçiyoruz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/2a.png)

- Eklentiler sekmesinde artı butonuna tıkladıktan sonra açılan pencerede Liman-Kvm eklentisini seçip ekliyoruz.
![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/2b.png)

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/2c.png) 

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/2f.png)

Sol tarafta Sunucular altında kvm sunucumuzu seçip eklentiyi kullanmaya başlayabiliriz.

## 3. Liman-Kvm Kullanımı

Eklentiyi ekledikten sonra yapılacak ilk adımlardan biri, eklenti ayarlarına tıklayıp kvm sunucumuzun ip adresini yazıp kaydetmek.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/3a.png)

Ardından konfigürasyon ayarlarını yapmamız gerekiyor.

Oluşturacağımız sanal makineleri domainimizdeki kullanıcılara atama işlemini yapabilmek için domainimizi barındıran ldap kurulu sunucumuzun bilgilerini giriyoruz.
 
Host IP alanına kvm sunucumuzun ip adresini yazıyoruz.

Kaydet butonuyla konfigürasyon ayarlarını güncelleyip, 'Ldap Bağlantısını Kontrol Et' butonu ile kontrol yapabiliriz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/3b.png)

Yan tarafta Kvm sunucusunun donanım bilgilerini inceleyebilirsiniz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/1d.png)

### 3.1. Sanal Makineler

Sanal Makineler sekmesinde oluşturulan sanal makineleri görüntüleyebilir, bilgilerini güncelleyebilir ve yönetebilirsiniz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/4f.png)

#### Sanal Makine Oluşturma

Birlikte yeni bir sanal makine oluşturalım.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/5a.png)

Yeni butonuna tıklayıp oluşturmak istediğimiz makine bilgilerini giriyoruz. 

VM İsmi alanına yazdığımız isim oluşturacağımız makinenin ismi, aynı zamanda oluşturulacak sanal hard diskin tutulacağı qcow2 formatındaki dosyanın adı olacak. 
 
Kvm sunucumuzda makinelerde çalıştırmak istediğiniz işletim sistemi iso dosyalarını daha önceden indirdikten sonra, bu dosyaları 'Iso Dosyaları' sekmesinde görüntüleyebilirsiniz, iso dosyası yoluna bu makine için dilediğimiz iso dosyasının yolunu yazıp oluştur butonuna tıklıyoruz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/4g.png)

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/4a.png)

İstediğiniz makineye sağ tıklayıp menüdeki seçeneklerle makineyi başlatabilir, kapatabilir ve benzeri işlemleri yapabilirsiniz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/4b.png)
-
Makine ismine tıkladığınızda cpu bilgileri, disk boyutu, hafıza ve port bilgilerine ulaşabilir ve düzenleyebilirsiniz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/4c.png)

#### Varolan Sanal Makineyi Klonlama
Master Image Oluştur butonuna tıklayıp, ilgili alanlara klonlamak istediğiniz draft makinenin ismini ve oluşturulacak makineye vermek istediğiniz ismi giriniz. Master Image'a verdiğiniz isim daha önce belirtildiği gibi hem makine ismi hem de oluşturulacak diskin ismi olacak. 

Draft makinede herhangi bir değişiklik yapılmayacaktır, sadece klonlama işlemi için makine kapatılır. İşlem bitince tabloda yeni makineyi görebiliriz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/4k.png)

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/4l.png)

### 3.2. Disk Görüntüleri

Sanal makine oluşturulurken sanal sabit disk sürücüsü oluşturulur, bu disk görüntülerini de qcow2 dosya formatında tutuyoruz. Makine silindiğinde ona ait disk görüntüsü de silinir.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/diskimage.png)

### 3.3 Iso Dosyaları

Makine için vereceğiniz iso dosyalarını görüntüleyebilirsiniz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/6a.png)


### 3.4. VDI Atama

Vdi ata butonuna bastıktan sonra;

Kullanıcıya atamak istediğimiz sanal makineyi menüden seçiyoruz,

Sanal masaüstünü domaindeki atamak istediğimiz kullanıcının adını girip kaydediyoruz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/5b.png)

## 4. Sanal Uygulama Yöneticisi Arayüzünden VDI Erişimi

Adres çubuğuna `KvmSunucusIP:5000` yazılarak giriş ekranına ulaşılır.
Domaindeki kullanıcı adı ve şifresi ile giriş yaptıktan sonra kullanıcıya atanmış olan sanal masaüstlerini görebilirsiniz.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/5c.png)

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/arayuz.png)

Sanal masaüstlerinden birine tıklamadan önce makineyi liman arayüzünde kvm eklentisine giderek, sanal makineler sekmesinde ilgili makineyi başlatmalıyız.

Aynı zamanda flask uygulaması da çalışır durumda olmalı.
[authpy](https://github.com/StarBuckR/authpy) içindeki açıklamaları takip ediniz.

Açılmak istenen sanal masaüstüne tıklandığında .vv uzantılı bir dosya indirilir. Bu dosya sanal makinenin grafik konsoluna erişebilmek için gerekli konfigürasyon ayarlarını içerir. Konsolu görüntüleyebilmek için öncelikle virt-viewer kurulumu yapılmalıdır.

> Virt-viewer, sanal bir makinenin grafik konsolunu görüntülemek için minimal bir araçtır. Konsola VNC veya SPICE protokolü kullanılarak erişilir.

 [Link](https://command-not-found.com/remote-viewer) üzerinden sisteminizin dosya tabanına uygun komutu seçerek kurulum yapıyoruz.

Virt-viewer kurulumunun ardından, indirilmiş olan .vv dosyası açıldığında konsola ulaşılabilir.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/vv.png)

Bilgisayarın kurulumunu tamamlıyoruz. Ardından makine domaine alınabilir. Böylelikle yerel kullanıcıların yanı sıra domaindeki kullanıcılar ile de makineye giriş yapılabilir.

![](https://github.com/belizpehlivan/liman-kvm/blob/main/images/6d.png)










