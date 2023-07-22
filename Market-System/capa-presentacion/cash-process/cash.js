$(document).ready(function () {
    let val = 0;
    if(val == 5){
        $(document).onbeforeunload(confirm('¿Esta seguro que desea abandonar la pagina actual? , Perdera todo su progreso actual'));
    } 
    $("#product-name").focus();
    $("#product-name").keyup(function (event) {
        if (event.which == 13) {
            let content_product = $("#product-name");
        if (content_product.val().length > 0) {
            val = 5;
            let products = new Array();
            products.push(content_product);
            let $html_product = '<ul><table class="table table-hover"><tr><td class="col-sm-2">' + content_product.val() + '</td><td class="col-sm-2"><a id="price-product" style="margin-left:50%">' +
                '2000$</a></td><td class="col-sm-2"><img style="width:20%;heigth:20%;margin-left:15%;cursor:pointer;" onclick="delete_cashier()"' +
                ' src="../../resources/delete.png"/></td></tr></ul>';
            $("#list-product").append($html_product);
            content_product.val('');
            content_product.focus();
        } else swal({
            text: 'Para poder registrar un producto este debe digitarlo mediante codigo de barras o el nombre',
            button: 'Aceptar',
        })
        $("#content-content").html('');
        $("#bar-search").html('');
        }
    })
    $("#add-product").click(function () {
        let content_product = $("#product-name");
        if (content_product.val().length > 0) {
            val = 5;
            let $html_product = '<ul><table class="table table-hover"><tr><td class="col-sm-2">' + content_product.val() + '</td><td class="col-sm-2"><a id="price-product" style="margin-left:50%">' +
                '2000$</a></td><td class="col-sm-2"><img style="width:20%;heigth:20%;margin-left:15%;cursor:pointer;" onclick="delete_cashier()"' +
                ' src="../../resources/delete.png"/></td></tr></ul>';
            $("#list-product").append($html_product);
            let precio = 0;
            precio += parseInt($("#price-product").text());
            $("#total").html(precio);
            content_product.val('');
            content_product.focus();
        } else swal({
            text: 'Para poder registrar un producto este debe digitarlo mediante codigo de barras o el nombre',
            button: 'Aceptar',
        })

    })
    $("#content-content").html('');
    $("#bar-search").html('');
    $("#redirect-page").click(function(){
        return confirm('¿Desea abandonar la pagina actual? Perdera todo su progreso actual.')
    })
})
function delete_cashier() {
    swal({
        title: '¿Eliminar Producto?',
        text: 'Ingrese el codigo del supervisor para eliminar el producto,' +
            ' ATENCION !Todas sus unidades seran eliminadas¡',
        icon: 'warning',
        content: 'input',
        button: { text: 'Validar Codigo' },
    }).then((value) => {
        if (value == 'admin') {

        } else {
            swal('El producto no pudo ser eliminado', {
                title: '¡Codigo invalido!',
                icon: 'error'
            }
            )
        }
    })
}