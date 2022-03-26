<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalStore;
use Exception;

class MedicalStoreController extends Controller
{
    public function show_medical_store(){
        $stores = MedicalStore::all();
        return view('settings.medical_store',compact('stores'));
    }

    public function add_medical_store(Request $request){
        try {
                $add_store = MedicalStore::create([
                'store_name' => $request->store_name,
                'store_description' => $request->store_description,
            ]);
            if($add_store){
                return response()->json(['success' => "store added"]);
            }
               return response()->json(['error' => "Shelf not Added"]);
        } catch (Exception $e) {
                return response()->json(['error' => "Sorry, Something went wrong..!" .$e->getMessage()]);
        }
    }   

    public function edit_medical_store($id){
        $store = MedicalStore::find($id);
        return view('medicalStore.edit_medical_store')->with('store',$store);
    }

    public function update_medical_store(Request $request, $id){

        $input = $request->all();
        $store = MedicalStore::find($id);
        $check = $store->update($input);

        try {
        if($check){
            return response()->json(['success' => "store Updated Successfull"]);
            }
            return response()->json(['error' => "store not Updated"]);
        } catch (Exception $e) {
                return response()->json(['error' => "Something Went Wrong..!!" .$e->getMessage()]);
        }
        }

        
        public function delete_medical_store(Request $request){
            try {
                $delete =  MedicalStore::destroy($request->dataId);
                if($delete){
                    return response()->json(['success' => "Store Deleted Successful"]);
                }
                return response()->json(['error' => "Store Not Deleted Successful"]);
            } catch (Exception $e) {
                return response()->json(['error' => "Something went wrong..!" .$e->getMessage()]);
            }
        }

}
