<div class="container-left cus_mnleft">
    <div class="mg_left">
        <div class="tieude_left"> Đánh giá khách hàng</div>
        <div class="owl-ykien1 owl-carousel owl-theme">
            @foreach ($dataViewSlide['postCategoryCustomer'] as $item)
                <div class="item_ykien">
                    <div class="img_ykien">
                        <a href="{{ route('client.post', ['slug_category' => $item->category->category_slug, 'slug_post' => "$item->post_slug-$item->id"]) }}"
                            title="{{ $item->post_title }}">
                            <img src="{{ $item->post_image }}" alt="">
                        </a>
                    </div>
                    <div class="content_ykien">
                        <div class="title_ykien"><a
                                href="{{ route('client.post', ['slug_category' => $item->category->category_slug, 'slug_post' => "$item->post_slug-$item->id"]) }}"
                                title="{{ $item->post_title }}">{{ $item->post_title }}
                                </a></div>
                        <p>CÔNG TY XÂY DỰNG PIXEL DECOR</p>
                        <div class="mota_ykien text-split">
                            {{ $item->post_sub_title }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
