<x-app-layout>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class=" mb-4 text-center">Edit Shelf</h4>
                </div>
                <div class="card-body">

                    <div id="basic-example">
                        <!-- Seller Details -->
                        <h3>Medicine Shelf</h3>
                        <section>
                            <form method="POST" id="update_shelf_form" action="{{ route('update_shelf',$shelf->id) }}">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Shelf name</label>
                                            <input value="{{ $shelf->shelf_name }}" type="text" name="shelf_name" class="form-control" id="basicpill-firstname-input">
                                        </div>  
                                    </div>
                                    <div class="col-lg-6 justify-content-end" >
                                        <div class="form-group mb-3 ">
                                            <label for="">Description</label>
                                            <textarea name="shelf_description" class="form-control">{{ $shelf->shelf_description }}</textarea>
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