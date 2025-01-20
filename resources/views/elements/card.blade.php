<a href="{{$href}}" class="list--card">
    @foreach ($span as $key => $item)
        <strong>{{$key}}:</strong>
        <span>{{$item}}</span>
    @endforeach
</a>
