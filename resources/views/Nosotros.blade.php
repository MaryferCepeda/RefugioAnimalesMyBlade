<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/Nosotros.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive/Pagina_Inicial_resposive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/btn_Accesibilidad.css') }}">
    <title>Peluditos | Acerca de Nosotros</title>
</head>
<body>
    <div>
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
                    @auth
                        @if(Auth::user()->role === 'admin')
                        <a href="{{ url('/users')  }}">
                                Administrador
                            </a>
                        @endif
                    @endauth
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
        <article class="Refugio-Historia animate">
            <img class="Imagen-Historia_Refugio" src="{{ asset('Imagenes/Historia-Refugio.jpeg') }}" alt="Historia del Refugio">
            <div class="Refugio-Contenido">
                <h2>Historia de Nuestro Refugio</h2>
                <p class="Historia_Refugio_P">
                    Peluditos Refugio de Mascotas nació del sueño de Laura Gutiérrez, quien, desde pequeña, sintió un amor profundo por los animales. Con el tiempo, Laura comenzó a rescatar animales abandonados, pero pronto se dio cuenta de la necesidad de un lugar seguro para ellos. Decidió entonces crear un refugio, un espacio donde los animales pudieran encontrar protección y una nueva oportunidad.<br><br>
                    Con esfuerzo y dedicación, Laura y un pequeño grupo de voluntarios transformaron una propiedad en un refugio lleno de vida. Además de ofrecer atención y cuidados, implementaron programas de adopción responsable y actividades para sensibilizar a la comunidad sobre el bienestar animal.<br><br>
                    Hoy, Peluditos es un refugio que sigue creciendo, ofreciendo a cientos de animales un hogar lleno de amor. Cada historia de éxito nos motiva a seguir adelante, cumpliendo nuestra misión de rescatar, rehabilitar y encontrar un futuro mejor para los animales. <br>
                </p>
            </div>
        </article>

        <main class="Nosotros">
            <div class="Vision animate">
                <h4>VISIÓN</h4>
                <p class="Vision-P">
                    Ser un referente en la protección y cuidado de los animales, creando una sociedad más consciente y solidaria con los seres vivos.
                </p>
            </div>

            <div class="Mision animate">
                <h4>MISIÓN</h4>
                <p class="Mision-P">
                    Rescatar, rehabilitar y encontrar hogares amorosos para animales en situación de vulnerabilidad, fomentando la adopción responsable y la educación sobre el respeto animal.
                </p>
            </div>
        </main>

        <hr>
        <div class="Tecnologias animate">
            <h5>Tecnologías Usadas</h5>
            <ul class="Tecnologias-lista">
                <li><img src='Imagenes/laravel.png' alt="Laravel"></li>
                <li><img src='https://blade-ui-kit.com/images/logo.svg' alt="Laravel Blade"></li>
            </ul>
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
            <p>&copy; 2024 Peluditos Refugio de Mascotas. Todos los derechos reservados.</p>
            <div class="header-Derecha">
                <a href="https://github.com/MaryferCepeda/RefugioAnimalesMyBlade.git" target="_blank" rel="noopener noreferrer">
                    <img src="https://cdn-icons-png.flaticon.com/512/733/733553.png" alt="GitHub" title="GitHub">
                </a>
                <a href="https://facebook.com" target="_blank" rel="noopener noreferrer">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/2048px-2021_Facebook_icon.svg.png" alt="Facebook" title="Facebook">
                </a>
                <a href="https://youtube.com" target="_blank" rel="noopener noreferrer">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/e/ef/Youtube_logo.png" alt="YouTube" title="YouTube">
                </a>
            </div>
        </footer>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            });
            document.querySelectorAll('.animate').forEach(element => observer.observe(element));
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
</body>

<script src="{{ asset('js/btn_Accesibilidad.js') }}"></script>  
</html>
