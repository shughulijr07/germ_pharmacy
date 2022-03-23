<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

   <div class="row">
       <div class="col-md-12">
            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>Medicine</th>
                    <th>Open stock</th>
                    <th>Closing Stock</th>
                    <th>action</th>
                </tr>
                </thead>
        
        
                <tbody>
                <tr>
                    <td>Tiger Nixon</td>
                    <td>200</td>
                    <td>206</td>
                    <td>
                        <button type="submit" class="btn btn-warning btn-sm">Adjust</button>
                    </td>
                </tr>
                </tbody>
            </table>
       </div>
   </div>

</x-app-layout>


{{-- <div class="col-md-8">
    <select class="form-control" name="uom" id="uom">
        <option value=""> -- Select Unit Of Measure --</option>
        <option value="btl" >BTL</option><option value="pc" >PC</option><option value="vial" >VIAL</option><option value="tube" >TUBE</option><option value="kit" >KIT</option><option value="nill" >NILL</option><option value="box" >BOX</option><option value="cap" >CAP</option><option value="tab" >TAB</option><option value="tin" >TIN</option><option value="LIST519" >LIST519</option><option value="amp" >AMP</option><option value="bag" >BAG</option><option value="vl" >VL</option><option value="pky" >PKT</option><option value="caps" >CAPS</option><option value="supp" >SUPP</option><option value="tabs" >TABS</option><option value="25g" >25g</option><option value="ltr" >LTR</option><option value="pair" >PAIR</option><option value="20lt" >20LT</option><option value="pct" >PCT</option><option value="disc" >DISC</option><option value="100" >100</option><option value="cnt" >CNT</option><option value="roll" >ROLL</option><option value="25" >25</option><option value="doz" >DOZ</option><option value="each" >EACH</option><option value="soln" >SOLN</option><option value="inj" >INJ</option><option value="mt" >MT</option><option value="stchts" >STCHTS</option><option value="Pieces" >PIECES</option><option value="bundle" >BUNDLE</option><option value="book" >BOOK</option><option value="ream" >REAM</option><option value="pad" >PAD</option><option value="bottle" >BOTTOLE</option><option value="bundle" >BUNDLE</option>                    </select>
</div> --}}