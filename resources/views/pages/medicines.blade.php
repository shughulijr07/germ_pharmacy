<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    <div class="row justify-content-end ">
        <button data-bs-toggle="modal" data-bs-target="#add_medicine_modal" class="btn btn-primary w-25 mb-2">Add Medicine</button>
    </div>
        <div class="row">
            <div class="col-md-12  shadow">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Usage</th>
                                <th>Category</th>
                                <th>Shelf</th>
                                <th>action</th>
                            </tr>
                        </thead>
   
                {{-- Your task is let the user see the inserted medicine ok --}}
                        <tbody>
                            @foreach ($medicines as $medicine)
                            <tr>
                                <td>{{ $medicine->name }}</td>
                                <td>{{ $medicine->usages }}</td>
                                <td>{{ $categories->find($medicine->category_id)->category_name ?? "" }}</td>
                                <td>{{ $shelves->find($medicine->shelf_id)->shelf_name ?? "" }}</td>
                                <td>
                                    <a href="{{ route('edit_medicine',$medicine->id) }}" type="submit" class="btn btn-primary btn-sm ">Edit</a>
                                    <button onclick="deleteMedicine({{ $medicine->id }})" class="btn btn-danger btn-sm" title="remove">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>

   {{-- medicine modal --}}
   <!-- Modal -->
   <div class="modal fade" id="add_medicine_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Adding Medicine </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form method="POST" id="add-medicine-form" action="{{ route('add-new-medicine') }}" >
            @csrf
            <div class="form-group mb-3">
                <label for="">Medicine Name</label>
                <input type="text" name="medicine_name" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="">Medicine Usage</label>
                <textarea name="medicine_usages"  class="form-control"></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="">Medicine Category</label>
                <select name="medicine_category"  class="form-select">
                    <option value="">Choose Category</option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="">Assign Shelf</label>
                <select name="medicine_shelf"  class="form-select">
                    <option value="">Choose Shelf</option>
                    @foreach ($shelves as $shelf)
                    <option value="{{ $shelf->id }}">{{ $shelf->shelf_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row justify-content-center mt-2">
                <button class="btn btn-primary w-25" type="submit">Save</button>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>
{{-- End of Medicine Modal --}}

    {{-- Confirmation to Delete Medicine Modal --}}
    <div class="modal fade" id="deleteMed" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Delete Supplier</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete this User?</p>
            <form action="{{ route('delete_medicine') }}" method="post" id="deleteMed">
                @csrf
                <input type="hidden" name="delDatasId" id="delet_datasId">
                <div class="row justify-center w-25"><button type="submit" class="btn btn-danger btn-sm">Yes</button></div>
            </form>
        </div>
        </div>
    </div>
    </div>
    {{--End of Confirmation to Delete Supplier Modal --}}


</x-app-layout>

@section('script')
   
@endsection


{{-- <div class="col-md-8">
    <select class="form-control" name="uom" id="uom">
        <option value=""> -- Select Unit Of Measure --</option>
        <option value="btl" >BTL</option><option value="pc" >PC</option><option value="vial" >VIAL</option><option value="tube" >TUBE</option><option value="kit" >KIT</option><option value="nill" >NILL</option><option value="box" >BOX</option><option value="cap" >CAP</option><option value="tab" >TAB</option><option value="tin" >TIN</option><option value="LIST519" >LIST519</option><option value="amp" >AMP</option><option value="bag" >BAG</option><option value="vl" >VL</option><option value="pky" >PKT</option><option value="caps" >CAPS</option><option value="supp" >SUPP</option><option value="tabs" >TABS</option><option value="25g" >25g</option><option value="ltr" >LTR</option><option value="pair" >PAIR</option><option value="20lt" >20LT</option><option value="pct" >PCT</option><option value="disc" >DISC</option><option value="100" >100</option><option value="cnt" >CNT</option><option value="roll" >ROLL</option><option value="25" >25</option><option value="doz" >DOZ</option><option value="each" >EACH</option><option value="soln" >SOLN</option><option value="inj" >INJ</option><option value="mt" >MT</option><option value="stchts" >STCHTS</option><option value="Pieces" >PIECES</option><option value="bundle" >BUNDLE</option><option value="book" >BOOK</option><option value="ream" >REAM</option><option value="pad" >PAD</option><option value="bottle" >BOTTOLE</option><option value="bundle" >BUNDLE</option>                    </select>
</div> --}}