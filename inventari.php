<?php
session_start();
include('connect.php');

if(!isset($_SESSION['user'])){
    header('Location: http://www.iessineu.net/QR/login.php');
}

if(isset($_POST["aula"])){
    $aula=$_POST["aula"];
    
    $id=$_POST["id"];
    $planta = substr($aula,1,1);
    if($id<10){
        $id=$planta."-".$aula."-0".$id;
    }else{
        $id=$planta."-".$aula."-".$id;
    }
    
    echo $id;
    
    $ip=$_POST["ip"];
    $so=$_POST["so"];
    $comentaris=$_POST["comentaris"];
    $capacitat=$_POST["capacitat"];
    $tipusmem=$_POST["tipusmem"];
    $nserie=$_POST["nserie"];
    $ram=$_POST["ram"];
    
    $sql="INSERT INTO `item` (`id`, `tipus`, `aula`, `ip`, `sistema_operatiu`, `comentari`, `ram`, `tipusdisc`, `nserie`, `capacitat_disc`) VALUES ('$id', 'ordinador', '$aula', '$ip', '$so', '$comentaris', '$ram', '$tipusmem', '$nserie', '$capacitat');";
    echo $sql;
    
    $myquery = $mysqli->query($sql);
}


?>

<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inventari</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/sweetalert2.css">
	<link rel="stylesheet" href="css/material.min.css">
	<link rel="stylesheet" href="css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="css/main.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="js/material.min.js" ></script>
	<script src="js/sweetalert2.min.js" ></script>
	<script src="js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="js/main.js" ></script>
