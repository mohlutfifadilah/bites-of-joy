@extends('admin.template.app')

@section('title', 'Data Category')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Category</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ url('category') }}">Category</a></div>
                    <div class="breadcrumb-item active">Edit</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Category</h2>
                {{-- <p class="section-lead">
                    Examples for opt-in styling of tables (given their prevalent use in JavaScript plugins) with Bootstrap.
                </p> --}}

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <form action="{{ route('category.update', $category->id) }}" method="post">
                            <div class="card">
                                @csrf
                                @method('PUT')
                                {{-- <div class="card-header">
                                        <h4>HTML5 Form Basic</h4>
                                    </div> --}}
                                <div class="card-body">
                                    {{-- <div class="alert alert-info">
                                            <b>Note!</b> Not all browsers support HTML5 type input.
                                        </div> --}}
                                    <div class="form-group">
                                        <label>Name Category</label>
                                        <input type="text" class="form-control" name="name_category"
                                            value="{{ $category->name_category }}" required>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-success mr-1" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
