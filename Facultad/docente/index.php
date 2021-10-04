<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>umsa</title>

        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/stylenotas.css">
</head>

<?php
if(isset($_POST['username'])){
$_SESSION['user_id'] = $_POST['username'];
echo "Bienvenido! Has iniciado sesion como:<b> ".$_POST['username']."</b>";
}else{
if(isset($_SESSION['username'])){
echo "Has iniciado Sesion como: ".$_SESSION['username'];
}else{
	// Si la sesion expiro o no se creo  mostraremos el siguiente mensaje
echo "Acceso Restringido";
}
}
?>

<body>
	
	<?php include 'cabecera.inc.php'; ?>
	

	<section id="main-content">
	
		<article>
			<header>
				<h1>Media de calificaciones</h1>
			</header>
			
			<div class="content">
				<?php
			include "../conexion.inc.php";
			
			$query = $connection->prepare("SELECT  p.departamento, AVG(n.nota1) as nota1, AVG(n.nota2) as nota2, AVG(n.nota3)as nota3, AVG((n.nota1+n.nota2+n.nota3)/3) as promedio FROM persona p, nota n WHERE n.ci= p.ci Group by p.departamento"); 
		    
		    $query->bindParam("username", $_POST['username'], PDO::PARAM_STR);

		    $query->execute();

		    $result = $query -> fetchAll(PDO::FETCH_OBJ); 


		    $query1= $connection->prepare("SELECT * FROM persona p, usuario u WHERE p.ci = u.ci AND u.usuario=:username"); 
		    $query1->bindParam("username", $_POST['username'], PDO::PARAM_STR);

		    $query1->execute();

		    $res = $query1->fetch(PDO::FETCH_ASSOC);
		    
			?>

			<h2><?php echo $res['nombre']; ?><h2>

			<table border="1" style="width: 100%;">
				<thead>
				<tr>
					<th>Dpto.</th>
					
					<th>Nota 1</th>
					<th>Nota 2</th>
					<th>Nota 3</th>
					<th>PROMEDIO</th>

				</tr>
				</thead>
				<tbody>
				<?php
				if($query -> rowCount() > 0) {

					foreach($result as $res) {
						echo "<tr>";
						echo "<td>".$res->departamento."</td>";
						
						echo "<td>".$res->nota1."</td>";
						echo "<td>".$res->nota2."</td>";
						echo "<td>".$res->nota3."</td>";
						echo "<td>".$res->promedio."</td>";
						echo "</tr>";
						 } 

					}

				?>
				</tbody>
			</table>
				
			</div>

	
			
		</article> 
	
	</section> 
	
<?php include '../pie.inc.php' ?>

	
</body>
</html>

