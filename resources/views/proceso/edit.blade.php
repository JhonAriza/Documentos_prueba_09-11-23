
@extends('layouts.app')


@section('content')

<form action="{{ url('/proceso/'.$item->id) }} "  class="needs-validation" novalidate  method="POST" enctype="multipart/form-data">
@csrf
 {{ method_field('PATCH') }}
 
@include('proceso.form',['modo'=>'Editar'])

</form>


@endsection

