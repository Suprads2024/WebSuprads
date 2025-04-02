<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos básicos
    $name     = $_POST["name"] ?? '';
    $company  = $_POST["company"] ?? '';
    $email    = $_POST["email"] ?? '';
    $phone    = $_POST["phone"] ?? '';
    $project  = $_POST["project"] ?? '';
    $budget   = $_POST["budget"] ?? '';

    // Tipo de proyecto seleccionado (radio)
    $projectType = $_POST["project_type"] ?? 'No especificado';

    // Validación simple
    if (empty($name) || empty($email) || empty($project)) {
        echo "Por favor, completá los campos obligatorios.";
        exit;
    }

    // Armar mensaje
    $mensaje = "
📩 Nuevo formulario recibido de Diseño Gráfico:

🧑 Nombre: $name
🏢 Empresa: $company
📧 Email: $email
📞 Teléfono: $phone
🎨 Tipo de Proyecto: $projectType
🧾 Proyecto: $project
💸 Presupuesto: $budget
";

    // Configuración de email
    $destinatario = "ignaciosoraka@gmail.com";
    $asunto = "Formulario - Diseño Gráfico";
    $cabeceras = "From: Suprads <noreply@tuweb.com>\r\n";

    // Enviar email
    if (mail($destinatario, $asunto, $mensaje, $cabeceras)) {
        echo "✅ ¡Formulario enviado con éxito!";
    } else {
        echo "❌ Hubo un error al enviar el formulario.";
    }
}
?>
