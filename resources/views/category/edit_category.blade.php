<x-app-layout>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class=" mb-4 text-center">Edit Medicine Category</h4>
                </div>
                <div class="card-body">

                    <div id="basic-example">
                        <!-- Seller Details -->
                        <h3>Medicine Category</h3>
                        <section>
                            <form method="POST" id="update_category_form" action="{{ route('update_category',$category->id) }}">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Category name</label>
                                            <input value="{{ $category->category_name }}" type="text" name="category_name" class="form-control" id="basicpill-firstname-input">
                                        </div>  
                                    </div>
                                    <div class="col-lg-6 justify-content-end" >
                                        <div class="form-group mb-3 ">
                                            <label for="">Description</label>
                                            <textarea name="category_description" class="form-control">{{ $category->category_description }}</textarea>
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