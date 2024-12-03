<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/Nosotros.css') }}">
    <title>Peluditos | Acerca de Nosotros</title>
</head>
<body>
    <div>
        <header>
            <div class="header-Izquierda">
                <a href="{{ url('/') }}">
                    <img class="logo" src="https://cdn-icons-png.flaticon.com/512/5904/5904059.png" alt="Logo de la página">
                </a>
                <h1>Refugio de Animales</h1>
            </div>
            <div class="header-Derecha">
                <a href="https://github.com/MaryferCepeda/RefugioAnimalesMyRe.git" target="_blank" rel="noopener noreferrer">
                    <img src="https://cdn-icons-png.flaticon.com/512/733/733553.png" alt="GitHub" title="GitHub">
                </a>
                <a href="https://facebook.com" target="_blank" rel="noopener noreferrer">
                    <img src="https://img.icons8.com/m_rounded/512/FFFFFF/facebook-new.png" alt="Facebook" title="Facebook">
                </a>
                <a href="https://youtube.com" target="_blank" rel="noopener noreferrer">
                    <img src="https://cdn-icons-png.flaticon.com/512/733/733646.png" alt="YouTube" title="YouTube">
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
                @if(!request()->is('nosotros'))
                    <a href="{{ url('/register') }}" title="Iniciar Sesión">Inicio de Sesión</a>
                @endif
            </nav>
        </header>

        <div class="Nosotros-Titulo animate">
            <h2>ACERCA DE NOSOTROS</h2>
        </div>

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

        <div class="Body2">
            <article class="Refugio-Historia animate">
                <img class="Imagen-Historia_Refugio" src="{{ asset('Imagenes/Historia-Refugio.jpeg') }}" alt="Historia del Refugio">
                <div class="Refugio-Contenido">
                    <h4>Historia de Nuestro Refugio</h4>
                    <p class="Historia_Refugio_P">
                        Peluditos nació gracias a Laura Gutiérrez, una amante de los animales...
                    </p>
                </div>
            </article>

            <aside class="RedesSociales animate">
                <h5>ACTIVIDAD DE REDES SOCIALES</h5>
                <div class="RedesSociales-iframeWrapper">
                    <div class="RedesSociales-iframeContainer uno">
                        <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FMundoPatitasOficial%2Fposts%2Fpfbid02S81G3QMnFTudTr9RZqEnQiA6MzbiM6rMLvdfVr8RkyPfHs5jndiBAj4fnGH8hVz2l&show_text=true&width=500" width="500" height="250" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                        <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FMundoPatitasOficial%2Fposts%2Fpfbid0kqfSY7SQmT2NsVGSG7FSQMbBDfgNjf39xzPEyG4RTkBx7UKtz5QaoRqAYrVQK8pMl&show_text=true&width=500" width="500" height="250" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                        <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FMundoPatitasOficial%2Fposts%2Fpfbid0eMDW1WsGg6rE498a9rvNBraUr3KcEMPTA9Pe5ziWbQnfySFf2Riqne4QBwEMjj5Yl&show_text=true&width=500" width="500" height="628" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    </div>
                </div>
            </aside>
        </div>

        <hr>
        <div class="Tecnologias animate">
            <h5>Tecnologías Usadas</h5>
            <ul class="Tecnologias-lista">
                <li><img src="{{ asset('Imagenes/laravel.png') }}" alt="Laravel"></li>
                <li><img src="https://blade-ui-kit.com/images/logo.svg" alt="Laravel Blade"></li>
            </ul>
        </div>

        <footer>
            <p>&copy; 2024 Peluditos Refugio de Mascotas. Todos los derechos reservados.</p>
        </footer>
    </div>

    <!-- Scripts -->
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
</body>
</html>
