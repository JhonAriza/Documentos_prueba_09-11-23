<div class="container">

    <h1>{{$modo}} proceso</h1>
<div class="row">
    <div class="col-9">
    <label for="nombre">codigo</label>
    
    <!-- aca le estamos diciendo que si el valor existe que lo imprima si no no imprimir
 nada por que salia errror por que la variable item no tenia nada " 
si existe imprimir sino no imprimir nada-->
    <div>
        <input type="text" class="form-control" name="pro_prefijo" id="pro_prefijo" value="{{ isset($item->pro_prefijo)?$item->pro_prefijo:'' }}" required>
        <div class="valid-feedback">Cargando..</div>
        <div class="invalid-feedback">Falta llenar el campo pro_prefijo</div>
    </div>
    </div>
    </div>
    <br>
    <div class="row">
    <div class="col-9">
        <label for="pro_nombre">pro_nombre</label>
        <input type="text" class="form-control" required name="pro_nombre" id="pro_nombre" value="{{ isset($item->pro_nombre)?$item->pro_nombre:'' }}">
        <div class="valid-feedback">Cargando..</div>
        <div class="invalid-feedback">Falta llenar el campo pro_nombre</div>
    </div> 


    
</div>
    <br>
     
   

    <br>


    <input type="submit" class="btn btn-secondary" value="{{$modo}} datos">
    <a href="  {{url('proceso/')}}" class="btn btn-warning">Regresar al inicio</a>

    <br>
    <div class="row">
        <div class="col-md-12">
            <div id="mapa" style="width:100%; height:500px;" ></div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('#timepicker').datetimepicker({
            format: 'LT',
            icons: {
                time: "glyphicon glyphicon-time",
                date: "glyphicon glyphicon-calendar",
                up: "glyphicon glyphicon-chevron-up",
                down: "glyphicon glyphicon-chevron-down"
            }
        });
    });
</script>
<script>
    // validacion de campos del formulario BOOSTRAP
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
 