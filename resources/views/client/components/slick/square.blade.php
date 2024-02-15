@if ($item->posts->count() > 0)
    @if ($item->config_image)
        <style>
            .section-highlight:before {
                content: '';
                position: absolute;
                width: 45%;
                height: 100%;
                background: url({{ $item->config_image }})top center/cover no-repeat;
            }
        </style>
        <div class="section section-highlight " id="section-{{ $item->config_slug }}">
            <div class="inner">
                <div class="right-project">
                    <div class="title_main">
                        <span>{{ $item->config_name }}</span>
                    </div>
                    <div class="slick-{{ $item->config_slug }} slick-highlight">
                        @foreach ($item->posts as $post)
                        @if ($key <= 9)
                            <div class="item-project">
                                <div class="img-project">
                                    <a href="{{ route('client.post', ['slug_category' => $post->category->category_slug, 'slug_post' => "$post->post_slug-$post->id"]) }}"
                                        title="{{ $post->post_title }}"><img class="lazy" src="{{ $post->post_image }}"
                                            alt="{{ $post->post_title }}"></a>
                                    <div class="info-project">
                                        <div>
                                            <h3 class="text-split">{{ $post->post_title }}</h3>
                                            <a class="view-detail"
                                                href="{{ route('client.post', ['slug_category' => $post->category->category_slug, 'slug_post' => "$post->post_slug-$post->id"]) }}">Xem
                                                chi tiết </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endif
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    @else
        <div class="section {{ $contentSection ?? '' }}" id="section-{{ $item->config_slug }}">
            <div class="inner">
                <div class="wrap-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="title_main"><span>{{ $item->config_name }}</span></div>
                            <div class="mg-10 w-clear">
                                @foreach ($item->posts as $key => $post)
                                    @if ($key <= 9)
                                    <div class="col-2 pd-10">
                                        <div class="item-bd">
                                            <div class="title-bd">
                                                <a href="{{ route('client.post', ['slug_category' => $post->category->category_slug, 'slug_post' => "$post->post_slug-$post->id"]) }}"
                                                    title="{{ $post->post_title }}">
                                                    <h3 class="text-split">{{ $post->post_title }}</h3>
                                                    <span>Xem</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@else
    <div class="section {{ $contentSection ?? '' }}" id="section-{{ $item->config_slug }}">
        <div class="inner">
            <div class="wrap-content">
                <div class="title_main">
                    <span>{{ $item->config_name }}</span>
                </div>
                <div class="tab-content">
                    <div id="tab-{{ $item->config_slug }}" class="tab-pane fade in active">
                        <div class="box-list">
                            <ul>
                                @if ($item->config_type_show == 0)
                
                                    <ul>
                                        @if ($item->category)
                                            @foreach ($item->category->childrens as $key => $category)

                                                <li class="{{ $key == 0 ? 'active' : '' }}">
                                                    <a onclick="home.tab(this)"
                                                        data-type="tab-{{ $item->config_slug }}"
                                                        data-id={{ $category->id }} data-type-slick="2"
                                                        data-item-slick="{{ $item->config_slug }}" data-number=4
                                                        href="javascript:"
                                                        title="{{ $category->category_name }}">{{ $category->category_name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                @endif
                            </ul>
                        </div>
                        <div class="loaddingthis"></div>
                        <div class="content-list">
                            <div class="mg-5">
                                <div class="slick-{{ $item->config_slug }} slick-thicong">
                                    @if ($item->posts->count() > 0)
                                        @foreach ($item->posts as $key => $post)
                                        @if ($key <= 9)
                                            <div class="item-duan mg-b col-3 pd-5 img_full">
                                                <div class="img-da">
                                                    <a class="border-radius-50"
                                                        href="{{ route('client.post', [
                                                            'slug_category' => $post->category->category_slug,
                                                            'slug_post' => "$post->post_slug-$post->id",
                                                        ]) }}"
                                                        title="{{ $post->post_title }}"><img class="lazy"
                                                            src="{{ $post->post_image }}"
                                                            alt="{{ $post->post_title }}"></a>
                                                    <div class="tieude-da"><a
                                                            href="{{ route('client.post', ['slug_category' => $post->category->category_slug, 'slug_post' => "$post->post_slug-$post->id"]) }}"
                                                            title="{{ $post->post_title }}">{{ $post->post_title }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @endforeach
                                    @elseif ($item->category)
                                        @php
                                            $categoryFirstChild = $item->category->childrens->first();
                                            if ($categoryFirstChild) {
                                                $listPostCategoryFirstChild = $categoryFirstChild
                                                ->posts()
                                                ->orderBy('id','desc')
                                                ->limit(10)
                                                ->get();
                                            }else {
                                                $listPostCategoryFirstChild = $item->category->posts;
                                            }
                                            
                                        @endphp
                                        @if ($listPostCategoryFirstChild->count() > 0)
                                            @foreach ($listPostCategoryFirstChild as $key => $post)
                                                <div class="item-u mg-b col-3 pd-5 img_full">
                                                    <div class="img-da">
                                                        <a class="border-radius-50"
                                                            href="{{ route('client.post', ['slug_category' => $post->category->category_slug, 'slug_post' => "$post->post_slug-$post->id"]) }}"
                                                            title="{{ $post->post_title }}"><img class="lazy"
                                                                src="{{ $post->post_image }}"
                                                                alt="{{ $post->post_title }}"></a>
                                                        <div class="tieude-da"><a
                                                                href="{{ route('client.post', ['slug_category' => $post->category->category_slug, 'slug_post' => "$post->post_slug-$post->id"]) }}"
                                                                title="{{ $post->post_title }}">{{ $post->post_title }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
