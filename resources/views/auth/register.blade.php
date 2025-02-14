<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Peluditos</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4f46e5;
            --secondary-color: #fbbf24;
            --text-color: #374151;
            --background-color: #f3f4f6;
        }
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
        }
        .background {
            background-image: url('/placeholder.svg?height=1080&width=1920');
            background-size: cover;
            background-position: center;
            height: 100%;
            position: relative;
            overflow: hidden;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .container {
            display: flex;
            height: 100%;
            position: relative;
            z-index: 1;
        }
        .logo-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }
        .logo-background {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('/placeholder.svg?height=800&width=600');
            background-size: cover;
            background-position: center;
            filter: brightness(0.3);
            z-index: -1;
        }
        .logo-content {
            position: relative;
            z-index: 1;
            text-align: center;
        }
        .logo {
            max-width: 250px;
            margin-bottom: 2rem;
        }
        .tagline {
            font-size: 1.5rem;
            color: #ffffff;
            text-align: center;
            margin-bottom: 2rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        .paw-print {
            font-size: 3rem;
            color: var(--secondary-color);
            margin: 0 0.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        .register-section {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(255, 255, 255, 0.9);
            clip-path: polygon(15% 0, 100% 0, 100% 100%, 0 100%);
            padding: 2rem;
        }
        .register-container {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 3rem;
            border-radius: 20px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .register-container h1 {
            text-align: center;
            margin-bottom: 2rem;
            color: var(--primary-color);
            font-weight: 600;
            font-size: 2rem;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-color);
            font-weight: 500;
        }
        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        .form-group input:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }
        .error {
            color: #ef4444;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }
        .btn-primary {
            background-color: var(--primary-color);
            color: #fff;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            width: 100%;
            transition: background-color 0.3s, transform 0.1s;
            font-weight: 600;
        }
        .btn-primary:hover {
            background-color: #4338ca;
            transform: translateY(-1px);
        }
        .btn-primary:active {
            transform: translateY(1px);
        }
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            color: var(--primary-color);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            text-decoration: none;
            font-size: 0.875rem;
            z-index: 2;
            transition: background-color 0.3s, color 0.3s;
            font-weight: 500;
            padding: 10px 20px 
        }
        .back-button img {
            height: 35px;
            width: 35px;
        }
        .login-link {
            text-align: center;
            margin-top: 1.5rem;
            color: var(--text-color);
        }
        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }
        .login-link a:hover {
            color: #4338ca;
        }
        .animal-decoration {
            position: absolute;
            bottom: -50px;
            right: -50px;
            font-size: 15rem;
            color: rgba(251, 191, 36, 0.1);
            transform: rotate(-15deg);
        }
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            .logo-section {
                padding: 2rem 1rem;
            }
            .register-section {
                clip-path: none;
                padding: 2rem 1rem;
            }
            .register-container {
                padding: 2rem;
            }
            .animal-decoration {
                font-size: 10rem;
                bottom: -30px;
                right: -30px;
            }
        }
    </style>
</head>
<body>
    <div class="background">
        <div class="overlay"></div>
        <a href="{{ url('/') }}" class="back-button"><img src="/Imagenes/Flecha de regreso.webp" alt="Regresar a pagina principal"></a>
        <div class="container">
            <div class="logo-section">
                <div class="logo-background"></div>
                <div class="logo-content">
                    <img src="/Imagenes/logo.png" alt="Peluditos Logo" class="logo">
                    <div class="tagline">
                        <span class="paw-print">🐾</span>
                        Donde cada peludo encuentra un hogar
                        <span class="paw-print">🐾</span>
                    </div>
                </div>
            </div>
            <div class="register-section">
                <div class="register-container">
                    <h1>Registro en Peluditos</h1>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                            @if ($errors->has('name'))
                                <span class="error">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Correo Electrónico</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                            @if ($errors->has('email'))
                                <span class="error">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input id="password" type="password" name="password" required autocomplete="new-password">
                            @if ($errors->has('password'))
                                <span class="error">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirmar Contraseña</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                            @if ($errors->has('password_confirmation'))
                                <span class="error">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn-primary">Registrarse</button>
                    </form>
                    <div class="login-link">
                        <p>¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="animal-decoration">🐶</div>
    </div>
</body>
</html>

