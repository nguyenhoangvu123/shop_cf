 <!-- Menu -->

 <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
     <div class="app-brand demo">
         <a href="javascript:void(0);" class="app-brand-link">
             <img style="height: 50px;
            object-fit: cover;" src="{{ asset('admin/assets/img/logo.jpg') }}"
                 alt="">
             <span class="app-brand-text demo menu-text fw-bolder ms-2">Pixel</span>
         </a>

         <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
             <i class="bx bx-chevron-left bx-sm align-middle"></i>
         </a>
     </div>

     <div class="menu-inner-shadow"></div>

     <ul class="menu-inner py-1">
         <!-- Dashboard -->
         <li class="menu-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
             <a href="{{ route('admin.dashboard') }}" class="menu-link">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                     style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                     <path
                         d="M5 22h14a2 2 0 0 0 2-2v-9a1 1 0 0 0-.29-.71l-8-8a1 1 0 0 0-1.41 0l-8 8A1 1 0 0 0 3 11v9a2 2 0 0 0 2 2zm5-2v-5h4v5zm-5-8.59 7-7 7 7V20h-3v-5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v5H5z">
                     </path>
                 </svg>
                 <div style="margin-left: 5px" data-i18n="Analytics">Dashboard</div>
             </a>
         </li>

         <!-- Categories -->
         <li class="menu-item {{ request()->is('admin/category') ? 'active' : '' }}">
             <a href="{{ route('admin.category') }}" class="menu-link">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                     style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                     <path
                         d="M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM9 9H5V5h4v4zm11 4h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1zm-1 6h-4v-4h4v4zM17 3c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2zM7 13c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2z">
                     </path>
                 </svg>
                 <div style="margin-left: 5px " data-i18n="Analytics">Danh mục</div>
             </a>
         </li>
         <!-- posts -->
         <li class="menu-item {{ request()->is('admin/post/*') ? 'active' : '' }}">
             <a href="{{ route('admin.post') }}" class="menu-link">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                     style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                     <path
                         d="M19.875 3H4.125C2.953 3 2 3.897 2 5v14c0 1.103.953 2 2.125 2h15.75C21.047 21 22 20.103 22 19V5c0-1.103-.953-2-2.125-2zm0 16H4.125c-.057 0-.096-.016-.113-.016-.007 0-.011.002-.012.008L3.988 5.046c.007-.01.052-.046.137-.046h15.75c.079.001.122.028.125.008l.012 13.946c-.007.01-.052.046-.137.046z">
                     </path>
                     <path d="M6 7h6v6H6zm7 8H6v2h12v-2h-4zm1-4h4v2h-4zm0-4h4v2h-4z"></path>
                 </svg>
                 <div style="margin-left: 5px" data-i18n="Analytics">Bài viết</div>
             </a>
         </li>
         <!--comments-->
         <li class="menu-item {{ request()->is('admin/comment/*') ? 'active' : '' }}">
             <a href="{{ route('admin.comment') }}" class="menu-link">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                     style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                     <path
                         d="M19.875 3H4.125C2.953 3 2 3.897 2 5v14c0 1.103.953 2 2.125 2h15.75C21.047 21 22 20.103 22 19V5c0-1.103-.953-2-2.125-2zm0 16H4.125c-.057 0-.096-.016-.113-.016-.007 0-.011.002-.012.008L3.988 5.046c.007-.01.052-.046.137-.046h15.75c.079.001.122.028.125.008l.012 13.946c-.007.01-.052.046-.137.046z">
                     </path>
                     <path d="M6 7h6v6H6zm7 8H6v2h12v-2h-4zm1-4h4v2h-4zm0-4h4v2h-4z"></path>
                 </svg>
                 <div style="margin-left: 5px" data-i18n="Analytics">Bình luận</div>
             </a>
         </li>

         <!-- advice -->
         <li class="menu-item {{ request()->is('admin/advice/*') ? 'active' : '' }}">
             <a href="{{ route('admin.advice') }}" class="menu-link">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                     style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                     <path
                         d="M19.875 3H4.125C2.953 3 2 3.897 2 5v14c0 1.103.953 2 2.125 2h15.75C21.047 21 22 20.103 22 19V5c0-1.103-.953-2-2.125-2zm0 16H4.125c-.057 0-.096-.016-.113-.016-.007 0-.011.002-.012.008L3.988 5.046c.007-.01.052-.046.137-.046h15.75c.079.001.122.028.125.008l.012 13.946c-.007.01-.052.046-.137.046z">
                     </path>
                     <path d="M6 7h6v6H6zm7 8H6v2h12v-2h-4zm1-4h4v2h-4zm0-4h4v2h-4z"></path>
                 </svg>
                 <div style="margin-left: 5px" data-i18n="Analytics">Đăng ký tư vấn</div>
             </a>
         </li>

         <!-- images -->
         <li class="menu-item {{ request()->is('admin/image/*') ? 'active open' : '' }}">
             <a href="javascript:void(0);" class="menu-link menu-toggle">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                     style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                     <circle cx="7.499" cy="9.5" r="1.5"></circle>
                     <path d="m10.499 14-1.5-2-3 4h12l-4.5-6z"></path>
                     <path
                         d="M19.999 4h-16c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm-16 14V6h16l.002 12H3.999z">
                     </path>
                 </svg>
                 <div style="margin-left: 5px" data-i18n="Layouts">Quản lí hình ảnh</div>
             </a>

             <ul class="menu-sub">
                 <li class="menu-item {{ request()->is('admin/image/slider') ? 'active' : '' }}">
                     <a href="{{ route('admin.image.slider') }}" class="menu-link">
                         <div data-i18n="Without menu">Slider</div>
                     </a>
                 </li>

             </ul>
         </li>
         <!-- setting -->
         <li class="menu-item {{ request()->is('admin/setting/*') ? 'active open' : '' }}">
             <a href="javascript:void(0);" class="menu-link menu-toggle">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                     style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                     <path
                         d="M12 16c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4zm0-6c1.084 0 2 .916 2 2s-.916 2-2 2-2-.916-2-2 .916-2 2-2z">
                     </path>
                     <path
                         d="m2.845 16.136 1 1.73c.531.917 1.809 1.261 2.73.73l.529-.306A8.1 8.1 0 0 0 9 19.402V20c0 1.103.897 2 2 2h2c1.103 0 2-.897 2-2v-.598a8.132 8.132 0 0 0 1.896-1.111l.529.306c.923.53 2.198.188 2.731-.731l.999-1.729a2.001 2.001 0 0 0-.731-2.732l-.505-.292a7.718 7.718 0 0 0 0-2.224l.505-.292a2.002 2.002 0 0 0 .731-2.732l-.999-1.729c-.531-.92-1.808-1.265-2.731-.732l-.529.306A8.1 8.1 0 0 0 15 4.598V4c0-1.103-.897-2-2-2h-2c-1.103 0-2 .897-2 2v.598a8.132 8.132 0 0 0-1.896 1.111l-.529-.306c-.924-.531-2.2-.187-2.731.732l-.999 1.729a2.001 2.001 0 0 0 .731 2.732l.505.292a7.683 7.683 0 0 0 0 2.223l-.505.292a2.003 2.003 0 0 0-.731 2.733zm3.326-2.758A5.703 5.703 0 0 1 6 12c0-.462.058-.926.17-1.378a.999.999 0 0 0-.47-1.108l-1.123-.65.998-1.729 1.145.662a.997.997 0 0 0 1.188-.142 6.071 6.071 0 0 1 2.384-1.399A1 1 0 0 0 11 5.3V4h2v1.3a1 1 0 0 0 .708.956 6.083 6.083 0 0 1 2.384 1.399.999.999 0 0 0 1.188.142l1.144-.661 1 1.729-1.124.649a1 1 0 0 0-.47 1.108c.112.452.17.916.17 1.378 0 .461-.058.925-.171 1.378a1 1 0 0 0 .471 1.108l1.123.649-.998 1.729-1.145-.661a.996.996 0 0 0-1.188.142 6.071 6.071 0 0 1-2.384 1.399A1 1 0 0 0 13 18.7l.002 1.3H11v-1.3a1 1 0 0 0-.708-.956 6.083 6.083 0 0 1-2.384-1.399.992.992 0 0 0-1.188-.141l-1.144.662-1-1.729 1.124-.651a1 1 0 0 0 .471-1.108z">
                     </path>
                 </svg>
                 <div style="margin-left: 5px" data-i18n="Layouts">Quản lí cấu hình</div>
             </a>

             <ul class="menu-sub">
                 <li class="menu-item {{ request()->is('admin/setting/basic') ? 'active' : '' }}">
                     <a href="{{ route('admin.setting.basic') }}" class="menu-link">
                         <div data-i18n="Without menu">Thông tin cơ bản</div>
                     </a>
                 </li>

             </ul>
             <ul class="menu-sub">
                 <li class="menu-item {{ request()->is('admin/setting/introduce') ? 'active' : '' }}">
                     <a href="{{ route('admin.setting.introduce') }}" class="menu-link">
                         <div data-i18n="Without menu">Giới thiệu</div>
                     </a>
                 </li>
             </ul>
             <ul class="menu-sub">
                 <li class="menu-item {{ request()->is('admin/setting/contact') ? 'active' : '' }}">
                     <a href="{{ route('admin.setting.contact') }}" class="menu-link">
                         <div data-i18n="Without menu">Liên hệ</div>
                     </a>
                 </li>
             </ul>
             <ul class="menu-sub">
                 <li class="menu-item {{ request()->is('admin/setting/layout') ? 'active' : '' }}">
                     <a href="{{ route('admin.setting.layout') }}" class="menu-link">
                         <div data-i18n="Without menu">Giao diện</div>
                     </a>
                 </li>
             </ul>
         </li>
         <!-- setting -->
         <li class="menu-item {{ request()->is('admin/accounting/*') ? 'active open' : '' }}">
             <a href="javascript:void(0);" class="menu-link menu-toggle">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                     style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                     <path
                         d="M12 16c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4zm0-6c1.084 0 2 .916 2 2s-.916 2-2 2-2-.916-2-2 .916-2 2-2z">
                     </path>
                     <path
                         d="m2.845 16.136 1 1.73c.531.917 1.809 1.261 2.73.73l.529-.306A8.1 8.1 0 0 0 9 19.402V20c0 1.103.897 2 2 2h2c1.103 0 2-.897 2-2v-.598a8.132 8.132 0 0 0 1.896-1.111l.529.306c.923.53 2.198.188 2.731-.731l.999-1.729a2.001 2.001 0 0 0-.731-2.732l-.505-.292a7.718 7.718 0 0 0 0-2.224l.505-.292a2.002 2.002 0 0 0 .731-2.732l-.999-1.729c-.531-.92-1.808-1.265-2.731-.732l-.529.306A8.1 8.1 0 0 0 15 4.598V4c0-1.103-.897-2-2-2h-2c-1.103 0-2 .897-2 2v.598a8.132 8.132 0 0 0-1.896 1.111l-.529-.306c-.924-.531-2.2-.187-2.731.732l-.999 1.729a2.001 2.001 0 0 0 .731 2.732l.505.292a7.683 7.683 0 0 0 0 2.223l-.505.292a2.003 2.003 0 0 0-.731 2.733zm3.326-2.758A5.703 5.703 0 0 1 6 12c0-.462.058-.926.17-1.378a.999.999 0 0 0-.47-1.108l-1.123-.65.998-1.729 1.145.662a.997.997 0 0 0 1.188-.142 6.071 6.071 0 0 1 2.384-1.399A1 1 0 0 0 11 5.3V4h2v1.3a1 1 0 0 0 .708.956 6.083 6.083 0 0 1 2.384 1.399.999.999 0 0 0 1.188.142l1.144-.661 1 1.729-1.124.649a1 1 0 0 0-.47 1.108c.112.452.17.916.17 1.378 0 .461-.058.925-.171 1.378a1 1 0 0 0 .471 1.108l1.123.649-.998 1.729-1.145-.661a.996.996 0 0 0-1.188.142 6.071 6.071 0 0 1-2.384 1.399A1 1 0 0 0 13 18.7l.002 1.3H11v-1.3a1 1 0 0 0-.708-.956 6.083 6.083 0 0 1-2.384-1.399.992.992 0 0 0-1.188-.141l-1.144.662-1-1.729 1.124-.651a1 1 0 0 0 .471-1.108z">
                     </path>
                 </svg>
                 <div style="margin-left: 5px" data-i18n="Layouts">Cấu hình khai toán</div>
             </a>

             <ul class="menu-sub">
                 <li class="menu-item {{ request()->is('admin/accounting/floor/*') ? 'active' : '' }}">
                     <a href="{{ route('admin.accounting.floor') }}" class="menu-link">
                         <div data-i18n="Without menu">Tầng</div>
                     </a>
                 </li>
             </ul>
             <ul class="menu-sub">
                 <li class="menu-item {{ request()->is('admin/accounting/contruction/*') ? 'active' : '' }}">
                     <a href="{{ route('admin.accounting.contruction') }}" class="menu-link">
                         <div data-i18n="Without menu">Loại công trình</div>
                     </a>
                 </li>
             </ul>
             <ul class="menu-sub">
                 <li class="menu-item {{ request()->is('admin/accounting/design/*') ? 'active' : '' }}">
                     <a href="{{ route('admin.accounting.design') }}" class="menu-link">
                         <div data-i18n="Without menu">Phong cách thiết kế</div>
                     </a>
                 </li>
             </ul>
             <ul class="menu-sub">
                 <li class="menu-item {{ request()->is('admin/accounting/attr/contruction/*') ? 'active' : '' }}">
                     <a href="{{ route('admin.accounting.attr.contruction') }}" class="menu-link">
                         <div data-i18n="Without menu">Gói thi công thô và nhân công</div>
                     </a>
                 </li>
             </ul>
             <ul class="menu-sub">
                 <li class="menu-item {{ request()->is('admin/accounting/attr/supplies/*') ? 'active' : '' }}">
                     <a href="{{ route('admin.accounting.attr.supplies') }}" class="menu-link">
                         <div data-i18n="Without menu">Gói vật tư hoàn thiện</div>
                     </a>
                 </li>
             </ul>
         </li>
     </ul>
 </aside>
 <!-- / Menu -->