</head>
<body>
	
	<!-- navBar -->
	<div class="full-width navBar">
		<div class="full-width navBar-options">
			<i class="zmdi zmdi-more-vert btn-menu" id="btn-menu"></i>	
			<div class="mdl-tooltip" for="btn-menu">Menú</div>
			<nav class="navBar-options-list">
				<ul class="list-unstyle">

					<li class="btn-exit" id="btn-exit">
						<i class="zmdi zmdi-power"></i>
						<div class="mdl-tooltip" for="btn-exit">LogOut</div>
					</li>
					<li class="text-condensedLight noLink" ><small>IES Sineu</small></li>
					<li class="noLink">
						<figure>
							<img src="logo.png" alt="Logo" class="img-responsive">
						</figure>
					</li>
				</ul>
			</nav>
		</div>
	</div>
	<!-- navLateral -->
	<section class="full-width navLateral">
		<div class="full-width navLateral-bg btn-menu"></div>
		<div class="full-width navLateral-body">
			<div class="full-width navLateral-body-logo text-center tittles">
				<i class="zmdi zmdi-close btn-menu"></i> Inventari 
			</div>
			<figure class="full-width" style="height: 77px;">
				<div class="navLateral-body-cl">
					<img src="logo.png" alt="Logo" class="img-responsive">
				</div>
				<figcaption class="navLateral-body-cr hide-on-tablet">
					<span>
						Coordinació TIC<br>
						<small>Admin</small>
					</span>
				</figcaption>
			</figure>
			<div class="full-width tittles navLateral-body-tittle-menu">
				<i class="zmdi zmdi-desktop-mac"></i><span class="hide-on-tablet">&nbsp; DASHBOARD</span>
			</div>
			<nav class="full-width">
				<ul class="full-width list-unstyle menu-principal">
					<li class="full-width">
						<a href="admin.php" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-view-dashboard"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								HOME
							</div>
						</a>
					</li>
					
					
					
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="inventari.php" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-store"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								Inventari
							</div>
						</a>
					</li>
					
				</ul>
			</nav>
		</div>
	</section>
	<!-- pageContent -->
	<section class="full-width pageContent">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-washing-machine"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					Formulari per inventariar l'equipament TIC del IES Sineu
				</p>
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabNewProduct" class="mdl-tabs__tab is-active">Nou</a>
				<a href="#tabListProducts" class="mdl-tabs__tab">Llista</a>
                <a href="#tabListAules" class="mdl-tabs__tab">Aules</a>
			</div>
			<div class="mdl-tabs__panel is-active" id="tabNewProduct">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Nou producte
							</div>
							<div class="full-width panel-content">
								<form method="post" action="inventari.php">
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Informació bàsica</h5>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" id="identificacio" name="id">
												<label class="mdl-textfield__label" for="identificacio">Identificació</label>
											</div>
                                            
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" id="aula" name="aula" >
												<label class="mdl-textfield__label" for="aula">Aula</label>
												
											</div>
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" id="nserie" name="nserie" >
												<label class="mdl-textfield__label" for="nserie">N. Sèrie</label>
												
											</div>
											
											<div class="mdl-textfield mdl-js-textfield">
												<select class="mdl-textfield__input">
													<option value="" disabled="" selected="">Categoria</option>
													<option value="Ordinador de Sobretaula">Ordinador de Sobretaula</option>
													<option value="Portàtil professorat">Portàtil professorat</option>
                                                    <option value="Ultraportàtil">Ultraportàtil</option>
                                                    <option value="Ultraportàtil">Portàtil tecno</option>
												</select>
											</div>
											
										</div>
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Detall</h5>
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text"  id="ip" name="ip" >
												<label class="mdl-textfield__label" for="modelProduct">IP</label>
											</div>
				
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text"  id="ram" name="ram" >
												<label class="mdl-textfield__label" for="modelProduct">RAM</label>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" id="capacitat" name="capacitat">
												<label class="mdl-textfield__label" for="capacitat">Capacitat del disc</label>
											</div>
											
											<div class="mdl-textfield mdl-js-textfield">
												<select name="tipusmem" class="mdl-textfield__input">
													<option value="" disabled="" selected="">Tipus Disc Dur</option>
													<option value="SSD">SSD</option>
													<option value="Mecànic">Mecànic</option>
												</select>
											</div>
											
										</div>
									</div>
									<p class="text-center">
										<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addProduct" onclick="submit();">
											<i class="zmdi zmdi-plus"></i>
										</button>
										<div class="mdl-tooltip" for="btn-addProduct">Afegir</div>
									</p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
        
        <?php
        
        $sql="SELECT * FROM item order by aula;";
        $myquery = $mysqli->query($sql);
        
        
        ?>
			<div class="mdl-tabs__panel" id="tabListProducts">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<form action="#">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
								<label class="mdl-button mdl-js-button mdl-button--icon" for="searchProduct">
									<i class="zmdi zmdi-search"></i>
								</label>
								<div class="mdl-textfield__expandable-holder">
									<input class="mdl-textfield__input" type="text" id="searchProduct">
									<label class="mdl-textfield__label"></label>
								</div>
							</div>
						</form>
                        
                        <div class="full-width divider-menu-h"></div>
                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
                                    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
                                        <thead>
                                            
                                            <tr>
                                                <th style="text-align:center;">ID</th>
                                                <th style="text-align:center;">Tipus</th>
                                                <th style="text-align:center;">N. Sèrie</th>
                                                <th style="text-align:center;">IP</th>
                                                <th style="text-align:center;">RAM</th>
                                                <th style="text-align:center;">Capacitat Disc</th>
                                                <th style="text-align:center;">Tipus Disc</th>
                                                <th style="text-align:center;">Detall</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        <?php
                                        if ($myquery->num_rows > 0) {
                                            while($row = $myquery->fetch_assoc()){
                                                echo "<tr>";
                                                echo "<td style='text-align:center;'>".$row['id']."</td>";
                                                echo "<td style='text-align:center;'>".$row['tipus']."</td>";
                                                echo "<td style='text-align:center;'>".$row['nserie']."</td>";
                                                echo "<td style='text-align:center;'>".$row['ip']."</td>";
                                                echo "<td style='text-align:center;'>".$row['ram'];
                                                if($row['ram']!="") echo " GB";
                                                echo "</td>";
                                                echo "<td style='text-align:center;'>".$row['capacitat_disc']." GB</td>";
                                                echo "<td style='text-align:center;'>".$row['tipusdisc']."</td>";
                                                echo "<td><button onclick='location.href=\"edita.php?id=".$row['id']."\"' type='button'  class='mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect'><i class='zmdi zmdi-more'></i></button></td>";
                                                echo "</tr>";
                                            }
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

						
						
					</div>
				</div>
			</div>
        
        
        
        <?php
        
        $sql="SELECT DISTINCT aula FROM item order by aula;";
        $myquery = $mysqli->query($sql);
        
        
        ?>
			<div class="mdl-tabs__panel" id="tabListAules">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<form action="#">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
								<label class="mdl-button mdl-js-button mdl-button--icon" for="searchProduct">
									<i class="zmdi zmdi-search"></i>
								</label>
								<div class="mdl-textfield__expandable-holder">
									<input class="mdl-textfield__input" type="text" id="searchProduct">
									<label class="mdl-textfield__label"></label>
								</div>
							</div>
						</form>
                        
                        <div class="full-width divider-menu-h"></div>
                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
                                    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
                                        <thead>
                                            
                                            <tr>
                                                <th style="text-align:center;">AULA</th>
                                                <th style="text-align:center;">Genera QR</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        <?php
                                        if ($myquery->num_rows > 0) {
                                            while($row = $myquery->fetch_assoc()){
                                                echo "<tr>";
                                                echo "<td style='text-align:center;'>".$row['aula']."</td>";
                                                echo "<td style='text-align:center;'><a href='aulaQR.php?aula=".$row['aula']."'><img width='50' src='QR.png'></a></td>";
                                            }
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

						
						
					</div>
				</div>
			</div>
        
        
        
		</div>
	</section>
</body>
</html>