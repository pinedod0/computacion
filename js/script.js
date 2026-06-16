document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('hardware-form');
    const consoleOutput = document.getElementById('console-output');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Evita que la página se recargue

        // Resetear la consola de mensajes
        consoleOutput.className = 'console-output hidden';
        consoleOutput.innerHTML = '';

        // Obtener valores de los campos y quitar espacios en blanco al inicio/final
        const nombre = document.getElementById('nombre').value.trim();
        const descripcion = document.getElementById('descripcion').value.trim();
        const precio = parseFloat(document.getElementById('precio').value);
        const cantidad = parseInt(document.getElementById('cantidad').value, 10);

        let errores = [];

        // 1. Validar campos vacíos
        if (!nombre) errores.push("ERROR: El campo NOMBRE no puede estar vacío.");
        if (!descripcion) errores.push("ERROR: El campo DESCRIPCIÓN no puede estar vacío.");
        if (isNaN(precio)) errores.push("ERROR: El PRECIO debe ser un número válido.");
        if (isNaN(cantidad)) errores.push("ERROR: La CANTIDAD debe ser un número válido.");

        // 2. Validar estructura de la tabla (Longitudes)
        if (nombre.length > 30) {
            errores.push(`ERROR: NOMBRE excede el límite (Actual: ${nombre.length}/30).`);
        }
        if (descripcion.length > 50) {
            errores.push(`ERROR: DESCRIPCIÓN excede el límite (Actual: ${descripcion.length}/50).`);
        }

        // 3. Validar reglas de negocio numéricas
        if (!isNaN(precio) && precio <= 0) {
            errores.push("ERROR_CRÍTICO: El PRECIO no puede ser 0 ni negativo.");
        }
        
        // Verifica que la cantidad no sea negativa ni cero (estrictamente mayor que 0)
        if (!isNaN(cantidad) && cantidad <= 0) {
            errores.push("ERROR_CRÍTICO: La CANTIDAD en stock no puede ser 0 ni negativa.");
        }

        // Mostrar resultados
        if (errores.length > 0) {
            // Mostrar errores
            consoleOutput.innerHTML = errores.join('<br>');
            consoleOutput.classList.remove('hidden');
        } else {
            // Si todo es correcto, simular envío exitoso
            consoleOutput.innerHTML = ">_ DATOS_VÁLIDOS: Inserción autorizada. Preparando envío al backend...";
            consoleOutput.classList.remove('hidden');
            consoleOutput.classList.add('success');
            
            // Aquí iría tu lógica fetch() o axios() para enviar los datos a tu backend PHP/Node
            /*
            fetch('tu-endpoint.php', {
                method: 'POST',
                body: JSON.stringify({ nombre, descripcion, precio, cantidad })
            }).then(...)
            */
           form.submit();
           
           // Limpiar formulario tras éxito (opcional)
           setTimeout(() => {
               form.reset();
               consoleOutput.classList.add('hidden');
           }, 3000);
        }
    });
});