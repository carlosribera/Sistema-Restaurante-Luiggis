@extends("theme.$theme.layout")
@section('titulo')
    Sistema Menu
@endsection

@section('styles')
<link href="{{asset("assets/js/jquery-nestable/jquery.nestable.css")}}" rel="stylesheet" type="text/css"/>
@endsection

@section('scriptsPlugins')
<script src="{{asset("assets/js/jquery-nestable/jquery.nestable.js")}}" type="text/javascript"></script>
@endsection

@section('scripts')
<script src="{{asset("assets/pages/scripts/admin/menu/index.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
    <div class="row">
      <div class="col-lg-12">
          @include('includes.mensaje')
        <div class="box box-succes">
            <div class="box-header with-border">
                <h3 class="box-title">menús</h3>
                <div class="box-tools pull-right box-tools">
                    <a href="{{route('crear_menu')}}" class="btn margin-r-5 btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i>Nuevo Menu
                    </a> 
                    <a href="{{route('modificar')}}" class="btn margin-r-5 btn-danger btn-sm">
                            <i class=""></i>Modificar
                    </a> 
                </div>              
            </div> 
            <div class="box-body">
                @csrf
                <div class="dd" id="nestable">
                    <ol class="dd-list">
                        @foreach ($menus as $key => $item)
                            @if ($item["menu_id"] != 0)
                                @break
                            @endif
                            @include("admin.menu.menu-item",["item"=>$item])
                        @endforeach
                    </ol>
                </div>
            </div>
            
        </div>
      </div>
    </div>
@endsection
