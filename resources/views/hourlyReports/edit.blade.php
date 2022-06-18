@extends('layouts.app')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="card create-order-card">
            <div class="card-header bg-gradient-secondary">
                <h3 class="  text-center ">Add a new hourly quality report
                    for {{ now('Europe/Amsterdam')->format('H:i') }}</h3>
                <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->

                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <h4><span class="badge badge-warning float-right"><i class="fa fa-exclamation-circle"
                                                                     style="font-size:20px;color:white"></i> * Required</span>
                </h4>
                <form class="was-validated" method="POST" action="{{ route('hourlyReports.update',$hourlyReport)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col-md-6 mb-3" style="width:100%;">
                            <label class="required" for="def_id">Issue *</label>
                            <div>
                                <select name="def_id" id="def_id" onchange="addExtraInfo()"
                                        class="custom-select @error('def_id') is-invalid @enderror"
                                        required>
                                    <option value="">Select one</option>
                                    <option
                                        value='1. Stable Stacked Pallets' {{ $hourlyReport->def_id === '1. Stable Stacked Pallets' ? 'selected' : ''}}>
                                        1. Stable Stacked Pallets
                                    </option>
                                    <option
                                        value='2. Dust, Fungi & Quality Planks' {{ $hourlyReport->def_id === '2. Dust, Fungi & Quality Planks' ? 'selected' : ''}}>
                                        2. Dust, Fungi & Quality Planks
                                    </option>
                                    <option
                                        value='3. Measurement Pallet & Parts' {{ $hourlyReport->def_id === '3. Measurement Pallet & Parts' ? 'selected' : ''}}>
                                        3. Measurement Pallet & Parts
                                    </option>
                                    <option value='4. Position Nails' {{ $hourlyReport->def_id === '4. Position Nails' ? 'selected' : ''}}>
                                        4. Position Nails
                                    </option>
                                    <option value='5. Corners/Stamps' {{ $hourlyReport->def_id === '5. Corners/Stamps' ? 'selected' : ''}}>
                                        5. Corners/Stamps
                                    </option>
                                    <option
                                        value='6. Abnormality Material' {{ $hourlyReport->def_id === '6. Abnormality Material' ? 'selected' : ''}}>
                                        6. Abnormality Material
                                    </option>
                                </select>
                            </div>
                            @error('def_id')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="required">Extra Information:</label>
                            <div class="control">
                                <input name="extra_info" id="extra_info" class="form-control" readonly>
                            </div>
                            @error('extra_info')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="label">Action:</label>
                        <div class="control">
                                        <textarea name="action" placeholder="Action taken..."
                                                  class="form-control @error('action') is-invalid @enderror">{{ $hourlyReport->action }}</textarea>
                        </div>
                        @error('action')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="label">Abnormalities:</label>
                        <div class="control">
                                        <textarea name="abnormality" placeholder="Abnormalities..."
                                                  class="form-control @error('abnormality') is-danger @enderror">{{ $hourlyReport->abnormality }}</textarea>
                        </div>
                        @error('abnormality')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field is-grouped">
                        {{-- Here are the form buttons: save, reset and cancel --}}
                        <div class="control">
                            <button type="submit" class="btn btn-info btn-lg btn-lg btn-block" style="width: 100%;">Save</button>
                        </div>
                        <br>
                        <div class="float-left">
                            <button type="reset" class="btn btn-warning btn-lg">Reset</button>
                            <a type="button" href="{{route('hourlyReports.index')}}"
                               class="btn btn-light btn-lg">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
    <script>

        document.addEventListener("DOMContentLoaded", function(){
            addExtraInfo();
        });

        function addExtraInfo(){
            let options = document.getElementById("def_id")
            let selected = options.value;
            let extraInfo = document.getElementById("extra_info");

            if (selected === '1. Stable Stacked Pallets') {
                extraInfo.value = 'No Shaky Pallets';
            } else if (selected === '2. Dust, Fungi & Quality Planks') {
                extraInfo.value = 'Per Pallet and Customer Dependent';
            } else if (selected === '3. Measurement Pallet & Parts') {
                extraInfo.value = 'Clear and Easy to Read';
            } else if (selected === '4. Position Nails') {
                extraInfo.value = 'Length, Width & Height';
            } else if (selected === '5. Corners/Stamps') {
                extraInfo.value = 'No Protruding Nails';
            } else if (selected === '6. Abnormality Material') {
                extraInfo.value = 'All Corners & Stamps Correct';
            }
        }

        function selectExtraInfo() {

        }
    </script>
@endsection
