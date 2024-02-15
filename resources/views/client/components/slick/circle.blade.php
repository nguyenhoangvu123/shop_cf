<div class="section section-thietke-circle" id="section-{{ $item->config_slug }}">
    <div class="inner">
        <div class="wrap-content">
            <div class="title_main">
                <span>{{ $item->config_name }}</span>
            </div>
            <div class="tab-content">
                <div id="tab-{{ $item->config_slug }}" class="tab-pane fade in active">
                    <div class="box-list">
                        @if ($item->config_type_show == 0)
                            <ul>
                                @if ($item->category->childrens->count() > 0)
                                    @foreach ($item->category->childrens as $key => $category)
                                        <li class="{{ $key == 0 ? 'active' : '' }}">
                                            <a onclick="home.tab(this)" data-type="tab-{{ $item->config_slug }}"
                                                data-id={{ $category->id }} data-type-slick="1"
                                                data-item-slick="{{ $item->config_slug }}" data-number=3
                                                href="javascript:"
                                                title="{{ $category->category_name }}">{{ $category->category_name }}
                                            </a>
                                        </li>
                                    @endforeach
                                @else
                                    <li class="active">
                                        <a data-type="tab-{{ $category->config_slug }}" data-id={{ $item->id }}
                                            data-number=3 href="javascript:"
                                            title="{{ $item->category->category_name }}">{{ $item->category->category_name }}
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        @endif
                    </div>
                    <div class="loaddingthis"></div>
                    <div class="content-list">
                        <div class="mg-5">
                            <div class="slick-{{ $item->config_slug }} slick-thietke">
                                @if ($item->category->childrens->count() > 0)
                                    @php
                                        $categoryFirstChild = $item->category->childrens->first();
                                        $listPostCategoryFirstChild = $categoryFirstChild->posts;
                                    @endphp
                                    @if ($listPostCategoryFirstChild->count() > 0)
                                        @foreach ($listPostCategoryFirstChild as $post)
                                            <div class="item-duan mg-b col-3 pd-5 img_full">
                                                <div class="img-da">
                                                    <div class="box-image-mask1">
                                                        <a class="images-mask1"
                                                            href="{{ route('client.post', ['slug_category' => $post->category->category_slug, 'slug_post' => "$post->post_slug-$post->id"]) }}"
                                                            title="{{ $post->post_image }}"><img class="lazy"
                                                                src="{{ $post->post_image }}"
                                                                alt="{{ $post->post_title }}"></a>
                                                    </div>
                                                    <div class="tieude-da"><a
                                                            href="{{ route('client.post', ['slug_category' => $post->category->category_slug, 'slug_post' => "$post->post_slug-$post->id"]) }}"
                                                            title="{{ $post->post_title }}">{{ $post->post_title }}</a>
                                                    </div>
                                                </div>

                                            </div>
                                        @endforeach
                                    @endif
                                @elseif($item->posts->count() > 0)
                                    @foreach ($item->posts as $post)
                                        <div class="item-duan mg-b col-3 pd-5 img_full">
                                            <div class="img-da">
                                                <div class="box-image-mask1">
                                                    <a class="images-mask1"
                                                        href="{{ route('client.post', ['slug_category' => $post->category->category_slug, 'slug_post' => "$post->post_slug-$post->id"]) }}"
                                                        title="{{ $post->post_image }}"><img class="lazy"
                                                            src="{{ $post->post_image }}"
                                                            alt="{{ $post->post_title }}"></a>
                                                </div>
                                                <div class="tieude-da"><a
                                                        href="{{ route('client.post', ['slug_category' => $post->category->category_slug, 'slug_post' => "$post->post_slug-$post->id"]) }}"
                                                        title="{{ $post->post_title }}">{{ $post->post_title }}</a>
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
