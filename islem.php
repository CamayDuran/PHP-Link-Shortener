<?php
ob_start();
session_start();

require 'baglan.php';

if(isset($_POST['kayit'])){
	$username=$_POST['username'];
    $password=$_POST['password'];
    $password_again=@$_POST['password_again'];

    if(!$username){
    	echo "Lütfen kullanıcı adınızı girin";
    }
    elseif (!$password || !$password_again) {
    	echo "Lütfen şifrenizi girin";
    }
    elseif ($password != $password_again){
    	echo "Girdiğiniz şifreler bir biriyle aynı değil";
    }
    else{
        //Veritabanı kayıt işlemleri
        $sorgu=$db->prepare('INSERT INTO users SET user_name = ?, user_password = ?');
        $ekle =$sorgu -> execute([
             $username, $password
        ]);
        if($ekle){
            echo "Kayıt başarıyla gerçekleşti, yönlendiriliyorsunuz";
            header('Refresh:2; index.php');
        }
        else{
            echo "Bir hata oluştu, Tekrar kontrol edin";
        }
    }
}

  if(isset($_POST['giris'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(!$username){
        echo "Kullanıcı adını giriniz";
    }
    elseif(!$password){
        echo "Şifrenizi giriniz";
    }else{
      $kullanici_sor=$db->prepare('SELECT * FROM users WHERE user_name=? || user_password=?');
      $kullanici_sor->execute([
        $username, $password
      ]);
      $say = $kullanici_sor->rowCount();
     if ($say==1) {
         $_SESSION['username']=$username;
         echo "Başarıyla giriş yaptınız, yönlendiriliyorsunuz";
         header('Refresh:2; index.php');
     }
     else{
        echo "Bir hata oluştu tekrar kontrol edin";
     }
    }
  }

  if(isset($_POST['shorten_url'])){
    $long_url=$_POST['long_url'];
   

    if(!$long_url){
        echo "Lütfen kısaltmak istediğiniz linki girin";
    }
    
    else{
        //Veritabanı kayıt işlemleri
        $sorgu=$db->prepare('INSERT INTO urls SET long_url = ?');
        $ekle =$sorgu -> execute([
             $long_url
        ]);
        if($ekle){
            echo "Kayıt başarıyla gerçekleşti, yönlendiriliyorsunuz";
            header('Refresh:2; url.php');
        }
        else{
            echo "Bir hata oluştu, Tekrar kontrol edin";
        }


    }
}
    

   $sayi2 = mt_rand(0,10); 

  $harf = 'abcdefghijklmnoprstyuvyzxw'; //A'dan Z'ye Türk Alfabesi
  $harf_sayisi = mb_strlen($harf); //29
  $secilen_harf_konumu = mt_rand(0, $harf_sayisi - 1); //0 ile 28 arasında rastgele sayı üret
   echo mb_substr($harf, $secilen_harf_konumu, $sayi2); 
 ?>
