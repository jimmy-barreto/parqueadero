@extends('layouts.app', ['activePage' => 'Paqueadero', 'titlePage' => __('Paqueadero')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">commute</i>
              </div>
              <p class="card-category">Cupo Vehiculo</p>
              <h3 class="card-title">25</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons"></i> 
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">two_wheeler</i>
              </div>
              <p class="card-category">Cupo Moto</p>
              <h3 class="card-title">30</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons"></i> 
              </div>
            </div>
          </div>
        </div>
      </div>      
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush