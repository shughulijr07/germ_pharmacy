<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Exception;

class SuppliersController extends Controller
{
    public function show_suppliers(){
        $suppliers = Supplier::all();
        return view('settings.suppliers',compact('suppliers'));
    }

    public function add_suppliers(Request $request){
        try {
            $data = [
                'supplier_name' => $request->supplier_name,
                'supplier_address' => $request->supplier_address,
                'supplier_email' => $request->supplier_email,
                'supplier_phone' => $request->supplier_phone,
            ];

            $insert =  Supplier::create($data); 

            if ($insert) {
                return response()->json(['success' => "Supplier added"]);
            }

            return response()->json(['error' => "Supplier not added"]);
       } catch (Exception $e) {
          return response()->json(['error' => "Sorry something went wrong !! " .$e->getMessage()]);
       }
    }

    public function edit_suppliers($id){
        $supplier = Supplier::find($id);
        return view('supplier.edit_supplier', compact('supplier'));
    }   
    
    public function update_suppliers(Request $request, $id){ 
        try {
            $input = $request->all();
            $supplier = Supplier::find($id);
            $checkData = $supplier->update($input);
        if($checkData){
            return response()->json(['success' => "supplier Updated Successfull"]);
            }
            return response()->json(['error' => "supplier not Updated"]);
        } catch (Exception $e) {
                return response()->json(['error' => "Something Went Wrong..!!" .$e->getMessage()]);
        }
        }

        public function delete_suppliers(Request $request){
           // dd($request);   
            try {
                $deleteSupplier =  Supplier::destroy($request->delDataId);
                if($deleteSupplier){
                    return response()->json(['success' => "Sup Deleted Successful"]);
                }
                return response()->json(['error' => "Shelf Not Deleted Successful"]);
            } catch (Exception $e) {
                return response()->json(['error' => "Something went wrong..!" .$e->getMessage()]);
            }
        }

}
