@extends('layouts.master')
@section('title', 'Data Dasar Pemining')

@section('content')
    <section class="section">
        <div class="section-header">
        <div class="row">
            <div class="col-lg-12">
        <h1>Informasi Dasar pemining</h1> 
        </div>
        
        </div>
    </section>
    <div class="section-body">
        
        <div class="row">
            
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <!--<div class="table-responsive">-->
                    <div>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                        @if ($message = Session::get('deleted'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                        <table class="table table-striped table-bordered">
                                <tr>
                                    <td> Nama </td>
                                    <td >{{$datauser[0]->name }} </td>
                                </tr>
                                <tr>
                                    <td> Hashrate VGA </td>
                                    <td >{{$datauser[0]->hashrate }} </td>
                                </tr>
                                <tr>
                                    <td> Type VGA </td>
                                    <td >{{$datauser[0]->vga }} </td>
                                </tr>
                                <tr>
                                    <td> Fee </td>
                                    <td >{{$datauser[0]->fee }} %</td>
                                </tr>
                                <tr>
                                    <td> Total coin </td>
                                    <td > Total koinnya</td>
                                </tr>
                                <tr>
                                    <td> Withdraw coin </td>
                                    <td > Total koinnya</td>
                                </tr>
                                <tr>
                                    <td> Selisih coin di Dimas </td>
                                    <td > Total koinnya</td>
                                </tr>
                                <tr>
                                    <td> Total Rupiah </td>
                                    <td >Total Rupiahnya</td>
                                </tr>
                                <tr>
                                    <td> Withdraw Rupiah </td>
                                    <td >Total Rupiahnya }}</td>
                                </tr>
                                
                                <tr>
                                    <td> Selisih Rupiah di Dimas</td>
                                    <td >Total Rupiahnya</td>
                                </tr>
                        </table>
                    </div>
                    <div class="col-md-12">
                                    
                            
                                </div>
            </div>

        </div>
    </div>
    </div>
@endsection

@push('page-script')

@endpush
