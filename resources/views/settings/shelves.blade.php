<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

   <div class="row">
       <div class="col-md-12">
           <div class="alert small alert-info">
               Pharmacy Shelf Lable
           </div>
           <div class="row justify-content-end">
                <button data-bs-toggle="modal" data-bs-target="#medicine_shelf_modal" class="btn btn-primary w-25 mb-2">Add Shelf</button>
            </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Lable</th>
                    <th>Description</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($shelves as $shelf)
              <tr>
                <td>{{ $shelf->shelf_name }}</td>
                <td>{{ $shelf->shelf_description }}</td>
                <td>
                    <a href="{{ route('edit_shelf',$shelf->id) }}" type="submit" class="btn btn-primary btn-sm mb-2"><i class="fa fa-edit"></i></a>
                    <button onclick="deleteShelf({{ $shelf->id }})" class="btn btn-danger btn-sm mb-2" title="remove">X</button>
                </td>
            </tr>
              @endforeach
            </tbody>
        </table>
       </div>
   </div>

         {{-- Create Pharmacy Shelf Modal --}}
         <div class="modal fade" id="medicine_shelf_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Adding Medicine Shelf</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form id="create_shelf_form" action="{{ route('medicine_shelf') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="">Shelf Name</label>
                        <input type="text" name="shelf_name" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Description (Optional)</label>
                        <textarea name="shelf_description"  class="form-control"></textarea>
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
        <div class="modal fade" id="deleteShelf" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Delete Shelf</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this</p>
                    <form action="{{  route('delete_shelf') }}" method="post" id="deleteShelf">
                        @csrf
                         <input type="hidden" name="dataId" id="delete_dataId">
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
