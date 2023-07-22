$(document).ready(function () {
    function main_menu() {
        $("#c").html("<div class='container-fluid' style='width:60%;'>"
            + "<h4>Crear Nuevo Producto</h4>"
            + "<div class='row'>"
            + "<div class='col'>"
            + "<form method='POST' id='form-main'>"
            + "<div class='container'>"
            + "<div class='row'>"
            + "<div class='col'>"
            + "Nombre del Producto"
            + "<input class='form-control' id='Nombre-Producto' type='text'>"
            + "</div>"
            + "</div>"
            + "</div>"
            + "<div class='container'>"
            + "<div class='row'>"
            + "<div class='col'>"
            + "Referencia del Producto"
            + "<input class='form-control' id='Referencia-Producto' type='text'>"
            + "</div>"
            + "</div>"
            + "</div><div class='container'>"
            + "<div class='row'>"
            + "<div class='col'>"
            + "Precio del Producto"
            + "<input class='form-control' id='Precio-Producto' type='number'>"
            + "</div>"
            + "</div>"
            + "</div>"
            + "<div class='container'>"
            + "<div class='row'>"
            + "<div class='col'>"
            + "Stock del Producto"
            + "<input class='form-control'  id='stock-producto' type='number'>"
            + "</div>"
            + "<div class='container'>"
            + "<div class='row'>"
            + "<div  class='col'>"
            + "Categoria del Producto"
            + "<select  name='opciones' id='categoria' class='form-control' style='width:100%'>"
            + "<option selected hidden>Escoje la Categoria</option>"
            + "<option value='Limpieza Personal' id='new-product'>Productos de Aseo Personal</option>"
            + "<option value='Limpieza Hogar' id='update-product'>Productos de Limpieza del Hogar</option>"
            + "<option value='Granel' id='search'>Productos a Granel</option>"
            + "<option value='Fruver' id='search'>Productos Fruver</option>"
            + "<option value='Carnicos' id='search'>Productos Carnicos</option>"
            + "<option value='Lacteos' id='search'>Productos Lacteos</option>"
            + "<option value='Alimentos para Animales' id='search'>Alimentos para Animales</option>"
            + "<option value='Confituras' id='search'>Dulces y Confituras</option>"
            + "</select>"
            + "</div>"
            + "</div>"
            + "</div>"
            + "</div>"
            + "</div>"
            + "<div class='container' hidden>"
            + "<div class='row'>"
            + "<div class='col'>"
            + "Productos Vendidos"
            + "<input class='form-control' value='crear-producto' type='text'>"
            + "</div>"
            + "</div>"
            + "</div>"
            + "<div class='container'>"
            + "<div class='row'>"
            + "<div class='col'>"
            + "<br>"
            + "<href='#' id='prueba' class='btn btn-outline-primary' style='width:100%;'>Crear Producto</a>"
            + "</div>"
            + "</div>"
            + "</div>"
            + "</form>"
            + "</div><div class='col'>"
            + "<div class='container-fluid'>"
            + "<div class='row'>"
            + "<div class='col'>"
            + "<p>Seleccionar Imagen<p><img width='60%' id='folder-image' src='../../resources/default_folder_opened_icon_130770.png' class='img-fluid' alt='non-image-empty'>"
            + "<div class='container'>"
            + "<div class='row'>"
            + "<div class='col'>"
            + "<form id='form-image' method='POST' enctype='multipart/form-data'><input type='file' accept='image/jpeg' id='image' class='form-control'  style='width:100%;' id='imagen'></form>"
            + "</div>"
            + "</div>"
            + "</div>"
            + "</div>"
            + "</div>"
            + "</div>"
            + "</div>"
            + "</div>"
            + "</div>");
    }
    $("#opciones").click(function () {
        if ($("#options").val() == "Crear-Producto") {
            main_menu();
            $("#bar-search").html('');
            $("#content-content").html('');
        } else if ($("#options").val() == 'Editar/Eliminar-Products') {
            
            $.ajax({
                url: '../../capa-negocios/Ajax-Products/Extract-products.php',
                method: 'post',
                data: { 'trigger': 'active' },
                success: function (response) {
                    let arreglo = new Array();
                    let contador = 0;
                    const json = JSON.parse(JSON.stringify(response));
                    const str = json;
                    const new_str_json = JSON.parse(str);
                    Object.values(new_str_json).forEach(element_ => {
                        arreglo[contador] = element_;
                        contador++;
                    });
                    for (let i = 0; i < arreglo.length; i++) {
                        location = 'main_productos.php';
                        $("#tabla").html("<td>" + arreglo[0] + "</td>"
                            + "<td>" + arreglo[1] + "</td>"
                            + "<td>" + arreglo[2] + "</td>"
                            + "<td><style='margin-right:5%;' href='#' id='Edit-Product'><img src='../../resources/editar.png'/></a>"
                            + "</td><td><a style='margin-left:5%;' href='#' id='Delete-Product'><img src='../../resources/delete.png'/></a>"
                            + "</td>");
                        $("#Edit-Product").click(function () {
                            alert('Editando Producto');
                        })

                    }
                },
                error: function (response) {
                    swal({
                        title:'Error',
                        text: 'Error: '+response,
                        icon:'Error'
                    });
                }
            })
            $("#busqueda").keypress(function (event) {
             
                if (event.keyCode == 32) {
                    alert()
                    $.ajax({
                        url: '../../capa-negocios/Ajax-Products/Extract-products.php',
                        method: 'post',
                        data: { 'trigger': 'active' },
                        success: function (response) {
                            let arreglo = new Array();
                            let contador = 0;
                            const json = JSON.parse(JSON.stringify(response));
                            const str = json;
                            const new_str_json = JSON.parse(str);
                            Object.values(new_str_json).forEach(element_ => {
                                arreglo[contador] = element_;
                                contador++;
                            });
                            alert()
                            for (let i = 0; i < arreglo.length; i++) {
                                location = 'main_productos.php';
                                $("#tabla").html("<td>" + arreglo[0] + "</td>"
                                    + "<td>" + arreglo[1] + "</td>"
                                    + "<td>" + arreglo[2] + "</td>"
                                    + "<td><a style='margin-right:5%;' href='#' id='Edit-Product'><img style='width:5%;heigth:5%;' src='../../resources/editar.png'/></a>"
                                    + "</td><td><a style='margin-left:5%;' href='#' id='Delete-Product'><img src='../../resources/delete.png'></a>"
                                    + "</td>");
                                $("#delete").click(function () {
                                    return confirm("¿Desea Eliminar el Producto? ¡Esta Accion es irreversible!")
                                })
                                $("#Edit-Product").click(function () {
                                    alert('Editando Producto');
                                })

                            }
                        },
                        error: function (response) {
                            swal({
                                title:'Error',
                                text: 'Error: '+response,
                                icon:'Error'
                            });
                        }
                    })
                } else {
                    $("#busqueda").keyup(function () {
                        let search = $("#busqueda").val();
                        
                        if (search == '') {
                            $.ajax({
                                url: '../../capa-negocios/Ajax-Products/Extract-products.php',
                                method: 'post',
                                data: { 'trigger': 'active' },
                                success: function (response) {
                                    let arreglo = new Array();
                                    let contador = 0;
                                    const json = JSON.parse(JSON.stringify(response));
                                    const str = json;
                                    const new_str_json = JSON.parse(str);
                                    Object.values(new_str_json).forEach(element_ => {
                                        arreglo[contador] = element_;
                                        contador++;
                                    });
                                    
                                    for (let i = 0; i < arreglo.length; i++) {
                                        location = 'main_productos.php';
                                        $("#tabla").html("<td>" + arreglo[0] + "</td>"
                                            + "<td>" + arreglo[1] + "</td>"
                                            + "<td>" + arreglo[2] + "</td>"
                                            + "<td><a style='margin-right:5%;' href='#' id='Edit-Product'><img style='width:5%;heigth:5%;' src='../../resources/editar.png'/></a>" +
                                            + "</td><td><a style='margin-left:5%;' href='#' id='Delete-Product'><img style='width:5%;heigth:5%;' src='../../resources/delete.png'/></a>" +
                                            + "</td>");
                                    }
                                },
                                error: function (response) {
                                    swal({
                                        title:'Error',
                                        text: 'Error: '+response,
                                        icon:'Error'
                                    });
                                }
                            })
                        } else {
                            alert()
                            $.ajax({
                                url: '../../capa-negocios/Ajax-Products/Extract-product-info.php',
                                method: 'post',
                                data: { search },
                                success: function (response) {
                                    let arreglo = new Array();
                                    let contador = 0;
                                    const json = JSON.parse(JSON.stringify(response));
                                    const str = json;
                                    const new_str_json = JSON.parse(str);
                                    Object.values(new_str_json).forEach(element_ => {
                                        arreglo[contador] = element_;
                                        contador++;
                                    });
                                   
                                    for (let i = 0; i < arreglo.length; i++) {
                                        $("#tabla").html("<td class='table-hover table-dark'>" + arreglo[0] + "</td>"
                                            + "<td class='table-hover table-dark'>" + arreglo[1] + "</td>"
                                            + "<td class='table-hover table-dark'>" + arreglo[2] + "</td>"
                                            + "<td class='table-hover table-dark'><a style='margin-right:5%;' href='#' id='Edit-Product'><img style='width:5%;heigth:5%;' src='../../resources/editar.png'/></a>" +
                                            + "<a style='margin-left:5%;' href='#' id='Delete-Product'><img style='width:5%;heigth:5%;' src='../../resources/delete.png'/></a>" +
                                            + "</td>");
                                        $("#Edit-Product").click(function () {
                                            alert('Editando Producto');
                                        })
                                    }
                                },
                                error: function (response) {
                                    swal({
                                        title:'Error',
                                        text: 'Error: '+response,
                                        icon:'Error'
                                    });
                                }
                            })
                        }
                    })

                }
            })
        } else if ($("#options").val() == "Buscar palabra clave") {
            if(trigger_cashier==15){
                $("#options").text('selected');
                return confirm('¿Esta seguro que desea abandonar la pagina actual?, perdera todo el progreso actual.');
                
            }
        }
        $("#prueba").click(function () {
            if ($("#Nombre-Producto").val().length == 0 || $("#Referencia-Producto").val().length == 0
                || $("#stock-producto").val().length == 0) {
                window.alert('¡Los campos deben estar completos!');
            } else {

                let Nombre = $("#Nombre-Producto").val();
                let Referencia = $("#Referencia-Producto").val();
                let Stock = $("#stock-producto").val();
                let Precio = $("#Precio-Producto").val();
                let Categoria = $("#categoria").val();

                $.ajax({
                    url: "../../capa-negocios/Ajax-Products/Create-Product_ajax.php",
                    method: 'post',
                    data: {
                        "Nombre": Nombre,
                        "Referencia": Referencia,
                        "Stock": Stock,
                        "Precio": Precio,
                        "Categoria": Categoria
                    },
                    cache: false,
                    success: function (response) {
                        window.alert(response);
                        $("#Nombre-Producto").val('');
                        $("#Referencia-Producto").val('');
                        $("#stock-producto").val('');
                        $("#Precio-Producto").val('');
                        $("#categoria").val('');
                    }, error: function (response) {
                        alert(response + 'Alerta de Error:404');
                    }
                });
            }

        });
    });
    $("#caja").click(function () {
        location.href = '../cash-process/main_cash.html';
    })
    $("#busqueda").keypress(function (event) {
        if (event.keyCode == 32) {
            $.ajax({
                url: '../../capa-negocios/Ajax-Products/Extract-products.php',
                method: 'post',
                data: { 'trigger': 'active' },
                success: function (response) {
                    let arreglo = new Array();
                    let contador = 0;
                    const json = JSON.parse(JSON.stringify(response));
                    const str = json;
                    const new_str_json = JSON.parse(str);
                    Object.values(new_str_json).forEach(element_ => {
                        arreglo[contador] = element_;
                        contador++;
                    });

                    for (let i = 0; i < arreglo.length; i++) {
                        location = 'main_productos.php';
                        $("#tabla").html("<td class='col-sm-2'>" + arreglo[0] + "</td>"
                            + "<td class='col-sm-2'>" + arreglo[1] + "</td>"
                            + "<td class='col-sm-2'>" + arreglo[2] + "</td>"
                            + "<td class='col-sm-2'><a style='margin-left:5%;' href='#' id='Delete-Product'><img style='width:20%;heigth:20%;' src='../../resources/editar.png'/></a>"
                            + "<a style='margin-left:5%;' href='#' id='Delete-Product'><img style='width:20%;heigth:20%;' src='../../resources/delete.png'/></a>"
                            + "</td>");
                    }
                },
                error: function (response) {
                    swal({
                        title:'Error',
                        text: 'Error: '+response,
                        icon:'Error'
                    });
                }
            })
        } else {
            $("#busqueda").keyup(function () {
                let search = $("#busqueda").val();
                if (search == '') {
                    location = 'main_productos.php';
                } else {
                    $.ajax({
                        url: '../../capa-negocios/Ajax-Products/Extract-product-info.php',
                        method: 'post',
                        data: { search },
                        success: function (response) {
                            let arreglo = new Array();
                            let contador = 0;
                            const json = JSON.parse(JSON.stringify(response));
                            const str = json;
                            const new_str_json = JSON.parse(str);
                            Object.values(new_str_json).forEach(element_ => {
                                arreglo[contador] = element_;
                                contador++;
                            });
                            for (let i = 0; i < arreglo.length; i++) {
                                $("#tabla").html("<td class='col-sm-2 table-dark'>" + arreglo[0] + "</td>"
                                    + "<td class='col-sm-2 table-dark'>" + arreglo[1] + "</td>"
                                    + "<td class='col-sm-2 table-dark'>" + arreglo[2] + "</td>"
                                    + "<td class='col-sm-2 table-dark'><a style='margin-left:5%;' href='#' id='Delete-Product'><img style='width:20%;heigth:20%;' src='../../resources/editar.png'/></a>"
                                    + "<a style='margin-left:5%;' href='#' id='Delete-Product'><img style='width:20%;heigth:20%;' src='../../resources/delete.png'/></a>"
                                    + "</td>");
                                $("#Edit-Product").click(function () {
                                    alert('Editando Producto');
                                })
                            }
                        },
                        error: function (response) {
                            swal({
                                title:'Error',
                                text: 'Error: '+response,
                                icon:'Error'
                            });
                        }
                    })
                }
            })

        }
    })
});

function delete_prod(){
    swal({
        title: "¿Desea eliminar este producto?",
        text: "Toda la informacion con relacion a este producto sera eliminada, ¿Desea continuar?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
         
      })
}