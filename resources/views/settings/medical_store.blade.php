<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

   <div class="row">
       <div class="col-md-12">
           <div class="alert small alert-info">
               Medical Store
           </div>
           <div class="row justify-content-end">
                <button data-bs-toggle="modal" data-bs-target="#medical_store_modal" class="btn btn-primary w-25 mb-2">Add Store</button>
            </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Store Name</th>
                    <th>Store Description</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stores as $store)
                <tr>
                    <td>{{ $store->store_name }}</td>
                    <td>{{ $store->store_description }}</td>
                    <td>
                        <a href="{{ route('edit_medical_store',$store->id) }}" type="submit" class="btn btn-primary btn-sm mb-2"><i class="fa fa-edit"></i></a>
                        <button onclick="deleteStore({{ $store->id }})" class="btn btn-danger btn-sm mb-2" title="remove">X</button>
                    </td>
                </tr>
                @endforeach
        </table>
       </div>
   </div>

         {{-- Create Pharmacy Shelf Modal --}}
         <div class="modal fade" id="medical_store_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Adding Medical Store</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form id="add_medical_store_form" action="{{ route('add_medical_store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="">Store Name</label>
                        <input type="text" name="store_name" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Store Description</label>
                        <textarea  type="text" name="store_description"  class="form-control"></textarea>
                        </div>
                    <div class="row justify-content-center mt-2">
                        <button class="btn btn-primary w-25" type="submit">Save</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
        {{-- End of Medicine Shelf Modal --}}

        {{-- Confirmation to Delete Shelf Modal --}}
        <div class="modal fade" id="deleteStore" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Delete Store</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this store?</p>
                    <form action="{{  route('delete_medical_store') }}" method="post" id="deleteStore">
                        @csrf
                        <input type="hidden" name="dataId" id="del_dataId">
                        <div class="row justify-center w-25"><button type="submit" class="btn btn-danger btn-sm">Yes</button></div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        {{--End of Confirmation to Delete Category Modal --}}

        @section('script')
   
        @endsection
</x-app-layout>
