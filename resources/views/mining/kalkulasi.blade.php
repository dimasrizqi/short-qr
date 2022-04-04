@extends('layouts.master')
@section('title', 'Kalkulasi Hasil mining')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Hasil kalkulasi Mining {{Carbon\Carbon::now()->isoFormat('D MMMM Y')}}</h1>
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
                                    
                                        Kurs Saat Tukar Hasil Payout = <b><u>Rp {{ $datamining[0]->kurs  }}</u></b><br>
                                        Hasil Mining = <b><u>{{ $datamining[0]->hasil_mining  }}</u></b> ETH
                                   
                                    <div class="table-responsive">
                                   <table class="table table-md table-bordered table-striped">
                                        <tr>
                                            <th width="50px">NO.</th>
                                            <th >Nama</th>
                                            <th >Hashrate</th>
                                            <th width="50px">Persentase Mining</th>
                                            <th >Hasil Coin</th>
                                            <th >Fee Payout </th>
                                            <th >Hasil Rupiah </th>
                                            
                                        </tr>
                                        <form action="{{ route('mining.proses') }}" method="POST">
                                        @csrf
                                        @foreach ($datauser  as $no => $datanya)
                                            <tr>
                                                <td>{{  $no + 1 }} </td>
                                                <td>{{  $datanya->name}} </td>
                                                <td>{{  $datanya->hashrate}} Mhs</td>
                                                <td>{{  number_format($totalpersen = ($datanya->hashrate/$total_hashrate) *100,2)}} %</td>
                                                <td>{{  number_format($hasil_koin = (($totalpersen/100)*$datamining[0]->hasil_mining)- ((($totalpersen/100)*$datamining[0]->hasil_mining)*($datanya->fee/100)),8)}}</td>
                                                <td>
                                                    @if ($datanya->payout_rupiah == 1)
                                                       Rp {{$fee_exchange = ($dataexchange[0]->fee / $total_payout_rupiah) }}
                                                    @elseif ($datanya->payout_rupiah == 0)
                                                        {{ $fee_exchange = 0}}
                                                    @else
                                                        Error - tidak ada pilihan
                                                    @endif  
                                                </td>
                                                <td align="right">@currency(($hasil_koin*$datamining[0]->kurs)-$fee_exchange ) </td>    
                                            </tr>
                                        @endforeach
                                        
                                        </form>
                                    </table>
                                    <div class="col-md-12">
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Proses</button>
                                    </div>
                                </div>
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