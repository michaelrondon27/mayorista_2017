<?php
	require_once("asset/libs/PHPExcel/PHPExcel.php");
	$db=new Conexion();
	//VARIABLES DE PHP
	$objPHPExcel=new PHPExcel();
	//DATOS DE LA CONEXION
	$desde=date("Y-m-d", strtotime($_POST['desde']));
	$hasta=date("Y-m-d", strtotime($_POST['hasta']));
	$usuario=$_users[$_SESSION['app_id']]['user'];
	$indicesServer = array('REMOTE_ADDR',);
	$ip=$_SERVER['REMOTE_ADDR'];
	$evento="reporte excel de cotizacion por fecha desde ".$_POST['desde']." hasta".$_POST['hasta'];
	$event=$db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$usuario' '$evento', NOW(), 'REPORTE');");
	//PROPIEDADES DE ARCHIVO EXCEL
	$objPHPExcel->getProperties()->setCreator("Cotizacion")
	->setLastModifiedBy("Cotizacion")
	->setTitle("Reporte XLS")
	->setSubject("Reporte")
	->setDescription("")
	->setKeywords("")
	->setCategory("");
	//PROPIEDADES DE LA CELDA
	$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial');
	$objPHPExcel->getDefaultStyle()->getFont()->setSize('12');
	$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
	//CABECERA DE LA CONSULTA
	$i=1;
	$objPHPExcel->setActiveSheetIndex(0)
	->setCellValue("A".$i, "FECHA")
	->setCellValue("B".$i, "BENEFICIARIO")
	->setCellValue("C".$i, "N° COTIZACION")
	->setCellValue("D".$i, "CANTIDAD")
	->setCellValue("E".$i, "ESTATUS")
	->setCellValue("F".$i, "TOTAL");
	$objPHPExcel->getActiveSheet()
				->getStyle('A1:F1')
				->getFill()
				->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
				->getStartColor()->setARGB('FFEEEEEE');
	$borders=array(
		'borders'=>array(
			'allborders'=>array(
				'style'=>PHPExcel_Style_Border::BORDER_THIN,
				'color'=>array('argb'=>'FF000000'),
			)
		),
	);
	$objPHPExcel->getActiveSheet()
				->getStyle('A1:F1')
				->applyFromArray($borders);
	//DETALLE DE LA CONSULTA
	$sql=$db->query("SELECT c.cotizacion, c.fecha, c.total, c.total_num, e.nombre, c.unidades_total, c.despacho FROM cotizacion_4tocronograma c INNER JOIN empresa e ON c.id_empresa=e.id_empresa WHERE c.fecha BETWEEN '$desde' AND '$hasta' ORDER BY c.fecha;");
	$cantidad=0;
	$cobrar=0;
	$cobrado=0;
	$anulado=0;
	$vendido=0;
	while($data=$db->recorrer($sql)){
		$fecha=date("d-m-Y", strtotime($data[1]));
		$i++;
		if($data[6]==0){
			$estatus="Por Cancelar";
			$color="FFFFFFFF";
			$cobrar=$cobrar+$data[3];
		}else if($data[6]==1){
			$estatus="Cancelado";
			$color="CCCFFFD4";
			$cobrado=$cobrado+$data[3];
			$vendido=$vendido+$data[5];
		}else if($data[6]==2){
			$estatus="Anulado";
			$color="FFFCCCCC";
			$anulado=$anulado+$data[3];
		}
		$objPHPExcel->getActiveSheet()
					->getStyle('A'.$i.':F'.$i)
					->getFill()
					->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()->setARGB($color);
		//BORDE DE LA CELDA
		$objPHPExcel->setActiveSheetIndex(0)
		->getStyle('A'.$i.':F'.$i)
		->applyFromArray($borders);
		//MOSTRAMOS LOS VALORES
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue("A".$i, $fecha)
		->setCellValue("B".$i, $data[4])
		->setCellValue("C".$i, $data[0])
		->setCellValue("D".$i, $data[5])
		->setCellValue("E".$i, $estatus)
		->setCellValue("F".$i, $data[2]);
		$cantidad=$cantidad+$data[5];
	}
	$i=$i+1;
	$objPHPExcel->setActiveSheetIndex(0)
	->getStyle('A'.$i.':F'.$i)
	->applyFromArray($borders);
	$objPHPExcel->setActiveSheetIndex(0)
	->setCellValue("C".$i, "Cantidad total:")
	->setCellValue("D".$i, $cantidad);
	$i=$i+1;
	$objPHPExcel->setActiveSheetIndex(0)
	->getStyle('A'.$i.':F'.$i)
	->applyFromArray($borders);
	$objPHPExcel->setActiveSheetIndex(0)
	->setCellValue("C".$i, "Cantidad vendida:")
	->setCellValue("D".$i, $vendido);
	$i=$i+1;
	$cobrar=number_format($cobrar, 2, ".", ",")." Bs.";
	$cobrado=number_format($cobrado, 2, ".", ",")." Bs.";
	$anulado=number_format($anulado, 2, ".", ",")." Bs.";
	$objPHPExcel->setActiveSheetIndex(0)
	->getStyle('A'.$i.':F'.$i)
	->applyFromArray($borders);
	$objPHPExcel->setActiveSheetIndex(0)
	->setCellValue("A".$i, "Anulado:")
	->setCellValue("B".$i, $anulado)
	->setCellValue("C".$i, "Por Cobrar:")
	->setCellValue("D".$i, $cobrar)
	->setCellValue("E".$i, "Cobrado:")
	->setCellValue("F".$i, $cobrado);
	//DATOS DE LA SALIDA DEL EXCEL
	$archivo="Listado De cotizaciones del 4to cronograma desde ".$_POST['desde']." hasta ".$_POST['hasta'].".xls";
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment; filename="'.$archivo.'"');
	header('Cache-Control: max-age=0');
	$objWriter=PHPExcel_IOFACTORY::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	exit;
?>