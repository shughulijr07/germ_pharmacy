<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\MedicineCategory;
use App\Models\Shelf;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function medicine(){
        $medicines = Medicine::all();
        $categories = MedicineCategory::all();
        $shelves = Shelf::all();
        return view('pages.medicines', compact('medicines','categories','shelves'));
    }
    
    public function stock(){
        return view('pages.stock');
    } 

    public function purchases(){
        return view('pages.purchases');
    } 
    
    public function sales(){
        return view('pages.sales');
    } 

    public function users(){
        return view('pages.users');
    }
}
