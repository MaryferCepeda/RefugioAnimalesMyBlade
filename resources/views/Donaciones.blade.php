<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peluditos | Gracias por apoyar</title>
    <link rel="stylesheet" href="{{ asset('css/Donaciones.css') }}">
</head>
<body>

    <!-- Advertencia -->
    <div id="advertencia" class="advertencia" style="display: block;">
        <p>PÁGINA PARA FINES PRÁCTICOS.</p>
        <button onclick="document.getElementById('advertencia').style.display = 'none'">Aceptar</button>
    </div>

    <header>
        <div class="header-Izquierda">
            <a href="{{ url('/') }}">
                <img class="logo" src="{{ asset('Imagenes/logo.png') }}" alt="Logo de la página" />
            </a>
            <h1>Peluditos</h1>
        </div>
        <div class="header-Derecha">
            <a href="https://github.com/MaryferCepeda/RefugioAnimalesMyRe.git" target="_blank" rel="noopener noreferrer">
                <img src="{{ asset('Imagenes/Githud.png') }}" alt="GitHub" title="GitHub" />
            </a>
            <a href="https://facebook.com" target="_blank" rel="noopener noreferrer">
                <img src="{{ asset('Imagenes/facebook.png') }}" alt="Facebook" title="Facebook" />
            </a>
            <a href="https://youtube.com" target="_blank" rel="noopener noreferrer">
                <img src="{{ asset('Imagenes/youtube.png') }}" alt="YouTube" title="YouTube" />
            </a>
        </div>
        <nav>
            <a href="{{ url('/') }}" title="Este es el menú principal">Inicio</a>
            <a href="{{ url('/Nosotros') }}" title="Conócenos">Nosotros</a>
            <div class="dropdown">
                <a href="#" class="dropbtn">Formas de Apoyo</a>
                <div class="dropdown-content">
                    <a href="{{ url('/Donar') }}">Donativos</a>
                    <a href="{{ url('/Productos') }}">Productos</a>
                </div>
            </div>
            <a href="{{ url('/Contactanos') }}" title="Contáctanos para cualquier aclaración">Contáctanos</a>
            @auth
                <a href="{{ route('logout') }}" title="Cerrar sesión">Cerrar sesión</a>
            @endauth
        </nav>
    </header>

    <main>
        <h2>Historias de Éxito</h2>
        <div class="carrusel">
            <!-- Aquí deberías pasar las historias desde el backend o manejarlas con JS -->
            <p>{{ $historia ?? 'Historia predeterminada' }}</p>
        </div>

        <div class="donation-container">
            <h1>Donar Dinero</h1>
            <form id="donation-form">
                <label for="donation-amount">Monto de la donación</label>
                <input
                    type="number"
                    id="donation-amount"
                    name="donation_amount"
                    placeholder="Ingresa el monto"
                    required
                />
                <button type="button" onclick="handleDonate()">Donar</button>
            </form>

            <!-- Renderizar el botón de PayPal -->
            <div id="paypal-button"></div>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Refugio de Mascotas. Todos los derechos reservados.</p>
    </footer>

    <script>
        // Función para manejar la donación
        function handleDonate() {
            const amount = document.getElementById("donation-amount").value;
            alert(`Donación de ${amount} recibida. ¡Gracias por tu apoyo!`);
        }

        // Cargar el SDK de PayPal
        const script = document.createElement("script");
        script.src = "https://www.paypal.com/sdk/js?client-id=AavTEYrO8tswLJP-xjZtNRCTtjAxdbt3RFHDXqfgdrtLRuAk1Ci5P502TGy4VGmP25uXQtwaiNV6_qsA&components=buttons&locale=es_ES";
        script.async = true;
        script.onload = function () {
            console.log("PayPal SDK cargado");
            if (window.paypal) {
                window.paypal.Buttons({
                    createOrder: function (data, actions) {
                        return actions.order.create({
                            purchase_units: [
                                {
                                    amount: {
                                        value: document.getElementById("donation-amount").value || "10.00",
                                    },
                                },
                            ],
                        });
                    },
                    onApprove: function (data, actions) {
                        return actions.order.capture().then(function (details) {
                            alert("Pago completado por " + details.payer.name.given_name);
                        });
                    },
                }).render("#paypal-button");
            }
        };

        // Agregar el script al body
        document.body.appendChild(script);
    </script>

</body>
</html>
