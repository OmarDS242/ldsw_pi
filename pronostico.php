<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Medios Digitales</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
        height: 100%;
        }
        .page-wrapper {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        }
        main {
        flex: 1;
        }
    </style>
</head>
<body>

<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Servicios de clima</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#galeria">Galería</a></li>
        <li class="nav-item"><a class="nav-link" href="#videos">Videos</a></li>
        <li class="nav-item"><a class="nav-link" href="#documentos">Documentos</a></li>
        <li class="nav-item"><a class="nav-link" href="#musica">Música</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php">Regresar</a></li>
      </ul>
    </div> -->
  </div>
</nav>

<!-- Hero (seccion visual principal de la pagina -->
<section class="bg-primary text-white text-center py-4">
  <div class="container">
    <h1>Bienvenidos a mi Centro de Medios Digitales</h1>
    <p class="lead">OpenWeather (antes conocido como OpenWeatherMap) es un servicio en línea que proporciona datos meteorológicos a nivel global, accesibles a través de una API (interfaz de programación de aplicaciones). Es muy utilizado por desarrolladores, empresas y organismos que necesitan acceder a información climática actualizada.</p>
  </div>
</section>

<!-- Pronostico del tiempo -->
<main class="container my-5">
    <div class="container text-center">
    <h1 class="mb-4">Pronóstico del Tiempo</h1>
    <input id="ciudadInput" type="text" class="form-control mb-3" placeholder="Ingresa una ciudad">
    <button onclick="obtenerClima()" class="btn btn-primary mb-3">Consultar clima</button>
    <a href="index.php" class="btn btn-secondary mb-3">Regresar a index</a>
        <div id="resultado" class="card p-6 d-none">
            <h3 id="ciudadNombre"></h3>
            <p id="descripcion"></p>
            <p id="temperatura"></p>
            <p id="pressure"></p>
            <p id="humedad"></p>
            <p id="wind"></p>
        </div>
    </div>
</main> 

    <!-- <section id="galeria" class="py-0">
    <div class="container text-center mt-5">
    <h1 class="mb-4">Pronóstico del Tiempo</h1>
    <input id="ciudadInput" type="text" class="form-control mb-3" placeholder="Ingresa una ciudad">
    <button onclick="obtenerClima()" class="btn btn-primary mb-3">Consultar clima</button>
    <a href="index.php" class="btn btn-secondary mb-3">Regresar a index</a>

    <div id="resultado" class="card p-6 d-none">
        <h3 id="ciudadNombre"></h3>
        <p id="descripcion"></p>
        <p id="temperatura"></p>
        <p id="pressure"></p>
        <p id="humedad"></p>
        <p id="wind"></p>
    </div>
    </div>
</section> -->


<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
  <div class="container">
    <p>© 2025 Mi Biblioteca Digital | Enlaces a plataformas en la nube</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  async function obtenerClima() {
    const ciudad = document.getElementById("ciudadInput").value;
    const apiKey = "4b71c0ed6c2a94c1f9a590126fc28e06"; // <Api key obtenida al registrarse en el servico
    const url = `https://api.openweathermap.org/data/2.5/weather?q=${ciudad}&appid=${apiKey}&units=metric&lang=es`;

    try {
      const respuesta = await fetch(url);
      if (!respuesta.ok) throw new Error("Ciudad no encontrada");
      const datos = await respuesta.json();

      document.getElementById("resultado").classList.remove("d-none");
      document.getElementById("ciudadNombre").textContent = `${datos.name}, ${datos.sys.country}`;
      document.getElementById("descripcion").textContent = `Clima: ${datos.weather[0].description}`;
      document.getElementById("temperatura").textContent = `Temperatura: ${datos.main.temp}°C`;
      document.getElementById("pressure").textContent = `Presión: ${datos.main.pressure}`;
      document.getElementById("humedad").textContent = `Humedad: ${datos.main.humidity}%`;
      document.getElementById("wind").textContent = `Velocidad del viento: ${datos.wind.speed * 3.6} kms/hora`;
    } catch (error) {
      alert("Error: " + error.message);
    }
  }
</script>

</body>
</html>
