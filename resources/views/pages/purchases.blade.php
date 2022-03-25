<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
   <div class="row ">
       <h2 class="">Purchase </h2>
    <div class="col-md-6 ">
           <div class="card">
               <div class="card-body">
                <h4><b>Medicine List</b></h4>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Name</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        @foreach ($medicines as $medicine)
                        <tr> 
                            <td>
                                <a data-bs-toggle="modal"  data-bs-target="#add_purchase{{$medicine->id}}" type="button" class="btn btn-link">{{$medicine->name}}</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
               </div>
           </div>
       </div>

      <div class="col-md-6 ">
          <div class="card">
            <div class="card-body">
                <h4><b>Purchases List</b></h4>
                <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Medicine</th>
                            <th>Quantity</th>
                            <th>BP</th>
                            <th>SP</th>
                            <th></th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        @foreach ($purchases as $purchase)
                        <tr> 
                            <td>
                                <a href="{{route('edit_purchase',$purchase->id)}}"class=" btn-link">{{$medicines->find($purchase->medicine_id)->name ?? "Null"}}</a>
                            </td>
                            <td>{{ $purchase->quantity}}</td>
                            <td>{{ $purchase->bp_per_qty}}</td>
                            <td>{{ $purchase->sp_per_qty}}</td>
                            <td>
                               <button onclick="deletePurchase({{ $purchase->id }})"  class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                      
                    </tbody>
                </table>
                <div class="row justify-content-center">
                    <div class="col-md-2">
                        <div class="row justify-content-end">
                            <a  class="btn btn-danger">Remove all</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                    <button class="btn btn-primary btn-block">Finish and Save</button>
                    </div>
                  </div>
            </div>
          </div>
    </div>
</div>

    {{-- Add Purchase Modal --}}
    @foreach ($medicines as $medicine)
    <div class="modal fade" id="add_purchase{{$medicine->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel"><b>Purchase:</b> {{$medicine->name}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="add_purchase_form{{$medicine->id}}" action="{{route('add_purchase')}}" method="POST">
                <input type="hidden" value="{{$medicine->id}}" name="medicine_id" id="medicine_id">
                @csrf
                <div class="row">
                    <div class="form-group mt-3 col-md-6">
                        <label for="">Quantity</label>
                        <input type="number" name="purchase_quantity" class="form-control" required>
                    </div>
                    <div class="form-group mt-3 col-md-6">
                        <label for="">Total Buying Price</label>
                        <input type="number" name="total_buying_price" class="form-control" required>
                    </div>
                    <div class="form-group mt-3 col-md-6">
                        <label for="">Buying Price Per Quantity</label>
                        <input type="number" name="buying_price_per_qnt"  class="form-control" required>
                    </div>
                    <div class="form-group mt-3 col-md-6">
                        <label for="">Selling Price Per Quantity</label>
                        <input type="number" name="selling_price_per_qnt"  class="form-control" required>
                    </div>

                    <div class="form-group mt-3 col-md-6">
                        <label for="">Purhchase Date</label>
                        <input type="date" name="purchase_date" class="form-control" required>
                    </div>
                    <div class="form-group mt-3 col-md-6">
                        <label for="">Manufactured Date</label>
                        <input type="date" name="manufactured_date" class="form-control" required>
                    </div>
                    <div class="form-group mt-3 col-md-6">
                        <label for="">Expire Date</label>
                        <input type="date" name="expired_date"  class="form-control" required>
                    </div>
                    <div class="form-group mt-3 col-md-6">
                        <label for="">Medical Store</label>
                        <select name="medical_store_id"  class="form-select">
                            <option value="">Choose Store</option>
                            @foreach ($stores as $store)
                                <option value="{{$store->id}}">{{$store->store_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-3 col-md-6">
                        <label for="">Medicine Supplier</label>
                        <select name="medicine_supplier_id"  class="form-select">
                            <option value="">Choose Supplier</option>
                            @foreach ($suppliers as $supplier)
                            <option value="{{$supplier->id}}">{{$supplier->supplier_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
               
                <div class="row justify-content-center mt-4">
                    <button class="btn btn-primary w-25" type="submit">Save</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    </div>
    @endforeach
    {{-- End of Purchase Modal --}}

    
    {{-- Confirmation to Delete Purchase Modal --}}
    <div class="modal fade" id="deletePurchase" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Delete Store</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete Purchase?</p>
                <form action="{{  route('delete_purchase') }}" method="post" id="deleteStore">
                    @csrf
                    <input type="hidden" name="dataId" id="delet_datasId">
                    <div class="row justify-center w-25"><button type="submit" class="btn btn-danger btn-sm">Yes</button></div>
                </form>
            </div>
            </div>
        </div>
        </div>
    {{--End of Confirmation to Delete Purchase Modal --}}
    
@section('script')

@endsection
</x-app-layout>

{{-- <div class="col-md-8">
    <select class="form-control" name="uom" id="uom">
        <option value=""> -- Select Unit Of Measure --</option>
        <option value="btl" >BTL</option><option value="pc" >PC</option><option value="vial" >VIAL</option><option value="tube" >TUBE</option><option value="kit" >KIT</option><option value="nill" >NILL</option><option value="box" >BOX</option><option value="cap" >CAP</option><option value="tab" >TAB</option><option value="tin" >TIN</option><option value="LIST519" >LIST519</option><option value="amp" >AMP</option><option value="bag" >BAG</option><option value="vl" >VL</option><option value="pky" >PKT</option><option value="caps" >CAPS</option><option value="supp" >SUPP</option><option value="tabs" >TABS</option><option value="25g" >25g</option><option value="ltr" >LTR</option><option value="pair" >PAIR</option><option value="20lt" >20LT</option><option value="pct" >PCT</option><option value="disc" >DISC</option><option value="100" >100</option><option value="cnt" >CNT</option><option value="roll" >ROLL</option><option value="25" >25</option><option value="doz" >DOZ</option><option value="each" >EACH</option><option value="soln" >SOLN</option><option value="inj" >INJ</option><option value="mt" >MT</option><option value="stchts" >STCHTS</option><option value="Pieces" >PIECES</option><option value="bundle" >BUNDLE</option><option value="book" >BOOK</option><option value="ream" >REAM</option><option value="pad" >PAD</option><option value="bottle" >BOTTOLE</option><option value="bundle" >BUNDLE</option>                    </select>
</div> --}}