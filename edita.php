<?php
session_start();

if(!isset($_SESSION['user'])){
    header('Location: http://www.iessineu.net/QR/login.php?id='.$_GET["id"]);
}

include('connect.php');

$id=$_GET["id"];

if(isset($id)){
    $sql="select * from item where id='".$id."'";
    $myquery = $mysqli->query($sql);
    if ($myquery->num_rows > 0) {
        $row = $myquery->fetch_assoc();
        $id=$row["id"];
        $aula=$row["aula"];
        $ip=$row["ip"];
        $so=$row["sistema_operatiu"];
        $comentaris=$row["comentari"];
        $capacitat=$row["capacitat_disc"];
        $tipusmem=$row["tipusdisc"];
        $nserie=$row["nserie"];
        $ram=$row["ram"];
    }
}

$aula2=$_POST["aula"];
if(isset($aula2)){
    $aula=$aula2;
    $id=$_POST["id"];
    $ip=$_POST["ip"];
    $so=$_POST["so"];
    $comentaris=$_POST["comentaris"];
    $capacitat=$_POST["capacitat"];
    $tipusmem=$_POST["tipusmem"];
    $nserie=$_POST["nserie"];
    $ram=$_POST["ram"];
    
    $sql="UPDATE `item` SET `aula` = '$aula2', `ip` = '$ip', `sistema_operatiu` = '$so', `comentari` = '$comentaris', `ram` = '$ram', `tipusdisc` = '$tipusmem', `nserie` = '$nserie', `capacitat_disc` = '$capacitat' WHERE `item`.`id` = '$id';";
    
    $myquery = $mysqli->query($sql);
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Inventari TIC IES Sineu</title>
    <style>
        body{
            background-color:aliceblue;
        }
        #header{
            background-color: cornflowerblue;
        }
        h1{
            font-size: 70px;
            font-family: sans-serif;
            vertical-align: middle;
            margin: auto;
            text-align: center;
            
        }
        table{
            width: 95%;
            margin: auto;
            border: 0px;
            font-size: 50px;
            font-family: sans-serif;
            margin-bottom: 50px;
        }
        th{
            text-align: right;
            padding: 20px;
            width: 40%;
            
        }
        tr:nth-child(even){
            background-color: lightblue;
        }

        td{
            text-align: left;
            padding: 20px;
             width: 60%;
        }
        select, input{
            width: 80%;
            height: 60px;
            font-size: 50px;
        }

    </style>
</head>
<body>
    <center>
        <table id="header">
            <tr>
                <th><img src="logo.png" alt="logo IES Sineu" width="350"></th>
                <td><h1>Coordinació TIC</h1><hr><h1>INVENTARI</h1></td>
            </tr>
        </table>
        
        <form action="edita.php" method="post">
        
        
        <table>
            <tr>
                <th>ID: </th>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <?php echo $id; ?>
                    
                </td>
            </tr>
            
            <tr>
                <th>Aula: </th>
                <td>
                    <input type="text" name="aula" value="<?php echo $aula; ?>">
                </td>
            </tr>
            
            <tr>
                <th>IP: </th>
                <td><input type="text" name="ip" value="<?php echo $ip; ?>"></td>
            </tr>
            <tr>
                <th>SO: </th>
                <td><input type="text" name="so" value="<?php echo $so; ?>"></td>
            </tr>
            <tr>
                <th>N. Sèrie: </th>
                <td><input type="text" name="nserie" value="<?php echo $nserie; ?>"></td>
            </tr>
            <tr>
                <th>RAM: </th>
                <td><input type="text" name="ram" value="<?php echo $ram; ?>"></td>
            </tr>
            <tr>
                <th>Disc Dur: </th>
                <td>
                    <input type="text" name="capacitat" value="<?php echo $capacitat; ?>" placeholder="Capacitat"> 
                    <br>
                    <select name="tipusmem" >
                        <option value="">Tipus:</option>
                        <option value="SSD" 
                                <?php if($tipusmem=="SSD") { echo "selected"; } ?>
                                >SSD</option>
                        <option value="Mecànic" 
                                <?php if($tipusmem=="Mecànic") { echo "selected"; } ?>
                                >Mecànic</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Comentaris: </th>
                <td><input type="text" name="comentaris" value="<?php echo $comentaris; ?>"></td>
            </tr>
            <tr>
                <td style="text-align:center;" colspan="2">
                    <input style="-webkit-appearance: button;" type="submit" value="Envia">
                </td>
            </tr>
            <tr>
                <td style="text-align:center;" colspan="2">
                    <a href="logout.php">Surt</a>
                </td>
            </tr>
        </table>
            </form>
            <?php
                // how to use image from example 001
                echo '<img src="QR.php?url=http://iessineu.net/QR/index.php?id='.$id.'" />';
            ?>
    </center>

</body>
</html>