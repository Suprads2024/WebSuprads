<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos básicos
    $name     = $_POST["name"] ?? '';
    $company  = $_POST["company"] ?? '';
    $email    = $_POST["email"] ?? '';
    $phone    = $_POST["phone"] ?? '';
    $project  = $_POST["project"] ?? '';
    $budget   = $_POST["budget"] ?? '';

    // Plataformas seleccionadas (checkbox - múltiples)
    $platforms = $_POST["platforms"] ?? [];
    $platformsList = !empty($platforms) ? implode(", ", $platforms) : "No seleccionadas";

    // Validación simple
    if (empty($name) || empty($email) || empty($project)) {
        echo "Por favor, completá los campos obligatorios.";
        exit;
    }

    // Mensaje a enviar
    $mensaje = "
📩 Nuevo formulario recibido de Community Management:

🧑 Nombre: $name
🏢 Empresa: $company
📧 Email: $email
📞 Teléfono: $phone
📱 Plataformas seleccionadas: $platformsList
🧾 Proyecto: $project
💸 Presupuesto: $budget
";

    // Enviar email
    $destinatario = "ignaciosoraka@gmail.com";
    $asunto = "Formulario - Community Management";
    $cabeceras = "From: Suprads <noreply@tuweb.com>\r\n";

    if (mail($destinatario, $asunto, $mensaje, $cabeceras)) {
        echo "✅ ¡Formulario enviado con éxito!";
    } else {
        echo "❌ Hubo un error al enviar el formulario.";
    }
}
?>
