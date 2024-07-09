@extends('layout.sarpras.master')
@push('link')
    <!-- iCheck -->
    <link href="{{ asset('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="{{ asset('vendors/google-code-prettify/bin/prettify.min.css') }}" rel="stylesheet">
    <!-- Select2 -->
    <link href="{{ asset('vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <!-- Switchery -->
    <link href="{{ asset('vendors/switchery/dist/switchery.min.css') }}" rel="stylesheet">
    <!-- starrr -->
    <link href="{{ asset('vendors/starrr/dist/starrr.css') }}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
@endpush
@section('headTitle')
    jurusan
@endsection
@section('title')
    Tambah jurusan
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tambah jurusan</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" method="post" action="">
                        @csrf
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Nama jurusan</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text"name="mjr_name" class="form-control" placeholder="Nama Jurusan "
                                    wire:model="mjr_name">
                                @error('mjr_name')
                                    <span class="error text-">{{ $message }}</span>
                                @enderror
                                <span class="error text-">
                                @if (session()->has('error'))
                                    
                                        {{ session()->get('error') }}
                                    
                                @endif
                                </span>

                            </div>
                        </div>








                        <div id="line" class="ln_solid " style="margin-top: 0pt"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9  offset-md-3">
                                <a href="{{route('sarpras.major.index')}}" class="btn btn-primary">cancel</a>
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
            divtest.innerHTML =
                '<div class="col-sm-6 nopadding"><div class="form-group"> <input type="text" class="form-control" required name="asd_name[]" value="" placeholder="Judul Deskripsi"></div></div> <div class="col-sm-6 nopadding"> <div class="form-group"><div class="input-group"><input type="text" class="form-control" required name="asd_value[]" placeholder="Isi Deskripsi"><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_education_fields(' +
                room +
                ');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div>';

            objTo.appendChild(divtest)
        }

        function remove_education_fields(rid) {
            $('.removeclass' + rid).remove();
        }
    </script>
    <script>
        function yesnoCheck(that) {
            if (that.value == "0") {
                document.getElementById("originalCode").style.display = "block";
                document.getElementById("line").style.marginTop = "60pt";

            } else {
                document.getElementById("originalCode").style.display = "none";
                document.getElementById("line").style.marginTop = "0";

            }

        }
    </script>

    <script>
        var inputBox = document.getElementById("amount");
        var inputBox2 = document.getElementById("ass_price");


        var invalidChars = [
            "-",
            "+",
            "e",
        ];

        inputBox.addEventListener("keydown", function(e) {
            if (invalidChars.includes(e.key)) {
                e.preventDefault();
            }
        });
        inputBox2.addEventListener("keydown", function(e) {
            if (invalidChars.includes(e.key)) {
                e.preventDefault();
            }
        });
    </script>
@endsection

@push('script')
    <script src="{{ asset('vendors/iCheck/icheck.min.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="{{ asset('vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}"></script>
    <script src="{{ asset('vendors/jquery.hotkeys/jquery.hotkeys.js') }}"></script>
    <script src="{{ asset('vendors/google-code-prettify/src/prettify.js') }}"></script>
    <!-- jQuery Tags Input -->
    <script src="{{ asset('vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
    <!-- Switchery -->
    <script src="{{ asset('vendors/switchery/dist/switchery.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('vendors/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- Parsley -->
    <script src="{{ asset('vendors/parsleyjs/dist/parsley.min.js') }}"></script>
    <!-- Autosize -->
    <script src="{{ asset('vendors/autosize/dist/autosize.min.js') }}"></script>
    <!-- jQuery autocomplete -->
    <script src="{{ asset('vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js') }}"></script>
    <!-- starrr -->
    <script src="{{ asset('vendors/starrr/dist/starrr.js') }}"></script>
@endpush
