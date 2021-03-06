@extends('admin.layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">

        <div class="page-wrapper">
            <div class="page-content">

                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Store Settings</div>


                </div>
                <div class="breadcrumb-subtitle">
                    <p>Update the settings in the form below and click "Save", or click "Cancel" to keep the current
                        settings.</p>
                </div>
                <div class="row">
                    <div class="col-xl-11 mx-auto" id="store_setup_settings_website">
                        <form id="form_body" method="POST" enctype="multipart/form-data">
                            @csrf

                            <h6 class="mb-0 text-uppercase">Store Status</h6>
                            <hr />
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox"
                                                    id="flexSwitchCheckDefault">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Down for
                                                    Maintenance</label>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>

                            <h6 class="mb-0 text-uppercase">Physical Dimension Settings</h6>
                            <hr />
                            <div class="card">
                                <div class="card-body">
                                    {{-- <div class="border p-4 rounded"> --}}

                                    <div class="row mb-3">
                                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Weight
                                            Measurement</label>
                                        <div class="col-sm-9">
                                            <select name="weight_measurement" v-model="form_data.weight_measurement"
                                                class="form-control col-md-12 mb-3">
                                                @php
                                                $weight=DB::table('weight_measurements')->get();
                                                @endphp
                                                @foreach ($weight as $item)

                                                <option value="{{$item->id}}">{{$item->weight_measurement_name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Length
                                            Measurement</label>
                                        <div class="col-sm-9">
                                            <select name="length_measurement" v-model="form_data.length_measurement" class="form-control col-md-12 mb-3"
                                                aria-label="Default select example">
                                                @php
                                                $length=DB::table('length_measurements')->get();
                                                @endphp
                                                @foreach ($length as $item)

                                                <option value="{{$item->id}}">{{$item->length_measurement_name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Decimal
                                            Token</label>
                                        <div class="col-sm-9">
                                            <input name="decimal_token" v-model="form_data.decimal_token" type="text"
                                                class="form-control" @change="onChange($event)">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Thousands
                                            Token</label>
                                        <div class="col-sm-9">
                                            <input type="text" v-model="form_data.thousands_token" name="thousands_token" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Decimal
                                            Places</label>
                                        <div class="col-sm-9">
                                            <input type="text" v-model="form_data.decimal_places" name="decimal_places" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Factoring
                                            Dimension</label>
                                        <div class="col-sm-9">
                                            <select class="form-control col-md-12 mb-3" v-model="form_data.factoring_dimension" name="factoring_dimension"
                                                aria-label="Default select example">
                                                @php
                                                $dimen=DB::table('factoring_dimensions')->get();
                                                @endphp
                                                @foreach ($dimen as $item)

                                                <option value="{{$item->id}}">{{$item->factoring_dimension_name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{-- </div> --}}
                                </div>
                            </div>
                            <h6 class="mb-0 text-uppercase">Search Engine Optimization</h6>
                            <hr />
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Home Page
                                            Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" v-model="form_data.home_page_title" name="home_page_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Meta
                                            Keywords</label>
                                        <div class="col-sm-9">
                                            <input type="text" v-model="form_data.meta_keywords" name="meta_keywords" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Meta
                                            Description</label>
                                        <div class="col-sm-9">
                                            <input type="text" v-model="form_data.meta_description" name="meta_description" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEnterYourName"  class="col-sm-3 col-form-label">WWW/No WWW
                                            Redirect</label>
                                        <div class="col-sm-9">
                                            <select class="form-control col-md-12 mb-3" v-model="form_data.redirect" name="redirect"
                                                aria-label="Default select example">
                                                @php
                                                $www=DB::table('www_redirects')->get();
                                                @endphp
                                                @foreach ($www as $item)

                                                <option value="{{$item->id}}">{{$item->www_redirect_name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-12">
                                        <button @click.prevent="store" type="button"
                                            class="btn btn-light px-5">Add</button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!--start overlay-->
        <div class="overlay"></div>
        <!--end overlay-->
    </div>
    <!-- End container-fluid-->
</div>
<!--End content-wrapper-->

@push('cjs')
<script src="{{ asset('contents/admin') }}/store_setting_vue.js"></script>

@endpush
@endsection