
@extends('layouts.app')


@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>crear</title>
</head>
<body>
    
</body>
@if(Session::has('mensaje'))

 {{ Session::get('mensaje') }}

@endif
</html>
 <div class="row"> 

    <div class="col-2"></div>
    <div class="col-2"></div>
    <div class="col-2"></div>
    <div class="col-2"></div>
    <div class="col-2"></div>
 </div>
{{-- vamos a enviar el formulario con la propiedad accion con la url  
// atravez del metodo post  --}}
   
                 
<form action="{{ url('/doc_documentos') }} "   class="needs-validation" novalidate method="POST" enctype="multipart/form-data">
{{-- lave de seguridad de laravel  --}}
@csrf


@include('doc_documentos.form',['modo'=>'Guardar'])
</form>
    
 

@endsection
 