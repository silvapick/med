@extends('layouts.app')

@section('content')

<style>
.mayus{
    text-transform:uppercase;
}
</style>
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">MEDICAMENTOS</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool cl_colap" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            @if(Session::has('notice'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {{ Session::get('notice') }}
            </div>
            @endif
            @if(Session::has('alert'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {{ Session::get('alert') }}
            </div>
            @endif
            <div class="cl_ajax">
            </div>
            <form method="POST" action="{{ route('medicamentos.store') }}" id="MedicForm">
                @csrf
            <div class="row">
            <!-- /.col -->            
            <div class="col-md-4">
              <div class="form-group">
                <label>Codigo</label>
                    <input id="codigo" name="codigo" class="form-control mayus @error('codigo') is-invalid @enderror" type="text" placeholder="* SKU"  value="{{ old('codigo') }}" autofocus>
                    @error('codigo')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <label>Nombre</label>
                    <input id="nombre" name="nombre" class="form-control mayus @error('nombre') is-invalid @enderror" type="text" placeholder="* Nombre Corto"  value="{{ old('nombre') }}">
                    @error('nombre')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Descripciòn</label>
                    <textarea id="descripcion" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" rows="2" placeholder="* Descripcion del Medicamento">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
              </div>
            </div>
            <!--.-->
            <div class="col-md-6">
              <div class="form-group">
                <label>Tipo</label>
                <select class="form-control" id="tipo" name="tipo" aria-hidden="true">
                    @foreach($TipoMedi as $tipomedi)
                        <option value="{{$tipomedi->id}}" {{ old('tipo') == $tipomedi->id ? 'selected' : '' }} >{{$tipomedi->nombre}}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Valor</label>
                <input id="valor" name="valor" class="form-control @error('valor') is-invalid @enderror" type="text" placeholder="* Valor Unit."  value="{{ old('valor') }}">
                    @error('valor')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Cantidad</label>
                <input id="stop" name="stop" class="form-control @error('stop') is-invalid @enderror" type="number" placeholder="* Stop"  value="{{ old('stop') }}">
                    @error('stop')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Stop Minimo</label>
                <input id="stop_min" name="stop_min" class="form-control @error('stop_min') is-invalid @enderror" type="number" placeholder="* Stop minimo"  value="{{ old('stop_min') }}">
                    @error('stop_min')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Stop Maximo</label>
                <input id="stop_max" name="stop_max" class="form-control @error('stop_max') is-invalid @enderror" type="number" placeholder="* Stop maximo"  value="{{ old('stop_max') }}">
                    @error('stop_max')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
              </div>
            </div>

            <!--.-->
            <div class="col-md-12 text-right">
                <button class="btn btn-warning" type="reset" id="editMedic">
                    <i class=" fa fa-undo"></i> {{ __('Limpiar') }}</button>
                <button class="btn btn-success" type="submit" id="registrar">
                    <i class=" fa fa-plus"></i> {{ __('Registrar') }}</button>
                <button class="btn btn-success" type="submit" id="modificar">
                    <i class=" fa fa-edit"></i> {{ __('Modificar') }}</button>
            </div>
            
            <!-- /.col -->
            </div>
            </form>
          <!-- /.row -->
        </div>
        </div>
    </div>
    <!--/.col -->
    <div class="col-md-12">
    <table class="table table-bordered data-table" id="medicamentos" style="background-color: #FFF;">
        <thead>
            <tr>
                <th col="1">No</th>
                <th>Codigo</th>
                <th col="2">Nombre</th>
                <th>Tipo</th>
                <th>Valor</th>
                <th>Cantidad</th>
                <th>Stop Minimo</th>
                <th>Stop Maximo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    </div>

</div>

@endsection