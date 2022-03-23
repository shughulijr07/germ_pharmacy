<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shelf;
use Exception;

class ShelfController extends Controller
{
    public function show_shelves(){
        $shelves = Shelf::all();
        return view('settings.shelves', compact('shelves'));
    }

    public function medicine_shelf(Request $request){
        $rules = [
            'shelf_name' => 'required|string',
        ];
        $request->validate($rules);

        try {
                $add_shelf = Shelf::create([
                'shelf_name' => $request->shelf_name,
                'shelf_description' => $request->shelf_description,
            ]);
            if($add_shelf){
                return response()->json(['success' => "Shelf added"]);
            }
               return response()->json(['error' => "Shelf not Added"]);
        } catch (Exception $e) {
                return response()->json(['error' => "Sorry, Something went wrong..!" .$e->getMessage()]);
        }
    }   

    public function edit_shelf($id){
        $shelf = Shelf::find($id);
        return view('shelf.edit_shelf')->with('shelf',$shelf);
    }

    public function update_shelf(Request $request, $id){
        $rules = [
            'shelf_name' => 'required|string',
        ];
        $request->validate($rules);

        $input = $request->all();
        $shelf = Shelf::find($id);
        $check = $shelf->update($input);

        try {
        if($check){
            return response()->json(['success' => "Shelf Updated Successfull"]);
            }
            return response()->json(['error' => "Shelf not Updated"]);
        } catch (Exception $e) {
                return response()->json(['error' => "Something Went Wrong..!!" .$e->getMessage()]);
        }
        }

        public function delete_shelf(Request $request){

            try {
                $delete =  Shelf::destroy($request->dataId);
                if($delete){
                    return response()->json(['success' => "Shelf Deleted Successful"]);
                }
                return response()->json(['error' => "Shelf Not Deleted Successful"]);
            } catch (Exception $e) {
                return response()->json(['error' => "Something went wrong..!" .$e->getMessage()]);
        
            }
        }
}
