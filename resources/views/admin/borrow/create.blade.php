@extends('layout.admin.master')
@push('link')

<!-- iCheck -->
<link href="{{asset('vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
<!-- bootstrap-wysiwyg -->
<link href="{{asset('vendors/google-code-prettify/bin/prettify.min.css')}}" rel="stylesheet">
<!-- Select2 -->
<link href="{{asset('vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
<!-- Switchery -->
<link href="{{asset('vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet">
<!-- starrr -->
<link href="{{asset('vendors/starrr/dist/starrr.css')}}" rel="stylesheet">
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"> --}}
<!-- bootstrap-daterangepicker -->
<link href="{{asset('vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>

@endpush
@section('headTitle')
    Tambah Peminjaman
@endsection
@section('title')
    Tambah Pemnjaman
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tambah Peminjaman</small></h2>
                
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                {{-- <input id="addRow" class="btn btn-success" type="button" value="Tambah Barang"/>&nbsp <input id="deleteRow"
                type="button"
                class="btn btn-danger"
                value="hapus Kolom"/> --}}
                <form class="form-horizontal form-label-left" method="post" action="">
                    @csrf
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Nama Peminjam</label>
                        <div class="col-md-9 col-sm-9 ">
                            <select class="select2 form-control" name="user_id">
                                <option value="">--</option>
                                @foreach ($user as $user)
                                    <option value="{{$user->usr_id}}">{{$user->usr_name}}</option>
                                @endforeach
                              
                            
                            </select>
                            @error('ori_code') <span class="error text-">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Asset</label>
                        <div class="col-md-9 col-sm-9 ">
                            <table style="width: 100%;"  id="rowTable">
                                <tr>
                                   
                                    <td style="width: 70%;">
                                        {{-- <select class="select2 form-control" name="asset[]">
                                            <option value="">--</option>
                                            @foreach($asset as $asset)
                                            <option value="{{$asset->ass_id}}">{{$asset->ass_name}}</option>
                                            @endforeach
                                        
                                        </select> --}}
                                        <select id="choices-multiple-remove-button"  class="form-control" placeholder="Maksimal 5 " name="asset[]" multiple>
                                            <option value=""></option>
                                            @foreach($asset as $asset)
                                            <option value="{{$asset->ass_id}}">{{$asset->ass_name}}</option>
                                            @endforeach
                                          </select>
                                    </td>
                                </tr>
                            </table>
                            @error('asset') <span class="error text-">{{ $message }}</span> @enderror


                        </div>
                    </div>
                   
                    


                    <div id="line" class="ln_solid " style="margin-top: 40px"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                            <a  href="/admin/origin" class="btn btn-primary">Cancel</a>
                            <button type="reset" class="btn btn-primary">Reset</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>

               


                
               
                    
                </form>

            </div>
        </div>
    </div>
</div>


<script>$(document).ready(function(){
    
    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
       removeItemButton: true,
       maxItemCount:5,
       searchResultLimit:5,
       renderChoiceLimit:5
     }); 
    
    
});
  </script>
{{-- <script type="text/javascript">
    $('#addRow').click(function () {
        var tableID = "rowTable";
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;

        if (rowCount <= 4) {
            var row = table.insertRow(rowCount);
            

           

            // var  row=table.insertCell(rowCount);
            var tblBodyObj = document.getElementById(tableID).tBodies[0];


            var element1 = '<select class="select2 form-control" name="asset[]">\n' +
                                '<option value="">--</option> \n' +
                                
                            '</select>';
            // row.innerHTML="fbkdashkfshdkhfsfklfah";
            row.innerHTML = element1;
        }
    });
    $('#deleteRow').click(function () {
        var tableID = "rowTable";
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        console.log(rowCount);
        if (rowCount != 1) {
            rowCount = rowCount - 1;
            table.deleteRow(rowCount);
        }
    });
</script> --}}

@endsection

@push('script')

<script src="{{asset('vendors/iCheck/icheck.min.js')}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{asset('vendors/moment/min/moment.min.js')}}"></script>
<script src="{{asset('vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap-wysiwyg -->
<script src="{{asset('vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js')}}"></script>
<script src="{{asset('vendors/jquery.hotkeys/jquery.hotkeys.js')}}"></script>
<script src="{{asset('vendors/google-code-prettify/src/prettify.js')}}"></script>
<!-- jQuery Tags Input -->
<script src="{{asset('vendors/jquery.tagsinput/src/jquery.tagsinput.js')}}"></script>
<!-- Switchery -->
<script src="{{asset('vendors/switchery/dist/switchery.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('vendors/select2/dist/js/select2.full.min.js')}}"></script>
<!-- Parsley -->
<script src="{{asset('vendors/parsleyjs/dist/parsley.min.js')}}"></script>
<!-- Autosize -->
<script src="{{asset('vendors/autosize/dist/autosize.min.js')}}"></script>
<!-- jQuery autocomplete -->
<script src="{{asset('vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js')}}"></script>
<!-- starrr -->
<script src="{{asset('vendors/starrr/dist/starrr.js')}}"></script>
@endpush