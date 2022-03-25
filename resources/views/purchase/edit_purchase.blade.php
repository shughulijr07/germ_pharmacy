<x-app-layout>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class=" mb-4 text-center">Edit <b>{{$medicines->find($purchase->medicine_id)->name}} </b> Purchase </h4>
                </div>
                <div class="card-body">
                    <div id="basic-example">
                        <!-- Seller Details -->
                        <h3>Purchases</h3>
                        <section>
                            <form method="POST" id="update_purchase_form" action="{{ route('update_purchase',$purchase->id) }}">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="form-group mt-3 col-md-6">
                                        <label for="">Quantity</label>
                                        <input type="number" value="{{$purchase->quantity}}" name="purchase_quantity"  class="form-control" required>
                                    </div>
                                    <div class="form-group mt-3 col-md-6">
                                        <label for="">Total Buying Price</label>
                                        <input type="number" name="total_buying_price" value="{{$purchase->tb_price}}" class="form-control" required>
                                    </div>
                                    <div class="form-group mt-3 col-md-6">
                                        <label for="">Buying Price Per Quantity</label>
                                        <input type="number" name="buying_price_per_qnt" value="{{$purchase->bp_per_qty}}"   class="form-control" required>
                                    </div>
                                    <div class="form-group mt-3 col-md-6">
                                        <label for="">Selling Price Per Quantity</label>
                                        <input type="number" name="selling_price_per_qnt" value="{{$purchase->sp_per_qty}}"   class="form-control" required>
                                    </div>
                
                                    <div class="form-group mt-3 col-md-6">
                                        <label for="">Purhchase Date</label>
                                        <input type="date" name="purchase_date" value="{{$purchase->date_purchased}}"   class="form-control" required>
                                    </div>
                                    <div class="form-group mt-3 col-md-6">
                                        <label for="">Manufactured Date</label>
                                        <input type="date" name="manufactured_date" value="{{$purchase->manufactured_date}}"   class="form-control" required>
                                    </div>
                                    <div class="form-group mt-3 col-md-6">
                                        <label for="">Expire Date</label>
                                        <input type="date" name="expired_date" value="{{$purchase->expire_date}}"    class="form-control" required>
                                    </div>
                                    <div class="form-group mt-3 col-md-6">
                                        <label for="">Medical Store</label>
                                        <select name="medical_store_id"  class="form-select">
                                            <option value="{{$purchase->medical_stores_id}}">{{$stores->find($purchase->medical_stores_id)->store_name}}</option>
                                            @foreach ($stores as $store)
                                                <option value="{{$store->id}}">{{$store->store_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mt-3 col-md-6">
                                        <label for="">Medicine Supplier</label>
                                        <select name="medicine_supplier_id"  class="form-select">
                                            <option value="{{$purchase->supplier_id}}">{{$suppliers->find($purchase->supplier_id)->supplier_name}}</option>
                                            @foreach ($suppliers as $supplier)
                                            <option value="{{$supplier->id}}">{{$supplier->supplier_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <center><button class="btn btn-primary btn-lg btn-block mt-5" type="submit">Update</button></center>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>