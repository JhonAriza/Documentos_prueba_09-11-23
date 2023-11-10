<div class="container">

    <h6>{{$modo}} doc_documentos</h6>

    <div class="row">
    
    <div class="col-6">
        <label for="documento">doc_nombre</label>
        <input type="text" class="form-control" required name="doc_nombre" id="doc_nombre" value="{{ isset($item->doc_nombre)?$item->doc_nombre:'' }}">
        <div class="valid-feedback">Cargando..</div>
        <div class="invalid-feedback">Falta llenar el campo doc_nombre</div>
    </div> </div>
 
 
  


    <div class="row">
    <div class="col-6">
        <label for="doc_codigo"> doc_codigo</label>
        <input type="text" class="form-control" required name="doc_codigo" id="doc_codigo" value="{{ isset($item->doc_codigo)?$item->doc_codigo:'' }}">
        <div class="valid-feedback">Cargando..</div>
        <div class="invalid-feedback">Falta llenar el campo  doc_codigo</div>
    </div>  
    <div class="col-6">
        <label for="doc_contenido">doc_contenido</label>
        <input type="text" class="form-control" required name="doc_contenido" id="doc_contenido" value="{{ isset($item->doc_contenido)?$item->doc_contenido:'' }}">
        <div class="valid-feedback">Cargando..</div>
        <div class="invalid-feedback">Falta llenar el campo doc_contenido</div>
    </div>  

 
    

 </div>
    <br>

   <!-- SE CREA SELECT PARA LA LLAVE FORANEA procesos -->
   <div class="row">
    <div class="col-12">
        <div class='mb4'>
            <select class="form-control" name="proceso_id" required>
                <option value="">Selelecionar proceso</option>
                @foreach ($procesos as $item)
                <option value="{{ $item->id }}">
                    {{ $item->pro_prefijo}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="valid-feedback">Cargando..</div>
        <div class="invalid-feedback">Falta seleccionar prooceso </div>
        </div>
       </div>
    <br>
  <!-- SE CREA SELECT PARA LA LLAVE FORANEA  para tip_tipo_docs -->
  <div class="row">
    <div class="col-12">
        <div class='mb4'>
            <select class="form-control" name="tip_tipo_doc_id" required>
                <option value="">Selelecionar tip_tipo_docs</option>
                @foreach ($tip_tipo_docs as $item)
                <option value="{{ $item->id }}">
                    {{ $item->tip_nombre}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="valid-feedback">Cargando..</div>
        <div class="invalid-feedback">Falta seleccionar prooceso </div>
        </div>
       </div>




<div>   <input type="submit" class="btn btn-secondary" value="{{$modo}} doc_documentos">
    <a href="  {{url('doc_documentos/')}}" class="btn btn-warning">Regresar al inicio de doc_documentos</a> </div>
 <br>
 

    <div class="row">
        <div class="col-md-12">
            <div id="mapa" style="width:100%; height:500px;" ></div>
        </div>
    </div>

 

</div>


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
