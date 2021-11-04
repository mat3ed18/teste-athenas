$(document).ready(function(){
    // codigo javascript
    
    $.ajax({
        url: "api/",
        type: "post",
        dataType: "json",
        data: {
            listar_usuarios: true
        },
        success: function (data, statusText, jqXHR) {
            if (data.erro == null) {
                var usuarios = data;
                for (var i = 0; i < usuarios.length; i++) {
                    $(".table tbody").append("<tr><td>" + usuarios[i]["codigo"] + "</td><td>" + usuarios[i]["nome"] + "</td><td>" + usuarios[i]["email"] + "</td><td>" + usuarios[i]["categoria_nome"] + "</td></tr>");
                }
            } else {
                alert(data.erro);
            }
        },
        error: function (jqXHR, statusText, error) {
            console.log(jqXHR.responseText);
        }
    });
});