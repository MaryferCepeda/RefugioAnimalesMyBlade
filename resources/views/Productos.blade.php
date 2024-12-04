<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=add_shopping_cart" />
    <link rel="stylesheet" href="{{ asset('css/Productos.css') }}">
    <title>Peluditos | Tienda de Apoyo</title>

</head>
<body>
    <header>
        <div class="header-Izquierda">
            <a href="/">
                <img class="logo" src="{{ asset('Imagenes/logo.png') }}" alt="Logo de la página">
            </a>
            <h1>Peluditos</h1>
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

    <div class="cart-icon" onclick="toggleCart()">
        🛒
        <span class="cart-badge" id="cart-badge">0</span>
    </div>

    <div id="cart" class="cart-container" style="display: none;">
        <h3 style="margin-top: 0; color: #ff9800;">Carrito de Compras</h3>
        <div id="cart-items"></div>
        <div id="cart-total" class="cart-total">Total: $0.00</div>
        <div class="cart-actions">
            <button class="btn-pagar" onclick="pagar()">Pagar</button>
        </div>
    </div>

    <main>
    <div class="productos_contenedor">
    @foreach ($productos as $producto)
        <div class="tarjeta" data-id="{{ $producto->id }}" data-precio="{{ $producto->precio }}" data-nombre="{{ $producto->nombre }}">
            <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Producto" class="imagen_producto"/>
            <div class="precio">${{ $producto->precio }}</div>
            <div class="cantidad">
                <label for="qty-{{ $producto->id }}">Cantidad:</label>
                <input type="number" id="qty-{{ $producto->id }}" value="1" min="1"/>
            </div>
            <div class="descripcion">
                <p>{{ $producto->descripcion }}</p>
            </div>
            <button class="añadir" onclick="addToCart({{ $producto->id }})">
                <span class="material-symbols-outlined">add_shopping_cart</span>
            </button>
        </div>
    @endforeach
</div>


            @foreach ($productos as $producto)
            <div class="tarjeta" data-id="{{ $producto['id'] }}" data-precio="{{ $producto['precio'] }}" data-nombre="{{ $producto['descripcion'][0] }}">
    <img src="{{ asset($producto['imgSrc']) }}" alt="Producto" class="imagen_producto"/>
    <div class="precio">${{ $producto['precio'] }}</div>
    <div class="cantidad">
        <label for="qty-{{ $producto['id'] }}">Cantidad:</label>
        <input type="number" id="qty-{{ $producto['id'] }}" value="1" min="1"/>
    </div>
    <div class="descripcion">
        <p>{{ $producto['descripcion'][0] }}</p>
    </div>
    <button class="añadir" onclick="addToCart({{ $producto['id'] }})">
        <span class="material-symbols-outlined">add_shopping_cart</span>
    </button>
</div>

    @endforeach
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Refugio de Mascotas. Todos los derechos reservados.</p>
        <div class="footer-social">
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
    </footer>

    <script>
        let cart = [];

        function addToCart(productId) {
            const product = document.querySelector(`.tarjeta[data-id="${productId}"]`);
            const quantity = parseInt(document.getElementById(`qty-${productId}`).value);
            const name = product.getAttribute('data-nombre');
            const price = parseFloat(product.getAttribute('data-precio'));

            const existingItem = cart.find(item => item.id === productId);

            if (existingItem) {
                existingItem.quantity += quantity;
            } else {
                cart.push({ id: productId, name, price, quantity });
            }

            updateCartDisplay();
        }

        function removeFromCart(productId) {
            cart = cart.filter(item => item.id !== productId);
            updateCartDisplay();
        }

        function updateCartDisplay() {
            const cartElement = document.getElementById('cart');
            const cartItemsElement = document.getElementById('cart-items');
            const cartTotalElement = document.getElementById('cart-total');
            const cartBadge = document.getElementById('cart-badge');

            cartItemsElement.innerHTML = '';
            let total = 0;
            let itemCount = 0;

            cart.forEach(item => {
                const itemElement = document.createElement('div');
                itemElement.className = 'cart-item';
                itemElement.innerHTML = `
                    <div>
                        <div>${item.name}</div>
                        <div style="font-size: 0.8em; color: #666;">Cantidad: ${item.quantity}</div>
                    </div>
                    <div>
                        <div>$${(item.price * item.quantity).toFixed(2)}</div>
                        <button class="btn-quitar" onclick="removeFromCart(${item.id})">Quitar</button>
                    </div>
                `;
                cartItemsElement.appendChild(itemElement);

                total += item.price * item.quantity;
                itemCount += item.quantity;
            });

            cartTotalElement.innerHTML = `<strong>Total:</strong> $${total.toFixed(2)}`;
            cartElement.style.display = cart.length > 0 ? 'block' : 'none';
            cartBadge.textContent = itemCount;
            cartBadge.style.display = itemCount > 0 ? 'block' : 'none';
        }

        function toggleCart() {
            const cartElement = document.getElementById('cart');
            cartElement.style.display = cartElement.style.display === 'none' ? 'block' : 'none';
        }

        function pagar() {
            alert('¡Gracias por tu compra!');
            cart = [];
            updateCartDisplay();
        }
        function actualizarProducto(id, nuevoPrecio) {
    fetch(`/productos/${id}/update`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ precio: nuevoPrecio })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Precio actualizado correctamente');
            location.reload(); // Recargar para reflejar cambios
        }
    });
}

    </script>
    
</body>
</html>

