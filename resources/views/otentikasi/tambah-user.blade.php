@extends('layouts.master')
@section('title', 'Tambah User')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Input User</h1>
        </div>
    </section>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">

                    <form action="{{ route('tambah-user-simpan') }}" method="POST">
                        @csrf
                        <input type="hidden" name="creator" value="@if ($message = Session::get('id_user'))
                        {{ $message }}
                        @endif">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Nama Lengkap</label>
                                        <input type="text" placeholder="Input Nama Lengkap" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* No HP</label>
                                        <input type="text" placeholder="Masukan No HP " name="no_hp" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Status User</label>
                                        <select class="form-control" name="status" >
                                            <option value=""></option> 
                                            <option value="1">Aktif</option> 
                                            <option value="2">Non Aktif</option> 
                                        </select><br>
                                        <label><i>password default : 12345678</i></label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Grup User</label>
                                        <select class="form-control" name="grup" >
                                            <option value=""></option> 
                                            <option value="1">user</option> 
                                            <option value="2">Admin</option> 
                                        </select><br>
                                        <label><i>password default : 12345678</i></label>
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

@push('page-script')

@endpush
