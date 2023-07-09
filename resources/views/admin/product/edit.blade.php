@extends('admin.template.app')

@section('title', 'Data Product')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Product</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ url('product') }}">Product</a></div>
                    <div class="breadcrumb-item active">Edit</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Product</h2>
                {{-- <p class="section-lead">
                    Examples for opt-in styling of tables (given their prevalent use in JavaScript plugins) with Bootstrap.
                </p> --}}

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <form action="{{ route('product.update', $product->id) }}" method="post"
                            enctype="multipart/form-data">
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
                                        <label>Category</label>
                                        <select class="form-control" name="id_category" required>
                                            <?php
                                                $cate = \App\Models\Category::find($product->id_category);
                                            ?>
                                            <option selected disabled value="{{ $cate->name_category }}">
                                                {{ ucfirst($cate->name_category) }}
                                            </option>
                                            @foreach ($category as $c)
                                                <option value="{{ $c->id }}">{{ ucfirst($c->name_category) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Photo</label>
                                        <input type="file" class="form-control" name="photo"
                                            value="{{ $product->photo }}">
                                        <img src="{{ asset('img/product/upload/' . $product->photo) }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" class="form-control" name="product_name"
                                            value="{{ $product->name_product }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" data-height="150" name="description">
                                            {{ $product->description }}
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Stock</label>
                                        <input type="text" class="form-control" name="stock"
                                            value="{{ $product->stock }}" required
                                            onkeypress="return validateNumber(event)">
                                    </div>
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" class="form-control" name="price" value="@currency($product->price)"
                                            id="dengan-rupiah" onkeypress="return validateNumber(event)" required>
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
    <script>
        function validateNumber(e) {
            const pattern = /^[0-9]$/;

            return pattern.test(e.key)
        }

        /* Dengan Rupiah */
        var dengan_rupiah = document.getElementById('dengan-rupiah');
        dengan_rupiah.addEventListener('keyup', function(e) {
            dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

        /* Fungsi */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>
    <!-- Page Specific JS File -->
@endpush
