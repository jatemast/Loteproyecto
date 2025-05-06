<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LOTE - Liquidación por Ordenes de Trabajo Eléctrico</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #0ea5e9, #1e40af);
            background-attachment: fixed;
            color: #fff;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 2rem;
        }

        .top-links {
            text-align: right;
            margin-bottom: 2rem;
        }

        .top-links a {
            margin-left: 1rem;
            font-weight: 600;
            color: #cfe9ff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .top-links a:hover {
            color: #fff;
        }

        .hero {
            text-align: center;
            margin-bottom: 4rem;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            text-shadow: 0 0 10px rgba(245, 158, 11, 0.8);
            animation: pulse 3s infinite;
        }

        .hero p {
            font-size: 1.25rem;
            color: #dbeafe;
        }

        @keyframes pulse {
            0%, 100% { text-shadow: 0 0 10px #f59e0b; }
            50% { text-shadow: 0 0 20px #f59e0b; }
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        }

        .feature-card {
            background: linear-gradient(to bottom right, #ffffff, #f9fafb);
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 10px 25px rgba(0, 191, 255, 0.3);
            color: #1e293b;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 35px rgba(0, 191, 255, 0.5);
        }

        .feature-card svg {
            width: 40px;
            height: 40px;
            stroke: #2563eb;
            margin-bottom: 1rem;
        }

        .feature-card h2 {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .feature-card p {
            font-size: 0.95rem;
            color: #334155;
        }

        .cta {
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 1rem;
            padding: 2rem;
        }

        .cta h2 {
            font-size: 2rem;
            font-weight: 700;
            color: #93c5fd;
        }

        .cta p {
            color: #dbeafe;
            margin-top: 1rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            color: white;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 9999px;
            box-shadow: 0 8px 15px rgba(59, 130, 246, 0.3);
            backdrop-filter: blur(4px);
            transition: all 0.3s ease;
            margin-top: 1.5rem;
            display: inline-block;
            text-decoration: none;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #1d4ed8, #2563eb);
            transform: translateY(-2px);
        }

        .footer {
            text-align: center;
            margin-top: 4rem;
            font-size: 0.875rem;
            color: #cbd5e1;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="top-links">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Iniciar sesión</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Registrarse</a>
                    @endif
                @endauth
            @endif
        </div>

        <div class="hero">
            <h1>⚡ LOTE</h1>
            <p>Liquidación por Órdenes de Trabajo Eléctrico</p>
        </div>

        <div class="features">
            <div class="feature-card">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25"/>
                </svg>
                <h2>Gestión de Órdenes</h2>
                <p>Administra órdenes de trabajo eléctrico de forma sencilla y centralizada.</p>
            </div>

            <div class="feature-card">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3.75 4.5v.75A60.09 60.09 0 0119.5 4.5h.75M3.75 4.5A3 3 0 00.75 7.5v11.25a3 3 0 003 3h15a3 3 0 003-3V7.5a3 3 0 00-3-3H3.75z"/>
                </svg>
                <h2>Liquidación Eficiente</h2>
                <p>Calcula automáticamente los costos con precisión y sin errores.</p>
            </div>

            <div class="feature-card">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16.5 7.605a12.061 12.061 0 00-4.352-1.457L10 4l-3 3 .75 9H19.5V7.5z"/>
                </svg>
                <h2>Reportes Detallados</h2>
                <p>Genera informes útiles para tomar decisiones basadas en datos reales.</p>
            </div>

            <div class="feature-card">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M7.5 8.25h9m-9 3H12M2.25 6.741v6.018c0 1.6 1.123 2.994 2.707 3.227l.5 1.5H18.5l.5-1.5c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741z"/>
                </svg>
                <h2>Comunicación Integrada</h2>
                <p>Comparte actualizaciones al instante entre tus equipos de trabajo.</p>
            </div>
        </div>

        <div class="cta">
            <h2>¿Por qué elegir LOTE?</h2>
            <p>Es el sistema integral para empresas eléctricas que quieren eficiencia y control total.</p>

            @guest
                <a href="{{ route('register') }}" class="btn-primary">Registrarse Ahora</a><br>
                <a href="{{ route('login') }}" style="color:#93c5fd; margin-top: 1rem; display:inline-block;">Ya tengo una cuenta</a>
            @else
                <a href="{{ url('/dashboard') }}" class="btn-primary">Ir al Dashboard</a>
            @endguest
        </div>

        <div class="footer">
            © {{ date('Y') }} LOTE - Todos los derechos reservados.
        </div>
    </div>
</body>
</html>
