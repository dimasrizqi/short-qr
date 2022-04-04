@extends('layouts.master')
@section('title', 'Edit Buku Induk')

@section('content')
    <section class="section">
        <div class="section-header">
        
        <h1>Silahkan ubah dan klik simpan atau <a href="{{  route('bukuinduk.index')}}" class="btn btn-info">Kembali</a> </h1> 
        </div>
    </section>
    <div class="section-body">
        
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    @if ($message = Session::get('success'))
                    
                    <div class="alert alert-success">
                        
                        <p>{{ $message }}</p>
                        
                    </div>
                    
                    @endif
                    @foreach ($buku_induk  as $no => $item)
                    <form action="{{ route('bukuinduk.update',$item->id) }}" method="POST">
                        @method('PUT')
                        <input type="hidden" value="{{$item->no_sampel}}" name="no_sampel" >
                        <input type="hidden" value="{{$item->no_fpps}}" name="no_fpps" >
                        <div class="card-body">
                            <div class="row">
                                
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Pilih Pelanggan</label><br>
                                        <select class="form-control" name="pelanggan" id="pelanggan">
                                            <option value="{{$item->pelanggan}}">
                                                @foreach ($data_pelanggan->where('id',$item->pelanggan) as $items)
                                                {{$items->name}}
                                                @endforeach</option> 
                                            <option value=""></option> 
                                            @foreach ($data_pelanggan as $items)
                                            <option value="{{ $items->id }}"> {{ $items->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Petugas Pelayanan</label>
                                        {{-- <input type="text" placeholder="" name="petugas_pelayanan" class="form-control" required> --}}
                                        <select class="form-control" name="petugas_pelayanan" id="petugas_pelayanan">
                                        {{-- <option value="@if ($message = Session::get('id_user')){{ $message }}@endif">{{}}</option>  --}}
                                            {{-- @foreach ($usernya->where(Session::get('id_user')) as $item)
                                            <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                            @endforeach --}}
                                            <option value="{{$item->pelanggan}}">
                                                @foreach ($usernya->where('id',$item->pelanggan) as $itempp)
                                                {{$itempp->name}}
                                                @endforeach</option> 
                                            <option value=""></option> 

                                            @foreach ($usernya as $itemp)
                                            <option value="{{ $itemp->id }}"> {{ $itemp->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Petugas Sampling</label>
                                        {{-- <input type="text" placeholder="" name="petugas_sampling" class="form-control" required> --}}
                                        <select class="form-control" name="petugas_sampling" id="petugas_sampling">
                                        <option value="{{$item->id}}">
                                        @foreach ($usernya->where('id',$item->id) as $itemidps)
                                        {{$itemidps->name}}
                                            
                                        @endforeach
                                        </option> 
                                            <option value=""></option> 
                                            @foreach ($usernya as $itemps)
                                            <option value="{{ $itemps->id }}"> {{ $itemps->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Lokasi Sampel</label>
                                        <input type="text" placeholder="" name="lokasi" value="{{$item->lokasi}}" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Jenis Sampel</label>
                                        <input type="text" placeholder="" name="jenis" value="{{$item->jenis}}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Jumlah Sampel</label>
                                        <input type="text" placeholder="" name="jml_sampel" value="{{$item->jml_sampel}}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>* Volume/Berat Sampel</label>
                                        <input type="text" placeholder="" name="volume" value="{{ substr($item->volume_berat,0,-3)}}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>* Satuan</label>
                                        <select class="form-control" name="berat" id="berat">
                                            <option value="{{ substr($item->volume_berat,-2)}}">{{ substr($item->volume_berat,-2)}}</option> 
                                            <option value=""></option> 
                                            <option value="ML">ML</option> 
                                            <option value="KG">KG</option> 
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Wadah Sampel</label>
                                        <input type="text" placeholder="" value="{{$item->wadah}}" name="wadah" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Surat Permintaan Pengujian</label><br>
                                        <input type="radio" name="spp" value="1" id="spp" @if ($item->spp == 1)
                                            checked
                                        @endif> Ya <br>
                                        <input type="radio" name="spp" value="0" id="spp" @if ($item->spp == 0)
                                        checked
                                    @endif > Tidak  <br>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Diserahkan Oleh Customer</label>
                                        <input type="text" placeholder="" name="di_serahkan" value="{{$item->di_serahkan}}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Tanggal Sampling</label>
                                        <input type="date" placeholder="" name="tgl_sampling" value="{{$item->tgl_sampling}}" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group" id="tambahan">
                                        <label>* Pilih Parameter Uji</label><br>
                                       
                                        @foreach ($parameter_uji as $item)
                                            @if ($item->id==in_array($item->id,$ppu_explode))
                                            <input type='checkbox' name='parameter_uji[]' value='{{$item->id}}'  checked   /> {!!$item->name!!}
                                            @else
                                            <input type='checkbox' name='parameter_uji[]' value='{{$item->id}}'     /> {!!$item->name!!}
                                            @endif
                                            <br>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-success">Simpan</button>
                        </form>
                    @endforeach
            </div>

        </div>
    </div>
    </div>
@endsection

@push('page-script')

@endpush
