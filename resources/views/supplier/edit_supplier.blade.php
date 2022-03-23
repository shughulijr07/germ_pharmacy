<x-app-layout>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class=" mb-4 text-center">Edit Supplier</h4>
                </div>
                <div class="card-body">

                    <div id="basic-example">
                        <!-- Seller Details -->
                        <h3>Supplier</h3>
                        <section>
                            <form method="POST" id="update_supplier_form" action="{{ route('update_suppliers',$supplier->id) }}">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Supplier name</label>
                                            <input value="{{ $supplier->supplier_name }}" type="text" name="supplier_name" class="form-control" id="basicpill-firstname-input">
                                        </div>  
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Supplier address</label>
                                            <input value="{{ $supplier->supplier_address }}" type="text" name="supplier_address" class="form-control" id="basicpill-firstname-input">
                                        </div>  
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Supplier email</label>
                                            <input value="{{ $supplier->supplier_email }}" type="text" name="supplier_email" class="form-control" id="basicpill-firstname-input">
                                        </div>  
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Supplier Phone</label>
                                            <input value="{{ $supplier->supplier_phone }}" type="text" name="supplier_phone" class="form-control" id="basicpill-firstname-input">
                                        </div>  
                                    </div>
                                 
                                </div>
                                <center><button class="btn btn-primary btn-lg btn-block" type="submit">Update</button></center>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>