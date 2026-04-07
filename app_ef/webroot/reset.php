<?php
// 1. Preparamos la contraseña '123456' en el idioma que tu sistema entiende
$hash = password_hash("123456", PASSWORD_DEFAULT);

try {
    // 2. Nos conectamos a la base de datos de tu proyecto
    $db = new PDO("mysql:host=db;dbname=db_ef", "carlos", "lenovo0306");
    
    // 3. Le ponemos esa contraseña a TODOS los usuarios y los hacemos administradores
    $db->exec("UPDATE users SET password = '$hash', rol = 'admin'");
    
    echo "<h1 style='color: green;'>¡LISTO KEVIN! EL RESETEO FUNCIONO</h1>";
    echo "<h3>Ahora la contraseña de todos los usuarios es: <b>123456</b></h3>";

} catch (Exception $e) {
    echo "Hubo un error: " . $e->getMessage();
}
?>