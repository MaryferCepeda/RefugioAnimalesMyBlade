<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peluditos</title>
    <link rel="stylesheet" href="{{ asset('css/PaginaInicial.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive/Pagina_Inicial_resposive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/btn_Accesibilidad.css') }}">
</head>

<body>
    <div class="fondo">
        <div>
        <header>
                <div class="header-Izquierda">
                    <a href="/">
                        <img class="logo" src="/Imagenes/logo.png" alt="Logo de la página"/>
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
            
            <main class="fondo-negro animate">
                <section class="historia">
                    <div class="imagen-container">
                        <img class="mascota-imagen" src="/Imagenes/Gato_inicio.webp" alt="Imagen del gato Miau" />
                    </div>
                    <div class="descripcion-container">
                        <h2>La Historia de Miau</h2>
                        <p>
                            Miau era un pequeño gatito encontrado en las calles, solo y asustado. Un buen samaritano
                            lo llevó al refugio, donde recibió atención médica y mucha dedicación. Aunque estaba tímido
                            al principio, pronto comenzó a jugar y a confiar en las personas.
                        </p>
                        <p>
                            Un día, una familia lo vio y supo que Miau era el gatito perfecto para ellos. Ahora, Miau vive
                            feliz en su nuevo hogar, rodeado de amor y cuidado.
                        </p>
                        <p>
                            ¿Estás listo para darle una oportunidad?
                        </p>
                        <button class="btn-conocer">
                            <a href="/Donar">DONAR</a>
                        </button>
                    </div>
                </section>
            </main>

            <div class="Body2">
                <section class="intro animate">
                    <p class="Parrafos">
                        En <strong>Refugio Peluditos</strong>, nuestra misión es brindar una segunda oportunidad a los
                        animales que necesitan un hogar lleno de amor.
                    </p>
                    <ul>
                        <li> Rescatar a perros y gatos abandonados.</li>
                        <li> Cuidar de su salud y bienestar.</li>
                        <li> Encontrar familias amorosas que les ofrezcan un futuro lleno de felicidad.</li>
                    </ul>
                    <p class="Parrafos">
                        <strong>¡Adopta y transforma una vida para siempre!</strong> Aquí encontrarás a muchos amigos
                        peludos esperando ser parte de una familia. Ven a conocernos y únete a nuestra misión de amor.
                    </p>
                </section>

                <section class="impact animate">
                    <h2> Nuestro Impacto en Números </h2>
                    <p class="Parrafos"><strong>+950 vidas rescatadas.</strong></p>
                    <p class="Parrafos">
                        Muchos de ellos ya tienen un hogar lleno de amor. Otros nos enseñan diariamente la importancia
                        de la perseverancia y la gratitud. Algunos, aunque ya no están con nosotros, nos dejaron la
                        satisfacción de haberles mostrado la bondad humana.
                    </p>
                    <p class="Parrafos">Hacemos la diferencia en la vida de aquellos que el destino pone en nuestro
                        camino.</p>
                </section>

                <section class="problem animate">
                    <h2> El Problema que Enfrentamos</h2>
                    <p class="Parrafos">Miles de perros y gatos:</p>
                    <ul>
                        <li>Vagan solos por las calles de México, abandonados y en peligro.</li>
                        <li>Sufren de maltrato incluso en sus propios hogares.</li>
                    </ul>
                    <h3>¿Por qué ocurre esto?</h3>
                    <p class="Parrafos">
                        La falta de responsabilidad y educación de algunos dueños ha generado una crisis nacional que
                        afecta el bienestar animal, la salud pública y la sociedad en general.
                    </p>
                </section>

                <section class="solution animate">
                    <h2> Nuestra Solución y Compromiso</h2>
                    <p class="Parrafos">
                        En <strong>Refugio Peluditos</strong>, nos comprometemos a ser la voz de los que no pueden
                        hablar:
                    </p>
                    <ul>
                        <li>Rescatamos y rehabilitamos animales en situación vulnerable.</li>
                        <li>Promovemos la adopción responsable y educamos sobre el cuidado animal.</li>
                        <li>Abogamos por leyes más estrictas contra el abandono y maltrato.</li>
                        <li>Fomentamos un mundo donde cada animal viva con dignidad y respeto.</li>
                    </ul>
                </section>

                <section class="cta animate">
                    <h2> ¿Cómo Puedes Ayudar?</h2>
                    <ul>
                        <li><strong>Adopta:</strong> Dale un hogar a un peludo que lo necesita.</li>
                        <li><strong>Dona:</strong> Cada contribución nos permite salvar más vidas.</li>
                        <li><strong>Sé voluntario:</strong> Ayúdanos con tu tiempo y habilidades.</li>
                        <li><strong>Comparte:</strong> Difunde nuestra misión y llega a más corazones.</li>
                    </ul>
                    <p class="Parrafos"><strong>¡Únete a nuestra familia!</strong> Juntos podemos cambiar vidas y crear un
                        mundo más amable para nuestros amigos peludos.</p>
                </section>
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
                        <img src="/Imagenes/Githud.png" alt="GitHub" title="GitHub" />
                    </a>
                    <a href="https://facebook.com" target="_blank" rel="noopener noreferrer">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/2048px-2021_Facebook_icon.svg.png" alt="Facebook" title="Facebook" />
                    </a>
                    <a href="https://upload.wikimedia.org/wikipedia/commons/e/ef/Youtube_logo.png" target="_blank" rel="noopener noreferrer">
                        <img src="/Imagenes/youtube.png" alt="YouTube" title="YouTube" />
                    </a>
                </div>
            </footer>
        </div>
    </div>

    <script>
        function cerrarMensaje() {
            document.getElementById('mensaje').style.display = 'none';
        }

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
