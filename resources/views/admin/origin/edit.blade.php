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
<!-- bootstrap-daterangepicker -->
<link href="{{asset('vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
@endpush
@section('headTitle')
    Kategori Asset
@endsection
@section('title')
    Tambah Kategori Asset
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Form Basic Elements <small>different form elements</small></h2>
                
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form class="form-horizontal form-label-left" method="post" action="">
                    @csrf
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Kode Asal</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="ori_code" class="form-control" placeholder="Kode Asal" value="{{substr($origin->ori_code,4)}}" wire:model="ori_code" >
                            @error('ori_code') <span class="error text-">{{ $message }}</span> @enderror
                            @if(session()->has('error-code'))                     
                            <span class="error text-">{{ session()->get('error-code') }}</span>                     
                            @endif
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Nama Asal</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="ori_name" class="form-control" placeholder="Nama Asal" value="{{$origin->ori_name}}" wire:model="ori_code" >
                            @error('ori_name') <span class="error text-">{{ $message }}</span> @enderror
                            @if(session()->has('error-name'))                     
                            <span class="error text-">{{ session()->get('error-name') }}</span>                     
                            @endif

                        </div>
                    </div>
                   
                    


                    <div id="line" class="ln_solid " style="margin-top: 0pt"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                            <a type="submit" class="btn btn-primary" href="/admin/origin">Cancel</a>
                            <button type="reset" class="btn btn-primary">Reset</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

{{-- <script>
    function yesnoCheck(that) 
{
    if (that.value == "0") 
    {
        document.getElementById("originalCode").style.display = "block";
        document.getElementById("line").style.marginTop = "60pt";

    }
    else
    {
        document.getElementById("originalCode").style.display = "none";
        document.getElementById("line").style.marginTop = "0";

    }
   
}
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