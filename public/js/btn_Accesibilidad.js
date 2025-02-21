document.addEventListener('DOMContentLoaded', () => {
    const botonAccesibilidad = document.getElementById('botonAccesibilidad');
    const panelAccesibilidad = document.getElementById('panelAccesibilidad');
    const tamanoFuente = document.getElementById('tamanoFuente');
    const htmlRoot = document.documentElement;

    // Definir tamaños de fuente relativos
    const fontSizes = {
        '1': '90%',   // Más pequeño
        '2': '100%',  // Tamaño base
        '3': '110%',  // Un poco más grande
        '4': '120%'   // Aún más grande
    };

    // Cargar tamaño guardado en localStorage
    const savedSize = localStorage.getItem('tamanoFuente');
    if (savedSize && fontSizes[savedSize]) {
        applyFontSize(savedSize);
        tamanoFuente.value = savedSize;
    }

    // Mostrar/ocultar el panel de accesibilidad
    botonAccesibilidad.addEventListener('click', (event) => {
        event.stopPropagation();
        panelAccesibilidad.classList.toggle('visible');
    });

    // Ocultar el panel al hacer clic fuera de él
    document.addEventListener('click', (event) => {
        if (!panelAccesibilidad.contains(event.target) && event.target !== botonAccesibilidad) {
            setTimeout(() => panelAccesibilidad.classList.remove('visible'), 100);
        }
    });

    // Cambiar tamaño de fuente cuando el usuario seleccione una opción
    tamanoFuente.addEventListener('input', function() {
        const selectedSize = this.value;
        if (fontSizes[selectedSize]) {
            applyFontSize(selectedSize);
            localStorage.setItem('tamanoFuente', selectedSize);
        }
    });

    function applyFontSize(size) {
        // Actualiza el tamaño de fuente del elemento raíz
        htmlRoot.style.fontSize = fontSizes[size];
    }
});
