<?php
	require("asset/libs/mpdf/mpdf.php");
	$db=new Conexion();
	$id_cotizacion=$_GET['id'];
	$indicesServer = array('REMOTE_ADDR',);
	$ip=$_SERVER['REMOTE_ADDR'];
	$evento="Reporte de la orden de despacho de la cotizacion del 4to cronograma en pdf: ".$id_cotizacion;
	$usuario=$_users[$_SESSION['app_id']]['user'];
	$db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$usuario', '$evento', NOW(), 'REPORTE');");
	$fecha=date("d-m-Y");
	$sql=$db->query("SELECT c.cotizacion, c.total, c.fecha, e.nombre, e.rif, e.direccion, e.telefono, e.contacto, ct.cod_tlf, c.descuento, c.desc_porcentaje, n.nro_orden, e.telefono2, e.correo, d.banco, d.deposito FROM cotizacion_4tocronograma c INNER JOIN empresa e ON c.id_empresa=e.id_empresa INNER JOIN cod_tlf ct ON e.id_cod_tlf=ct.id_cod_tlf INNER JOIN despacho_4tocronograma d ON c.id_cotizacion=d.id_cotizacion INNER JOIN nro_orden_4tocronograma n ON c.id_cotizacion=n.id_cotizacion WHERE c.id_cotizacion=$id_cotizacion LIMIT 1;");
	if($db->rows($sql)>0){
		$data=$db->recorrer($sql);
		if($data[12]!=""){
			$sql2=$db->query("SELECT ct.cod_tlf FROM empresa e INNER JOIN cod_tlf ct ON e.id_cod_tlf2=ct.id_cod_tlf WHERE nombre='$data[3]' LIMIT 1;");
			$data2=$db->recorrer($sql2);
			$otro_tlf=$data2[0]."-".$data[12];
		}else{
			$otro_tlf="";
		}
		if($data[15]=="C"){
			$deposito="Crédito";
		}
		$tlf=$data[8]."-".$data[6];
		$fec=$hasta=date("d-m-Y", strtotime($data[2]));
		$encabezado="
			<div class='contenedor'>
				<div class='logo' align=center>
					<img src='asset/images/baner1.png' width='' height=''>
				</div>
				<br>
				<div class='logo'>
					<img src='asset/images/baner.png' width='' height=''>
				</div>
				<br>
				<div align=center>
				<div align=center>
				<strong>ORDEN DE DESPACHO</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;Mi Casa Bien Equipada<br><br>
				</div>
				<br>
				<table class='header'>
					<tr>
						<td class='abajo izquierda'>Cotizaci&oacute;n: ".$data[0]."</td>
						<td class='abajo izquierda'>Orden de despacho: ".$data[11]."</td>
						<td class='abajo'>RIF:".$data[4]."</td>
					</tr>
					<tr>
						<td class='abajo izquierda'>BENEFICIARIO: ".$data[3]."</td>
						<td colspan='2' class='abajo '>DIRECCION: ".$data[5]."</td>
					</tr>
					<tr>
						<td class='abajo izquierda'>TELÉFONO: ".$tlf."</td>
						<td colspan='2' class='abajo'>PERSONA DE CONTACTO: ".$data[7]."</td>
					</tr>
					<tr>
						<td class='izquierda'>OTRO TELÉFONO: ".$otro_tlf."</td>
						<td colspan='2'>CORREO: ".$data[13]."</td>
					</tr>
				</table>
				<table>
					<tr>
						<td class='abajo izquierda' >BANCO: ".$data[14]."</td>
						<td class='abajo' colspan='2'>DEPOSITO O TRANSFERENCIA: ".$data[15]."</td>
					</tr>
					<tr>
						<td class='abajo izquierda' align=center >ITEM</td>
						<td class='abajo izquierda' align=center>PRODUCTO</td>
						<td class='abajo' align=center>CANTIDAD</td>
						
					</tr>";
		$reporte=new mPDF('', 'Letter'); 	
		$reporte->addPage();
		$css=file_get_contents('asset/css/reportepdf.css');
		$reporte->writeHTML($css, 1);
		$reporte->writeHTML($encabezado);
		$sql1=$db->query("SELECT o.cantidad, p.producto, m.modelo FROM ordenes_4tocronograma o INNER JOIN producto p ON o.id_producto=p.id_producto INNER JOIN modelo m ON o.id_modelo=m.id_modelo WHERE o.id_cotizacion=$id_cotizacion;");
		if($db->rows($sql1)>0){
			$contador=1;
			while($data1=$db->recorrer($sql1)){
				$productos="
					<tr>
						<td class='abajo izquierda' align=center>".$contador."</td>
						<td class='abajo izquierda' align=center>".$data1[1]." ".$data1[2]."</td>
						<td class='abajo' align=center>".$data1[0]."</td>						
					</tr>";
				$contador++;
				$reporte->writeHTML($productos);
			}
		}else{
			$productos="
				<tr>
					<td class='abajo' colspan='6' align=center >no hay productos en esta cotización.</td>
				</tr>";
			$reporte->writeHTML($productos);
		}
		$footer="
			</table>
			<table>
				
				<tr>
					<td class='abajo izquierda'>FECHA COTIZACÓN: ".$fec."</td>
					<td class='abajo ' align=right >FECHA: ".$fecha."</td>
				</tr>
				<tr>
					<td class='abajo izquierda'><strong>ORIGINAL</strong></td>
					<td class='abajo' align=right ><strong>N°:".$data[11]."</strong></td>
				</tr>
				<tr><td colspan='2' class='abajo'><strong>EMPRESA DE DISTRIBUCIÓN E INSUMOS 'VENEZUELA PRODUCTIVA' C.A. TELEFONOS:0212-393.09.97</strong></td>
				</table>
				<div align=center>
					<tr><td colspan='2'  style='font-size: 12px;' align=center><br><strong> Atentamente </strong>
				</div>
					<br>
					<br>
				<div align=center>
					<tr><td colspan='2'  style='font-size: 12px;' align=center><br><strong> Presidente: </strong>
						<br><strong>Teniente Coronel</strong>
						<br><strong>Antonio José Pérez Suárez</strong>
						<br>FIRMA:</td>
						<br>
				</div>		
		</div>
	";
	$reporte->writeHTML($footer);
	$reporte->Output();
}
?>