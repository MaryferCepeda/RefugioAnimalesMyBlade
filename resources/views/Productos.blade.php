<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peluditos | Tienda de Apoyo</title>
    <link rel="stylesheet" href="{{ asset('css/Productos.css') }}">
</head>
<body>
    <header>
        <div class="header-Izquierda">
            <a href="/">
                <img class="logo" src="{{ asset('Imagenes/logo.png') }}" alt="Logo de la página">
            </a>
            <h1>Refugio de Animales</h1>
        </div>
        <div class="header-Derecha">
            <a href="https://github.com/MaryferCepeda/RefugioAnimalesMyRe.git" target="_blank" rel="noopener noreferrer">
                <img src="{{ asset('Imagenes/Githud.png') }}" alt="GitHub" title="GitHub">
            </a>
            <a href="https://facebook.com" target="_blank" rel="noopener noreferrer">
                <img src="{{ asset('Imagenes/facebook.png') }}" alt="Facebook" title="Facebook">
            </a>
            <a href="https://youtube.com" target="_blank" rel="noopener noreferrer">
                <img src="{{ asset('Imagenes/youtube.png') }}" alt="YouTube" title="YouTube">
            </a>
        </div>
        <nav>
            <a href="/" title="Este es el menu principal">Inicio</a>
            <a href="/Nosotros" title="Conócenos">Nosotros</a>
            <div class="dropdown">
                <a href="#" class="dropbtn">Formas de Apoyo</a>
                <div class="dropdown-content">
                    <a href="/Donar">Donativos</a>
                    <a href="/Productos">Productos</a>
                </div>
            </div>
            <a href="/Contactanos" title="Contáctanos para cualquier aclaración">Contáctanos</a>
            <a href="register" title="Iniciar Sesión">Inicio de Sesión</a>
        </nav>
    </header>

    <main>
        <div class="productos_contenedor">
            @php
                $productos = [
                    ['imgSrc' => '/Imagenes/productos/comida perro.webp', 'precio' => '$50.00', 'descripcion' => ['Comida para perro de alta calidad']],
                    ['imgSrc' => '/Imagenes/productos/Juguete interactivo para mascotas.jpg', 'precio' => '$150.00', 'descripcion' => ['Juguete interactivo para mascotas']],
                    ['imgSrc' => '/Imagenes/productos/Rascador Gatos.jpg', 'precio' => '$260.00', 'descripcion' => ['Rascador para gatos']],
                    ['imgSrc' => '/Imagenes/productos/Cama perro.webp', 'precio' => '$120.00', 'descripcion' => ['Cama para perros']],
                    ['imgSrc' => '/Imagenes/productos/hueso goma.webp', 'precio' => '$45.00', 'descripcion' => ['Hueso de goma para masticar']],
                    ['imgSrc' => '/Imagenes/productos/Comedor Gatos.26.56PM_1200x1200.webp', 'precio' => '$200.00', 'descripcion' => ['Comedero para gatos']],
                    ['imgSrc' => '/Imagenes/productos/Correa para perros.webp', 'precio' => '$1.00', 'descripcion' => ['Correa para perros']],
                    ['imgSrc' => '/Imagenes/productos/Peluche Gato.81cf211c767a487f2ca938fcee5d3703.webp', 'precio' => '$50.00', 'descripcion' => ['Juguete de peluche para gatos']],
                    ['imgSrc' => '/Imagenes/productos/cama Ortopedica Perros.jpeg', 'precio' => '$450.00', 'descripcion' => ['Cama ortopédica para perros']],
                    ['imgSrc' => '/Imagenes/productos/Arenero Gatos.webp', 'precio' => '$75.00', 'descripcion' => ['Arenero para gatos']],
                    ['imgSrc' => '/Imagenes/productos/manta perros.jpeg', 'precio' => '$24.00', 'descripcion' => ['Manta suave para perros']],
                    ['imgSrc' => '/Imagenes/productos/jaula perros.jpeg', 'precio' => '$122.00', 'descripcion' => ['Cage para perros pequeños']],
                    ['imgSrc' => '/Imagenes/productos/cama gatos.jpeg', 'precio' => '$130.00', 'descripcion' => ['Cama para gatos']],
                    ['imgSrc' => '/Imagenes/productos/plato perro.jpeg', 'precio' => '$30.00', 'descripcion' => ['Plato para perros']],
                ];
            @endphp

            @foreach ($productos as $producto)
                <div class="tarjeta">
                    <img src="{{ $producto['imgSrc'] }}" alt="Producto" class="imagen_producto"/>
                    <div class="precio">{{ $producto['precio'] }}</div>
                    <div class="cantidad">
                        <label for="qty">Cantidad:</label>
                        <input type="number" id="qty" value="1" min="1"/>
                    </div>
                    <div class="descripcion">
                        @foreach ($producto['descripcion'] as $desc)
                            <p>{{ $desc }}</p>
                        @endforeach
                    </div>
                    <button class="añadir">
                        <span class="material-symbols-outlined">add_shopping_cart</span>
                    </button>
                </div>
            @endforeach
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Refugio de Mascotas. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
