<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refugio de Animales</title>
    <link rel="stylesheet" href="{{ asset('css/Contactanos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive/Pagina_Inicial_resposive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/btn_Accesibilidad.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
</head>
<body>
    <header>
        <div class="header-Izquierda">
            <a href="/">
                <img
                    class="logo"
                    src="https://cdn-icons-png.flaticon.com/512/5904/5904059.png"
                    alt="Logo de la página"
                />
            </a>
            <h1>Peluditos</h1>
            <div class="menu-hamburguesa">
                <div></div>
                <div></div>
                <div></div>
        </div>
        
        <nav>
            <a href="/" title="Este es el menú principal">Inicio</a>
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
            <a href="register" title="Iniciar Sesión">Inicio de Sesión</a>
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

    <div>
        <form action="{{route('enviarcorreo')}}" method="POST" class="vibrant-form">
            @csrf
            <div class="arriba">
                <h2 class="form-title">¡Contáctanos!</h2>
                <p class="form-description">Completa el formulario y te responderemos lo antes posible</p>
            </div>
            
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre completo</label>
                <input type="text" name="nombre" class="form-input" id="nombre" placeholder="Tu nombre completo">
            </div>
            <div class="form-group">
                <label for="asunto" class="form-label">Asunto</label>
                <input type="text" name="asunto" class="form-input" id="asunto" placeholder="El asunto del mensaje">
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" name="email" class="form-input" id="email" placeholder="ejemplo@correo.com">
            </div>
            <div class="form-group">
                <label for="mensaje" class="form-label">Mensaje</label>
                <input name="mensaje" id="mensaje" class="form-textarea" rows="4" placeholder="Escribe tu mensaje aquí"></input>
            </div>
            <div class="form-group">
                <button type="submit" class="form-button">Enviar Mensaje</button>
            </div>
        </form>
        
        <h1 class="encuentranos">¡Encuentranos aqui!</h1>
        <div class="caja mapa">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1881.8710706207798!2d-99.0529122!3d19.3803148!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1fd0614558e4b%3A0x3760847a107a0b9f!2sInstituto%20Tecnol%C3%B3gico%20de%20Iztapalapa!5e0!3m2!1sen!2smx!4v1732593902123!5m2!1sen!2smx"
                width="900" height="300" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
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
        <p>&copy; <span>2024 Peluditos Refugio de Mascotas.</span> Todos los derechos reservados.</p>
        <div class="header-Derecha">
            <a href="https://github.com/MaryferCepeda/RefugioAnimalesMyBlade.git" target="_blank" rel="noopener noreferrer">
                <img
                    src="https://cdn-icons-png.flaticon.com/512/733/733553.png"
                    alt="GitHub"
                    title="GitHub"
                />
            </a>
            <a href="https://facebook.com" target="_blank" rel="noopener noreferrer">
                <img
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/2048px-2021_Facebook_icon.svg.png"
                    alt="Facebook"
                    title="Facebook"
                />
            </a>
            <a href="https://youtube.com" target="_blank" rel="noopener noreferrer">
                <img
                    src="https://upload.wikimedia.org/wikipedia/commons/e/ef/Youtube_logo.png"
                    alt="YouTube"
                    title="YouTube"
                />
            </a>
        </div>
    </footer>
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
