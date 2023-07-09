@extends('admin.template.app')

@section('title', 'Data Users')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Users</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ url('users') }}">Users</a></div>
                    <div class="breadcrumb-item active">Create</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Create Users</h2>
                {{-- <p class="section-lead">
                    Examples for opt-in styling of tables (given their prevalent use in JavaScript plugins) with Bootstrap.
                </p> --}}

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <form action="{{ route('users.store') }}" method="post">
                            <div class="card">
                                @csrf
                                {{-- <div class="card-header">
                                        <h4>HTML5 Form Basic</h4>
                                    </div> --}}
                                <div class="card-body">
                                    {{-- <div class="alert alert-info">
                                            <b>Note!</b> Not all browsers support HTML5 type input.
                                        </div> --}}
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select class="form-control" name="role" required>
                                            <option selected disabled>Choose Role</option>
                                            <option value="Administrator">Administrator</option>
                                            <option value="Users">Users</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-success mr-1" type="submit">Create</button>
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
