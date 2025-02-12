document.addEventListener('DOMContentLoaded', () => {
    const botonAccesibilidad = document.getElementById('botonAccesibilidad');
    const panelAccesibilidad = document.getElementById('panelAccesibilidad');
    const tamanoFuente = document.getElementById('tamanoFuente');
    const htmlRoot = document.documentElement;

    const fontSizes = {
        '1': { class: 'fuente-pequena', size: '14px' },
        '2': { class: 'fuente-media', size: '16px' },
        '3': { class: 'fuente-grande', size: '18px' },
        '4': { class: 'fuente-mega-gigante', size: '28px' }
    };

    const savedSize = localStorage.getItem('tamanoFuente');
    if (savedSize && fontSizes[savedSize]) {
        applyFontSize(savedSize);
        tamanoFuente.value = savedSize;
    }

    botonAccesibilidad.addEventListener('click', (event) => {
        event.stopPropagation();
        panelAccesibilidad.classList.toggle('visible');
    });

    document.addEventListener('click', (event) => {
        if (!panelAccesibilidad.contains(event.target) && event.target !== botonAccesibilidad) {
            setTimeout(() => panelAccesibilidad.classList.remove('visible'), 100);
        }
    });

    tamanoFuente.addEventListener('input', function() {
        const selectedSize = this.value;
        if (fontSizes[selectedSize]) {
            applyFontSize(selectedSize);
            localStorage.setItem('tamanoFuente', selectedSize);
        }
    });

    function applyFontSize(size) {
        htmlRoot.className = fontSizes[size].class;
    }
});
