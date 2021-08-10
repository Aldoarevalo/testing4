<?php

if
 (isset($_GET['term'])){
	# conectare la base de datos
   $con= mysqli_connect("127.0.0.1", "root", "", "comprastockproduccion");
	
$return_arr = array();
/* Si la conexión a la base de datos , ejecuta instrucción SQL. */
if ($con)
{
	$fetch = mysqli_query($con,"SELECT * FROM productos where 
codigoproducto like '%" . 
mysqli_real_escape_string($con,($_GET['term'])) . "%' LIMIT 0 ,50"); 
	
	/* Recuperar y almacenar en conjunto los resultados de la consulta.*/
	while ($row = mysqli_fetch_array($fetch)) {
		$id_producto=$row['id_producto'];
		$precio=number_format($row['precio'],2,".","");
		$row_array['value'] = $row['codigoproducto']." | 
".$row['nombre'];
		$row_array['id_producto']=$row['id_producto'];
		$row_array['codigo']=$row['codigoproducto'];
		$row_array['descripcion']=$row['nombre'];
		$row_array['precio']=$precio;
		array_push($return_arr,$row_array);
    }
}

/* Cierra la conexión. */
mysqli_close($con);

/* Codifica el resultado del array en JSON. */
echo json_encode($return_arr);

}
?>
