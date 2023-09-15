<?php
    session_start();
    require('../public/fpdf.php');
    //Configura el pdf: vertical, punto, tamaño
    $pdf = new FPDF('P','pt','A4');
    //Añade nueva página
    $pdf->AddPage();

    $fecha=date('Y-m-d');
    //HEADER
    $pdf->SetFont('helvetica','','14');
    $pdf->Rect(25,25,550,80);
    $pdf->Cell(545,30,"DAILY ASSISTANCE",0,2,"C");
    //ENCABEZADO
    $pdf->SetFont('helvetica','','10');
    $pdf->Cell(545,15,"CURSO: ",0,2,"L");
    $pdf->Cell(545,15,"FECHA: ".$fecha."",0,2,"L");
    $pdf->Cell(545,15,"CATEDRÁTICO: ",0,2,"L");
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(2);
    $pdf->Line(5,110,590,110);
    $pdf->Cell(10,25,"",0,1);
    //TITLE
    $pdf->SetFont('helvetica','B','20');
    $pdf->Cell(545,25,"LISTADO DE ALUMNOS",0,2,"C");
    $pdf->Cell(10,35,"",0,1);
    //LISTADO---------------------------------------
    $pdf->SetFont('helvetica','',10);
    /*$list_presentes=$_SESSION['result_present'];
    while($r1=$list_presentes->fetch_assoc()){
        echo "<tr>";
            echo "<td>".$row4['id_alumno']."</td>";
            echo "<td>".$row4['nombre']." ".$row4['apellido']."</td>";
            echo "<td>".$row4['nombre_curso']."</td>";
            echo "<td>".$row4['estado_asistencia']."</td>";
            echo "<td>".$row4['fecha_asistencia']."</td>";
            echo "<td>".$row4['user']."</td>";
            echo "</tr>";
            echo "</tr>";
    }*/
    $pdf->Output();    
?>