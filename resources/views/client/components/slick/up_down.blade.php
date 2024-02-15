<div class="section" id="section-{{ $item->config_slug }}">
    <div class="inner">
        <div class="wrap-content">
            <div class="bottom_gv">
                <div class="row">
                    <div class="col-md-2">
                        <div class="title_main">
                            <span class="blue"><b>{{ $item->config_name }}</b></span>
                        </div>
                    </div>
                    <div class="col-md-10 d-flex justify-content-between align-items-center">
                        <div class="img_ts">
                            <div class="slider-for">
                                @if ($item->config_type_show == 1 && $item->posts->count() > 0)
                                    @foreach ($item->posts as $post)
                                        <div class="img">
                                            <img src="{{ $post->post_image }}" alt="">
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                        <div class="noidung_ts">
                            <div class="slider-nav">
                                @if ($item->config_type_show == 1 && $item->posts->count() > 0)
                                    @foreach ($item->posts as $post)
                                        <div class="box_vs">
                                            <div class="flex-vs">
                                                <div class="img"><img src="{{ $post->post_image }}" alt="">
                                                </div>
                                                <div class="noidung">
                                                    <div class="text">
                                                        <div class="ten">{{ $post->post_title }}</div>
                                                        <div class="mota text-split">{{ $post->post_sub_title }}</div>
                                                        <a
                                                            href="{{ route('client.post', ['slug_category' => $post->category->category_slug, 'slug_post' => "$post->post_slug-$post->id"]) }}">Xem
                                                            thêm</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
