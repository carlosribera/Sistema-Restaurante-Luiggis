@extends("theme.$theme.layout")
@section('titulo')
    Sistema Rol
@endsection

@section('scripts')
<script src="{{asset("assets/pages/scripts/admin/crear.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.mensaje')
        @include('includes.form-error')
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Crear Roles</h3>
                <div class="box-tools pull-right">
                    <a href="{{route('rol')}}" class="btn btn-block btn-info btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i>Volver al listado
                    </a> 
                </div>
            </div>
            <div class="box-body">
                <form action="{{route('guardar_rol')}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off">
                    @csrf
                        @include('admin.rol.form')
                    <div class="box-footer">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            @include('includes.boton-form-crear')
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection