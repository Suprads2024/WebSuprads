document.querySelector('.mil-form').addEventListener('submit', function(event) {
    // Obtener todos los radio buttons de 'Tipo de Proyecto' y 'Presupuesto Estimado'
    const platforms = document.getElementsByName('platforms[]');
    const budget = document.getElementsByName('budget');
    
    let platformsSelected = false;
    let budgetSelected = false;

    // Verificar si algún radio button de plataformas ha sido seleccionado
    for (let i = 0; i < platforms.length; i++) {
        if (platforms[i].checked) {
            platformsSelected = true;
            break;
        }
    }

    // Verificar si algún radio button de presupuesto ha sido seleccionado
    for (let i = 0; i < budget.length; i++) {
        if (budget[i].checked) {
            budgetSelected = true;
            break;
        }
    }

    // Si no se ha seleccionado nada en plataformas o presupuesto, mostrar el mensaje de error
    if (!platformsSelected || !budgetSelected) {
        event.preventDefault(); // Evitar que el formulario se envíe
        let message = 'Debes seleccionar una opción en ';
        
        // Personalizar el mensaje dependiendo de lo que falta seleccionar
        if (!platformsSelected && !budgetSelected) {
            message += '"Tipo de Proyecto" y "Presupuesto Estimado"';
        } else if (!platformsSelected) {
            message += '"Tipo de Proyecto"';
        } else if (!budgetSelected) {
            message += '"Presupuesto Estimado"';
        }

        // Mostrar el mensaje de error
        const errorMessageElement = document.getElementById('error-message');
        errorMessageElement.style.display = 'block';
        errorMessageElement.innerHTML = `<p><strong>¡Atención!</strong> ${message}</p>`;
    }
});
