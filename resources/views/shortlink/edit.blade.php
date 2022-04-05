@extends('layouts.master')
@section('title', 'Informasi Shortlink')

@section('content')
    <section class="section">
        <div class="section-header">
        
        <h1>Silahkan ubah dan klik simpan atau <a href="{{  route('shortlink.index')}}" class="btn btn-info">Kembali</a> </h1> 
        </div>
    </section>
    <div class="section-body">
        
        <div class="row">
            <div class="col-6 col-md-6 col-lg-6">
                <div class="card">
                    @if ($message = Session::get('success'))
                    
                    <div class="alert alert-success">
                        
                        <p>{{ $message }}</p>
                        
                    </div>
                    
                    @endif
                   
                    <form action="{{ route('shortlink.update',$datashortlink->id) }}" method="POST">
                        @method('PUT')
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Shortlink</label><br>
                                        <input type="text" name="shortlink" value="{{$datashortlink->shortlink}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Shortlink</label><br>
                                        <input type="text" name="nama_link" value="{{$datashortlink->nama_link}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Link asli</label><br>
                                        <textarea name="url_asli" class="form-control">{{$datashortlink->url_asli}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group text-left">
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @csrf
                        
                        </form>
            </div>

        </div>
            <div class="col-6 col-md-6 col-lg-6">
                <div class="card">
                    <div class="">
                        
                        <p>qrcode untuk link <a href="{{$host}}/{{$datashortlink->shortlink}}">{{$host}}/{{$datashortlink->shortlink}}</a> </p>
                        <p>
                        
                        </p>
                        
                    </div>
                        <img width="200px" src="https://chart.googleapis.com/chart?chd=h&chs=300x300&cht=qr&chl={{$host}}/{{$datashortlink->shortlink}}"></img>
            </div>

        </div>
    </div>
    </div>
@endsection

@push('page-script')

@endpush
