<?php
    
    include('phpqrcode/qrlib.php');
    $id=$_GET['id'];
    $url="http://iessineu.net/QR/index.php?id=".$id;
    QRcode::png($url);
?>