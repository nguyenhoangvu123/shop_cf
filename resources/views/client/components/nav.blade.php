@php
    $key = request()->route()->parameters['slug_category'] ?? '';
@endphp
@if ($key || request()->is('gioi-thieu') || request()->is('lien-he') || request()->is('khai-toan'))
    <div class="menu menu-in" style="flex-direction: column;">
        <div class="wrap-content d-flex justify-content-end">
            <div class="col-social">
                <a href="tel:0283 740 5678" title="Hotline" target="_blank" class="hotline"><i class="fa fa-phone"></i>  {{ $listSettingFooter->listSettingBasic->value->hotline ?? "" }}</a>
                <a href="{{$listSettingFooter->listSettingBasic->value->facebook ?? ''}}" title="Facebook" target="_blank">
                    <img src="{{ asset('client/assets/images/icon-fb.png') }}" />
                </a>
                <a href="{{$listSettingFooter->listSettingBasic->value->youtube ?? ''}}" title="Youtube" target="_blank">
                    <img src="{{ asset('client/assets/images/youtube.png') }}" /></a>
                <a href="{{$listSettingFooter->listSettingBasic->value->intasgram ?? ''}}" title="instagram" target="_blank">
                    <img src="{{ asset('client/assets/images/instagram.png') }}" /></a>
                </a>
                <a href="{{$listSettingFooter->listSettingBasic->value->zalo ?? ''}}" title="zalo" target="_blank">
                    <img src="{{ asset('client/assets/images/zalo_new.png') }}" /></a>
                </a>
            </div>
        </div>
        <div class="wrap-content d-flex align-items-center justify-content-between">
            <div class="logo">
                <a href="{{ route('client.home') }}" title="{{ $listSettingBasic->value->nameCompany }}"><img
                        src="{{ $listSettingBasic->value->logo }}" alt="{{ $listSettingBasic->value->nameCompany }}"></a>
            </div>
            <ul id="nav" class="d-flex align-items-center justify-content-between">
                <li class=" transition_all"><a href="{{ route('client.home') }}" class="transition_all"><span>Trang
                            chủ</span></a></li>
                <li class=" transition_all"><a href="{{ route('client.introduce') }}"
                        class="transition_all {{ request()->is('gioi-thieu') ? 'menu_active' : '' }}"><span>Giới
                            thiệu</span></a>
                </li>
                @if ($listCategory->count() > 0)
                    @foreach ($listCategory as $item)
                        <li class=" transition_all"><a
                                href="{{ route('client.category.parent', [
                                    'slug_category' => $item->category_slug,
                                ]) }}"
                                class="transition_all {{ $key == $item->category_slug ? 'menu_active' : '' }}"><span>{{ $item->category_name }}</span></a>
                        </li>
                    @endforeach
                    <li class=" transition_all"><a href="{{ route('client.accounting') }}"
                            class="transition_all {{ request()->is('khai-toan') ? 'menu_active' : '' }}"><span>Khai
                                toán </span></a>
                    </li>

                    <li class=" transition_all"><a href="{{ route('client.contact') }}"
                            class="transition_all {{ request()->is('lien-he') ? 'menu_active' : '' }}"><span>Liên
                                hệ</span></a>
                    </li>

                @endif
            </ul>
            <a data-fancybox href="#form-book1" class="button-dangky">Đăng ký tư vấn</a>
        </div>
    </div>
    <div class=" menu_rp">
        <div class="wrapper">
            <span class="tt_menu"><a href="#menu"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path
                            d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z" />
                    </svg></a></span>
            <div class="clear"></div>
        </div>
    </div>
    <nav id="menu">
        
        <ul id="nav">
            <li class=" transition_all"><a href="{{ route('client.home') }}" class="transition_all"><span>Trang
                        chủ</span></a></li>
            <li class=" transition_all"><a href="{{ route('client.introduce') }}"
                    class="transition_all {{ request()->is('gioi-thieu') ? 'menu_active' : '' }}"><span>Giới
                        thiệu</span></a>
                @if ($listCategory->count() > 0)
                    @foreach ($listCategory as $item)
            <li class=" transition_all"><a
                    href="{{ route('client.category.parent', [
                        'slug_category' => $item->category_slug,
                    ]) }}"
                    class="transition_all {{ $key == $item->category_slug ? 'menu_active' : '' }}"><span>{{ $item->category_name }}</span></a>

            </li>
@endforeach
<li class=" transition_all"><a href="{{ route('client.accounting') }}"
        class="transition_all {{ request()->is('khai-toan') ? 'menu_active' : '' }}"><span>Khai
            toán </span></a>
</li>
<li class=" transition_all"><a href="{{ route('client.contact') }}"
        class="transition_all {{ request()->is('lien-he') ? 'menu_active' : '' }}"><span>Liên
            hệ</span></a>
</li>

