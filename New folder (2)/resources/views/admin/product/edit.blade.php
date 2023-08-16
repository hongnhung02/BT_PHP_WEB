@extends('admin.layout.index')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Sản phẩm</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Cập nhật sản phẩm: {{ $product->title }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.product.update', [
                    'product' => $product
                ]) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="title" name="title"
                            placeholder="Nhập tên sản phẩm"
                            value="{{ $product->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Giá sản phẩm</label>
                        <input type="number" class="form-control" id="price" name="price"
                            placeholder="Nhập giá sản phẩm"
                            value="{{ $product->price }}">
                    </div>
                    {{-- <div class="mb-3">
                        <label for="thumbnail" class="form-label">Ảnh bìa</label>
                        <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                    </div>
                    <div class="mb-3">
                        <label for="images" class="form-label">Ảnh sản phẩm</label>
                        <input type="file" class="form-control" id="images" name="images" multiple>
                    </div> --}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $product->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="category_id">Danh mục</label>
                        <select class="form-control form-select" name="category_id" id="category_id">
                            <option selected value="">Chọn danh mục</option>
                            @foreach ($categories as $c)
                                <option value="{{ $c->id }}" @if($product->category_id === $c->id) selected @endif>{{ $c->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
