<div class="section {{ $contentSection ?? '' }}" id="section-footer">
    <div class="inner">
        <div class="wrap-content">
            <div class="row">
                <div class="col-md-6">
                    <div class="title_main"><span><b>Thông tin</b> liên hệ</span></div>
                    <h3 class="name-footer">{{ $listSettingFooter->listSettingBasic->value->nameCompany }}</h3>
                    <div class="noidung_ft">
                        <div><span class="fnd"><img src="{{ asset('client/assets/images/icon-1.png') }}" alt="Địa chỉ"></span><span>Địa
                                Chỉ: {{ $listSettingFooter->listSettingBasic->value->address }} </span>
                        </div>
                        <div><span class="fnd"><img src="{{ asset('client/assets/images/icon-2.png') }}" alt="Holine"></span><span>Hotline:
                                {{ $listSettingFooter->listSettingBasic->value->hotline }}</span></div>
                        <div><span class="fnd"><img src="{{ asset('client/assets/images/icon-3.png') }}" alt="email"></span><span>Email:
                                {{ $listSettingFooter->listSettingBasic->value->email }}</span></div>
                        <div><span class="fnd"><img src="{{ asset('client/assets/images/icon-4.png') }}" alt="website"></span><span>Website:
                                {{ $listSettingFooter->listSettingBasic->value->website }}</span>
                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    @php
                        $category = $listSettingFooter->itemCategory;
                    @endphp
                    @if ($category)
                        <h3 class="name-footer">{{ $category->category_name }}</h3>
                        <ul class="chinhsach">
                            @foreach ($category->posts as $post)
                                <li><a
                                        href="{{ route('client.post', ['slug_category' => $category->category_slug, 'slug_post' => $post->post_slug]) }}">{{ $post->post_title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="col-md-3">
                    <div class="mxhf">
                        <ul>
                            <li class="f_mxh"></li>
                            <li><a target="_blank"
                                    href="https://www.youtube.com/{{ $listSettingFooter->listSettingBasic->value->youtube ?? '' }}">
                                    <img src="{{ asset('client/assets/images/i3-5800.png') }}" alt="g1"></a></li>
                            <li><a target="_blank"
                                    href="https://www.facebook.com/{{ $listSettingFooter->listSettingBasic->value->facebook ?? '' }}"> <img
                                        src="{{ asset('client/assets/images/fbf-4153.png') }}" alt="facebook"></a></li>
                            <li><a target="_blank"
                                    href="https://zalo.me/{{  $listSettingFooter->listSettingBasic->value->zalo ?? '' }}"> <img
                                        src="{{ asset('client/assets/images/i4-9889.png') }}" alt="zalo"></a></li>
                            <li><a target="_blank"
                                    href="https://www.instagram.com/{{ $listSettingFooter->listSettingBasic->value->intasgram ?? '' }}"> <img
                                        src="{{ asset('client/assets/images/i2-1923.png') }}" alt="g4"></a></li>
                            <li><a target="_blank"
                                    href="{{ $listSettingFooter->listSettingBasic->value->message ?? '' }}">
                                    <img src="{{ asset('client/assets/images/i5-6382.png') }}" alt="g5"></a></li>
                        </ul>
                        <div class="clear"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="copy">Thiết kế & duy trì bởi PIXEL DECOR | Member of PIXEL DECOR</div>
    </div>
</div>
