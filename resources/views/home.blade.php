@extends('layouts.master')
@section('title','HOME')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Home Dashboard</h1>
    </div>

    <div class="section-body">
    <div class="title m-b-md">
        
    </div>
    
    <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title">Short link & QR <h1>
                    <a href="{{ route('shortlink.create') }}" class="btn btn-info">Tambah Shortlink</a>
                    <a href="{{ route('shortlink.print') }}" class="btn btn-success">Print Shortlink</a>
                    
                  </div>
                  <div class="card-stats-items">
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">24</div>
                      <div class="card-stats-item-label">Jumlah Shortlink</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">12</div>
                      <div class="card-stats-item-label">Jumlah QR</div>
                    </div>
                    
                  </div>
                </div>
                <!--<div class="card-icon shadow-primary bg-primary">-->
                <!--  <i class="fas fa-archive"></i>-->
                <!--</div>-->
                <div class="card-wrap">
                  <div class="card-header">
                    <!--<h4>Total Orders</h4>-->
                  </div>
                  <div class="card-body">
                    <!--59-->
                  </div>
                </div>
              </div>
            </div>
            
          </div>
    </div>
    
  </section>
@endsection

@push('page-script')
    
@endpush
    

