<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peluditos | Gracias por apoyar</title>
    <link rel="stylesheet" href="{{ asset('css/Donaciones.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive/Pagina_Inicial_resposive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/btn_Accesibilidad.css') }}">
</head>
<body>
    <header>
        <div class="header-Izquierda">
            <a href="/">
                <img class="logo" src="/Imagenes/logo.png" alt="Logo de la página" />
            </a>
            <h1>Peluditos</h1>
            <div class="menu-hamburguesa">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
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
        <div class="content-wrapper">
            <section class="historias-donacion">
                <h2>Historias de Éxito</h2>
                <div class="carrusel-container">
                    <div class="carrusel">
                        <div class="historia">
                            <img src="/Imagenes/perro1.jpg" alt="Luna" class="historia-imagen">
                            <p id="historia-texto"></p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="donation-container">
                <h2>Donar Dinero</h2>
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
            </section>
        </div>
    </main>
    <button id="botonAccesibilidad" class="boton-accesibilidad" aria-label="Opciones de accesibilidad">
            <img src="/Imagenes/accessibilidad.png" alt="Icono de accesibilidad" width="30" height="30">
        </button>

        <div id="panelAccesibilidad" class="panel-accesibilidad">
            <h2>Opciones de Accesibilidad</h2>
            <label for="tamanoFuente">Tamaño de letra:</label>
            <label>
            <label>
            <label>
            <input type="range" id="tamanoFuente" min="1" max="4" step="1" value="2">
                <div class="etiquetas-tamano-fuente">
                    <span>Pequeña</span>
                    <span>Media</span>
                    <span>Grande</span>
                    <span>Mega</span>
                </div>
            </div>
        </div>
    <footer>
        <div class="footer-content">
            <p>&copy; 2024 Refugio de Mascotas. Todos los derechos reservados.</p>
            <div class="social-links">
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
            { texto: "Luna fue rescatada de las calles y ahora vive feliz con su nueva familia.", imagen: "/Imagenes/Mascotas/Gato1.webp" },
            { texto: "Max superó su enfermedad gracias a la ayuda del refugio y encontró un hogar amoroso.", imagen: "/Imagenes/Mascotas/perro1.jpeg" },
            { texto: "Toby, un perrito abandonado, se convirtió en el mejor amigo de una familia local.", imagen: "/Imagenes/Mascotas/perro2.webp" },
            { texto: "Mimi, una gatita tímida, recuperó su confianza y fue adoptada por una pareja maravillosa.", imagen: "/Imagenes/Mascotas/Gato2.webp" }
        ];

        let historiaIndex = 0;

        function mostrarSiguienteHistoria() {
            const historiaTexto = document.getElementById("historia-texto");
            const historiaImagen = document.querySelector(".historia-imagen");
            const historia = historias[historiaIndex];
            
            historiaTexto.textContent = historia.texto;
            historiaImagen.src = historia.imagen;
            historiaImagen.alt = `Imagen de ${historia.texto.split(' ')[0]}`;
            
            historiaIndex = (historiaIndex + 1) % historias.length;
        }

        setInterval(mostrarSiguienteHistoria, 5000);
        mostrarSiguienteHistoria();


        document.addEventListener('DOMContentLoaded', function() {
            const menuHamburguesa = document.querySelector('.menu-hamburguesa');
            const nav = document.querySelector('nav');

            menuHamburguesa.addEventListener('click', function() {
                menuHamburguesa.classList.toggle('activo');
                nav.classList.toggle('activo');
            });
            document.querySelectorAll('nav a').forEach(enlace => {
                enlace.addEventListener('click', () => {
                    menuHamburguesa.classList.remove('activo');
                    nav.classList.remove('activo');
                });
            });
            const desplegables = document.querySelectorAll('.abajo');
            desplegables.forEach(desplegable => {
                desplegable.addEventListener('click', function(e) {
                    if (window.innerWidth <= 768) {
                        e.preventDefault();
                        this.classList.toggle('activo');
                    }
                });
            });
        });


    </script>
     <style>  
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
      background-color: #ffff;
    }
  </style>


<script src="{{ asset('js/btn_Accesibilidad.js') }}"></script>
</body>
</html>

