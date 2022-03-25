<x-app-layout>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class=" mb-4 text-center">Edit Medicine</h4>
                </div>
                <div class="card-body">

                    <div id="basic-example">
                        <!-- Seller Details -->
                        <h3>Change Medicine Details</h3>
                        <section>
                            <form method="POST" id="update_medicine_form" action="{{ route('update_medicine',$medicines->id) }}">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Medicine name</label>
                                            <input value="{{ $medicines->name }}" type="text" name="name" class="form-control" id="basicpill-firstname-input">
                                        </div>  
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mt-2">
                                            <label for=""></label>
                                            <select name="category_id"  class="form-select" name="category_id">
                                                <option value="{{ $medicines->category_id }}">{{ $medicines->category_name }}</option>
                                                    @foreach ($categories as $category) 
                                                    <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                                    @endforeach
                                                </select>
                                        </div>  
                                    </div>
                                </div>
                                <div class="row">                                
                                    <div class="col-lg-6 justify-content-end" >
                                        <div class="form-group mb-3 ">
                                            <label for="">Medicine Usage</label>
                                            <textarea name="usages" class="form-control">{{ $medicines->usages }}</textarea>
                                            </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mt-2">
                                            <label for=""></label>
                                            <select class="form-select" name="shelf-id">
                                                <option value="{{ $medicines->shelf_id }}">{{ $medicines->shelf_name }}</option>
                                                    @foreach ($shelves as $shelf) 
                                                    <option value="{{ $shelf->shelf_id }}">{{ $shelf->shelf_name }}</option>
                                                    @endforeach
                                                </select>
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