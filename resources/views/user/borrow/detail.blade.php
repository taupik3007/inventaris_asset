@extends('layout.user.master')
@push('link')
    <!-- iCheck -->
    <link href="{{asset('vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- Datatables -->
    
    <link href="{{asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
@endpush
@section('headTitle')
Asset
@endsection
@section('title')
Asset
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Asset <small>List</small></h2>
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
              <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Nama Peminjam</label>
                        <div class="col-md-9 col-sm-9 ">
                            {{$borrow->brw_user->usr_name}}
                                
                          
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3 col-sm-3 ">Tanggal pinjam</label>
                      <div class="col-md-9 col-sm-9 ">
                          {{$borrow->created_at}}
                          
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 ">Tanggal kembali</label>
                    <div class="col-md-9 col-sm-9 ">
                      {{$borrow->deleted_at}}
                            
                       
                    </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3 col-sm-3 ">status peminjaman</label>
                  <div class="col-md-9 col-sm-9 ">

                    @if ($borrow->deleted_at == null)
                      <span class="badge badge-info">sedang dipinjam</span>
                    @else
                      <span class="badge badge-success">Telah Dikembalikan</span>
                        
                    @endif
                          
                    
                  </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3 col-sm-3 ">Asset yang di pinjam :</label>
                
            </div>
                    <div class="card-box table-responsive">
                     
                      <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr>
                            <th>nomor</th>
                            <th>Kode asset</th>
                            <th>Nama Asset</th>
                            <th>Tanggal kembali</th>
                            <th>aksi</th>
                            

                          </tr>
                        </thead>
                        <tbody>
                          @foreach($borrow_asset as $no=>$bas)
                          <tr>
                            <td>{{$no+1}}</td>
                            <td>{{$bas->bas_asset->ass_registration_code}}</td>
                            <td>{{$bas->bas_asset->ass_name}}</td>
                            <td>{{$bas->deleted_at}}</td>
                            <td>
                              @if($bas->deleted_at == null)
                              <span class="badge badge-danger">Belum dikembalikan</span>
                              
                              @else
                              <span class="badge badge-info">telah dikembalikan</span>
                              @endif

                          </tr>
                          @endforeach
                        </tbody>
                      </table>
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
    <script src="{{asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{asset('vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('vendors/pdfmake/build/vfs_fonts.js')}}"></script>
@endpush