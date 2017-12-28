<?php
	require("asset/libs/mpdf/mpdf.php");
	$db=new Conexion();
	$desde=date("Y-m-d", strtotime($_POST['desde']));
	$hasta=date("Y-m-d", strtotime($_POST['hasta']));
	$total=0;
	$usuario=$_users[$_SESSION['app_id']]['user'];
	$indicesServer = array('REMOTE_ADDR',);
	$ip=$_SERVER['REMOTE_ADDR'];
	$evento="reporte pdf de cotizacion por fecha desde ".$_POST['desde']." hasta".$_POST['hasta'];
	$event=$db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$usuario' '$evento', NOW(), 'REPORTE');");
	$sql=$db->query("SELECT c.cotizacion, c.fecha, c.total, c.total_num, e.nombre, c.unidades_total, c.despacho FROM cotizacion_3ercronograma c INNER JOIN empresa e ON c.id_empresa=e.id_empresa WHERE c.fecha BETWEEN '$desde' AND '$hasta' ORDER BY c.fecha;");
	if($db->rows($sql)>0){
		$encabezado="
			<div class='contenedor'>
				<div class='logo' align='center'>
					<img src='asset/images/baner1.png' width='' height=''>
				</div>
				<br>
				<div align='center'>
					VENEZUELA PRODUCTIVA<br><br><br>
				</div>
				<div align=center>
					Reporte de cotizaciones desde ".$_POST['desde']." hasta ".$_POST['hasta']."
				</div>
				<br>
				<div align='center'>
					Fecha: ".date("d-m-Y")."
				</div>
				<div class='clear'></div>
				<table>
					<tr>
						<td class='abajo izquierda' align=center >FECHA</td>
						<td class='abajo izquierda' align=center >BENEFICIARIO</td>
						<td class='abajo izquierda' align=center>N° COTIZACIÓN</td>
						<td class='abajo izquierda' align=center>CANTIDAD</td>
						<td class='abajo izquierda' align=center>ESTATUS</td>
						<td class='abajo' align=center>TOTAL</td>
					</tr>";
		$reporte=new mPDF('', 'Letter'); 	
		$reporte->addPage();
		$css=file_get_contents('asset/css/reporte.css');
		$reporte->writeHTML($css, 1);
		$reporte->writeHTML($encabezado);
		$cobrar=0;
		$cobrado=0;
		$anulado=0;
		$vendido=0;
		while($data=$db->recorrer($sql)){
			$fec=date("d-m-Y", strtotime($data[1]));
			if($data[6]==0){
				$estatus="Por Cancelar";
				$color="#FFF";
				$cobrar=$cobrar+$data[3];
			}else if($data[6]==1){
				$estatus="Cancelado";
				$color="#CCFFD4";
				$cobrado=$cobrado+$data[3];
				$vendido=$vendido+$data[5];
			}else if($data[6]==2){
				$estatus="Anulado";
				$color="#FFCCCC";
				$anulado=$anulado+$data[3];
			}
			$productos="
				<tr style='background-color: ".$color.";'>
					<td class='abajo izquierda' align='center'>".$fec."</td>
					<td class='abajo izquierda' align='center'>".$data[4]."</td>
					<td class='abajo izquierda' align='center'>".$data[0]."</td>
					<td class='abajo izquierda' align='center'>".$data[5]."</td>
					<td class='abajo izquierda' align='center'>".$estatus."</td>
					<td class='abajo' align='right'>".$data[2]."</td>
				</tr>
			";
			$reporte->writeHTML($productos);
			$cant=$cant+$data[5];
		}
		if($cobrar!=0){
			$cobrar=number_format($cobrar, 2, ",", "."). " Bs.";
		}else{
			$cobrar="0,00 Bs.";
		}
		if($cobrado!=0){
			$cobrado=number_format($cobrado, 2, ",", "."). " Bs.";
		}else{
			$cobrado="0,00 Bs.";
		}
		if($cobrar!=0){
			$anulado=number_format($anulado, 2, ",", "."). " Bs.";
		}else{
			$anulado="0,00 Bs.";
		}
		$footer="
				<tr>
					<td colspan='3' align='right' class='izquierda abajo'>
						<strong>CANTIDAD TOTAL:</strong>
					</td>
					<td align='center' class='izquierda abajo'>".$cant."</td>
					<td align='center' class='izquierda abajo'></td>
					<td align='center' class='abajo'></td>
				</tr>
				<tr>
					<td colspan='3' align='right' class='izquierda abajo'>
						<strong>CANTIDAD VENDIDA:</strong>
					</td>
					<td align='center' class='izquierda abajo'>".$vendido."</td>
					<td align='center' class='izquierda abajo'></td>
					<td align='center' class='abajo'></td>
				</tr>
				<tr>
					<td align='right' class='izquierda'>
						<strong>Anulado:</strong>
					</td>
					<td align='right' class='izquierda'>".$anulado."</td>
					<td align='right' class='izquierda'>
						<strong>Por cobrar:</strong>
					</td>
					<td align='right' class='izquierda'>".$cobrar."</td>
					<td align='right' class='izquierda'>
						<strong>Cobrado:</strong>
					</td>
					<td align='right'>".$cobrado."</td>
				</tr>
			</table>
		";
		$reporte->writeHTML($footer);
		$reporte->setFooter('{PAGENO}');
		$reporte->SetTitle('Reporte de cotizaciones del 3er cronograma desde '.$_POST['desde'].' hasta '.$_POST['hasta']);
		$reporte->Output('Reporte de cotizaciones desde '.$_POST['desde'].' hasta '.$_POST['hasta'].'.pdf', 'I');
		$reporte->Output();
	}else{
		header("location: ?view=3erCronograma&mode=estadoCotizaciones&error=2");
	}
?>