@extends('layout.admin.master')
@push('link')
    <!-- iCheck -->
    <link href="{{ asset('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- Datatables -->

    <link href="{{ asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
@endpush
@section('headTitle')
    Home
@endsection
@section('title')
    Home
@endsection
@section('content')
    <div class="row">
        <div class="x_panel">
            <div class="x_content">
                <div class="col-md-12 col-sm-12  text-center">
                   
                </div>

                <div class="clearfix"></div>

                <div class="col-md-2 col-sm-2  profile_details">
                    <div class="well profile_view" style="width: 100%">
                        <div class="col-sm-12">
                            
                            <div class="left col-md-12 col-sm-12">
                                <h1>User Aktif</h1>
                                
                               
                            </div>
                            
                        </div>
                        <div class=" profile-bottom text-center">
                            <div class=" col-sm-6 emphasis" >
                                <p class="ratings">
                                    <a>{{$user}}</a>
                                    <a href="/admin/user"><span class="">User</span></a>
                                    
                                </p>
                            </div>
                            <div class=" col-sm-6 emphasis">
                                <a href="/admin/user" class="btn btn-sm btn-primary">Lihat</a>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2  profile_details">
                    <div class="well profile_view" style="width: 100%">
                        <div class="col-sm-12">
                            
                            <div class="left col-md-12 col-sm-12">
                                <h1>Peminjaman</h1>
                                
                               
                            </div>
                            
                        </div>
                        <div class=" profile-bottom text-center">
                            <div class=" col-sm-6 emphasis" style="width: 100%">
                                <p class="ratings">
                                    <a>{{$borrow}}</a>
                                    <a href="/admin/borrow"><span class="">Peminjaman</span></a>
                                    
                                </p>
                            </div>
                            <div class=" col-sm-6 emphasis">
                                
                                <a href="/admin/borrow" class="btn btn-sm btn-primary">Lihat</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2  profile_details">
                    <div class="well profile_view" style="width: 100%">
                        <div class="col-sm-12">
                            
                            <div class="left col-md-12 col-sm-12">
                                <h1>Asset</h1>
                                
                               
                            </div>
                            
                        </div>
                        <div class=" profile-bottom text-center">
                            <div class=" col-sm-6 emphasis">
                                <p class="ratings">
                                    <a>{{$asset}}</a>
                                    <a href="/admin/asset"><span class="">Asset</span></a>
                                    
                                </p>
                            </div>
                            <div class=" col-sm-6 emphasis">
                                
                                <a href="/admin/asset" class="btn btn-sm btn-primary">Lihat</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    
@endsection

@push('script')
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js') }}"></script>
@endpush
