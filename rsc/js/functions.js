function guardar(){

  $('#guardar').attr('disabled', 'disabled');
  $('.spinner-border').removeClass('hidden');

  $.ajax({
    type: 'POST',
    url: $('#form').attr('action'),
    data: $('#form').serialize(),
    dataType: 'json'
  }).done(function (response){
    var tipo = (response.error) ? 'danger' : 'success';

    setTimeout(function(){
      alerta(response.msg, tipo);

      if(!response.error){
        $('input[type="text"]').each(function(){
          $(this).val('');
        });
      }

      $('#guardar').removeAttr('disabled');
      $('.spinner-border').addClass('hidden');
    }, 300);
  });
}

function validar(){
  var error = false;
  var input = false;

  $('#alert').addClass('hidden');

  $('input[type="text"]').each(function(){
    if($(this).val().trim() == ''){
      $(this).addClass('error');
      if(!error) input = $(this);
      error = true;
    }else{
      $(this).removeClass('error');
    }
  });

  if(error){
    alerta('', 'danger');
    input.focus(); 

    return false;
  }

  guardar();
}

function alerta(msg, tipo){
  var alert = $('#alert');
  var msg = (msg.trim() == '') ? 'Por favor, complete el formulario' : msg.trim();

  alert.addClass('hidden');
  alert.text(msg);
  alert.removeClass();
  alert.addClass('alert');
  alert.addClass('alert-'+tipo);
}