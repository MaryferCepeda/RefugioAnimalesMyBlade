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

    @auth
    <div class="cart-icon" onclick="toggleCart()">
        🛒
        <span class="cart-badge" id="cart-badge">0</span>
    </div>

    <div id="cart" class="cart-container" style="display: none;">
        <h3 style="margin-top: 0; color: #ff9800;">Carrito de Compras</h3>
        <div id="cart-items"></div>
        <div id="cart-total" class="cart-total">Total: $0.00</div>
        <div class="cart-actions">
            <div id="paypal-button-container"></div>
        </div>
    </div>
    @endauth

    <main>
        <div class="productos_contenedor">
            @foreach ($productos as $producto)
            <div class="tarjeta" data-id="{{ $producto->id }}" data-precio="{{ $producto->precio }}" data-nombre="{{ $producto->nombre }}">
                <img src="{{ asset($producto->imagen) }}" alt="Producto" class="imagen_producto"/>
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
        let cart = [];

        function addToCart(productId) {
            @auth
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
            @else
                alert("Para comprar, por favor inicie sesión.");
            @endauth
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

            updatePaypalButton(total);
        }

        function toggleCart() {
            const cartElement = document.getElementById('cart');
            cartElement.style.display = cartElement.style.display === 'none' ? 'block' : 'none';
        }

        // Cargar el SDK de PayPal solo una vez
        const script = document.createElement("script");
        script.src = "https://www.paypal.com/sdk/js?client-id=AZJNZBBo4Bp0loiWE3ctruV_s9zsMbB6mXjShdx6MYsiwC43M3gBtUrxqjFjeFQ42jzTZWIbaBpPqhSi&locale=es_ES&components=buttons,hosted-fields";
        script.async = true;
        script.onload = function () {
            initPayPalButton(0);
        };
        document.body.appendChild(script);

        function initPayPalButton(totalAmount) {
            const paypalContainer = document.getElementById('paypal-button-container');
            paypalContainer.innerHTML = ''; 

            paypal.Buttons({
                fundingSource: paypal.FUNDING.CARD,
                style: {
                    layout: 'vertical',
                    color: 'black',
                    shape: 'rect',
                    label: 'pay'
                },
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: totalAmount.toFixed(2)
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        alert("Pago completado por " + details.payer.name.given_name);
                        cart = [];
                        updateCartDisplay();
                    });
                }
            }).render("#paypal-button-container");
        }

        function updatePaypalButton(totalAmount) {
            initPayPalButton(totalAmount);
        }
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
</html>
