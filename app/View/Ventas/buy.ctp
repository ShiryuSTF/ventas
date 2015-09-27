<div class="col-md-12">
    <div class="col-md-5">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title"><strong>Buscar Cliente</strong></h3>
        </div>
        <div class="panel-body">
           <div class="input-group">
                <input id="dnicliente" type="text" maxlength="8" class="form-control" placeholder="Ingrese un DNI....">                
                <span class="input-group-btn">
                    <button id="btnbuscadni" class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                </span>                
            </div><!-- /input-group -->
            <span id="msgerror" style="color:red;"></span>
        </div>
    </div>
</div>
<div class="col-md-5">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title"><strong>Importe de Compra</strong></h3>
        </div>
        <div class="panel-body">
            <strong>Importe Total: </strong><label id="importe"></label>
        </div>
    </div>
</div>
<div class="col-md-10" visible="false">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title"><strong>Información del Cliente</strong></h3>
        </div>
        <div class="panel-body">
            <strong>Nombre: </strong><span id="nombre"></span>
            <hr>
            <strong>DNI: </strong><span id="dni"></span>
            <hr>
        </div>
    </div>
</div>
</div>
<script>

    $(document).on('ready',function(){

        var dni='';
        $('#msgerror').html('');
        $('#btnbuscadni').on('click',function(event){
            dni=$('#dnicliente').val();
            
            if(dni!='')
                ajaxcliente(dni);
            else
                $('#msgerror').html('Ingrese un dni porfavor.!');
        });
        //Podriamos ponerle un estilo para que el borde del input sea rojo ....
        function ajaxcliente(dni){
            $.ajax({
                type:'POST',
                url:basePath+'ventas/ajaxbuscadni',
                data:{                  
                    dni:dni
                },
                dataType:'json',
                success: function(data){
                    $('#msgerror').html('');
                    if(data.exito){//data.idcliente
                        $('#nombre').html(data.nombre);
                        $('#dni').html(data.dni);
                    }else{
                        $('#nombre').html('');
                        $('#dni').html('');
                        $('#msgerror').html('Cliente no encontrado, porfavor verificar!');                    
                    }
                },
                error:function(){
                    $('#nombre').html('');
                    $('#dni').html('');
                    $('#msgerror').html('Ha ocurrido un error!!');
                }
            });
        };              

    });

</script>