@endif
</ul>
</nav>
@else
<div class="menu d-flex" style="flex-direction: column;">
    <div class="wrap-content d-flex justify-content-end">
        <div class="col-social">
            <a href="tel:0283 740 5678" title="Hotline" target="_blank" class="hotline"><i class="fa fa-phone"></i>  {{ $listSettingFooter->listSettingBasic->value->hotline ?? "" }}</a>
            <a href="{{$listSettingFooter->listSettingBasic->value->facebook ?? ''}}" title="Facebook" target="_blank">
                <img src="{{ asset('client/assets/images/icon-fb.png') }}" />
            </a>
            <a href="{{$listSettingFooter->listSettingBasic->value->youtube ?? ''}}" title="Youtube" target="_blank">
                <img src="{{ asset('client/assets/images/youtube.png') }}" /></a>
            <a href="{{$listSettingFooter->listSettingBasic->value->intasgram ?? ''}}" title="instagram" target="_blank">
                <img src="{{ asset('client/assets/images/instagram.png') }}" /></a>
            </a>
            <a href="{{$listSettingFooter->listSettingBasic->value->zalo ?? ''}}" title="zalo" target="_blank">
                <img src="{{ asset('client/assets/images/zalo_new.png') }}" /></a>
            </a>
        </div>
    </div>
    <div class="wrap-content d-flex align-items-center justify-content-between">
        <div class="logo">
            <a href="{{ route('client.home') }}" title="{{ $listSettingBasic->value->nameCompany }}"><img
                    src="{{ $listSettingBasic->value->logo }}" alt="{{ $listSettingBasic->value->nameCompany }}"></a>
        </div>
        <ul id="nav" class="d-flex align-items-center justify-content-between">
            
            <li class=" transition_all"><a href="{{ route('client.home') }}"
                    class="transition_all {{ !request()->is('gioi-thieu') && !request()->is('lien-he') ? 'menu_active' : '' }}"><span>Trang
                        chủ</span></a></li>
            <li class=" transition_all"><a href="{{ route('client.introduce') }}"
                    class="transition_all {{ request()->is('gioi-thieu') ? 'menu_active' : '' }}"><span>Giới
                        thiệu</span></a>
            </li>
            @if ($listCategory->count() > 0)
                @foreach ($listCategory as $item)
                    <li class=" transition_all"><a
                            
                           href="{{ route('client.category.parent', [
                               'slug_category' => $item->category_slug,
                           ]) }}"
                            class="transition_all {{ $key == $item->category_slug ? 'menu_active' : '' }}"><span>{{ $item->category_name }}</span></a>
                    </li>
                @endforeach
                <li class=" transition_all"><a href="{{ route('client.accounting') }}"
                        class="transition_all {{ request()->is('khai-toan') ? 'menu_active' : '' }}"><span>Khai
                            toán </span></a>
                </li>
                <li class=" transition_all"><a href="{{ route('client.contact') }}"
                        class="transition_all {{ request()->is('lien-he') ? 'menu_active' : '' }}"><span>Liên
                            hệ</span></a>
                </li>

            @endif
        </ul>
        <a data-fancybox href="#form-book1" class="button-dangky">Đăng ký tư vấn</a>
    </div>
</div>
<div class=" menu_rp">
    <div class="wrapper">
        <span class="tt_menu"><a href="#menu"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path
                        d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z" />
                </svg></a></span>
        <div class="clear"></div>
    </div>
</div>
<nav id="menu">
    <ul id="nav">
        <li class=" transition_all"><a href="{{ route('client.home') }}" class="transition_all"><span>Trang
                    chủ</span></a></li>
        <li class=" transition_all"><a href="{{ route('client.contact') }}"
                class="transition_all {{ request()->is('lien-he') ? 'menu_active' : '' }}"><span>Giới
                    thiệu</span></a>
        </li>
        @if ($listCategory->count() > 0)
            @foreach ($listCategory as $item)
                <li class=" transition_all"><a
                       href="{{ route('client.category.parent', [
                           'slug_category' => $item->category_slug,
                       ]) }}"
                        class="transition_all {{ $key == $item->category_slug ? 'menu_active' : '' }}"><span>{{ $item->category_name }}</span></a>

                </li>
            @endforeach
            <li class=" transition_all"><a href="{{ route('client.accounting') }}"
                    class="transition_all {{ request()->is('khai-toan') ? 'menu_active' : '' }}"><span>Khai
                        toán </span></a>
            </li>
            <li class=" transition_all"><a href="{{ route('client.contact') }}"
                    class="transition_all {{ request()->is('lien-he') ? 'menu_active' : '' }}"><span>Liên
                        hệ</span></a>
            </li>

        @endif
    </ul>
</nav>
@endif

<div id="form-book1">
    <h3>Đăng ký tư vấn</h3>
    <form class="form-newsletter1 validation-newsletter" id="form-advice">
        <div class="newsletter-input1">
            <input type="text" class="form-control" id="advice-name" name="name" placeholder="Nhập họ tên" />
        </div>
        <div class="newsletter-input1">
            <input type="text" class="form-control" id="advice-title" name="title" placeholder="Tiêu đề" />
        </div>
        <div class="newsletter-input1">
            <input type="text" class="form-control" id="advice-email" name="email" placeholder="Email" />
        </div>
        <div class="newsletter-input1">
            <input type="text" class="form-control" id="advice-phone" name="phone" placeholder="Điện thoại" />
        </div>
        <div class="newsletter-input1">
            <textarea class="form-control" id="advice-description" name="description" placeholder="Nội dung"></textarea>
        </div>
        <div class="newsletter-button1">
            <input onclick="advice.store()" type="submit" name="submit-newsletter" value="Đăng ký">
        </div>
    </form>
</div>
