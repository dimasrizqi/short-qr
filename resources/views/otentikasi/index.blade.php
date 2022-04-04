@extends('layouts.master')
@section('title', 'Lihat User')

@section('content')
    <section class="section">
        <div class="section-header">
            <a href="{{ route('tambah-user') }}" class="btn btn-info">Tambah </a>
        </div>
        <div class="section-body">
            <div class="table-responsive">
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
                {{-- <a href="{{ route('prokomF1-tambah') }}" class="btn btn-success">Tambah Data</a><br><br> --}}
                <table class="table table-bordered table-striped">
                    <tr>
                        <th width="50px">NO.</th>
                        <th >Nama</th>
                        <th >Hashrate</th>
                        <th >Action</th>
                    </tr>
                    @foreach ($datauser  as $no => $datanya)
                        <tr>
                            <td> {{ $no + 1 }} </td>
                            <td>{{$datanya->name}} </td>
                            <td>{{$datanya->hashrate}}</td>
                            <td>
                                {{-- <a class="btn btn-primary" href="#">Show</a> --}}
                                <form class="pull-left" action="{{ route('userdel',$datanya->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    <a class="btn btn-warning" href="{{route ('resetpass',$datanya->id)}}">reset password </a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <i>reset password akan mengembalikan password user menjadi <b>12345678</b></i>
            </div>
        </div>
    </section>
@endsection

@push('page-script')

@endpush
