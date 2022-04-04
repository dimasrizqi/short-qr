@extends('layouts.master')
@section('title', 'Input Short link')

@section('content')
    <section class="section">
        <div class="section-header">
           <h1>Input Short link </h1>
        </div>
    </section>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">

                    <form action="{{route('shortlink.store')}} " method="POST">
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
                                        <label>URL Asli </label>
                                        <textarea placeholder="Masukan Url yang akan dipendekkan" name="url_asli" class="form-control" required> </textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Shortlink</label>
                                        <input type="text" required placeholder="Nama Untuk Shortlink" name="nama_link" class="form-control" >
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