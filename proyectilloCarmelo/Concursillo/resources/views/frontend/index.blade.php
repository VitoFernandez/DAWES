@extends ('frontend.main')


@section ('frontend')
<div class="init-actions">
    <div class="row">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Nueva Partida</h5>
          <p class="card-text">Crea nuevas partidas y supera tus puntuaciones.</p>
          <br>
          <a href="{{ url('frontend/create') }}" class="btn btn-primary">Empezar</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Consultar Historial</h5>
          <p class="card-text">Mira todas tus partidas para ver tus errores y aciertos.</p>
          
          <a href="{{ url ('frontend') }}" class="btn btn-primary">Consultar</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection