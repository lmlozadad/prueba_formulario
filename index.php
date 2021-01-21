<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Registro de Personas</title>

  <!-- Local -->
  <link href="rsc/css/style.css" rel="stylesheet" />
  <script src="rsc/js/functions.js" type="text/javascript"></script>

  <!-- Remote -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" type="text/javascript"></script>
</head>

<body>
  <div class="container" style="margin-top: 100px;">
    <h2>Formulario</h2>
    <br>
    <div id="alert" class="hidden" role="alert">
    </div>
    <form id="form" name="form" method="post" action="procesar.php">
      <div class="row">
        <div class="col">
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre (*):</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre" />
          </div>
          <div class="mb-3">
            <label for="apellido" class="form-label">Apellido (*):</label>
            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese su apellido" />
          </div>

          <div>
            <input type="submit" id="guardar" name="guardar" value="Guardar" />

            <div class="spinner-border hidden" role="status" style="height: 20px; width: 20px;">
              <span class="sr-only">Cargando...</span>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

  <script>
    $(document).ready(function(){
      $('#form').on('submit', function(e){
        e.preventDefault();
        validar();
      });
    });
  </script>
</body>
</html>