<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Clima Actual</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

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
