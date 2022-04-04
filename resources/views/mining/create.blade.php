@extends('layouts.master')
@section('title', 'Input Hasil mining')

@section('content')
    <section class="section">
        <div class="section-header">
           <h1>Input Data Payout Mining  {{Carbon\Carbon::now()->isoFormat('D MMMM Y')}} </h1>
        </div>
    </section>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">

                    <form action="{{ route('mining.store') }}" method="POST">
                        @csrf
                        
                        <div class="card-body">
                            <div class="row">
                                
                                @if ($message = Session::get('failed'))
                                <div class="col-md-12">
                                    <div class="alert alert-danger">
                                        <p>{{ $message }}</p>
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Kurs Saat Tukar Hasil Payout</label>
                                        <input type="number" placeholder="" name="kurs" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Hasil mining</label>
                                        <input type="number" step="0.0000000001" required placeholder="" name="hasil_mining" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                </form>
            </div>

        </div>
    </div>
    </div>
@endsection

@push('page-scripts')

@endpush