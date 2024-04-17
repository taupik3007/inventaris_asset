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
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form class="form-horizontal form-label-left" method="post" action="">
                    @csrf
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Nama kategori</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" name="ctg_name" placeholder="Nama Kategori" wire:model="ctg_name">
                            @error('ctg_name') <span class="error text-">{{ $message }}</span> @enderror

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">kategori induk</label>
                        <div class="col-md-9 col-sm-9 ">
                            <select id="choose" class="form-control" name="ctg_parent_code" onchange="yesnoCheck(this);">
                                <option value="">Tanpa Induk Kategori</option>                              
                                @foreach($category as $category)
                                <option value="{{$category->ctg_code}}">{{$category->ctg_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div id="originalCode"  class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Kode original</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" name="ctg_original_code" placeholder="Kode Original" wire:model="ctg_original_code">
                        </div>
                        @error('ctg_original_code') <span class="error text-">{{ $message }}</span> @enderror
                        @if(session()->has('error'))
                      <div class="alert alert-success alert-dismissible " role="alert">
                        <span class="error text-">{{ session()->get('error') }}</span>
                      </div>
                      @endif
                    </div>
                  


                    <div id="line" class="ln_solid " style="margin-top: 0pt"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                            <button type="button" class="btn btn-primary">Cancel</button>
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