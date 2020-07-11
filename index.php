<?php
session_start();
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
    }else{
        $aula=$_GET["aula"];
        $ip=$_GET["ip"];
        $so=$_GET["so"];
        $comentaris=$_GET["comentaris"];
        $capacitat=$_GET["capacitat"];
        $tipusmem=$_GET["tipusmem"];
        $nserie=$_GET["nserie"];
        $ram=$_GET["ram"];
        $sql="INSERT INTO `item` (`id`, `tipus`, `aula`, `ip`, `sistema_operatiu`, `comentari`, `ram`, `tipusdisc`, `nserie`, `capacitat_disc`) VALUES ('$id', 'ordinador', '$aula', '$ip', '$so', '$comentaris', '$ram', '$tipusmem', '$nserie', '$capacitat');";
        $myquery = $mysqli->query($sql);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Inventari Aules informàtica IES Sineu</title>
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
        <table>
            <tr>
                <th>ID: </th>
                <td><?php echo $id; ?></td>
            </tr>
            
            <tr>
                <th>Aula: </th>
                <td><?php echo $aula; ?></td>
            </tr>
            
            <tr>
                <th>IP: </th>
                <td><?php echo $ip; ?></td>
            </tr>
            <tr>
                <th>SO: </th>
                <td><?php echo $so; ?></td>
            </tr>
            <tr>
                <th>N. Sèrie: </th>
                <td><?php echo $nserie; ?></td>
            </tr>
            <tr>
                <th>RAM: </th>
                <td><?php echo $ram; ?></td>
            </tr>
            <tr>
                <th>Disc Dur: </th>
                <td><?php echo $capacitat; ?> <?php echo $tipusmem; ?></td>
            </tr>
            <tr>
                <th>Comentaris: </th>
                <td><?php echo $comentaris; ?></td>
            </tr>
            <tr>
                <td style="text-align:center;" colspan="2"><a href="edita.php?id=<?php echo $id;?>" >Edita</a></td>
            </tr>
        </table>
            <?php
                // how to use image from example 001
                echo '<img src="QR.php?url=http://iessineu.net/QR/index.php?id='.$id.'" />';
            ?>
    </center>

</body>
</html>