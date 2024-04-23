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
    Asset
@endsection
@section('title')
    Tambah Asset
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tambah Asset</h2>
                
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form class="form-horizontal form-label-left" method="post" action="">
                    @csrf
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Nama Asset</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text"name="ass_name" class="form-control" placeholder="Nama Asset" wire:model="ass_name">
                            @error('ass_name') <span class="error text-">{{ $message }}</span> @enderror

                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Tahun Pengadaan</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" name="ass_year" placeholder="Tahun Pengadaan" wire:model="ass_year">
                            @error('ass_year') <span class="error text-">{{ $message }}</span> @enderror

                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Harga</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="number" class="form-control" name="ass_price" placeholder="Harga" wire:model="ass_price">
                            @error('ass_price') <span class="error text-">{{ $message }}</span> @enderror

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Kategori Asset</label>
                        <div class="col-md-9 col-sm-9 ">
                            <select id="choose" class="form-control" name="ass_category_id" onchange="yesnoCheck(this);" wire:model="ass_category_id">
                                <option value="">--</option>
                                @foreach($category as $category)
                                <option value="{{$category->ctg_id}}">{{$category->ctg_name}}</option>
                                @endforeach
                            </select>
                            @error('ass_category_id') <span class="error text-">{{ $message }}</span> @enderror

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Asal Asset</label>
                        <div class="col-md-9 col-sm-9 ">
                            <select id="choose" class="form-control" name="ass_origin_id" onchange="yesnoCheck(this);" wire:model="ass_origin_id">
                                <option value="">--</option>
                                @foreach($origin as $origin)
                                <option value="{{$origin->ori_id}}">{{$origin->ori_name}}</option>
                                @endforeach
                            </select>
                            @error('ass_origin_id') <span class="error text-">{{ $message }}</span> @enderror

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Status</label>
                        <div class="col-md-9 col-sm-9 ">
                            <select id="choose" class="form-control" name="ass_status" onchange="yesnoCheck(this);" wire:model="ass_status">
                                <option value="">--</option>
                                <option value="1">bisa dipinjam</option>
                                <option value="0">tidak bisa di pinjam</option>
                            </select>
                            @error('ass_status') <span class="error text-">{{ $message }}</span> @enderror

                        </div>
                    </div>
                    <div   class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Kondisi</label>
                        <div class="col-md-9 col-sm-9 ">
                            <select id="choose" class="form-control" name="ass_condition" onchange="yesnoCheck(this);" wire:model="ass_condition">
                                <option value="">--</option>
                                <option value="0">rusak</option>\
                                <option value="1">baik</option>
                            </select>
                            @error('ass_condition') <span class="error text-">{{ $message }}</span> @enderror

                        </div>
                    </div>
                    <div   class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Jumlah</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="number" name="amount" class="form-control" placeholder="Jumlah" wire:model="amount">
                        @error('amount') <span class="error text-">{{ $message }}</span> @enderror
                            
                        </div>

                    </div>
                    <div   class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">deskripsi</label>
                        <div class="col-md-9 col-sm-9 ">
                            
                            <div class="panel panel-default">
                                <div class="panel-body">
                            
                                    
                                    <div class="col-sm-6 nopadding">
                                        <div class="form-group">
                                            <input type="text" class="form-control" required  name="asd_name[]" value=""
                                                placeholder="Judul Deskripsi">
                                        </div>
                                    </div>
                            
                                    <div class="col-sm-6 nopadding">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="asd_value[]" required placeholder="Isi Deskripsi">
                                                
                                                <div class="input-group-btn">
                                                    <button class="btn btn-success" type="button" onclick="education_fields();"> <span
                                                            class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="education_fields">
                            
                                    </div>
                                    <div class="clear"></div>
                            
                                </div>
                            </div>
                        </div>

                    </div>
                    



                  


                    <div id="line" class="ln_solid " style="margin-top: 0pt"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                            <a href="/admin/asset" class="btn btn-primary">cancel</a>
                            <button type="reset" class="btn btn-primary">Reset</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var room = 1;
    function education_fields() {

        room++;
        var objTo = document.getElementById('education_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass" + room);
        var rdiv = 'removeclass' + room;
        divtest.innerHTML = '<div class="col-sm-6 nopadding"><div class="form-group"> <input type="text" class="form-control" required name="asd_name[]" value="" placeholder="Judul Deskripsi"></div></div> <div class="col-sm-6 nopadding"> <div class="form-group"><div class="input-group"><input type="text" class="form-control" required name="asd_value[]" placeholder="Isi Deskripsi"><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div>';

        objTo.appendChild(divtest)
    }
    function remove_education_fields(rid) {
        $('.removeclass' + rid).remove();
    }
</script>
<script>
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
</script>

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