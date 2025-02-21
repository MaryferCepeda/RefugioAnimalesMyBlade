<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="{{ asset('css/Productos.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/responsive/Pagina_Inicial_resposive.css') }}">
  <link rel="stylesheet" href="{{ asset('css/btn_Accesibilidad.css') }}">
  <title>Peluditos | Tienda de Apoyo</title>
  
  <!-- Estilos para notificaciones -->
  <style>
    .notification {
      position: fixed;
      top: 20px;
      right: 20px;
      padding: 15px 20px;
      border-radius: 4px;
      z-index: 9999;
      min-width: 250px;
      display: none;
      font-size: 16px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    }
    .notification.success {
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }
    .notification.error {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }
    .notification.show {
      display: block;
    }
    .notification.hide {
      display: none;
    }
    .notification button {
      background: transparent;
      border: none;
      font-size: 20px;
      position: absolute;
      top: 5px;
      right: 10px;
      cursor: pointer;
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

  @auth
  <div class="cart-icon" onclick="toggleCart()">
    <span class="material-symbols-outlined">shopping_cart</span>
    <span class="cart-badge" id="cart-badge">0</span>
  </div>
  <div id="cart" class="cart-container" style="display: none;">
    <h3>Carrito de Compras</h3>
    <div id="cart-items"></div>
    <div id="cart-total" class="cart-total">Total: $0.00</div>
    <div class="cart-actions">
      <input type="hidden" id="donation-amount" value="0.00"> 
      <div id="paypal-button"></div>
    </div>
  </div>
  @endauth

  <div id="notification" class="notification">
    <p id="notification-message"></p>
    <button onclick="closeNotification()">×</button>
  </div>

  <main>
    <div class="productos_contenedor">
      @foreach ($productos as $producto)
      <div class="tarjeta" data-id="{{ $producto->id }}" data-precio="{{ $producto->precio }}" data-nombre="{{ $producto->nombre }}">
        <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}" class="imagen_producto" />
        <div class="producto-info">
          <h3 class="producto-nombre">{{ $producto->nombre }}</h3>
          <div class="precio">${{ number_format($producto->precio, 2) }}</div>
          <div class="descripcion">
            <p>{{ Str::limit($producto->descripcion, 100) }}</p>
          </div>
          <div class="cantidad">
            <button class="cantidad-btn" onclick="decrementQuantity({{ $producto->id }})">-</button>
            <input type="number" id="qty-{{ $producto->id }}" value="1" min="1" max="10" readonly />
            <button class="cantidad-btn" onclick="incrementQuantity({{ $producto->id }})">+</button>
          </div>
          <button class="añadir" onclick="addToCart({{ $producto->id }})">
            <span class="material-symbols-outlined">add_shopping_cart</span>
            Añadir al carrito
          </button>
        </div>
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
        showNotification('Producto añadido al carrito');
      @else
        showNotification('Para comprar, por favor inicie sesión', 'error');
      @endauth
    }

    function removeFromCart(productId) {
      cart = cart.filter(item => item.id !== productId);
      updateCartDisplay();
      showNotification('Producto eliminado del carrito', 'success');
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
            <div class="item-quantity">Cantidad: ${item.quantity}</div>
          </div>
          <div>
            <div class="item-price">$${(item.price * item.quantity).toFixed(2)}</div>
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

    function incrementQuantity(productId) {
      const input = document.getElementById(`qty-${productId}`);
      const currentValue = parseInt(input.value);
      if (currentValue < 10) {
        input.value = currentValue + 1;
      }
    }

    function decrementQuantity(productId) {
      const input = document.getElementById(`qty-${productId}`);
      const currentValue = parseInt(input.value);
      if (currentValue > 1) {
        input.value = currentValue - 1;
      }
    }

    function showNotification(message, type = 'success') {
      const notification = document.getElementById('notification');
      notification.style.display = 'block';
      const notificationMessage = document.getElementById('notification-message');
      notificationMessage.textContent = message;
      notification.className = `notification ${type}`;
      notification.classList.remove('hide');
      notification.classList.add('show');
      if (notification.timeoutId) {
        clearTimeout(notification.timeoutId);
      }
      notification.timeoutId = setTimeout(() => {
        closeNotification();
      }, 3000);
    }

    function closeNotification() {
      const notification = document.getElementById('notification');
      notification.classList.remove('show');
      notification.classList.add('hide');
      setTimeout(() => {
        notification.style.display = 'none';
        notification.classList.remove('hide');
      }, 500);
    }

    function renderPayPalButton() {
    const paypalButtonContainer = document.getElementById('paypal-button');
    paypalButtonContainer.innerHTML = '';
    window.paypal.Buttons({
      style: {
        layout: 'horizontal',
        size: 'large',
        shape: 'rect',
        height: 26  // Ajusta la altura permitida (valor entre 25 y 55)
      },
      fundingSource: window.paypal.FUNDING.CARD,
      createOrder: function(data, actions) {
        const amount = document.getElementById("donation-amount").value || "0.00";
        return actions.order.create({
          purchase_units: [{
            amount: { value: amount }
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
    }).render("#paypal-button").then(() => {
      // Escalamos el contenedor para agrandar el botón
      paypalButtonContainer.style.transform = "scale(1.1)";
      paypalButtonContainer.style.transformOrigin = "top left";
      // Ajustamos el ancho y la altura del contenedor si es necesario
      paypalButtonContainer.style.width = "90%";
      paypalButtonContainer.style.height = "auto";
    });
  }

    function updatePaypalButton(totalAmount) {
      document.getElementById("donation-amount").value = totalAmount.toFixed(2);
      const paypalButtonContainer = document.getElementById('paypal-button');
      paypalButtonContainer.innerHTML = "";
      if (totalAmount > 0) {
        renderPayPalButton();
      }
    }
    const script = document.createElement("script");
    script.src = "https://www.paypal.com/sdk/js?client-id=AZJNZBBo4Bp0loiWE3ctruV_s9zsMbB6mXjShdx6MYsiwC43M3gBtUrxqjFjeFQ42jzTZWIbaBpPqhSi&components=buttons,funding-eligibility&locale=es_ES";
    script.async = true;
    script.onload = function () {
      renderPayPalButton();
    };
    document.body.appendChild(script);

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
