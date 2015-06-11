@extends('admin.list.list')

@section('list-title')
    Talonarios
@stop

@section('button-create-text')
    Nuevo Talonario
@stop

@section('list-content')
    @parent

@section('list-content-columns')
    <th class="text-center" style="width: 50px;">#</th>
    <th>Descripcion</th>
    <th>Usuario</th>
    <th class="text-center" style="width: 75px;"><i class="fa fa-flash"></i></th>
@stop

@section('list-content-values')
    @foreach($data as $key => $value)
        <tr>
            <td class="text-center">{{ $key + 1 }}</td>
            <td>{{ $value->description }}</td>
            <td>{{ $value->user->email }}</td>
            <td class="text-center">
                <a href="#" data-id="{{ $value->id }}" data-toggle="tooltip" title="Editar" class="btn btn-effect-ripple btn-xs btn-success edit"><i class="fa fa-pencil"></i></a>
                <a href="#" data-id="{{ $value->id }}" data-toggle="tooltip" title="Eliminar" class="btn btn-effect-ripple btn-xs btn-danger delete"><i class="fa fa-times"></i></a>
            </td>
        </tr>
    @endforeach
@stop

@include('admin._books.create',compact('fields'))

<div id="div-modal"></div>
<script>
    $(function(){
        CRUD.url_base = 'admin/books';
        Helper.rules = {
            'description'  : { required  : true },
            'observation'  : { required  : true }
        };
        Helper.messages = {
            'description' : { required : 'Debe ingresar una descripcion' },
            'observation' : { required : 'Debe ingresar una observacion' }
        }
        Helper.validate('#form-create');
    })
</script>
{!! Html::script('app/helpers/crud_operate.js') !!}
@stop