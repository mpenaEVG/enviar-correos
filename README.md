# Enviar correos a partir de un excel

Esta aplicación usa PHPMailer y PHPSpreadsheet para leer datos de un excel y mandar esa 
información al usuario correspondiente.

Esta configurado para leer en el siguiente orden:

#### Columna 1: Nombre
#### Columna 2: correo
#### Columna 3: contraseña
#### Columna 4: usuario

De igual manera este programa se puede adaptar para cualquier distribución de los datos.

El email sería:

    "Bienvenido [nombre]! 
    Tus credenciales de acceso son: 

            usuario: [usuario]
            contraseña: [contraseña]

    Un Saludo!



