@extends('admin.layout.index')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh mục</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách danh mục</h6>
            <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Thêm mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên danh mục</th>
                            <th>Danh mục cha</th>
                            <th>Slug</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên danh mục</th>
                            <th>Danh mục cha</th>
                            <th>Slug</th>
                            <th>Hành động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->parent ? $category->parent->title : '' }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <a href="{{ route('admin.category.edit', [
                                    'category' => $category
                                ]) }}" class="btn btn-primary float-left mr-2">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <form class="float-left" action="{{ route('admin.category.destroy', [
                                    'category' => $category
                                ]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
