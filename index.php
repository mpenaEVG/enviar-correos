
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Leer Excel</title>
</head>
<body>
    <h2>Subir Archivo Excel</h2>
    <p>Introduce tu excel para mostar su contenido..</p>
    <form action="leer_excel.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="excel_file" accept=".xls, .xlsx" required>
        <pre>
        <button type="submit">Subir</button>
        </pre>
    </form>
</body>
</html>
