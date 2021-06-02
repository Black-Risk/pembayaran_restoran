<?php

/* @var $this yii\web\View */

$this->title = 'Aplikasi Restaurant';
?>

<style>
    h1.textsize {
       font-size: 35px;
    }

    p.textsize2 {
       font-size: 18px;
    }

    a.button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 15px;
        text-align: center;
    }
</style>

<div class="site-index">
    <div class="jumbotron">
        <img 
            src = "<?php
                    $path = Yii::getAlias('@showimage').'/gambar/icon/icon_electra_512x512.png';
                    echo $path;
                 ?>" 
            alt = "Logo"
            width = "150px"
            height ="150px"
        >
        <h1 class="textsize">Selamat Datang!</h1>
        <br>

        <a href="TA2_1/web/index.php?r=listhidangan%2Findex" class="button">DIRECT KE MENU HIDANGAN</a>

        <br><br>

        <p class="textsize2">Silahkan klik button tersebut untuk mengunduh dan memasang aplikasi tersebut.</p>

        <p class="textsize2">Note : Jika PWA sudah terinstall, maka button install tidak akan muncul</p>

        <pwa-install 
            showopen = true
            manifestpath = "https://localhost/TA2_1/manifest.json"
            descriptionheader = "Deskripsi"
            explainer = "Untuk sementara aplikasi ini hanya dapat diinstal di PC, dukungan untuk Android dan iOS akan segera hadir"
            installbuttontext = "Install">KLIK BUTTON INI UNTUK MULAI INSTALL
        </pwa-install>
        
    </div>
</div>
