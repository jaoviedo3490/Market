$(document).ready(function(){
    $.ajax({
        url: '../../capa-negocios/ajax_switch.php',
        type: 'GET',
        success: function(response){
            //alert(response);
                const json = JSON.parse(JSON.stringify(response));
                const str = json;
                const new_str_json = JSON.parse(str);
                Object.values(new_str_json).forEach(element_ =>{
                   $("#user").text(element_.nombre);
                });
        }
    })
})