<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Correo de Prueba</title>
    <style>
        /* Estilo general */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        .email-container {
            max-width: 600px;
            margin: 40px auto;
            background: linear-gradient(135deg, #ffffff, #f3f3f3);
            border-radius: 10px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 2rem;
            font-weight: bold;
        }

        .content {
            padding: 20px 30px;
        }

        .content p {
            font-size: 1rem;
            line-height: 1.8;
            margin: 10px 0;
        }

        .content .highlight {
            font-weight: bold;
            color: #ff7e5f;
        }


        .footer {
            text-align: center;
            padding: 10px 20px;
            font-size: 0.8rem;
            background-color: #f1f1f1;
            color: #666;
            border-top: 1px solid #e0e0e0;
        }

        .footer a {
            color: #ff7e5f;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>Contacto</h1>
        </div>

        <!-- Content -->
        <div class="content">
            <p><strong>Correo enviado desde:</strong> <span class="highlight">{{ $email }}</span></p>
            <p><strong>Asunto:</strong> <span class="highlight">{{ $asunto }}</span></p>
            <p><strong>Mensaje:</strong></p>
            <p>{{ $mensaje }}</p>

          
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Este correo fue generado automáticamente. Si tienes preguntas, visita nuestro <a href="#">centro de ayuda</a>.</p>
        </div>
    </div>
</body>
</html>