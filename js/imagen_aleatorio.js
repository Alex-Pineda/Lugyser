window.onload = function() {
    const imagenes = [
      "../../imagenes/finca1/interior.12.avif",
      "../../imagenes/finca1/finca.5.jpeg",
      "../../imagenes/finca1/interior.5.avif",
      "../../imagenes/finca1/interior.6.jpg"
    ];
  
    function cambiarImagenAleatoria() {
      const imagen = document.getElementById('imagen');
      const indiceAleatorio = Math.floor(Math.random() * imagenes.length);
      const nuevaImagen = new Image(); // Crea un nuevo objeto Image
  
      nuevaImagen.src = imagenes[indiceAleatorio];  // Asigna la nueva imagen
      nuevaImagen.onload = function() {  // Espera que la imagen se cargue
        imagen.src = nuevaImagen.src;   // Cambia la imagen solo después de que se haya cargado
      };
    }
  
    // Cambiar la imagen cada 3 segundos (3000 milisegundos)
    setInterval(cambiarImagenAleatoria, 3000);
  };
  