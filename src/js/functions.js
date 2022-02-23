
function sendMail(){
    $('#contactform').submit(function(event){
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'), //enviamos la url del archivo atributo del action en el formulario
            data: $(this).serialize(), //Serializamos los datos para ser enviados, que vienen del formulario
            success: function(res){
                console.log(res);
                if (parseInt(res) == 1){
                    $(".alert-right").css('display','block');// si se envia el corro se imprime el mensaje en verde
                }else if(parseInt(res) === 0){
                    $(".alert-wrong").css('display','block');// si no se envia el corro se imprime el mensaje en rojo.
                }else{
                    console.log('no se recibieron datos');
                }
            },
            error: function(res){
                console.log("errorr de respuesta");
            }
        });
    });
 }
   
    