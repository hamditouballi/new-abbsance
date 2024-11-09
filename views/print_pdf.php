<?php
	function generateRow(){
		$contents = '';
		include_once('connexion.php');
		$sql = "select ID_Absence,Date_Absence,Nom_complet,niveau_étude,Numéro_de_bus,Entrée_matin,Sortie_matin,Entrée_soir,Sortie_soir from etudient inner join absence on etudient.ID_étudient=absence.IDétudient inner join bus_scolaire on bus_scolaire.ID_bus=absence.IDbus";

		//use for MySQLi OOP
		$stmt = $con->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$contents .= "
			<tr>
				<td>".$row['Date_Absence']."</td>
				<td>".$row['Nom_complet']."</td>
        <td>".$row['niveau_étude']."</td>
				<td>".$row['Numéro_de_bus']."</td>
        <td>".$row['Entrée_matin']."</td>
        <td>".$row['Sortie_matin']."</td>
        <td>".$row['Entrée_soir']."</td>
        <td>".$row['Sortie_soir']."</td>
			</tr>
			";
		}
		

		return $contents;
	}

	require_once('TCPDF/tcpdf.php');
   
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
     $lg = Array();
    $lg['a_meta_charset'] = 'UTF-8';
    $lg['a_meta_dir'] = 'rtl';
    $lg['a_meta_language'] = 'ar';
   $pdf->setLanguageArray($lg);
    $pdf->setRTL(true);
    $pdf->SetFont('aealarabiya', '', 11);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetTitle("معلومات الغياب");
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $pdf->SetDefaultMonospacedFont('aealarabiya');
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $pdf->SetMargins(PDF_MARGIN_LEFT, '11', PDF_MARGIN_RIGHT);
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetAutoPageBreak(TRUE, 11);

    $pdf->AddPage();
    $content = '';
    $content .= '
      	<h2 align="center">معلومات الغياب</h2>
      	
      	<table border="1" cellspacing="0" cellpadding="3">
           <tr>
				<th width="15%">التاريخ</th>
				<th width="20%">اسم التلميذ</th>
				<th width="20%">المستوى الدراسي</th>
        <th width="10%">رقم الحافلة</th>
        <th width="10%">الدخول الصباحي</th>
        <th width="10%">الخروج الصباحي</th>
        <th width="10%">الدخول المسائي</th>
        <th width="10%">الخروج المسائي</th>
              
           </tr>
      ';
			 
    $content .= generateRow();
    $content .= '</table>';
    $pdf->writeHTML($content);
    $pdf->Output('abbsance.pdf', 'I');


?>
