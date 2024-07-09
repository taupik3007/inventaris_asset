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
                            <label class="control-label col-md-3 col-sm-3 ">Tingkatan</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text"name="cls_level" class="form-control" placeholder="Tingkatan "
                                    wire:model="cls_level">
                                @error('cls_level')
                                    <span class="error text-">{{ $message }}</span>
                                @enderror
                              

                            </div>
                        </div>

                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Jurusan</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select id="choose" class="form-control" name="cls_major_id" onchange="yesnoCheck(this);" wire:model="cls_major_id">
                                    <option value="">--</option>
                                    @foreach($major as $major)
                                    <option value="{{$major->mjr_id}}">{{$major->mjr_name}}</option>
                                    @endforeach
                                </select>
                                @error('cls_major_id') <span class="error text-">{{ $message }}</span> @enderror

                            </div>
                        </div>

                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Nomor Kelas</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="number"name="cls_number" class="form-control" placeholder="nomor kelas "
                                    wire:model="cls_number">
                                @error('cls_number')
                                    <span class="error text-">{{ $message }}</span>
                                @enderror
                               

                            </div>
                        </div>







                        <div id="line" class="ln_solid " style="margin-top: 0pt"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9  offset-md-3">
                                <a href="{{route('sarpras.classes.index')}}" class="btn btn-primary">cancel</a>
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
