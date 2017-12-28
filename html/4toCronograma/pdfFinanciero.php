<?php
	require("asset/libs/mpdf/mpdf.php");
	$db=new Conexion();
	$desde=date("Y-m-d", strtotime($_POST['desde']));
	$hasta=date("Y-m-d", strtotime($_POST['hasta']));
	$fecha=date("d-m-Y");
	$total=0;
	$usuario=$_users[$_SESSION['app_id']]['user'];
	$indicesServer = array('REMOTE_ADDR',);
	$ip=$_SERVER['REMOTE_ADDR'];
	$evento="reporte estado financiero por fecha desde ".$_POST['desde']." hasta".$_POST['hasta'];
	$event=$db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$usuario' '$evento', NOW(), 'REPORTE');");
	$sql=$db->query("SELECT c.cotizacion, c.fecha, c.total, c.total_num, d.pago FROM cotizacion_4tocronograma c INNER JOIN despacho_4tocronograma d ON c.id_cotizacion=d.id_cotizacion WHERE c.despacho=1 AND c.fecha BETWEEN '$desde' AND '$hasta' ORDER BY c.fecha;");
	if($db->rows($sql)>0){
		$encabezado="
			<div class='contenedor'>
				<div class='logo'>
					<img src='asset/images/baner1.png' width='' height=''>
				</div>
				<div align='center'>
					COMERSSO MAYORISTA<br><br><br>
				</div>
				<div align=center>
					Reporte Financiero desde ".$_POST['desde']." hasta ".$_POST['hasta']."
				</div>
				<br>
				<div align='center'>
					Fecha: ".$fecha."
				</div>
				<div class='clear'></div>
				<table>
					<tr>
						<td class='abajo izquierda' align=center >FECHA</td>
						<td class='abajo izquierda' align=center>N° COTIZACIÓN</td>
						<td class='abajo izquierda' align=center>N° DEPOSITO</td>
						<td class='abajo' align=center>TOTAL</td>
					</tr>";
		$reporte=new mPDF('', 'Letter'); 	
		$reporte->addPage();
		$css=file_get_contents('asset/css/reporte.css');
		$reporte->writeHTML($css, 1);
		$reporte->writeHTML($encabezado);
		while($data=$db->recorrer($sql)){
			$fec=date("d-m-Y", strtotime($data[1]));
			if($data[4]=="C"){
				$pago="Crédito";
			}else if($data[4]=="D"){
				$pago="Depósito";
			}else if($data[4]=="T"){
				$pago="Transferencia";
			}else if($data[4]=="DO"){
				$pago="Donación";
			}else if($data[4]=="DS"){
				$pago="Deuda Social";
			}
			$productos="
				<tr>
					<td class='abajo izquierda' align=center>".$fec."</td>
					<td class='abajo izquierda' align=center>".$data[0]."</td>
					<td class='abajo izquierda' align=center>".$pago."</td>
					<td class='abajo' align=right>".$data[2]."</td>
				</tr>";
			$reporte->writeHTML($productos);
			$total=$total+$data[3];
		}
		$total=number_format($total, 2, ".", ",");
		$total=$total." Bs.";
		$footer="
				<tr>
					<td colspan='3' align='right' class='izquierda'>
						<strong>TOTAL:</strong>
					</td>
					<td align=right>".$total."</td>
				</tr>
			</table>
	";
	$reporte->writeHTML($footer);
	$reporte->setFooter('{PAGENO}');
	$reporte->SetTitle('Reporte Financiero del 4to cronograma desde '.$_POST['desde'].' hasta '.$_POST['hasta']);
	$reporte->Output('Reporte Financiero desde'.$_POST['desde'].' hasta '.$_POST['hasta'].'.pdf', 'I');
	$reporte->Output();
	}else{
		header("location: ?view=4toCronograma&mode=estadoFinanciero&error=2");
	}
?>