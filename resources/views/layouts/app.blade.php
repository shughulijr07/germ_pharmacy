<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Pharmacy') }}</title>

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/logo/logo.png') }}">

        <!-- DataTables -->
        <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />     
         <!-- toastr -->
        <link rel="stylesheet" href="{{ URL::to('assets/plugins/toastr/toastr.min.css') }}">


        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    </head>
    <body data-layout="horizontal" data-topbar="colored">

        <!-- Begin page -->
        <div id="layout-wrapper">
            @include('layouts.navigation')
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        <main>
                            {{ $slot }}
                        </main>
                    </div>
                </div>
            </div>
        </div>
        {!! Toastr::message() !!}

         <!-- JAVASCRIPT -->
         <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
         <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
         <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
         <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
         <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
         <script src="{{ asset('assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
         <script src="{{ asset('assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
 
         <!-- apexcharts -->
         <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
 
         <script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>
        {{-- toastr --}}
        <script src="{{ URL::to('assets/plugins/toastr/toastr.min.js') }}"></script>
          <!-- Required datatable js -->
        <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <!-- Buttons examples -->
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/libs/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
        
        <!-- Responsive examples -->
        <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

        <!-- Datatable init js -->
        <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
 
         <!-- App js -->
         <script src="{{ asset('assets/js/jquery.form.min.js') }}"></script>
         <script>
             
            $(document).ready(function(e) { 
                $('#add-medicine-form').ajaxForm({
                    success: function(data) {
                        if(data.error){
                            toastr.error(data.error);
                        }
                        if(data.success){
                            toastr.success(data.success);
                            $('#add-medicine-form')[0].reset();
                            location.reload();
                        }
                    }
                })
             });

            //  Category Ajax
             $(document).ready(function(e) { 
                $('#create_category_form').ajaxForm({
                    success: function(data) {
                        if(data.errors){
                            toastr.error(data.errors);
                        }
                        if(data.success){
                            toastr.success(data.success);
                            $('#create_category_form')[0].reset();
                            location.reload();
                        }
                    }
                })
             });

            //  Add Purchase Ajax
            $(document).ready(function(e) { 
                $('#add_purchase').ajaxForm({
                    success: function(data) {
                        if(data.errors){
                            toastr.error(data.errors);
                        }
                        if(data.success){
                            toastr.success(data.success);
                            $('#add_purchase')[0].reset();
                            location.reload();
                        }
                    }
                })
             });

            //ADD FORMS

            //  Shelf Ajax
            $(document).ready(function(e) { 
                $('#create_shelf_form').ajaxForm({
                    success: function(data) {
                        if(data.errors){
                            toastr.error(data.errors);
                        }
                        if(data.success){
                            toastr.success(data.success);
                            $('#create_shelf_form')[0].reset();
                            location.reload();
                        }
                    }
                })
             });

            //  Supplier Ajax
            $(document).ready(function(e) { 
                $('#create_supplier_form').ajaxForm({
                    success: function(data) {
                        if(data.errors){
                            toastr.error(data.errors);
                        }
                        if(data.success){
                            toastr.success(data.success);
                            $('#create_supplier_form')[0].reset();
                            location.reload();
                        }
                    }
                })
             });



            //  Store Ajax
            $(document).ready(function(e) { 
                $('#add_medical_store_form').ajaxForm({
                    success: function(data) {
                        if(data.errors){
                            toastr.error(data.errors);
                        }
                        if(data.success){
                            toastr.success(data.success);
                            $('#add_medical_store_form')[0].reset();
                            location.reload();
                        }
                    }
                })
             });


             $(document).ready(function(e){
                 $('#update_category_form').ajaxForm({
                     success: function(data){
                         if(data.errors){
                             toastr.error(data.errors);
                         }
                         if(data.success){
                             toastr.success(data.success);
                             $('#update_category_form')[0].reset();
                            //  location.reload();
                            window.location.href = '/show_category';
                         }
                     }
                 })
             }); 

             $(document).ready(function(e){
                 $('#update_shelf_form').ajaxForm({
                     success: function(data){
                         if(data.errors){
                             toastr.error(data.errors);
                         }
                         if(data.success){
                             toastr.success(data.success);
                             $('#update_shelf_form')[0].reset();
                            //  location.reload();
                            window.location.href = '/show_shelves';
                         }
                     }
                 })
             });


             //EDIT MEDICINE AJAX MESSAGE 
             $(document).ready(function(e){
                 $('#update_medicine_form').ajaxForm({
                     success: function(data){
                         if(data.errors){
                             toastr.error(data.errors);
                         }
                         if(data.success){
                             toastr.success(data.success);
                             $('#update_medicine_form')[0].reset();
                            //  location.reload();
                            window.location.href = '/medicines';
                         }
                     }
                 })
             });

               //EDIT MEDICINE AJAX MESSAGE 
               $(document).ready(function(e){
                 $('#update_supplier_form').ajaxForm({
                     success: function(data){
                         if(data.errors){
                             toastr.error(data.errors);
                         }
                         if(data.success){
                             toastr.success(data.success);
                             $('#update_supplier_form')[0].reset();
                            //  location.reload();
                            window.location.href = '/show_suppliers';
                         }
                     }
                 })
             });


            //EDIT MEDICINE AJAX MESSAGE 
            $(document).ready(function(e){
                 $('#update_store_form').ajaxForm({
                     success: function(data){
                         if(data.errors){
                             toastr.error(data.errors);
                         }
                         if(data.success){
                             toastr.success(data.success);
                             $('#update_store_form')[0].reset();
                            //  location.reload();
                            window.location.href = '/show_medical_store';
                         }
                     }
                 })
             });


            //EDIT PURCHASE AJAX MESSAGE 
            $(document).ready(function(e){
                 $('#update_purchase_form').ajaxForm({
                     success: function(data){
                         if(data.errors){
                             toastr.error(data.errors);
                         }
                         if(data.success){
                             toastr.success(data.success);
                             $('#update_purchase_form')[0].reset();
                            //  location.reload();
                            window.location.href = '/purchases';
                         }
                     }
                 })
             });

                //REMOVE ALL PURCHASE AJAX MESSAGE 
                $(document).ready(function(e){
                $('#delete_all_purchase').ajaxForm({
                    success: function(data){
                        if(data.errors){
                            toastr.error(data.errors);
                        }
                        if(data.success){
                            toastr.success(data.success);
                            $('#delete_all_purchase')[0].reset();
                            //  location.reload();
                            window.location.href = '/purchases';
                        }
                    }
                })
            });

            //  Delete Category
                    function deleteCategory(cat_id) {
                        //  alert(cat_id);
                        $('#del_dataId').val(cat_id);
                        $('#deleteCat').modal('show');           
                    }

                    $(document).ready(function(e){
                        $('#deleteCategory').ajaxForm({
                            success: function(data){
                                if(data.errors){
                                    toastr.error(data.errors);
                                }
                                if(data.success){
                                    toastr.success(data.success);
                                    $('#deleteCategory')[0].reset();
                                    //  location.reload();
                                    window.location.href = '/show_category';
                                }
                            }
                        })
                    });
            //  End of Delete Category
            
            //  Delete Shelf
            function deleteShelf(shelf_id) {
                        //  alert(cat_id);
                        $('#delete_dataId').val(shelf_id);
                        $('#deleteShelf').modal('show');           
                    }

                    $(document).ready(function(e){
                        $('#deleteShelf').ajaxForm({
                            success: function(data){
                                if(data.errors){
                                    toastr.error(data.errors);
                                }
                                if(data.success){
                                    toastr.success(data.success);
                                    // $('#deleteShelf')[0].reset();
                                    //  location.reload();
                                    window.location.href = '/show_shelves';
                                }
                            }
                        })
                    });
            //  End of Delete Shelf


            //  Delete suppliers
                    function deleteSupplier(supplier_id) {
                    $('#delet_dataId').val(supplier_id);
                    $('#deleteSupplier').modal('show');           
                }

                    $(document).ready(function(e){
                        $('#deleteSupplier').ajaxForm({
                            success: function(data){
                                if(data.errors){
                                    toastr.error(data.errors);
                                }
                                if(data.success){
                                    toastr.success(data.success);
                                    // $('#deleteShelf')[0].reset();
                                    //  location.reload();
                                    window.location.href = '/show_suppliers';
                                }
                            }
                        })
                    });
            //  End of Delete suppliers


            //  Delete store
                function deleteStore(store_id) {
                        //  alert(cat_id);
                        $('#del_dataId').val(store_id);
                        $('#deleteStore').modal('show');           
                    }

                    $(document).ready(function(e){
                        $('#deleteStore').ajaxForm({
                            success: function(data){
                                if(data.errors){
                                    toastr.error(data.errors);
                                }
                                if(data.success){
                                    toastr.success(data.success);
                                   // $('#deleteStore')[0].reset();
                                     location.reload();
                                    // window.location.href = '/show_medical_store';
                                }
                            }
                        })
                    });
            //  End of Delete store

            //  Delete medicine
             function deleteMedicine(medicine_id) {
                //  alert(cat_id);
                $('#delet_datasId').val(medicine_id);
                $('#deleteMed').modal('show');           
            }
                    $(document).ready(function(e){
                        $('#deleteMed').ajaxForm({
                            success: function(data){
                                if(data.errors){
                                    toastr.error(data.errors);
                                }
                                if(data.success){
                                    toastr.success(data.success);
                                //    $('#deleteStore')[0].reset();
                                    //  location.reload();
                                    window.location.href = '/medicines';
                                }
                            }
                        })
                    });
            //  End of Delete medicine

            //  Delete purchase
            function deletePurchase(purchase_id) {
                //  alert(cat_id);
                $('#delet_datasId').val(purchase_id);
                $('#deletePurchase').modal('show');           
            }
                    $(document).ready(function(e){
                        $('#deletePurchase').ajaxForm({
                            success: function(data){
                                if(data.errors){
                                    toastr.error(data.errors);
                                }
                                if(data.success){
                                    toastr.success(data.success);
                                //    $('#deleteStore')[0].reset();
                                    //  location.reload();
                                    window.location.href = '/purchase';
                                }
                            }
                        })
                    });
            //  End of Delete purchase

        </script>

         <script src="{{ asset('assets/js/app.js') }}"></script>
 
    </body>
</html>
