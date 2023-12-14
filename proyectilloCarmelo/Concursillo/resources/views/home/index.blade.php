@extends ('app.base')
@section('title')

@section ('content')
<div class="init-actions">
    <div class="row">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Crear Preguntas</h5>
          <p class="card-text">Crea nuevas preguntas para los jugadores.</p>
          <br>
          <a href="{{url('backend/create')}}" class="btn btn-primary">Crear</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Consultar Preguntas</h5>
          <p class="card-text">Ver todas las preguntas para editarlas, eliminarlas o consultarlas</p>
          
          <a href="{{ url('/view')}}" class="btn btn-primary">Consultar</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection