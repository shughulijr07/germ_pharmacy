<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

   <div class="row">
       <div class="col-md-12">
           <div class="alert small alert-info">
               Add Supplier
           </div>
           <div class="row justify-content-end">
                <button data-bs-toggle="modal" data-bs-target="#add_supplier_modal" class="btn btn-primary w-25 mb-2">Add Supplier</button>
            </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                <tr>
                  <td>{{ $supplier->supplier_name }}</td>
                  <td>{{ $supplier->supplier_address }}</td>
                  <td>{{ $supplier->supplier_email }}</td>
                  <td>{{ $supplier->supplier_phone }}</td>
                  <td>
                      <a href="{{ route('edit_suppliers',$supplier->id) }}" type="submit" class="btn btn-primary btn-sm mb-2"><i class="fa fa-edit"></i></a>
                      <button onclick="deleteSupplier({{ $supplier->id }})" class="btn btn-danger btn-sm mb-2" title="remove">X</button>
                  </td>
              </tr>
                @endforeach
            </tbody>
        </table>
       </div>
   </div>

         {{-- Add Supplier Modal --}}
         <div class="modal fade" id="add_supplier_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form id="create_supplier_form" action="{{ route('add_suppliers') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="">Full Name</label>
                        <input type="text" name="supplier_name" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Address</label>
                        <input type="text" name="supplier_address" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Email</label>
                        <input type="email" name="supplier_email"  class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Phone</label>
                        <input type="number" name="supplier_phone"  class="form-control" required>
                    </div>
                    <div class="row justify-content-center mt-2">
                        <button class="btn btn-primary w-25" type="submit">Save</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
        {{-- End of Supplier Modal --}}

        {{-- Confirmation to Delete Supplier Modal --}}
        <div class="modal fade" id="deleteSupplier" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Delete Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this Supplier?</p>
                    <form action="{{  route('delete_suppliers') }}" method="post" id="deleteSupplier">
                        @csrf
                        <input type="hidden" name="delDataId" id="delet_dataId">
                        <div class="row justify-center w-25"><button type="submit" class="btn btn-danger btn-sm">Yes</button></div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        {{--End of Confirmation to Delete Supplier Modal --}}

        @section('script')
   
        @endsection
</x-app-layout>
