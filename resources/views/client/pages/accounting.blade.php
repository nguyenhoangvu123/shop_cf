@extends('client.layouts.master')
@section('after_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/accounting.css') }}" />
@endsection
@section('content')
    <div class="wrap-content main-content">
        <div class="row-postDetail">
            <div class="box box-content">
                <div class="title_sl">
                    <h1 class="tieude_sl">
                        KHAI TOÁN
                    </h1>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="description"></div>
                        </div>
                        <div class="col-sm-12">
                            <form
                                class="estimates"><input name="_token" type="hidden"
                                    value="5wAZu3duO6ntsxKQAYEnV3E9GHCswTgM6p62vnqU">
                                <input type="text" id="isChangeInput" hidden value="0">
                                <input type="text" id="isSignup" class="isSignup" hidden value="0">
                                <div class="form-estimate">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-estimate-detail">
                                                <div class="estimate-detail-first">
                                                    <legend>Kiến trúc</legend>
                                                    <ul>
                                                        <li>
                                                            <div class="form-group">
                                                                <label for="area" class="control-label">Diện tích đất
                                                                    (m<sup>2</sup>)</label>
                                                                <input id="area" class="form-control area" autofocus
                                                                    placeholder="Nhập số"
                                                                    onkeypress="return isNumber(event)" name="area"
                                                                    type="text"
                                                                    value="{{ $searchAreaConstructionSize ?? '' }}">
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-group">
                                                                <label for="area_construction" class="control-label">Diện
                                                                    tích xây dựng (m<sup>2</sup>)</label>
                                                                <input id="area_construction" class="form-control area"
                                                                    autofocus placeholder="Nhập số"
                                                                    onkeypress="return isNumber(event)"
                                                                    name="area_construction" type="text"
                                                                    value="{{ $searchEstimateDesign ?? '' }}">
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-group">
                                                                <label for="construction_id" class="control-label">Loại công
                                                                    trình</label>
                                                                <select class="form-control" id="construction_id"
                                                                    name="construction_id"
                                                                    onchange="showHideQuoteType(false)">
                                                                    <option value="-"> ... </option>
                                                                    @foreach ($listTypeContruction as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            {{ $searchTypeContruction && $searchTypeContruction == $item->id ? 'selected' : '' }}>
                                                                            {{ $item->contruction_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-group">
                                                                <label for="design_package" class="control-label">Phong cách
                                                                    thiết kế</label>
                                                                <select class="form-control" id="design_package"
                                                                    name="design_package"
                                                                    onchange="showHideQuoteType(false)">
                                                                    <option value="-"> ... </option>
                                                                    @foreach ($listStyleDesgin as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            {{ $searchStyleDesgin && $searchStyleDesgin == $item->id ? 'selected' : '' }}>
                                                                            {{ $item->design_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-group">
                                                                <label for="build_quote_type_7" class="control-label">Thi
                                                                    công thô, và công nhân</label>
                                                                <select class="form-control sb-build-quote-type"
                                                                    id="build_quote_type_7" data-id="7"
                                                                    name="build_quote_type[]"
                                                                    onchange="showHideQuoteType(false)">
                                                                    <option value="{{ $listAttrContruction->first()->id }}">
                                                                        ... </option>
                                                                    @foreach ($listAttrContruction as $item)
                                                                        <option value="{{ $item->id }}">
                                                                            {{ $item->attr_master_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-group">
                                                                <label for="build_quote_type_6" class="control-label">Vật
                                                                    tư hoàn thiện cơ bản</label>
                                                                <select class="form-control sb-build-quote-type"
                                                                    id="build_quote_type_6" data-id="6"
                                                                    name="build_quote_type[]"
                                                                    onchange="showHideQuoteType(false)">
                                                                    <option value="{{ $listAttrSupplies->first()->id }}">
                                                                        ... </option>
                                                                    @foreach ($listAttrSupplies as $item)
                                                                        <option value="{{ $item->id }}">
                                                                            {{ $item->attr_master_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-group">
                                                                <label for="construction_way" class="control-label">Cách
                                                                    thức tiếp cận khu đất</label>
                                                                <select class="form-control" id="construction_way"
                                                                    name="construction_way">
                                                                    <option value="-"> ... </option>
                                                                    <option value="Đường tiếp cận > 3.5 m">Đường tiếp cận >
                                                                        3.5 m</option>
                                                                    <option value="Đường tiếp cận < 3.5 m">Đường tiếp cận <
                                                                            3.5 m</option>
                                                                </select>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-group">
                                                                <label for="construction_area" class="control-label">Vị
                                                                    trí khu đất</label>
                                                                <select class="form-control" id="construction_area"
                                                                    name="construction_area">
                                                                    <option value="-"> ... </option>
                                                                    <option value="Sát hai bên và sau lưng là nhà dân">Sát
                                                                        hai bên và sau lưng là nhà dân</option>
                                                                    <option value="Có hai bên hông là nhà dân">Có hai bên
                                                                        hông là nhà dân</option>
                                                                    <option value="Chỉ có một bên hông nhà là dân">Chỉ có
                                                                        một bên hông nhà là dân</option>
                                                                    <option
                                                                        value="Khu đất thoáng, không liền kề công trình khác">
                                                                        Khu đất thoáng, không liền kề công trình khác
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="floors">
                                                        <div class="form-group form-group-column">
                                                            <label for="floor" class="control-label">Chọn số
                                                                tầng</label>
                                                            <div class="checkboxs">
                                                                {{-- <ul>
                                                                    <li class="" data-count-normal="0">
                                                                        <label class="checkbox-label" for="floor-11">
                                                                            <input id="floor-11"
                                                                                class="cb-floor is_required"
                                                                                checked="checked" name="floor[]"
                                                                                type="checkbox" value="11">
                                                                            Móng
                                                                        </label>
                                                                    </li>
                                                                    <li class="" data-count-normal="0">
                                                                        <label class="checkbox-label" for="floor-10">
                                                                            <input id="floor-10" class="cb-floor"
                                                                                name="floor[]" type="checkbox"
                                                                                value="10">
                                                                            Tầng hầm
                                                                        </label>
                                                                    </li>
                                                                    <li class="" data-count-normal="0">
                                                                        <label class="checkbox-label" for="floor-9">
                                                                            <input id="floor-9"
                                                                                class="cb-floor is_required"
                                                                                checked="checked" name="floor[]"
                                                                                type="checkbox" value="9">
                                                                            Tầng 1 (Trệt)
                                                                        </label>
                                                                    </li>
                                                                    <li class="" data-count-normal="0">
                                                                        <label class="checkbox-label" for="floor-8">
                                                                            <input id="floor-8" class="cb-floor"
                                                                                name="floor[]" type="checkbox"
                                                                                value="8">
                                                                            Tầng lững
                                                                        </label>
                                                                    </li>
                                                                    <li class="is_normal count-floor-1"
                                                                        data-count-normal="1">
                                                                        <label class="checkbox-label" for="floor-7">
                                                                            <input id="floor-7" class="cb-floor"
                                                                                name="floor[]" type="checkbox"
                                                                                value="7">
                                                                            Tầng 2 (Lầu 1)
                                                                        </label>
                                                                    </li>
                                                                    <li class="is_normal count-floor-2"
                                                                        data-count-normal="2">
                                                                        <label class="checkbox-label" for="floor-6">
                                                                            <input id="floor-6" class="cb-floor"
                                                                                name="floor[]" type="checkbox"
                                                                                value="6">
                                                                            Tầng 3 (Lầu 2)
                                                                        </label>
                                                                    </li>
                                                                    <li class="is_normal count-floor-3"
                                                                        data-count-normal="3">
                                                                        <label class="checkbox-label" for="floor-5">
                                                                            <input id="floor-5" class="cb-floor"
                                                                                name="floor[]" type="checkbox"
                                                                                value="5">
                                                                            Tầng 4 (Lầu 3)
                                                                        </label>
                                                                    </li>
                                                                    <li class="is_normal count-floor-4"
                                                                        data-count-normal="4">
                                                                        <label class="checkbox-label" for="floor-4">
                                                                            <input id="floor-4" class="cb-floor"
                                                                                name="floor[]" type="checkbox"
                                                                                value="4">
                                                                            Tầng 5 (Lầu 4)
                                                                        </label>
                                                                    </li>
                                                                    <li class="is_normal count-floor-5"
                                                                        data-count-normal="5">
                                                                        <label class="checkbox-label" for="floor-3">
                                                                            <input id="floor-3" class="cb-floor"
                                                                                name="floor[]" type="checkbox"
                                                                                value="3">
                                                                            Tầng 6 (Lầu 5)
                                                                        </label>
                                                                    </li>
                                                                    <li class="" data-count-normal="5">
                                                                        <label class="checkbox-label" for="floor-2">
                                                                            <input id="floor-2" class="cb-floor"
                                                                                name="floor[]" type="checkbox"
                                                                                value="2">
                                                                            Tầng thượng
                                                                        </label>
                                                                    </li>
                                                                    <li class="" data-count-normal="5">
                                                                        <label class="checkbox-label" for="floor-1">
                                                                            <input id="floor-1"
                                                                                class="cb-floor is_required"
                                                                                checked="checked" name="floor[]"
                                                                                type="checkbox" value="1">
                                                                            Mái
                                                                        </label>
                                                                    </li>
                                                                </ul> --}}
                                                                <ul>
                                                                    @php
                                                                        $countFloor = 1;
                                                                    @endphp
                                                                    @foreach ($listFloor as $key => $item)
                                                                        <li class="{{ $item->floor_attr_type == 2 ? "is_normal count-floor-$countFloor" : '' }}"
                                                                            data-count-normal="{{ $item->floor_position > 0 ? $countFloor : 0 }}">
                                                                            <label class="checkbox-label"
                                                                                for="floor-{{ $item->id }}">
                                                                                <input id="floor-{{ $item->id }}"
                                                                                    class="cb-floor {{ $item->floor_checked == 1 ? 'is_required' : '' }}"
                                                                                    @if ($item->floor_checked == 1 || ($searchFloor && $searchFloor == $item->id)) checked="checked" @endif
                                                                                    name="floor[]" type="checkbox"
                                                                                    value="{{ $item->id }}">
                                                                                {{ $item->floor_name }}
                                                                            </label>
                                                                        </li>
                                                                        @php
                                                                            $countFloor = $countFloor + 1;
                                                                        @endphp
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="estimate-detail-second">
                                                    <legend>Kết cấu</legend>
                                                    <div class="coefficients">
                                                        <ul>
                                                            @foreach ($listFloor as $item)
                                                                @if ($item->is_structure == 1)
                                                                    <li id="div_floor_coefficient_{{ $item->id }}"
                                                                        class="floor-coefficient floor-coefficient-{{ $item->id }} hidden">
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="floor_coefficient_{{ $item->id }}"
                                                                                class="control-label">{{ $item->floor_name }}</label>
                                                                            <select class="form-control list-structured"
                                                                                id="floor_coefficient_{{ $item->id }}"
                                                                                data-id="{{ $item->id }}"
                                                                                onchange="changeCoefficient(this, '{{ $item->id }}')">
                                                                                @foreach ($item->attrFloors as $attr)
                                                                                    <option value="{{ $attr->id }}"
                                                                                        data-value="{{ $attr->value_expense }}"
                                                                                        data-design="{{ $attr->value_desgin }}">
                                                                                        {{ $attr->floor_attr_name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                            {{-- <li id="div_floor_coefficient_10"
                                                                class="floor-coefficient floor-coefficient-10 hidden">
                                                                <div class="form-group">
                                                                    <label for="floor_coefficient_10"
                                                                        class="control-label">Tầng hầm</label>
                                                                    <select class="form-control" id="floor_coefficient_10"
                                                                        onchange="changeCoefficient(this, 10)">
                                                                        <option value="25" data-value="150" selected>
                                                                            Độ sâu <1,2m so với cốt vỉa hè</option>
                                                                        <option value="24" data-value="170">Độ sâu
                                                                            <1,8m so với cốt vỉa hè</option>
                                                                        <option value="23" data-value="200">Độ sâu
                                                                            >2,0m so với cốt vỉa hè</option>
                                                                        <option value="22" data-value="250">Độ sâu
                                                                            >2,5m so với cốt vỉa hè</option>
                                                                    </select>
                                                                </div>
                                                            </li>
                                                            <li id="div_floor_coefficient_9"
                                                                class="floor-coefficient floor-coefficient-9 hidden">
                                                                <div class="form-group">
                                                                    <label for="floor_coefficient_9"
                                                                        class="control-label">Tầng 1 (Trệt)</label>
                                                                    <select class="form-control" id="floor_coefficient_9"
                                                                        onchange="changeCoefficient(this, 9)">
                                                                        <option value="21" data-value="100" selected>
                                                                            Không có tăng cường thép</option>
                                                                        <option value="20" data-value="110">Có tăng
                                                                            cường thép</option>
                                                                    </select>
                                                                </div>
                                                            </li>
                                                            <li id="div_floor_coefficient_1"
                                                                class="floor-coefficient floor-coefficient-1 hidden">
                                                                <div class="form-group">
                                                                    <label for="floor_coefficient_1"
                                                                        class="control-label">Mái</label>
                                                                    <select class="form-control" id="floor_coefficient_1"
                                                                        onchange="changeCoefficient(this, 1)">
                                                                        <option value="4" data-value="40" selected>
                                                                            Mái tole</option>
                                                                        <option value="3" data-value="50">Mái bê tông
                                                                            cốt thép</option>
                                                                        <option value="2" data-value="70">Mái ngói
                                                                        </option>
                                                                        <option value="1" data-value="120">Mái bê
                                                                            tông cốt thép dán ngói</option>
                                                                    </select>
                                                                </div>
                                                            </li> --}}
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!---- start image -->
                                        <div class="col-sm-4">
                                            <div class="form-estimate-map">
                                                <div class="list-estimate-map">
                                                    @foreach ($listFloorSort as $key => $item)
                                                        @if ($item->floor_type == 'mai')
                                                            <div class="item-estimate-map is_required" img-floor
                                                                img-floor-{{ $item->id }}">
                                                                <img src="{{ asset('client/assets/images/mai.jpg') }}"
                                                                    alt="{{ $item->floor_name }}" class="thumb">
                                                            </div>
                                                        @elseif($item->floor_type == 'tang-thuong')
                                                            <div
                                                                class="item-estimate-map img-floor img-floor-{{ $item->id }}">
                                                                <img src="{{ asset('client/assets/images/santhuong.jpg') }}"
                                                                    alt="{{ $item->floor_name }}" class="thumb">
                                                            </div>
                                                        @elseif($item->floor_type == 'tang-lung')
                                                            <div
                                                                class="item-estimate-map img-floor img-floor-{{ $item->id }}">
                                                                <img src="{{ asset('client/assets/images/lung.jpg') }}"
                                                                    alt="{{ $item->floor_name }}" class="thumb">
                                                            </div>
                                                        @elseif($item->floor_type == 'tang-tret')
                                                            <div class="item-estimate-map is_required" img-floor
                                                                img-floor-{{ $item->id }}">
                                                                <img src="{{ asset('client/assets/images/tret.jpg') }}"
                                                                    alt="{{ $item->floor_name }}" class="thumb">
                                                            </div>
                                                        @elseif($item->floor_type == 'tang-ham')
                                                            <div
                                                                class="item-estimate-map img-floor img-floor-{{ $item->id }}">
                                                                <img src="{{ asset('client/assets/images/ham.jpg') }}"
                                                                    alt="{{ $item->floor_name }}" class="thumb">
                                                            </div>
                                                        @elseif($item->floor_type == 'mong')
                                                            <div class="item-estimate-map is_required" img-floor
                                                                img-floor-{{ $item->id }}">
                                                                <img src="{{ asset('client/assets/images/mong.png') }}"
                                                                    alt="{{ $item->floor_name }}" class="thumb">
                                                            </div>
                                                        @else
                                                            <div
                                                                class="item-estimate-map img-floor img-floor-{{ $item->id }}">
                                                                <img src="{{ asset('client/assets/images/lau.jpg') }}"
                                                                    alt="{{ $item->floor_name }}" class="thumb">
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                    {{-- <div class="item-estimate-map is_required" img-floor img-floor-1">
                                                        <img src="https://xconsg.com.vn/thumb/322/50/floors/mai-20220109150746.jpg"
                                                            alt="Mái" class="thumb">
                                                    </div>
                                                    <div class="item-estimate-map img-floor img-floor-2">
                                                        <img src="https://xconsg.com.vn/thumb/322/50/floors/santhuong-20220109150817.jpg"
                                                            alt="Tầng thượng" class="thumb">
                                                    </div>
                                                    <div class="item-estimate-map img-floor img-floor-3">
                                                        <img src="https://xconsg.com.vn/thumb/322/50/floors/lau-20220109150837.jpg"
                                                            alt="Tầng 6 (Lầu 5)" class="thumb">
                                                    </div>
                                                    <div class="item-estimate-map img-floor img-floor-4">
                                                        <img src="https://xconsg.com.vn/thumb/322/50/floors/lau-20220109150857.jpg"
                                                            alt="Tầng 5 (Lầu 4)" class="thumb">
                                                    </div>
                                                    <div class="item-estimate-map img-floor img-floor-5">
                                                        <img src="https://xconsg.com.vn/thumb/322/50/floors/lau-20220109150909.jpg"
                                                            alt="Tầng 4 (Lầu 3)" class="thumb">
                                                    </div>
                                                    <div class="item-estimate-map img-floor img-floor-6">
                                                        <img src="https://xconsg.com.vn/thumb/322/50/floors/lau-20220109150922.jpg"
                                                            alt="Tầng 3 (Lầu 2)" class="thumb">
                                                    </div>
                                                    <div class="item-estimate-map img-floor img-floor-7">
                                                        <img src="https://xconsg.com.vn/thumb/322/50/floors/lau-20220109150934.jpg"
                                                            alt="Tầng 2 (Lầu 1)" class="thumb">
                                                    </div>
                                                    <div class="item-estimate-map img-floor img-floor-8">
                                                        <img src="https://xconsg.com.vn/thumb/322/50/floors/lung-20220109150948.jpg"
                                                            alt="Tầng lững" class="thumb">
                                                    </div>
                                                    <div class="item-estimate-map is_required" img-floor img-floor-9">
                                                        <img src="https://xconsg.com.vn/thumb/322/50/floors/tret-20220109151002.jpg"
                                                            alt="Tầng 1 (Trệt)" class="thumb">
                                                    </div>

                                                   --}}
                                                </div>
                                            </div>
                                        </div>
                                        <!---- end image -->

                                    </div>
                                    <div class="row">
                                        <div class="estimate-detail-three">
                                            <div class="panel-group" id="estimate-detail-accordion" role="tablist"
                                                aria-multiselectable="true">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab"
                                                        id="accordion-estimate-design">
                                                        <legend>Thiết kế</legend>
                                                    </div>
                                                    <div id="collapse-estimate-design" class="panel-collapse collapse in"
                                                        role="tabpanel" aria-labelledby="accordion-estimate-design">
                                                        <div class="panel-body">
                                                            <table class="table table-responsive table-result-texture">
                                                                <thead>
                                                                    <tr>
                                                                        <th> Hạng mục</th>
                                                                        <th>Diện tích (m<sup>2</sup>)</th>
                                                                        <th>HS tính toán</th>
                                                                        <th>HT tính toán (m<sup>2</sup>)</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($listFloor as $floor)
                                                                        <tr id="design-floor-{{ $floor->id }}"
                                                                            class="tr-floor tr-floor-{{ $floor->id }}">
                                                                            <th>{{ $floor->floor_name }}</th>
                                                                            <th colspan="3">&nbsp;</th>
                                                                        </tr>
                                                                        @foreach ($floor->attrFloors as $attr)
                                                                            <tr id="design-coefficient-{{ $attr->id }}"
                                                                                class="tr-design-coefficient tr-floor-{{ $floor->id }} {{ $floor->is_structure == 1 ? "tr-design-coefficient-structure tr-design-coefficient-structure-$attr->id" : '' }} design-coefficient cb-first-design-coefficient without_item_2 hidden"
                                                                                data-floor="{{ $floor->id }}"
                                                                                data-design-coefficient="{{ $attr->id }}">
                                                                                <td>
                                                                                    <label
                                                                                        for="cb-design-coefficient-{{ $attr->id }}">
                                                                                        <input
                                                                                            id="cb-design-coefficient-{{ $attr->id }}"
                                                                                            class="cb-design-coefficient {{ $floor->floor_checked == 1 ? 'is_required' : '' }}"
                                                                                            checked="checked"
                                                                                            name="cbDesignCoefficient[{{ $attr->id }}]"
                                                                                            type="checkbox"
                                                                                            value="{{ $attr->id }}">
                                                                                        {{ $attr->floor_attr_name }}
                                                                                    </label>
                                                                                </td>
                                                                                <td
                                                                                    class="txt-design-coefficient-{{ $attr->id }}">
                                                                                    <input
                                                                                        id="txt-design-coefficient-{{ $attr->id }}"
                                                                                        class="form-control form-control-sm txt-design-coefficient"
                                                                                        placeholder="Nhập số"
                                                                                        onkeypress="return isNumber(event)"
                                                                                        name="txbDesignCoefficient[{{ $attr->id }}]"
                                                                                        type="text" value="">
                                                                                </td>
                                                                                <td class="coefficient coefficient-{{ $attr->id }}"
                                                                                    data-value="{{ $attr->value_desgin }}">
                                                                                    {{ $attr->value_desgin }}% </td>
                                                                                <td class="area"></td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @endforeach
                                                                    <tr id="resultEstimateDesign">
                                                                        <td colspan="3">
                                                                            <input id="resultEstimateDesignHidden"
                                                                                name="resultEstimateDesign" type="hidden"
                                                                                value="0.0">
                                                                            TỔNG DIỆN TÍCH THIẾT KẾ TẠM TÍNH:
                                                                        </td>
                                                                        <td class="resultEstimate">0.0</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="4" id="designPrices"
                                                                            class="nopadding hidden">
                                                                            <table class="table table-responsive">
                                                                                <tr
                                                                                    class="head-quote-type head-design-quote-type">
                                                                                    <th colspan="4">Khái toán thiết kế
                                                                                    </th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="4"
                                                                                        class="nopadding td-quote-type td-design-quote-type">
                                                                                        <table
                                                                                            class="table table-responsive">
                                                                                            <tr
                                                                                                class="tr-quote-type tr-design-quote-type">
                                                                                                <th>Hạng mục</th>
                                                                                                <th>Diện tích
                                                                                                    (m<sup>2</sup>)</th>
                                                                                                <th>Đơn giá
                                                                                                    (vnđ/m<sup>2</sup>)</th>
                                                                                                <th>Thành tiền (vnđ)</th>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    {{-- <tr id="design-floor-10" class="tr-floor tr-floor-10">
                                                                        <th>Tầng hầm</th>
                                                                        <th colspan="3">&nbsp;</th>
                                                                    </tr>
                                                                    <tr id="design-coefficient-46"
                                                                        class="tr-design-coefficient tr-floor-10 design-coefficient cb-first-design-coefficient without_item_2 hidden"
                                                                        data-floor="10" data-design-coefficient="46">
                                                                        <td>
                                                                            <label for="cb-design-coefficient-46">
                                                                                <input id="cb-design-coefficient-46"
                                                                                    class="cb-design-coefficient is_required"
                                                                                    checked="checked"
                                                                                    name="cbDesignCoefficient[46]"
                                                                                    type="checkbox" value="46">
                                                                                Diện tích sàn
                                                                            </label>
                                                                        </td>
                                                                        <td class="txt-design-coefficient-46"><input
                                                                                id="txt-design-coefficient-46"
                                                                                class="form-control form-control-sm txt-design-coefficient"
                                                                                placeholder="Nhập số"
                                                                                onkeypress="return isNumber(event)"
                                                                                name="txbDesignCoefficient[46]"
                                                                                type="text" value=""></td>
                                                                        <td class="coefficient" data-value="100">100%</td>
                                                                        <td class="area">0</td>
                                                                    </tr>
                                                                    <tr id="design-floor-9" class="tr-floor tr-floor-9">
                                                                        <th>Tầng 1 (Trệt)</th>
                                                                        <th colspan="3">&nbsp;</th>
                                                                    </tr>
                                                                    <tr id="design-coefficient-45"
                                                                        class="tr-design-coefficient tr-floor-9 design-coefficient cb-first-design-coefficient hidden"
                                                                        data-floor="9" data-design-coefficient="45">
                                                                        <td>
                                                                            <label for="cb-design-coefficient-45">
                                                                                <input id="cb-design-coefficient-45"
                                                                                    class="cb-design-coefficient is_required"
                                                                                    checked="checked"
                                                                                    name="cbDesignCoefficient[45]"
                                                                                    type="checkbox" value="45">
                                                                                Diện tích sàn
                                                                            </label>
                                                                        </td>
                                                                        <td class="txt-design-coefficient-45"><input
                                                                                id="txt-design-coefficient-45"
                                                                                class="form-control form-control-sm txt-design-coefficient"
                                                                                placeholder="Nhập số"
                                                                                onkeypress="return isNumber(event)"
                                                                                name="txbDesignCoefficient[45]"
                                                                                type="text" value=""></td>
                                                                        <td class="coefficient" data-value="100">100%</td>
                                                                        <td class="area">0</td>
                                                                    </tr>
                                                                    <tr id="design-coefficient-44"
                                                                        class="tr-design-coefficient tr-floor-9 design-coefficient without_item_2 hidden"
                                                                        data-floor="9" data-design-coefficient="44">
                                                                        <td>
                                                                            <label for="cb-design-coefficient-44">
                                                                                <input id="cb-design-coefficient-44"
                                                                                    class="cb-design-coefficient"
                                                                                    name="cbDesignCoefficient[44]"
                                                                                    type="checkbox" value="44">
                                                                                Diện tích sân
                                                                            </label>
                                                                        </td>
                                                                        <td class="txt-design-coefficient-44"><input
                                                                                id="txt-design-coefficient-44"
                                                                                class="form-control form-control-sm txt-design-coefficient"
                                                                                placeholder="Nhập số"
                                                                                onkeypress="return isNumber(event)"
                                                                                name="txbDesignCoefficient[44]"
                                                                                type="text" value=""></td>
                                                                        <td class="coefficient" data-value="70">70%</td>
                                                                        <td class="area">0</td>
                                                                    </tr>
                                                                    <tr id="design-floor-8" class="tr-floor tr-floor-8">
                                                                        <th>Tầng lững</th>
                                                                        <th colspan="3">&nbsp;</th>
                                                                    </tr>
                                                                    <tr id="design-coefficient-43"
                                                                        class="tr-design-coefficient tr-floor-8 design-coefficient cb-first-design-coefficient hidden"
                                                                        data-floor="8" data-design-coefficient="43">
                                                                        <td>
                                                                            <label for="cb-design-coefficient-43">
                                                                                <input id="cb-design-coefficient-43"
                                                                                    class="cb-design-coefficient is_required"
                                                                                    checked="checked"
                                                                                    name="cbDesignCoefficient[43]"
                                                                                    type="checkbox" value="43">
                                                                                Diện tích sàn
                                                                            </label>
                                                                        </td>
                                                                        <td class="txt-design-coefficient-43"><input
                                                                                id="txt-design-coefficient-43"
                                                                                class="form-control form-control-sm txt-design-coefficient"
                                                                                placeholder="Nhập số"
                                                                                onkeypress="return isNumber(event)"
                                                                                name="txbDesignCoefficient[43]"
                                                                                type="text" value=""></td>
                                                                        <td class="coefficient" data-value="100">100%</td>
                                                                        <td class="area">0</td>
                                                                    </tr>
                                                                    <tr id="design-coefficient-42"
                                                                        class="tr-design-coefficient tr-floor-8 design-coefficient hidden"
                                                                        data-floor="8" data-design-coefficient="42">
                                                                        <td>
                                                                            <label for="cb-design-coefficient-42">
                                                                                <input id="cb-design-coefficient-42"
                                                                                    class="cb-design-coefficient"
                                                                                    name="cbDesignCoefficient[42]"
                                                                                    type="checkbox" value="42">
                                                                                Ô thoáng
                                                                            </label>
                                                                        </td>
                                                                        <td class="txt-design-coefficient-42"><input
                                                                                id="txt-design-coefficient-42"
                                                                                class="form-control form-control-sm txt-design-coefficient"
                                                                                placeholder="Nhập số"
                                                                                onkeypress="return isNumber(event)"
                                                                                name="txbDesignCoefficient[42]"
                                                                                type="text" value=""></td>
                                                                        <td class="coefficient" data-value="50">50%</td>
                                                                        <td class="area">0</td>
                                                                    </tr>
                                                                    <tr id="design-floor-7" class="tr-floor tr-floor-7">
                                                                        <th>Tầng 2 (Lầu 1)</th>
                                                                        <th colspan="3">&nbsp;</th>
                                                                    </tr>
                                                                    <tr id="design-coefficient-41"
                                                                        class="tr-design-coefficient tr-floor-7 design-coefficient cb-first-design-coefficient hidden"
                                                                        data-floor="7" data-design-coefficient="41">
                                                                        <td>
                                                                            <label for="cb-design-coefficient-41">
                                                                                <input id="cb-design-coefficient-41"
                                                                                    class="cb-design-coefficient is_required"
                                                                                    checked="checked"
                                                                                    name="cbDesignCoefficient[41]"
                                                                                    type="checkbox" value="41">
                                                                                Diện tích sàn
                                                                            </label>
                                                                        </td>
                                                                        <td class="txt-design-coefficient-41"><input
                                                                                id="txt-design-coefficient-41"
                                                                                class="form-control form-control-sm txt-design-coefficient"
                                                                                placeholder="Nhập số"
                                                                                onkeypress="return isNumber(event)"
                                                                                name="txbDesignCoefficient[41]"
                                                                                type="text" value=""></td>
                                                                        <td class="coefficient" data-value="100">100%</td>
                                                                        <td class="area">0</td>
                                                                    </tr>
                                                                    <tr id="design-coefficient-40"
                                                                        class="tr-design-coefficient tr-floor-7 design-coefficient without_item_2 hidden"
                                                                        data-floor="7" data-design-coefficient="40">
                                                                        <td>
                                                                            <label for="cb-design-coefficient-40">
                                                                                <input id="cb-design-coefficient-40"
                                                                                    class="cb-design-coefficient"
                                                                                    name="cbDesignCoefficient[40]"
                                                                                    type="checkbox" value="40">
                                                                                Ban công
                                                                            </label>
                                                                        </td>
                                                                        <td class="txt-design-coefficient-40"><input
                                                                                id="txt-design-coefficient-40"
                                                                                class="form-control form-control-sm txt-design-coefficient"
                                                                                placeholder="Nhập số"
                                                                                onkeypress="return isNumber(event)"
                                                                                name="txbDesignCoefficient[40]"
                                                                                type="text" value=""></td>
                                                                        <td class="coefficient" data-value="70">70%</td>
                                                                        <td class="area">0</td>
                                                                    </tr>
                                                                    <tr id="design-floor-6" class="tr-floor tr-floor-6">
                                                                        <th>Tầng 3 (Lầu 2)</th>
                                                                        <th colspan="3">&nbsp;</th>
                                                                    </tr>
                                                                    <tr id="design-coefficient-39"
                                                                        class="tr-design-coefficient tr-floor-6 design-coefficient cb-first-design-coefficient hidden"
                                                                        data-floor="6" data-design-coefficient="39">
                                                                        <td>
                                                                            <label for="cb-design-coefficient-39">
                                                                                <input id="cb-design-coefficient-39"
                                                                                    class="cb-design-coefficient is_required"
                                                                                    checked="checked"
                                                                                    name="cbDesignCoefficient[39]"
                                                                                    type="checkbox" value="39">
                                                                                Diện tích sàn
                                                                            </label>
                                                                        </td>
                                                                        <td class="txt-design-coefficient-39"><input
                                                                                id="txt-design-coefficient-39"
                                                                                class="form-control form-control-sm txt-design-coefficient"
                                                                                placeholder="Nhập số"
                                                                                onkeypress="return isNumber(event)"
                                                                                name="txbDesignCoefficient[39]"
                                                                                type="text" value=""></td>
                                                                        <td class="coefficient" data-value="100">100%</td>
                                                                        <td class="area">0</td>
                                                                    </tr>
                                                                    <tr id="design-coefficient-38"
                                                                        class="tr-design-coefficient tr-floor-6 design-coefficient without_item_2 hidden"
                                                                        data-floor="6" data-design-coefficient="38">
                                                                        <td>
                                                                            <label for="cb-design-coefficient-38">
                                                                                <input id="cb-design-coefficient-38"
                                                                                    class="cb-design-coefficient"
                                                                                    name="cbDesignCoefficient[38]"
                                                                                    type="checkbox" value="38">
                                                                                Ban công
                                                                            </label>
                                                                        </td>
                                                                        <td class="txt-design-coefficient-38"><input
                                                                                id="txt-design-coefficient-38"
                                                                                class="form-control form-control-sm txt-design-coefficient"
                                                                                placeholder="Nhập số"
                                                                                onkeypress="return isNumber(event)"
                                                                                name="txbDesignCoefficient[38]"
                                                                                type="text" value=""></td>
                                                                        <td class="coefficient" data-value="70">70%</td>
                                                                        <td class="area">0</td>
                                                                    </tr>
                                                                    <tr id="design-floor-5" class="tr-floor tr-floor-5">
                                                                        <th>Tầng 4 (Lầu 3)</th>
                                                                        <th colspan="3">&nbsp;</th>
                                                                    </tr>
                                                                    <tr id="design-coefficient-37"
                                                                        class="tr-design-coefficient tr-floor-5 design-coefficient cb-first-design-coefficient hidden"
                                                                        data-floor="5" data-design-coefficient="37">
                                                                        <td>
                                                                            <label for="cb-design-coefficient-37">
                                                                                <input id="cb-design-coefficient-37"
                                                                                    class="cb-design-coefficient is_required"
                                                                                    checked="checked"
                                                                                    name="cbDesignCoefficient[37]"
                                                                                    type="checkbox" value="37">
                                                                                Diện tích sàn
                                                                            </label>
                                                                        </td>
                                                                        <td class="txt-design-coefficient-37"><input
                                                                                id="txt-design-coefficient-37"
                                                                                class="form-control form-control-sm txt-design-coefficient"
                                                                                placeholder="Nhập số"
                                                                                onkeypress="return isNumber(event)"
                                                                                name="txbDesignCoefficient[37]"
                                                                                type="text" value=""></td>
                                                                        <td class="coefficient" data-value="100">100%</td>
                                                                        <td class="area">0</td>
                                                                    </tr>
                                                                    <tr id="design-coefficient-36"
                                                                        class="tr-design-coefficient tr-floor-5 design-coefficient without_item_2 hidden"
                                                                        data-floor="5" data-design-coefficient="36">
                                                                        <td>
                                                                            <label for="cb-design-coefficient-36">
                                                                                <input id="cb-design-coefficient-36"
                                                                                    class="cb-design-coefficient"
                                                                                    name="cbDesignCoefficient[36]"
                                                                                    type="checkbox" value="36">
                                                                                Ban công
                                                                            </label>
                                                                        </td>
                                                                        <td class="txt-design-coefficient-36"><input
                                                                                id="txt-design-coefficient-36"
                                                                                class="form-control form-control-sm txt-design-coefficient"
                                                                                placeholder="Nhập số"
                                                                                onkeypress="return isNumber(event)"
                                                                                name="txbDesignCoefficient[36]"
                                                                                type="text" value=""></td>
                                                                        <td class="coefficient" data-value="70">70%</td>
                                                                        <td class="area">0</td>
                                                                    </tr>
                                                                    <tr id="design-floor-4" class="tr-floor tr-floor-4">
                                                                        <th>Tầng 5 (Lầu 4)</th>
                                                                        <th colspan="3">&nbsp;</th>
                                                                    </tr>
                                                                    <tr id="design-coefficient-35"
                                                                        class="tr-design-coefficient tr-floor-4 design-coefficient cb-first-design-coefficient hidden"
                                                                        data-floor="4" data-design-coefficient="35">
                                                                        <td>
                                                                            <label for="cb-design-coefficient-35">
                                                                                <input id="cb-design-coefficient-35"
                                                                                    class="cb-design-coefficient is_required"
                                                                                    checked="checked"
                                                                                    name="cbDesignCoefficient[35]"
                                                                                    type="checkbox" value="35">
                                                                                Diện tích sàn
                                                                            </label>
                                                                        </td>
                                                                        <td class="txt-design-coefficient-35"><input
                                                                                id="txt-design-coefficient-35"
                                                                                class="form-control form-control-sm txt-design-coefficient"
                                                                                placeholder="Nhập số"
                                                                                onkeypress="return isNumber(event)"
                                                                                name="txbDesignCoefficient[35]"
                                                                                type="text" value=""></td>
                                                                        <td class="coefficient" data-value="100">100%</td>
                                                                        <td class="area">0</td>
                                                                    </tr>
                                                                    <tr id="design-coefficient-34"
                                                                        class="tr-design-coefficient tr-floor-4 design-coefficient without_item_2 hidden"
                                                                        data-floor="4" data-design-coefficient="34">
                                                                        <td>
                                                                            <label for="cb-design-coefficient-34">
                                                                                <input id="cb-design-coefficient-34"
                                                                                    class="cb-design-coefficient"
                                                                                    name="cbDesignCoefficient[34]"
                                                                                    type="checkbox" value="34">
                                                                                Ban công
                                                                            </label>
                                                                        </td>
                                                                        <td class="txt-design-coefficient-34"><input
                                                                                id="txt-design-coefficient-34"
                                                                                class="form-control form-control-sm txt-design-coefficient"
                                                                                placeholder="Nhập số"
                                                                                onkeypress="return isNumber(event)"
                                                                                name="txbDesignCoefficient[34]"
                                                                                type="text" value=""></td>
                                                                        <td class="coefficient" data-value="70">70%</td>
                                                                        <td class="area">0</td>
                                                                    </tr>
                                                                    <tr id="design-floor-3" class="tr-floor tr-floor-3">
                                                                        <th>Tầng 6 (Lầu 5)</th>
                                                                        <th colspan="3">&nbsp;</th>
                                                                    </tr>
                                                                    <tr id="design-coefficient-33"
                                                                        class="tr-design-coefficient tr-floor-3 design-coefficient cb-first-design-coefficient hidden"
                                                                        data-floor="3" data-design-coefficient="33">
                                                                        <td>
                                                                            <label for="cb-design-coefficient-33">
                                                                                <input id="cb-design-coefficient-33"
                                                                                    class="cb-design-coefficient is_required"
                                                                                    checked="checked"
                                                                                    name="cbDesignCoefficient[33]"
                                                                                    type="checkbox" value="33">
                                                                                Diện tích sàn
                                                                            </label>
                                                                        </td>
                                                                        <td class="txt-design-coefficient-33"><input
                                                                                id="txt-design-coefficient-33"
                                                                                class="form-control form-control-sm txt-design-coefficient"
                                                                                placeholder="Nhập số"
                                                                                onkeypress="return isNumber(event)"
                                                                                name="txbDesignCoefficient[33]"
                                                                                type="text" value=""></td>
                                                                        <td class="coefficient" data-value="100">100%</td>
                                                                        <td class="area">0</td>
                                                                    </tr>
                                                                    <tr id="design-coefficient-32"
                                                                        class="tr-design-coefficient tr-floor-3 design-coefficient without_item_2 hidden"
                                                                        data-floor="3" data-design-coefficient="32">
                                                                        <td>
                                                                            <label for="cb-design-coefficient-32">
                                                                                <input id="cb-design-coefficient-32"
                                                                                    class="cb-design-coefficient"
                                                                                    name="cbDesignCoefficient[32]"
                                                                                    type="checkbox" value="32">
                                                                                Tum
                                                                            </label>
                                                                        </td>
                                                                        <td class="txt-design-coefficient-32"><input
                                                                                id="txt-design-coefficient-32"
                                                                                class="form-control form-control-sm txt-design-coefficient"
                                                                                placeholder="Nhập số"
                                                                                onkeypress="return isNumber(event)"
                                                                                name="txbDesignCoefficient[32]"
                                                                                type="text" value=""></td>
                                                                        <td class="coefficient" data-value="70">70%</td>
                                                                        <td class="area">0</td>
                                                                    </tr>
                                                                    <tr id="design-floor-2" class="tr-floor tr-floor-2">
                                                                        <th>Tầng thượng</th>
                                                                        <th colspan="3">&nbsp;</th>
                                                                    </tr>
                                                                    <tr id="design-coefficient-31"
                                                                        class="tr-design-coefficient tr-floor-2 design-coefficient cb-first-design-coefficient hidden"
                                                                        data-floor="2" data-design-coefficient="31">
                                                                        <td>
                                                                            <label for="cb-design-coefficient-31">
                                                                                <input id="cb-design-coefficient-31"
                                                                                    class="cb-design-coefficient is_required"
                                                                                    checked="checked"
                                                                                    name="cbDesignCoefficient[31]"
                                                                                    type="checkbox" value="31">
                                                                                Diện tích sàn
                                                                            </label>
                                                                        </td>
                                                                        <td class="txt-design-coefficient-31"><input
                                                                                id="txt-design-coefficient-31"
                                                                                class="form-control form-control-sm txt-design-coefficient"
                                                                                placeholder="Nhập số"
                                                                                onkeypress="return isNumber(event)"
                                                                                name="txbDesignCoefficient[31]"
                                                                                type="text" value=""></td>
                                                                        <td class="coefficient" data-value="100">100%</td>
                                                                        <td class="area">0</td>
                                                                    </tr>
                                                                    <tr id="design-coefficient-30"
                                                                        class="tr-design-coefficient tr-floor-2 design-coefficient without_item_2 hidden"
                                                                        data-floor="2" data-design-coefficient="30">
                                                                        <td>
                                                                            <label for="cb-design-coefficient-30">
                                                                                <input id="cb-design-coefficient-30"
                                                                                    class="cb-design-coefficient"
                                                                                    name="cbDesignCoefficient[30]"
                                                                                    type="checkbox" value="30">
                                                                                Sân thượng
                                                                            </label>
                                                                        </td>
                                                                        <td class="txt-design-coefficient-30"><input
                                                                                id="txt-design-coefficient-30"
                                                                                class="form-control form-control-sm txt-design-coefficient"
                                                                                placeholder="Nhập số"
                                                                                onkeypress="return isNumber(event)"
                                                                                name="txbDesignCoefficient[30]"
                                                                                type="text" value=""></td>
                                                                        <td class="coefficient" data-value="70">70%</td>
                                                                        <td class="area">0</td>
                                                                    </tr>
                                                                    <tr id="design-floor-1" class="tr-floor tr-floor-1">
                                                                        <th>Mái</th>
                                                                        <th colspan="3">&nbsp;</th>
                                                                    </tr>
                                                                    <tr id="design-coefficient-29"
                                                                        class="tr-design-coefficient tr-floor-1 design-coefficient cb-first-design-coefficient without_item_2 hidden"
                                                                        data-floor="1" data-design-coefficient="29">
                                                                        <td>
                                                                            <label for="cb-design-coefficient-29">
                                                                                <input id="cb-design-coefficient-29"
                                                                                    class="cb-design-coefficient is_required"
                                                                                    checked="checked"
                                                                                    name="cbDesignCoefficient[29]"
                                                                                    type="checkbox" value="29">
                                                                                Diện tích sàn
                                                                            </label>
                                                                        </td>
                                                                        <td class="txt-design-coefficient-29"><input
                                                                                id="txt-design-coefficient-29"
                                                                                class="form-control form-control-sm txt-design-coefficient"
                                                                                placeholder="Nhập số"
                                                                                onkeypress="return isNumber(event)"
                                                                                name="txbDesignCoefficient[29]"
                                                                                type="text" value=""></td>
                                                                        <td class="coefficient" data-value="30">30%</td>
                                                                        <td class="area">0</td>
                                                                    </tr>
                                                                    <tr id="resultEstimateDesign">
                                                                        <td colspan="3">
                                                                            <input id="resultEstimateDesignHidden"
                                                                                name="resultEstimateDesign" type="hidden"
                                                                                value="0.0">
                                                                            TỔNG DIỆN TÍCH THIẾT KẾ TẠM TÍNH:
                                                                        </td>
                                                                        <td class="resultEstimate">0.0</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="4" id="designPrices"
                                                                            class="nopadding hidden">
                                                                            <table class="table table-responsive">
                                                                                <tr
                                                                                    class="head-quote-type head-design-quote-type">
                                                                                    <th colspan="4">Khái toán thiết kế
                                                                                    </th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="4"
                                                                                        class="nopadding td-quote-type td-design-quote-type">
                                                                                        <table
                                                                                            class="table table-responsive">
                                                                                            <tr
                                                                                                class="tr-quote-type tr-design-quote-type">
                                                                                                <th>Hạng mục</th>
                                                                                                <th>Diện tích
                                                                                                    (m<sup>2</sup>)</th>
                                                                                                <th>Đơn giá
                                                                                                    (vnđ/m<sup>2</sup>)</th>
                                                                                                <th>Thành tiền (vnđ)</th>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr> --}}
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab"
                                                        id="accordion-estimate-build" aria-multiselectable="true">
                                                        <div class="panel-title">
                                                            <legend>Thi công</legend>
                                                        </div>
                                                    </div>
                                                    <div id="collapse-estimate-build" class="panel-collapse collapse in"
                                                        role="tabpanel" aria-labelledby="accordion-estimate-build">
                                                        <div class="panel-body">
                                                            <table class="table table-responsive table-result-texture">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Hạng mục</th>
                                                                        <th>Diện tích (m<sup>2</sup>)</th>
                                                                        <th>HS tính toán</th>
                                                                        <th>HT tính toán (m<sup>2</sup>)</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($listFloor as $floor)
                                                                        <tr id="build-floor-{{ $floor->id }}"
                                                                            class="tr-floor tr-floor-{{ $floor->id }}">
                                                                            <th>{{ $floor->floor_name }}</th>
                                                                            <th colspan="3">&nbsp;</th>
                                                                        </tr>
                                                                        @foreach ($floor->attrFloors as $attr)
                                                                            <tr id="build-floor-child-{{ $attr->id }}"
                                                                                class="tr-build-floor-child tr-floor-{{ $floor->id }} {{ $floor->is_structure == 1 ? "tr-design-coefficient-structure tr-design-coefficient-structure-$attr->id" : '' }} build-floor-child cb-first-build-floor-child hidden"
                                                                                data-floor="{{ $floor->id }}"
                                                                                data-foor-child="{{ $attr->id }}">
                                                                                <td>
                                                                                    <label
                                                                                        for="cb-build-floor-child-{{ $attr->id }}">
                                                                                        <input
                                                                                            id="cb-build-floor-child-{{ $attr->id }}"
                                                                                            class="cb-build-floor-child {{ $floor->floor_checked == 1 ? 'is_required' : '' }}"
                                                                                            checked="checked"
                                                                                            name="cbbuildFloorChild[{{ $attr->id }}]"
                                                                                            type="checkbox"
                                                                                            value="{{ $attr->id }}">
                                                                                        {{ $attr->floor_attr_name }}
                                                                                    </label>
                                                                                </td>
                                                                                <td
                                                                                    class="txt-build-floor-child-{{ $attr->id }}">
                                                                                    <input
                                                                                        id="txt-build-floor-child-{{ $attr->id }}"
                                                                                        min="0"
                                                                                        class="form-control form-control-sm txt-build-floor-child"
                                                                                        placeholder="Nhập số"
                                                                                        name="txtBuildFloorChild[{{ $attr->id }}]"
                                                                                        type="number" value="">
                                                                                </td>
                                                                                <td class="coefficient td-build-coefficient-{{ $floor->id }}"
                                                                                    data-value="{{ $attr->value_expense }}">
                                                                                    {{ $attr->value_expense }}%</td>
                                                                                <td class="area"></td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @endforeach
                                                                    <tr id="resultEstimateBuild">
                                                                        <td colspan="3">
                                                                            <input id="resultEstimateBuildHidden"
                                                                                name="resultEstimateBuild" type="hidden"
                                                                                value="0.0">
                                                                            TỔNG DIỆN TÍCH THI CÔNG TẠM TÍNH:
                                                                        </td>
                                                                        <td class="resultEstimate">0.0</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="4" id="buildPrices"
                                                                            class="nopadding hidden">
                                                                            <table class="table table-responsive">
                                                                                <tr
                                                                                    class="tr-quote-type tr-build-quote-type">
                                                                                    <th colspan="4">Khái toán thiết kế
                                                                                    </th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="4"
                                                                                        class="nopadding tr-quote-type tr-build-quote-type">
                                                                                        <table
                                                                                            class="table table-responsive">
                                                                                            <tr
                                                                                                class="tr-quote-type tr-build-quote-type">
                                                                                                <th>Hạng mục</th>
                                                                                                <th>Diện tích
                                                                                                    (m<sup>2</sup>)</th>
                                                                                                <th>Đơn giá
                                                                                                    (vnđ/m<sup>2</sup>)</th>
                                                                                                <th>Thành tiền (vnđ)</th>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    </div>
    @include('client.components.slick.partner')
    @include('client.components.footer', ['contentSection' => 'content-section'])
    @include('client.components.host_fix')
@endsection

@section('after_scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('body').append('<div id="top" ></div>');
            $(window).scroll(function() {
                if ($(window).scrollTop() > 100) {
                    $('#top').fadeIn();
                } else {
                    $('#top').fadeOut();
                }
            });
            $('#top').click(function() {
                $('html, body').animate({
                    scrollTop: 0
                }, 500);
            });
        });
    </script>
    <script type="text/javascript">
        const SLUG_CONFIG_LAYOUT = '{{ $slugConfigLayout ?? '' }}';
        const ROUTER = '{{ route('client.accounting.calculate') }}';
    </script>
    <script>
        if ($(window).width() < 768) {
            $('table').css({
                'width': '100% !important'
            });
        }
    </script>
    <script>
        var resultEstimateDesign = {
            'item_0': 0
        };
        resultEstimateDesign.item_5 = 1;
        resultEstimateDesign.item_4 = 1;
        resultEstimateDesign.item_3 = 1;
        resultEstimateDesign.item_2 = 1;
        resultEstimateDesign.item_9 = 1;
        resultEstimateDesign.item_1 = 1;
        resultEstimateDesign.item_8 = 1;
        var resultEstimateBuild = {
            'item_0': 0
        };
        resultEstimateBuild.item_7 = 1;
        resultEstimateBuild.item_6 = 1;
        var countFloorIsNomal = 5;
    </script>
    <script src="{{ asset('client/js/category/index.js') }}"></script>
    <script src="{{ asset('client/js/accounting/index.js') }}"></script>
    <script src="{{ asset('client/js/advice/index.js') }}"></script>
    @include('client/components/script_home')
@endsection
