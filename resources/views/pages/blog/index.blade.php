@foreach ($blogs as $blog)
    <style>
        div {
            position: relative;
            width: 100%;
            height: 100px;
            line-height: 30px;
            margin: 0px;
            padding: 0px;
            overflow: hidden;
        }

        div::after {
            content: "...";
            background-color: #fff;
            height: 30px;
            width: 20px;
            position: absolute;
            bottom: 0;
            right: 0;
        }
    </style>
    <div>
        {!! $blog->konten !!}
    </div>
@endforeach
