<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

   <div class="row ">
       <div class="col-md-12">
           <div class="alert alert-info small">Medicine Categories</div>
           <div class="row justify-content-end">
               <button data-bs-toggle="modal" data-bs-target="#create_medicine_category" class="btn btn-primary w-25 mb-2">Add Category</button>
           </div>
           <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>action</th>
                </tr>
                </thead>
                
                <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->category_description }}</td>
                            <td>
                                <a href="{{ route('edit_category',$category->id) }}" type="submit" class="btn btn-primary btn-sm mb-2"><i class="fa fa-edit"></i></a>
                                <button onclick="deleteCategory({{ $category->id }})" class="btn btn-danger btn-sm mb-2" title="remove">X</button>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
       </div>
   </div>

        {{-- Create Medicine Category Modal --}}
        <div class="modal fade" id="create_medicine_category" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title text-center" id="staticBackdropLabel">Adding Medicine Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form id="create_category_form" action="{{ route('medicine_category') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="">Category Name</label>
                        <input type="text" name="category_name" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Description (Optional)</label>
                        <textarea name="category_description"  class="form-control"></textarea>
                        </div>
                    <div class="row justify-content-center mt-2">
                        <button type="submit" class="btn btn-primary w-25">Save detail</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
        {{-- End of Medicine Category Modal --}}

        {{-- Confirmation to Delete Category Modal --}}
        <div class="modal fade" id="deleteCat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Delete Category</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this</p>
                    <form action="{{  route('delete_category') }}" method="post" id="deleteCategory">
                        @csrf
                        <input type="hidden" name="dataId" id="del_dataId">
                        <div class="row justify-center w-25"><button type="submit" class="btn btn-danger btn-sm">Yes delete</button></div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        {{--End of Confirmation to Delete Category Modal --}}

        @section('script')
          
        @endsection
</x-app-layout>
