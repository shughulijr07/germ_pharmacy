<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\MedicineCategory;
use App\Models\Shelf;
use Exception;

class MedicineController extends Controller
{
  
    public function add_medicine(Request $request){
        // remember we will do request validation let focus firt in inserting data

        $rules = [
            'name' => 'required|string|unique:medicines'
        ];
       try {
            $data = [
                'name' => $request->medicine_name,
                'usages' => $request->medicine_usages,
                'category_id' => $request->medicine_category,
                'shelf_id' => $request->medicine_shelf,
            ];

            $insert =  Medicine::create($data); //return true or false

            if ($insert) {
                return response()->json(['success' => "Medicine Added Successful"]);
            }
            return response()->json(['error' => "Medicine not Added"]);
       } catch (Exception $e) {
          return response()->json(['error' => "Sorry something went wrong !! " .$e->getMessage()]);
       }
    }

    
    public function edit_medicine($id){
        $medicines = Medicine::find($id);
        $categories = MedicineCategory::all();
        $shelves = Shelf::all();
        return view('medicine.edit_medicine', compact('medicines','categories','shelves'));
    }

    public function update_medicine(Request $request, $id){ 
        try {    
            $input = $request->all();
            $medicine = Medicine::find($id);
            $checkData = $medicine->update($input);
        if($checkData){
            return response()->json(['success' => "Medicine Updated Successfull"]);
            }
            return response()->json(['error' => "Medicine not Updated"]);
        } catch (Exception $e) {
                return response()->json(['error' => "Something Went Wrong..!!" .$e->getMessage()]);
        }
        }

        public function delete_medicine(Request $request){
            // dd($request);   
             try {
                 $deleteMedicine =  Medicine::destroy($request->delDatasId);
                 if($deleteMedicine){
                     return response()->json(['success' => "Medicine Deleted Successful"]);
                 }
                 return response()->json(['error' => "Medicine Not Deleted Successful"]);
             } catch (Exception $e) {
                 return response()->json(['error' => "Something went wrong..!" .$e->getMessage()]);
             }
         }
    }

