<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

   <div class="row">
       <div class="col-md-6">
            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>action</th>
                </tr>
                </thead>
        
                <tbody>
                <tr>
                    <td>Tiger Nixon</td>
                    <td>2000</td>
                    <td><button type="submit" class="btn btn-primary">Add</button></td>
                </tr>
                </tbody>
            </table>
       </div>
       <div class="col-md-6">
           <div class="alert small alert-info">
               Selling Summary
           </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
       </div>
   </div>

</x-app-layout>
