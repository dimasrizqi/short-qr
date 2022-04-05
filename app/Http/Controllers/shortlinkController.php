<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Session;
use Carbon\Carbon;


class shortlinkController extends Controller
{
    public function index(){
        $datashortlink = DB::table('shortlink')->where('id_user',session()->get('id_user'))->orderBy('nama_link','DESC')->Paginate(10);
        return view('shortlink.index',[
            'datashortlink'=>$datashortlink,
            ]);
    }
    
    public function print(Request $request){
        $host = $request->getSchemeAndHttpHost(); 
        $datashortlink = DB::table('shortlink')->where('id_user',session()->get('id_user'))->get();
        return view('shortlink.print',[
            'datashortlink'=>$datashortlink,
            'host'=>$host
            ]);
    }

    public function create(){
        return view('shortlink.create');
       
    }
    
   
   public function store(Request $request){
       
    function secure_random_string($length) {
            $random_string = '';
            for($i = 0; $i < $length; $i++) {
                $number = random_int(0, 36);
                $character = base_convert($number, 10, 36);
                $random_string .= $character;
            }
         
            return $random_string;
        }
        
    $shortlink = secure_random_string(7);
    
    $nama_link = DB::table('shortlink')->where('nama_link',$request->nama_link)->first();
    $url_asli = DB::table('shortlink')->where('nama_link',$request->url_asli)->first();
    
    // while( DB::table('shortlink')->where('shortlink',$shortlink)->doesntExist() ){
    // $shortlink = secure_random_string(7);
    // }
    
    if ($url_asli === null &&  $nama_link === null ){
        
    $data_insert[] = array(
        'id_user' => session()->get('id_user'),
        'nama_link' =>  $request->nama_link,
        'shortlink' =>  $shortlink,
        'url_asli' =>  $request->url_asli
    );
   
        
    
    DB::table('shortlink')->insert( $data_insert);
    // return Redirect()->route('shortlink.edit',$shortlink) -> with('success','berhasil menambah data');
    return Redirect()->route('shortlink.index') -> with('success','berhasil menambah data');
    }else{
        return Redirect()->route('shortlink.create') -> with('failed','data sudah ada, coba nama & url lain,');
    }
    
    }
    
    
    public function update(Request $request,  $id)
    {
    $data_insert[] = array(
    'id_user' => session()->get('id_user'),
    'nama_link' =>  $request->nama_link,
    'shortlink' =>  $shortlink,
    'url_asli' =>  $request->url_asli
    );
    
    }
    
    
    
    public function edit(Request $request,$id)
    {
        $datashortlink = DB::table('shortlink')->where('shortlink',$id)->first();
        $host = $request->getSchemeAndHttpHost(); 
        
        return view('shortlink.edit',[
            'datashortlink'=>$datashortlink,
            'host'=>$host
            ]);
    }
    public function destroy($id)

    {
        DB::table('shortlink')->where('id','=', $id)->delete();
        
        return redirect()->route('shortlink.index') -> with('deleted','berhasil menghapus');
    }
    
    public function shortlink($shortlink){
        
        $datashortlink = DB::table('shortlink')->where('shortlink',$shortlink)->first();
        if ($datashortlink === null){
           echo('url tidak ditemukan');
        }else{
        return redirect($datashortlink->url_asli);
        }
       
   }
    
}
