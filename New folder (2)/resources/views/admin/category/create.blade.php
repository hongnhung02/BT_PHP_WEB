@extends('admin.layout.index')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Danh mục</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thêm mới danh mục</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.category.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Tên danh mục</label>
                        <input type="text" class="form-control" id="title" name="title"
                            placeholder="Nhập tên danh mục">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="parent_id">Danh mục cha</label>
                        <select class="form-control form-select" name="parent_id" id="parent_id">
                            <option selected value="">Chọn danh mục cha</option>
                            @foreach ($categories as $c)
                                <option value="{{ $c->id }}">{{ $c->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
