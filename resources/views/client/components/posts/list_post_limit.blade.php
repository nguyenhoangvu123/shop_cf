@if ($typeSlick == 1)
    <div class="mg-5">
        <div class="slick-{{ $itemSlick }} slick-thietke">
            @foreach ($listPost as $post)
                <div class="item-duan mg-b col-3 pd-5 img_full">
                    <div class="img-da">
                        <a class="images-mask1"
                            href="{{ route('client.post', ['slug_category' => $post->category->category_slug, 'slug_post' => $post->post_slug]) }}"
                            title="{{ $post->post_image }}"><img class="lazy"  src="{{ $post->post_image }}"
                                alt="{{ $post->post_title }}"></a>
                        <div class="tieude-da"><a href="{{ route('client.post', ['slug_category' => $post->category->category_slug, 'slug_post' => $post->post_slug]) }}"
                                title="{{ $post->post_title }}">{{ $post->post_title }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@elseif($typeSlick == 2)
    <div class="mg-5">
        <div class="slick-{{ $itemSlick }} slick-thicong">
            @foreach ($listPost as $post)
                <div class="item-duan mg-b col-3 pd-5 img_full">
                    <div class="img-da">
                        <a class="border-radius-50"
                            href="{{ route('client.post', ['slug_category' => $post->category->category_slug, 'slug_post' => $post->post_slug]) }}"
                            title="{{ $post->post_title }}"><img class="lazy" src="{{ $post->post_image }}"
                                alt="{{ $post->post_title }}"></a>
                        <div class="tieude-da"><a
                                href="{{ route('client.post', ['slug_category' => $post->category->category_slug, 'slug_post' => $post->post_slug]) }}"
                                title="{{ $post->post_title }}">{{ $post->post_title }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
@endif
