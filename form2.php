<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos básicos
    $name     = $_POST["name"] ?? '';
    $company  = $_POST["company"] ?? '';
    $email    = $_POST["email"] ?? '';
    $phone    = $_POST["phone"] ?? '';
    $project  = $_POST["project"] ?? '';
    $budget   = $_POST["budget"] ?? '';

    // Validación simple
    if (empty($name) || empty($email) || empty($project)) {
        echo "Por favor, completá los campos obligatorios.";
        exit;
    }

    // Armar mensaje
    $mensaje = "
📩 Nuevo formulario recibido de Sitios Web, Ecommerce y Automatizaciones:

🧑 Nombre: $name
🏢 Empresa: $company
📧 Email: $email
📞 Teléfono: $phone
🧾 Proyecto: $project
💸 Presupuesto: $budget
";

    // Configuración de email
    $destinatario = "ignaciosoraka@gmail.com";
    $asunto = "Formulario - Sitios Web / Ecommerce / CRM";
    $cabeceras = "From: Suprads <noreply@tuweb.com>\r\n";

    // Enviar email
    if (mail($destinatario, $asunto, $mensaje, $cabeceras)) {
        echo "✅ ¡Formulario enviado con éxito!";
    } else {
        echo "❌ Hubo un error al enviar el formulario.";
    }
}
?>
