<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;

class ImportExcelController extends Controller
{
    public function index()
    {
        $data = DB::table('tbl_customer')->orderBy('id', 'DESC')->get();
        return view('import_excel', compact('data'));
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'select_file' => 'required|mimes:xls,xlsx'
        ]);
        $path = $request->file('select_file')->getRealPath();

        $data = Excel::load($path)->get();

        if($data->count() > 0){
            foreach($data->toArray() as $key => $value){
                foreach($value as $row){
                    $insert_data[] = array(
                        'CustomerName'  =>  $row['customer_name'],
                        'Gender'        =>  $row['gender'],
                        'Address'       =>  $row['address'],
                        'City'          =>  $row['city'],
                        'PostalCode'    =>  $row['postal_code'],
                        'Country'       =>  $row['country'],

                    );
                }
            }
            if(!empty($insert_data)){
                DB::table('tbl_customer')->insert($insert_data);
            }
        }
        return back()->with('success', 'Excel Data Imported successfully.');
    }
}
