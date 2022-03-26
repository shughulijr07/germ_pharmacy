<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\MedicalStore;
use App\Models\Medicine;
use App\Models\Supplier;
use Exception;

class PurchaseController extends Controller
{
   public function add_purchase(Request $request){
        try {
            $data = [
                'medicine_id' => $request->medicine_id,
                'quantity' => $request->purchase_quantity,
                'tb_price' => $request->total_buying_price,
                'bp_per_qty' => $request->buying_price_per_qnt,
                'sp_per_qty' => $request->selling_price_per_qnt,
                'date_purchased' => $request->purchase_date,
                'manufactured_date' => $request->manufactured_date,
                'expire_date' => $request->expired_date,
                'medical_stores_id' => $request->medical_store_id,
                'supplier_id' => $request->medicine_supplier_id,
            ];

            $insert =  Purchase::create($data); 
            if ($insert) {
                return redirect()->back();
                // return response()->json(['success' => "Purchase added"]);
            }
                return response()->json(['error' => "Purchase not added"]);
           } catch (Exception $e) {
              return response()->json(['error' => "Sorry something went wrong !! " .$e->getMessage()]);
           }
   }

   public function edit_purchase($id){
    $medicines = Medicine::all();
    $purchase = Purchase::find($id);
    $stores = MedicalStore::all();
    $suppliers = Supplier::all();
    return view('purchase.edit_purchase', compact('medicines','stores','suppliers','purchase'));
}


public function update_purchase(Request $request, $id){ 
    try {
        $input = $request->all();
        $purchase = Purchase::find($id);
        $checkData = $purchase->update($input);
    if($checkData){
        return response()->json(['success' => "Purhcase Updated Successfull"]);
        }
        return response()->json(['error' => "Purchase not Updated"]);
    } catch (Exception $e) {
            return response()->json(['error' => "Something Went Wrong..!!" .$e->getMessage()]);
    }
    }

   public function delete_purchase(Request $request){
    try {
        $delete =  Purchase::destroy($request->dataId);
        if($delete){
            return response()->json(['success' => "Purchase Deleted Successful"]);
        }
        return response()->json(['error' => "Purchase Not Deleted Successful"]);
    } catch (Exception $e) {
        return response()->json(['error' => "Something went wrong..!" .$e->getMessage()]);
    }
}

  
public function delete_all_purchase(){
    try {
        $delete =  Purchase::where('confirmed', '=', 0)->delete();
                if($delete){
            return response()->json(['success' => "Purchase Deleted Successful"]);
        }
        return response()->json(['error' => "Purchase Not Deleted Successful"]);
    } catch (Exception $e) {
        return response()->json(['error' => "Something went wrong..!" .$e->getMessage()]);
    }
}
}
