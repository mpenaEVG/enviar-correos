function validarArchivo(event){

  const archivo = event.target.files[0]
  
  if(archivo){
    const nombreArchivo = archivo.name.toLowerCase()
    const tipoArchivo = archivo.type 

    const esValido = (nombreArchivo.endsWith('.xlsx') || nombreArchivo.endsWith('.xls')) 
                                                    && 
      (tipoArchivo === "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" || tipoArchivo === "application/vnd.ms-excel");

    if(!esValido){
      alert("Por favor seleccione un archivo válido")
      event.target.value = ''
    }
  }
}
