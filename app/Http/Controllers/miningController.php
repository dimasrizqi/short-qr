<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class miningController extends Controller
{
    public function index(){
        $datamining = DB::table('mining')->orderBy('timestamp','DESC')->Paginate(10);
        $jumlah_coin = DB::table('mining')->sum('hasil_mining');
        return view('mining.index',[
            'datamining'=>$datamining,
            'jumlah_coin'=>$jumlah_coin
            ]);
    }

    public function create(){
        return view('mining.create');
       
   }
   public function proses(){
        return view('mining.create');
       
   }
   public function datadasar(Request $request){
        $datauser = DB::table('users')->where('id',$request->id)->get();
        return view('mining.data_dasar',compact('datauser')
            
        
        );
       
   }
    
    public function kalkulasi(Request $request){
        $datamining = DB::table('mining')->where('id',$request->id)->get();
        $datauser = DB::table('users')->orderBy('name','ASC')->where('status',1)->get();
        $dataexchange = DB::table('exchange_information')->where('status',1)->get();
        $total_hashrate = DB::table('users')->where('status',1)->sum('hashrate');
        $total_payout_rupiah = DB::table('users')->where('payout_rupiah',1)->count('payout_rupiah');
        //dd($datamining[0]->kurs);
        return view('mining.kalkulasi',[
            'datauser'=>$datauser,
            'total_hashrate'=>$total_hashrate,
            'datamining'=>$datamining,
            'dataexchange'=>$dataexchange,
            'total_payout_rupiah'=>$total_payout_rupiah
            ]);
       
   }
   public function store(Request $request){
    $data_insert[] = array(
        'kurs' => $request->kurs,
        'hasil_mining' => $request->hasil_mining
    );

    // dd($data_insert);
        DB::table('mining')->insert( $data_insert);
        return Redirect()->route('mining.index') -> with('success','berhasil menambah data');
    }
    public function update(Request $request,  $id)
    {
        $volume_berat = $request->volume. " " . $request->berat;
        $data_insert[] = array(
            'pelanggan' => $request->pelanggan,
            'di_serahkan' => $request->di_serahkan,
            'petugas_pelayanan' => $request->petugas_pelayanan,
            'petugas_sampling' => $request->petugas_sampling,
            'lokasi' => $request->lokasi,
            'jenis' => $request->jenis,
            'wadah' => $request->wadah,
            'volume_berat' => $volume_berat,
            'no_sampel' => $request->no_sampel,
            'jml_sampel' => $request->jml_sampel,
            'tgl_sampling' => $request->tgl_sampling,
            'no_fpps' => $request->no_fpps,
            'spp' => $request->spp
        );
        DB::table('buku_induk')
              ->where('id', $id)
              ->update(['pelanggan' => $request->pelanggan,
              'di_serahkan' => $request->di_serahkan,
              'petugas_pelayanan' => $request->petugas_pelayanan,
              'petugas_sampling' => $request->petugas_sampling,
              'lokasi' => $request->lokasi,
              'jenis' => $request->jenis,
              'wadah' => $request->wadah,
              'volume_berat' => $volume_berat,
              'no_sampel' => $request->no_sampel,
              'jml_sampel' => $request->jml_sampel,
              'tgl_sampling' => $request->tgl_sampling,
              'no_fpps' => $request->no_fpps,
              'spp' => $request->spp]);

        return redirect()->route('bukuinduk.index')
                        ->with('success','Data berhasil di update');
    }

    
    public function edit($id)
    {
        $usernya = DB::table('users')->OrderBy('name','ASC')->get();
        $data_pelanggan = DB::table('data_pelanggan')->get();
        $buku_induk = DB::table('buku_induk')->where('id',$id)->orderBy('no_fpps','desc')->get();
        $no_fpps = $buku_induk[0]->no_fpps; 
        $parameter_uji = DB::table('parameter_uji')->get();
        $pu_fpps = DB::table('pilih_p_u')->where('no_fpps',$no_fpps)->get();
        foreach ($pu_fpps as $item_pu){
            $ppu []= $item_pu->parameter_uji;
        }
        // dd($pu_fpps);
        $ppu_implode = implode(',',$ppu);
        $ppu_explode = explode(",",$ppu_implode);
        //  dd(explode(",",$ppu_implode));
        return view('lab_kimia.bukuinduk.edit',[
            'buku_induk' => $buku_induk,
            'ppu_explode' => $ppu_explode,
            'ppu_implode' => $ppu_implode,
            'usernya' => $usernya,
            'data_pelanggan' => $data_pelanggan,
            'parameter_uji' => $parameter_uji]);
        
    }
    public function destroy($id)

    {
        // dd($id);
        
        DB::table('mining')->where('id','=', $id)->delete();
        
        return redirect()->route('mining.index') -> with('deleted','berhasil menghapus');
    }
    public function print(Request $request )
    {
        $buku_induk = DB::table('buku_induk')->where('id',$request->id)->get();
        $data_pelanggan = DB::table('data_pelanggan')->get();
        $no_fpps = $buku_induk[0]->no_fpps;
        //Download as pdf
        $pdf = \PDF::setOptions(['isRemoteEnabled' => true])
            ->loadView('lab_kimia.print.fpps',
            [
                'buku_induk'=>$buku_induk
            ])
            ->setPaper('a4', 'potrait');
        return $pdf->stream($no_fpps.".pdf");
      
    }

}
