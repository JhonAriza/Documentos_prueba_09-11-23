
@extends('layouts.app')


@section('content')
// se envia el formulario al controlador para actualizarlo 
<form action="{{ url('/doc_documentos/'.$item->id) }} "  class="needs-validation" novalidate  method="POST" enctype="multipart/form-data">
@csrf
//el formulario atraves de un metodo  method_field('PATCH')  que hace uso del PATCH  para enviarlo al controlador 
 {{ method_field('PATCH') }}
 
@include('doc_documentos.form',['modo'=>'Editar'])

</form>


@endsection

