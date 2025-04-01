<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos básicos
    $name     = $_POST["name"] ?? '';
    $company  = $_POST["company"] ?? '';
    $email    = $_POST["email"] ?? '';
    $phone    = $_POST["phone"] ?? '';
    $project  = $_POST["project"] ?? '';
    $budget   = $_POST["budget"] ?? '';

    // Plataformas seleccionadas (checkbox)
    $platforms = $_POST["platforms"] ?? [];
    $platformsList = !empty($platforms) ? implode(", ", $platforms) : "No seleccionadas";

    // Validación simple
    if (empty($name) || empty($email) || empty($project)) {
        echo "Por favor, completá los campos obligatorios.";
        exit;
    }

    // Mensaje a enviar (puede ser por mail, guardar en base de datos, etc.)
    $mensaje = "
        📩 Nuevo formulario recibido de Community Management:\n
        🧑 Nombre: $name\n
        🏢 Empresa: $company\n
        📧 Email: $email\n
        📞 Teléfono: $phone\n
        💻 Plataformas: $platformsList\n
        🧾 Proyecto: $project\n
        💸 Presupuesto: $budget
    ";

    // Por ejemplo, podrías enviarlo por email
    $destinatario = "ignaciosoraka@gmail.com";
    $asunto = "Formulario";
    $cabeceras = "From: Suprads <noreply@tuweb.com>\r\n";


    // Enviar email
    if (mail($destinatario, $asunto, $mensaje, $cabeceras)) {
        echo "✅ ¡Formulario enviado con éxito!";
    } else {
        echo "❌ Hubo un error al enviar el formulario.";
    }
}
?>
