<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Models\MedicineCategory;
use Exception;
use Illuminate\Support\Js;

class MedicineCategoryController extends Controller
{
    public function show_category(){
        $categories = MedicineCategory::all();
        return view('settings.category',compact('categories'));
    }

    public function medicine_category(Request $request){
        $rules = [
            'category_name' => 'required|string',
        ];
        $request->validate($rules);

        try {
                $add_category = MedicineCategory::create([
                'category_name' => $request->category_name,
                'category_description' => $request->category_description,
            ]);
            if($add_category){
                return response()->json(['success' => "Category added"]);
            }
               return response()->json(['error' => "Category not Added"]);
        } catch (Exception $e) {
                return response()->json(['error' => "Sorry, Something went wrong..!" .$e->getMessage()]);
        }
    }

    public function edit_category($id){
        $category = MedicineCategory::find($id);
        return view('category.edit_category')->with('category',$category);
    }

    public function update_category(Request $request, $id){
        $rules = [
            'category_name' => 'required|string',
        ];
        $request->validate($rules);

        $input = $request->all();
        $category = MedicineCategory::find($id);
        $check = $category->update($input);

        try {
        if($check){
            return response()->json(['success' => "Category Updated Successfull"]);
            }
            return response()->json(['error' => "Medicine Category not Updated"]);
        } catch (Exception $e) {
                return response()->json(['error' => "Something Went Wrong..!!" .$e->getMessage()]);
        }
        }

        public function delete_category(Request $request){

            try {
                $delete =  MedicineCategory::destroy($request->dataId);
                if($delete){
                    return response()->json(['success' => "Category Deleted Successful"]);
                }
                return response()->json(['error' => "Category Not Deleted Successful"]);
            } catch (Exception $e) {
                return response()->json(['error' => "Category Not Deleted Successful" .$e->getMessage()]);
        
            }
        }
            
    }
