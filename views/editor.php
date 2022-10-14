<!DOCTYPE html>
<html>
<head>
  <script src="https://cdn.tiny.cloud/1/v9uu6eeuhjfqh3gx7g6kt9jv6xlilji3dw2ncvir208gywsv/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
  <textarea id="mieditor"></textarea>

  <button type="button" id="registrar">Registrar Comentario</button>
  <button type="button" id="ultimo">Mostrar Ultimo Comentario</button>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  
  <script>
    $(document).ready(function(){
      tinymce.init({
          selector: 'textarea#mieditor',
          height: 600,
          toolbar: 'undo redo | blocks | ' + 'language'+ 'bold italic forecolor | alignleft aligncenter fontfamily fontsize ' +
          'alignright alignjustify | bullist numlist outdent indent | ' + 'removeformat | help |' ,
          content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
          menubar:false
      });

      function registrarComentario(){
        let comentario = tinymce.get("mieditor").getContent();

        $.ajax({
          url: '../controllers/comentario.controller.php',
          type: 'GET', 
          data:{'op':'registrarComentario', comentario},
          success: function(e){
            console.log("Registrado con Exito");
          }
        });

      }

      function mostrarComentario() {
    
        $.ajax({
          url: '../controllers/comentario.controller.php',
          type: 'GET', 
          dataType: 'JSON',
          data:{'op':'listarComentario'},
          success: function (result){
            tinymce.get("mieditor").setContent(result.comentario);
          }
        });
      }

      $("#registrar").click(registrarComentario);
      $("#ultimo").click(mostrarComentario);
    });
  </script>

</body>
</html>