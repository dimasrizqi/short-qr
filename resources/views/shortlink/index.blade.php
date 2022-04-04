@extends('layouts.master')
@section('title', 'Data Shortlink')

@section('content')
    <section class="section">
        <div class="section-header">
        <div class="row">
            <div class="col-md-12">
            <h1><a href="{{ route('shortlink.create') }}" class="btn btn-info">Tambah Shortlink</a>
            <a href="{{ route('shortlink.print') }}" class="btn btn-success">Print Shortlink</a> 
            </h1> 
            </div>
            
        </div>
        
        </div>
    </section>
    <div class="section-body">
        
        <div class="row">
            
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
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
                        <table class="table table-striped table-sm">
                            <tr>
                                <th >no</th>
                                <th width="300 px">Nama Link </th>
                                <th >Url Asli</th>  
                                <th >Shortlink</th>  
                                <th width="300 px">Action  </th>
                            </tr>
                            @foreach ($datashortlink as $no => $item)
                                <tr>
                                    <td> {{$no+1}} </td>
                                    <td >{{ $item->nama_link }} </td>
                                    <td ><a href="{{$item->url_asli}}" target="_blank">{{$item->url_asli}}</a> </td>
                                    <td > <a href="{{$item->shortlink }}" target="_blank">{{$item->shortlink }} </a> </td>
                                    <td>
                                        
                                        <form class="pull-left" action="{{ route('shortlink.destroy',$item->id) }}" method="POST">
                                            @csrf
                                            <a class="btn btn-primary" href="{{ route('shortlink.edit',$item->shortlink) }}">Show</a>
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-disable">Delete</button>
                                        </form>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="col-md-12">
                                    
                            {{ $datashortlink->onEachSide(5)->links() }}
                                </div>
            </div>

        </div>
    </div>
    </div>
@endsection

@push('page-script')

@endpush
