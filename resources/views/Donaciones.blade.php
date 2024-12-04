<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peluditos | Gracias por apoyar</title>
    <link rel="stylesheet" href="{{ asset('css/Donaciones.css') }}">
    <style>
        /* Estilo para mantener el footer abajo */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        main {
            flex: 1; /* Toma todo el espacio disponible */
            padding: 20px;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: relative;
            width: 100%;
        }

        .carrusel {
            font-size: 1.2em;
            text-align: center;
            padding: 20px;
            background-color: #f3f3f3;
            border-radius: 10px;
            margin: 30px auto;
            max-width: 800px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #fff;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

    <header>
        <div class="header-Izquierda">
            <a href="/">
                <img class="logo" src="/Imagenes/logo.png" alt="Logo de la página" />
            </a>
            <h1>Peluditos</h1>
        </div>

        <nav>
            <a href="/" title="Este es el menu principal">Inicio</a>
            <a href="/Nosotros" title="Conócenos">Nosotros</a>
            <div class="abajo">
                <a href="#" class="dropbtn">Formas de Apoyoㅤ⧪</a>
                <div class="abajo-contenido">
                    <a href="/Donar">Donativos</a>
                    <a href="/Productos">Productos</a>
                </div>
            </div>
            <a href="/Contactanos" title="Contáctanos para cualquier aclaración">Contáctanos</a>
            @guest
            <a href="login" title="Iniciar Sesión">Inicio de Sesión</a>
            @endguest
            @auth
            <div class="dropdown">
                <img src="https://m.media-amazon.com/images/G/01/CST/Prism/Avatars/img_profile_avatar_animals_panda_circ.png" alt="Avatar" class="avatar" />
                <div class="dropdown-content">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Cerrar Sesión
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
            @endauth
        </nav>
    </header>

    <main>
        <h2 style="text-align: center; margin-top: 30px;">Historias de Éxito</h2>
        <div class="carrusel">
            <p id="historia-texto"></p>
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
            </form>
            <div id="paypal-button"></div>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Refugio de Mascotas. Todos los derechos reservados.</p>
        <div class="header-Derecha">
            <a href="https://github.com/MaryferCepeda/RefugioAnimalesMyBlade.git" target="_blank" rel="noopener noreferrer">
                <img src="/Imagenes/Githud.png" alt="GitHub" title="GitHub" />
            </a>
            <a href="https://facebook.com" target="_blank" rel="noopener noreferrer">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/2048px-2021_Facebook_icon.svg.png" alt="Facebook" title="Facebook" />
            </a>
            <a href="https://youtube.com" target="_blank" rel="noopener noreferrer">
                <img src="https://upload.wikimedia.org/wikipedia/commons/e/ef/Youtube_logo.png" alt="YouTube" title="YouTube" />
            </a>
        </div>
    </footer>

    <script>
        const script = document.createElement("script");
        script.src = "https://www.paypal.com/sdk/js?client-id=AZJNZBBo4Bp0loiWE3ctruV_s9zsMbB6mXjShdx6MYsiwC43M3gBtUrxqjFjeFQ42jzTZWIbaBpPqhSi&components=buttons,funding-eligibility&locale=es_ES";
        script.async = true;
        script.onload = function () {
            window.paypal.Buttons({
                fundingSource: window.paypal.FUNDING.CARD,
                createOrder: function (data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: { value: document.getElementById("donation-amount").value || "10.00" }
                        }]
                    });
                },
                onApprove: function (data, actions) {
                    return actions.order.capture().then(function (details) {
                        alert("Pago completado por " + details.payer.name.given_name);
                    });
                }
            }).render("#paypal-button");
        };
        document.body.appendChild(script);

        const historias = [
            "Luna fue rescatada de las calles y ahora vive feliz con su nueva familia.",
            "Max superó su enfermedad gracias a la ayuda del refugio y encontró un hogar amoroso.",
            "Toby, un perrito abandonado, se convirtió en el mejor amigo de una familia local.",
            "Mimi, una gatita tímida, recuperó su confianza y fue adoptada por una pareja maravillosa."
        ];

        let historiaIndex = 0;

        function mostrarSiguienteHistoria() {
            const historiaTexto = document.getElementById("historia-texto");
            historiaTexto.textContent = historias[historiaIndex];
            historiaIndex = (historiaIndex + 1) % historias.length;
        }

        setInterval(mostrarSiguienteHistoria, 5000);
        mostrarSiguienteHistoria();
    </script>
</body>
</html>
