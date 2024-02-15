<tr class="tr-quote-type tr-design-quote-type">
    <th>Hạng mục</th>
    <th>Diện tích (m<sup>2</sup>)</th>
    <th>Đơn giá (vnđ/m<sup>2</sup>)</th>
    <th>Thành tiền (vnđ)</th>
</tr>
@php
    $totalResultEstimateDesign = 0;
@endphp
@if (count($categories) <= 0)
    @foreach ($dataContruction->categories as $key => $value)
        @php
            if ($value->id_floor_attrs) {
                $resultEstimateDesign = 0;
                $listIdFloorAttrs = [];
                foreach ($value->id_floor_attrs as $item) {
                    $listIdFloorAttrs[] = $listIdAttrFloors[$item];
                }
                $valueDesignFloorAttrs = \App\Models\Admin\AttrFloor::select(DB::raw('SUM(value_desgin) as totalValueDesgin'))
                    ->whereIn('id', $listIdFloorAttrs)
                    ->first();
                $resultEstimateDesign = ($valueDesignFloorAttrs->totalValueDesgin / 100) * $areaConstructionSize;
            }
            $totalItemDesign = $resultEstimateDesign * $value->price;
            if ($value->is_default != 1) {
                $totalResultEstimateDesign += $totalItemDesign;
            }
        @endphp
        <tr class="tr-quote-type tr-design-quote-type tr-design-quote-type-{{ $key }}">
            <th>
                <label for="cb-design-quote-{{ $key }}">
                    <input id="cb-design-quote-{{ $key }}" class="cb-design-quote"
                        @if ($value->is_default != 1) checked="checked" @endif
                        name="cbDesignQuote[{{ $value->id }}]" type="checkbox" value="{{ $value->id }}">
                    {{ $value->name }}
                </label>
            </th>
            <td><input id="txt-design-quote-{{ $key }}"
                    class="form-control form-control-sm txt-design-quote estimate-{{ $key }}"
                    name="txtDesignQuote[1]" type="text" placeholder="Nhập số" onkeypress="return isNumber(event)"
                    value="{{ $resultEstimateDesign }}"></td>
            <td><input id="txt-design-price-{{ $key }}" name="txtDesignPrice[1]" type="hidden"
                    value="{{ $value->price }}">{{ number_format($value->price, 0, '.', ',') }}</td>
            <td><input id="txt-design-subtotal-{{ $key }}" name="txtDesignSubtotal[1]" type="hidden"
                    value="{{ $totalItemDesign }}">{{ number_format($totalItemDesign, 0, '.', ',') }}</td>
        </tr>
    @endforeach
@else
    @foreach ($categories as $key => $value)
        @php
            $totalItemDesign = $value['totalItem'];
            if ($value['checked'] == 0) {
                $totalResultEstimateDesign += $totalItemDesign;
            }
        @endphp
        <tr class="tr-quote-type tr-design-quote-type tr-design-quote-type-{{ $key }}">
            <th>
                <label for="cb-design-quote-{{ $key }}">
                    <input id="cb-design-quote-{{ $key }}" class="cb-design-quote"
                        @if ($value['checked'] != 1) checked="checked" @endif
                        name="cbDesignQuote[{{ $value['id'] }}]" type="checkbox" value="{{ $value['id'] }}">
                    {{ $value['name'] }}
                </label>
            </th>
            <td><input id="txt-design-quote-{{ $key }}"
                    class="form-control form-control-sm txt-design-quote estimate-{{ $key }}"
                    name="txtDesignQuote[1]" type="text" placeholder="Nhập số" onkeypress="return isNumber(event)"
                    value="{{ $value['value'] }}"></td>
            <td><input id="txt-design-price-{{ $key }}" name="txtDesignPrice[1]" type="hidden"
                    value="{{ $totalItemDesign }}">{{ number_format($value['price'], 0, '.', ',') }}</td>
            <td><input id="txt-design-subtotal-{{ $key }}" name="txtDesignSubtotal[1]" type="hidden"
                    value="{{ $totalItemDesign }}">{{ number_format($totalItemDesign, 0, '.', ',') }}</td>
        </tr>
    @endforeach
@endif
<tr class="tr-quote-type tr-design-quote-type">
    <td colspan="3">
        <input type="hidden" id="resultEstimateDesignPrice" name="resultEstimateDesignPrice"
            value="{{ $totalResultEstimateDesign }}">
        <span class="textresultEstimate">TỔNG CHI PHÍ THIẾT KẾ THAM KHẢO:</span>
    </td>
    <td class="resultEstimateDesign">{{ number_format($totalResultEstimateDesign, 0, '.', ',') }} vnđ
    </td>
</tr>
