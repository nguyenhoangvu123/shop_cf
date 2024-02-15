@if ($listPost->count() > 0)
    @foreach ($listPost as $item)
        <option {{ in_array($item->id, $listPostSelected) ? 'selected' : '' }} value="{{ $item->id }}">
            {{ $item->post_title }}</option>
    @endforeach
@else
@endif
