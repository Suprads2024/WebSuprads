<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Cargar las dependencias de PHPMailer
require './PHPMailer-master/src/Exception.php';
require './PHPMailer-master/src/PHPMailer.php';
require './PHPMailer-master/src/SMTP.php';


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
📩 Nuevo formulario recibido de Paid Media:

🧑 Nombre: $name
🏢 Empresa: $company
📧 Email: $email
📞 Teléfono: $phone
📱 Plataformas seleccionadas: $platformsList
🧾 Proyecto: $project
💸 Presupuesto: $budget
";

$mail = new PHPMailer(true);

    try {
    // Configuración SMTP
$mail->isSMTP();
$mail->Host       = 'mail.privateemail.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'contacto@suprads.com';
$mail->Password   = 'contactsuprads@'; // Asegurate que esta es la contraseña REAL del correo
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // ✅ Mejor usar constante
$mail->Port       = 465;

$mail->setFrom('contacto@suprads.com', 'Formulario Web');
$mail->addAddress('ignaciosoraka@gmail.com');

        // Contenido
        $mail->isHTML(false);
        $mail->Subject = 'Formulario desde el sitio';
        $mail->Body    = $mensaje;

        $mail->send();
        header("Location: gracias/index.html");
        exit;

    } catch (Exception $e) {
        echo "Error al enviar: {$mail->ErrorInfo}";
    }
}
?>