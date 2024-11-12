<?php
require 'vendor/autoload.php'; 

use PhpOffice\PhpSpreadsheet\IOFactory;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['excel_file'])) {
      $file = $_FILES['excel_file']['tmp_name'];
      $filename = $_FILES['excel_file']['name'];



      $extensionesPermitidas = ['xls','xlsx'];
      $fileExtension = pathinfo($filename,PATHINFO_EXTENSION);

      if(!in_array($fileExtension,$extensionesPermitidas)){
        die("El archivo no tiene una extensión válida");
      }


      // Cargar el archivo Excel
      $spreadsheet = IOFactory::load($file);
      $sheet = $spreadsheet->getActiveSheet();
    
      $datosAlumnos = [];
      $filaIndex = 0;

  foreach ($sheet->getRowIterator() as $row) {
    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(true);
    $filaDatos = [];

    foreach ($cellIterator as $cell) {
        $filaDatos[] = $cell->getValue();
    }

      if (array_filter($filaDatos)) {
        if($filaIndex === 0){
            $cabecera = $filaDatos;
            $filaIndex++;  
        }else{
            $alumno = [];
            foreach ($cabecera as $index => $columna) {
                    $alumno[$columna] = $filaDatos[$index]; 
            }
            $datosAlumnos[] = $alumno;
        }
       }
  }     
      require 'mostrar_alumno_correo.php';

}else{
  echo "no se pudo leer el excel";
}
  
