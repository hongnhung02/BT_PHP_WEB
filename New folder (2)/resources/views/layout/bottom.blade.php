<div class="bottom">
    <div class="container">
        <div class="row my-4">
            <div class="col-4">
                <strong>Danh mục sách</strong>
                <ul>
                    @foreach ($cates as $cate)
                    <li>
                        <a href="#{{ $cate->slug }}">{{ $cate->title }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
