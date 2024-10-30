@extends('layouts.app')

@section('title', 'User Forms')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Products Forms</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Products</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Product</h2>

                <div class="card">
                    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Input Data</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name', $product->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control @error('description') is-invalid @enderror"
                                       name="description" value="{{ old('description', $product->description) }}">
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror"
                                       name="price" value="{{ old('price', $product->price) }}">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Stock</label>
                                <input type="number" class="form-control @error('stock') is-invalid @enderror"
                                       name="stock" value="{{ old('stock', $product->stock) }}">
                                @error('stock')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Category</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control selectric @error('category') is-invalid @enderror"
                                            name="category">
                                        <option value="food" {{ old('category', $product->category) === 'food' ? 'selected' : '' }}>Food</option>
                                        <option value="drink" {{ old('category', $product->category) === 'drink' ? 'selected' : '' }}>Drink</option>
                                        <option value="snack" {{ old('category', $product->category) === 'snack' ? 'selected' : '' }}>Snack</option>
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Photo Product</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="image" id="imageInput"
                                        @error('image') is-invalid @enderror>
                                    <!-- Tempat untuk menampilkan nama file -->
                                    <p id="fileName" style="margin-top: 10px;"></p>
                                </div>
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <!-- Jika Ada Gambar Lama -->
                                @if($product->image)
                                    <img id="currentImage" src="{{ asset('storage/products/' . $product->image) }}" alt="Current Image" style="max-width: 100%; margin-top: 10px;">
                                @endif
                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
<script>
    document.getElementById('imageInput').addEventListener('change', function (event) {
        var currentImage = document.getElementById('currentImage'); // Ambil elemen gambar lama
        var fileName = document.getElementById('fileName'); // Ambil elemen nama file

        if (currentImage) {
            currentImage.style.display = 'none'; // Sembunyikan gambar lama
        }

        // Tampilkan nama file yang dipilih
        var file = event.target.files[0];
        if (file) {
            fileName.textContent = "File selected: " + file.name;
        } else {
            fileName.textContent = ""; // Kosongkan jika tidak ada file yang dipilih
        }
    });
</script>
@endpush
