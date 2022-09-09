<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CSVChunkController extends Controller
{
    public function chunkCSV(Request $request)
    {
        $request->validate([
            'excelfile'=>'required',
            'data_per_file'=>'required',
        ]);

        if(request()->has('excelfile')){

            $data = file(request()->excelfile);
            
            //Chunk
            $chunks = array_chunk($data, $request->data_per_file);
            $path = public_path('uploads/csvimport/');

            $header = $data[0];

            foreach($chunks as $key => $chunk){
                if($key != 0){
                    array_unshift($chunk, $header);
                }
                
                $name = 'temp'.$key.'.csv';
                file_put_contents($path.$name, $chunk);
            }
            
            session()->flash('success', 'File chunked successfully');
            return redirect()->back();

        }
    }
}
