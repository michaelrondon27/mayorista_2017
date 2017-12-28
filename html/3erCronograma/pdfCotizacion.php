<?php
	require("asset/libs/mpdf/mpdf.php");
	$db=new Conexion();
	$id_cotizacion=$_GET['id'];
	$indicesServer = array('REMOTE_ADDR',);
	$ip=$_SERVER['REMOTE_ADDR'];
	$evento="Reporte de la cotizacion del 3er cornograma en pdf: ".$id_cotizacion;
	$usuario=$_users[$_SESSION['app_id']]['user'];
	$db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$usuario', '$evento', NOW(), 'REPORTE');");
	$tlf=$_cod_tlf[$_beneficiario[$_cotizacion3ercronograma[$id_cotizacion]['id_empresa']]['id_cod_tlf']]['cod_tlf']."-".$_beneficiario[$_cotizacion3ercronograma[$id_cotizacion]['id_empresa']]['telefono'];
	if($_beneficiario[$_cotizacion3ercronograma[$id_cotizacion]['id_empresa']]['id_cod_tlf2']>0){
		$otrotlf=$_cod_tlf[$_beneficiario[$_cotizacion3ercronograma[$id_cotizacion]['id_empresa']]['id_cod_tlf2']]['cod_tlf']."-".$_beneficiario[$_cotizacion3ercronograma[$id_cotizacion]['id_empresa']]['telefono2'];
	}else{
		$otrotlf="";
	}
	$fecha=date("Y", strtotime($_cotizacion3ercronograma[$id_cotizacion]['fecha']));
	$pie=1;
	$encabezado="
		<div class='contenedor'>
			<div class='logo'>
				<img src='asset/images/baner1.png' width='100%' height='40'>
			</div>
			<div class='logo'>
				<img src='asset/images/baner.png' width='100%' height='100'>
			</div>
			<div align='right' style='font-size: 10px;'>
				<strong>PRESUPUESTO Nro &nbsp;&nbsp;VP-".$_cotizacion3ercronograma[$id_cotizacion]['cotizacion']." </strong>
			</div>
			<div>
				Fecha: ".$fec=date("d-m-Y", strtotime($_cotizacion3ercronograma[$id_cotizacion]['fecha']))."
			</div>
			<div class='clear'></div>
			<table class='header'>
				<tr>
					<td colspan='2' class='abajo'>NOMBRE (S) Y APELLIDO (S) Ó  RAZÓN SOCIAL:".$_beneficiario[$_cotizacion3ercronograma[$id_cotizacion]['id_empresa']]['nombre']."</td>
				</tr>
				<tr>
					<td class='abajo izquierda'>C.I. / RIF: ".$_beneficiario[$_cotizacion3ercronograma[$id_cotizacion]['id_empresa']]['rif']."</td>
					<td class='abajo '>DIRECCION: ".$_beneficiario[$_cotizacion3ercronograma[$id_cotizacion]['id_empresa']]['direccion']."</td>
				</tr>
				<tr>
					<td class='izquierda abajo'>TELÉFONO: ".$tlf."</td>
					<td class='abajo'>PERSONA DE CONTACTO: ".$_beneficiario[$_cotizacion3ercronograma[$id_cotizacion]['id_empresa']]['contacto']."</td>
				</tr>
				<tr>
					<td class='izquierda'>OTRO TELÉFONO: ".$otrotlf."</td>
					<td>CORREO: ".$_beneficiario[$_cotizacion3ercronograma[$id_cotizacion]['id_empresa']]['correo']."</td>
				</tr>
			</table>
			<br>
			<table>
				<tr>
					<td class='abajo izquierda' align=center >ITEM</td>
					<td class='abajo izquierda' align=center>PRODUCTO</td>
					<td class='abajo izquierda' align=center>PRECIO POR UNIDAD</td>
					<td class='abajo izquierda' align=center>CANTIDAD</td>
					<td class='abajo' align=center>PRECIO TOTAL</td>
				</tr>";
		$reporte=new mPDF('', 'Letter'); 	
		$reporte->addPage();
		$css=file_get_contents('asset/css/reportepdf.css');
		$reporte->writeHTML($css, 1);
		$reporte->writeHTML($encabezado);
		$sql=$db->query("SELECT o.cantidad, p.producto, m.modelo, m.precio, o.precio_total FROM ordenes_3ercronograma o INNER JOIN producto p ON o.id_producto=p.id_producto INNER JOIN modelo m ON o.id_modelo=m.id_modelo WHERE id_cotizacion=$id_cotizacion;");
		if($db->rows($sql)>0){
			$contador=1;
			while($data=$db->recorrer($sql)){
				$pre_uni=number_format($data[3], 2, ',', '.')." Bs.";
				if($variable<10){
					$productos="
						<tr>
							<td class='abajo izquierda' align=center>".$contador."</td>
							<td class='abajo izquierda' align=center>".$data[1]." ".$data[2]."</td>
							<td class='abajo izquierda' align=center>".$pre_uni."</td>
							<td class='abajo izquierda' align=center>".$data[0]."</td>
							<td class='abajo' align=right>".$data[4]."</td>
						</tr>
					";
					$variable++;
					$contador++;
				}else if($variable==10){
					$foot="
						<div  style='font-size: 12px;'>
								<strong>Consideraciones para la venta:</strong>
							</div>
							<div  style='font-size: 12px;'>
								* Oficio de solicitud.						
							</div>
							<div  style='font-size: 12px;'>
								* Para la comercialización de estos productos el beneficiario debe ser previamente chequeado ante la página:
							</div>
							<div  style='font-size: 12px;'>
								<strong>casaequipada.mincomercio.gob.ve/.reportes_mcbe</strong>
							</div>
							<div  style='font-size: 12px;'>
								<strong>Usuario: revolucionproductiva</strong>
							</div>
							<div  style='font-size: 12px;'>
								<strong>Clave: revolucionprodutivaconsulta</strong>
							</div>
							<div  style='font-size: 12px;'>
								* La empresa solicitante deberá enviar carta de aceptación de manera previa a la entrega. Es importante señalar que la entrega de los productos se materializará a partir de la fecha en que se concrete el pago.						
							</div>
							<div  style='font-size: 12px;'>
								* Los pagos deben ser reportados a las direcciones de correo electrónico vp.mcbe.2017@gmail.com y vp.of.cobranzas@gmail.com
							</div>
							<div  style='font-size: 12px;' class='rojoletra'>
								* Una vez concretada la venta debe remitir el físico y digital (formato Exel), la lista de productos adquiridos por beneficiario a los fines de realizar su registro en la data del programa 'Mi Casa Bien Equipada'.
							</div>
							<div  style='font-size: 12.5px;' class='rojoletra'>
								<strong>* La distribución debera realizarse evitando largas líneas de espera y concentraciones que se alejen de preservar la dignidad del Glorioso Pueblo Venezolano.</strong>
							</div>
							<div  style='font-size: 12.5px;' class='rojoletra'>
								<strong>* Los productos vendidos a través de este programa, no podrán ser comercializados por un precio mayor que el precio unitario señalado en este presupuesto.</strong>
							</div>
							<div  style='font-size: 12.5px;' class='rojoletra'>
								<strong>* Los beneficiarios del programa 'Mi Casa Bien Equipada' podrán ser sometidos a fiscalización por parte de 'Venezuela Productiva'.</strong>
							</div>
							<div  style='font-size: 12px;'>
								* Para reporte de fallas o averías de equipos comunicarse al Dpto. de Post- venta Tlf: 0212-3930149.						
							</div>
							<div  style='font-size: 12px;'>
								* Este presupuesto expira a los 15 días.							
							</div>
							<br><br>
							<div class='parrafo' style='font-size: 12px;'>
								<div class='subparrafo'>
									<strong> Revisado por: Henrich Chapellín Biundo </strong>
									<div><strong>Primer Teniente</strong></div>
									<div><strong>Gerente de Comercializacion</strong></div>
								</div>
								<div class='subparrafo' style='font-size: 12px;'>
									<strong> Autorizado por: Antonio José Perez Suarez </strong>
									<div><strong>Teniente Coronel</strong></div>
									<div><strong>Presidente (E)</strong></div> 
								</div>
							</div>
							<hr><div align='right'>".$pie."</div>
					";
					$reporte->SetHTMLFooter($foot);
					$productos="
						</table>
						<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
						<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
						<div class='contenedor'>
							<div class='logo'>
							<img src='asset/images/baner1.png' width='100%' height='40'>
						</div>
						<div class='logo'>
							<img src='asset/images/baner.png' width='100%' height='100'>
						</div>
						<div align='right' style='font-size: 10px;'>
							<strong>PRESUPUESTO Nro &nbsp;&nbsp;VP-".$_cotizacion3ercronograma[$id_cotizacion]['cotizacion']." </strong>
						</div>
						<div>
							Fecha: ".$fec=date("d-m-Y", strtotime($_cotizacion3ercronograma[$id_cotizacion]['fecha']))."
						</div>
						<div class='clear'></div>
						<table class='header'>
							<tr>
								<td colspan='2' class='abajo'>NOMBRE (S) Y APELLIDO (S) Ó  RAZÓN SOCIAL:".$_beneficiario[$_cotizacion3ercronograma[$id_cotizacion]['id_empresa']]['nombre']."</td>
							</tr>
							<tr>
								<td class='abajo izquierda'>C.I. / RIF: ".$_beneficiario[$_cotizacion3ercronograma[$id_cotizacion]['id_empresa']]['rif']."</td>
								<td class='abajo '>DIRECCION: ".$_beneficiario[$_cotizacion3ercronograma[$id_cotizacion]['id_empresa']]['direccion']."</td>
							</tr>
							<tr>
								<td class='izquierda abajo'>TELÉFONO: ".$tlf."</td>
								<td class='abajo'>PERSONA DE CONTACTO: ".$_beneficiario[$_cotizacion3ercronograma[$id_cotizacion]['id_empresa']]['contacto']."</td>
							</tr>
							<tr>
								<td class='izquierda'>OTRO TELÉFONO: ".$otrotlf."</td>
								<td>CORREO: ".$_beneficiario[$_cotizacion3ercronograma[$id_cotizacion]['id_empresa']]['correo']."</td>
							</tr>
						</table>
						<br>
						<table>
							<tr>
								<td class='abajo izquierda' align=center >ITEM</td>
								<td class='abajo izquierda' align=center>PRODUCTO</td>
								<td class='abajo izquierda' align=center>PRECIO POR UNIDAD</td>
								<td class='abajo izquierda' align=center>CANTIDAD</td>
								<td class='abajo' align=center>PRECIO TOTAL</td>
							</tr>
							<tr>
								<td class='abajo izquierda' align=center>".$contador."</td>
								<td class='abajo izquierda' align=center>".$data[1]." ".$data[2]."</td>
								<td class='abajo izquierda' align=center>".$pre_uni."</td>
								<td class='abajo izquierda' align=center>".$data[0]."</td>
								<td class='abajo' align=right>".$data[4]."</td>
							</tr>
					";
					$variable=1;
					$contador++;
					$pie++;
				}
				$reporte->writeHTML($productos);
			}
		}else{
			$productos="
				<tr>
					<td class='abajo' colspan='6' align=center >no hay productos en esta cotización.</td>
				</tr>";
			$reporte->writeHTML($productos);
		}
		if($_cotizacion3ercronograma[$id_cotizacion]['desc_porcentaje']!=0){
			$descuento="
				<tr>
					<td colspan='3' align='right' class='abajo izquierda'>
						<strong>CANTIDAD TOTAL:</strong>
					</td>
					<td class='abajo izquierda' align=center>".$_cotizacion3ercronograma[$id_cotizacion]['unidades_total']."</td>
					<td class='abajo'></td>
				</tr>
				<tr>
					<td colspan='4' align='right' class='abajo izquierda'>
						<strong>SUBTOTAL:</strong>
					</td>
					<td class='abajo' align='right'>".$_cotizacion3ercronograma[$id_cotizacion]['subtotal']."</td>
				</tr>
				<tr>
					<td colspan='3' align='right' class='abajo izquierda'>
						<strong>DESCUENTO:</strong>
					</td>
					<td class='abajo izquierda' align=center>".$_cotizacion3ercronograma[$id_cotizacion]['desc_porcentaje']."%</td>
					<td class='abajo' align='right'>".$_cotizacion3ercronograma[$id_cotizacion]['descuento']."</td>
				</tr>";
			$reporte->writeHTML($descuento);
		}else{
			$cantidades="
				<tr>
					<td colspan='3' align='right' class='abajo izquierda'>
						<strong>CANTIDAD TOTAL:</strong>
					</td>
					<td class='abajo izquierda' align=center>".$_cotizacion3ercronograma[$id_cotizacion]['unidades_total']."</td>
					<td class='abajo'></td>
				</tr>
			";
			$reporte->writeHTML($cantidades);
		}
		$footer="
					<tr>
						<td colspan='4' align='right' class='izquierda'>
							<strong>TOTAL:</strong>
						</td>
						<td align=right>".$_cotizacion3ercronograma[$id_cotizacion]['total']."</td>
					</tr>
				</table>
			</div>
		";
		$footer="
					<tr>
						<td colspan='4' align='right' class='izquierda'>
							<strong>TOTAL:</strong>
						</td>
						<td align=right>".$_cotizacion3ercronograma[$id_cotizacion]['total']."</td>
					</tr>
				</table>
			</div>
		";
	$foot="
		<div  style='font-size: 12px;'>
				<strong>Consideraciones para la venta:</strong>
			</div>
			<div  style='font-size: 12px;'>
				* Oficio de solicitud.						
			</div>
			<div  style='font-size: 12px;'>
				* Para la comercialización de estos productos el beneficiario debe ser previamente chequeado ante la página:
			</div>
			<div  style='font-size: 12px;'>
				<strong>casaequipada.mincomercio.gob.ve/.reportes_mcbe</strong>
			</div>
			<div  style='font-size: 12px;'>
				<strong>Usuario: revolucionproductiva</strong>
			</div>
			<div  style='font-size: 12px;'>
				<strong>Clave: revolucionprodutivaconsulta</strong>
			</div>
			<div  style='font-size: 12px;'>
				* La empresa solicitante deberá enviar carta de aceptación de manera previa a la entrega. Es importante señalar que la entrega de los productos se materializará a partir de la fecha en que se concrete el pago.						
			</div>
			<div  style='font-size: 12px;'>
				* Los pagos deben ser reportados a las direcciones de correo electrónico vp.mcbe.2017@gmail.com y vp.of.cobranzas@gmail.com
			</div>
			<div  style='font-size: 12px;' class='rojoletra'>
				* Una vez concretada la venta debe remitir el físico y digital (formato Exel), la lista de productos adquiridos por beneficiario a los fines de realizar su registro en la data del programa 'Mi Casa Bien Equipada'.
			</div>
			<div  style='font-size: 12.5px;' class='rojoletra'>
				<strong>* La distribución debera realizarse evitando largas líneas de espera y concentraciones que se alejen de preservar la dignidad del Glorioso Pueblo Venezolano.</strong>
			</div>
			<div  style='font-size: 12.5px;' class='rojoletra'>
				<strong>* Los productos vendidos a través de este programa, no podrán ser comercializados por un precio mayor que el precio unitario señalado en este presupuesto.</strong>
			</div>
			<div  style='font-size: 12.5px;' class='rojoletra'>
				<strong>* Los beneficiarios del programa 'Mi Casa Bien Equipada' podrán ser sometidos a fiscalización por parte de 'Venezuela Productiva'.</strong>
			</div>
			<div  style='font-size: 12px;'>
				* Para reporte de fallas o averías de equipos comunicarse al Dpto. de Post- venta Tlf: 0212-3930149.						
			</div>
			<div  style='font-size: 12px;'>
				* Este presupuesto expira a los 15 días.							
			</div>
			<br><br>
			<div class='parrafo' style='font-size: 12px;'>
				<div class='subparrafo'>
					<strong> Revisado por: Henrich Chapellín Biundo </strong>
					<div><strong>Primer Teniente</strong></div>
					<div><strong>Gerente de Comercializacion</strong></div>
				</div>
				<div class='subparrafo' style='font-size: 12px;'>
					<strong> Autorizado por: Antonio José Perez Suarez </strong>
					<div><strong>Teniente Coronel</strong></div>
					<div><strong>Presidente (E)</strong></div> 
				</div>
			</div>
			<hr><div align='right'>".$pie."</div>
	";
	$reporte->writeHTML($footer);
	$reporte->SetHTMLFooter($foot);
	$reporte->Output();
?>