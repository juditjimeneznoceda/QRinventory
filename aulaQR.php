<!DOCTYPE html>
<html>
    <head>
    
        <style>
            .page{
                width: 780px;
                height: 1099px;
            }
            .qr{
                padding-top: 2px;
                text-align: center;
                font-family: sans-serif;
                font-size: 18x;
                font-weight: bold;
                width: 258px;
                height: 137px;
                float: left;
                
            }
            .break{
                margin-bottom: 15px;
            }
        </style>
    </head>
    <body onload="window.print()">
        
        
    <div class="page">
    <?php
        
        include('connect.php');
        $aula=$_GET['aula'];
        $sql="select id from item where aula='".$aula."'";
        $myquery = $mysqli->query($sql);
        if ($myquery->num_rows > 0) {
            $break=0;
            while($row = $myquery->fetch_assoc()){
                $break++;                
                echo '<div class="qr ';
                if($break==24){$break=0;echo "break";}
                echo '">'.$row['id'].'<br>';
                echo '<img src="QR.php?id='.$row['id'].'" /></div>';
            }
        }

        // how to use image from example 001
        
    ?>
         </div>   
    </body>
</html>