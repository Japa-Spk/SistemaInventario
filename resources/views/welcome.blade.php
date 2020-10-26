@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('CARNES S.A.S')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
    <div class="col-lg-7 col-md-8">
      <h1 class="text-white text-center">{{ __('CARNES S.A.S') }}</h1>
    </div>
  </div>
</div>
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
    <div class="col-2">
      <a href="{{ route('login') }}" class="btn btn-default btn-round btn-lg" role="button">
        <i class="material-icons">fingerprint</i> {{ __('Iniciar sesión') }}
      </a>
    </div>
    <div class="col-1">
    </div>
    <div class="col-2">
      <a href="{{ route('register') }}" class="btn btn-default btn-round btn-lg" role="button">
        <i class="material-icons">person_add</i> {{ __('Registrar') }}
      </a>
    </div>
  </div>

</div>
@endsection