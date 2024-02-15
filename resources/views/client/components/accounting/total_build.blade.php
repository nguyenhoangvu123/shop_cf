    <tr class="tr-quote-type tr-design-quote-type">
        <th>Hạng mục</th>
        <th>Diện tích (m<sup>2</sup>)</th>
        <th>Đơn giá (vnđ/m<sup>2</sup>)</th>
        <th>Thành tiền (vnđ)</th>
    </tr>
    @php
        $totalResultEstimateBuild = 0;
    @endphp
    @foreach ($designQuoteBuildNew as $key => $item)
        @if ($item['checked'] == 0)
            @php
                $totalResultEstimateBuild += $item['price'];
            @endphp
        @endif
        <tr class="tr-quote-type tr-build-quote-type tr-build-quote-type-{{ $key }}">
            <th>
                <label for="cb-build-quote-{{ $item['id'] }}">
                    <input id="cb-build-quote-{{ $item['id'] }}" class="cb-build-quote"
                        @if ($item['checked'] != 1) checked="checked" @endif name="cbBuildQuote[1]" type="checkbox"
                        value="{{ $item['id'] }}">
                    {{ $item['type'] == 1 ? 'Thi công phần thô' : 'Dự trù chi phí thi công phần vật tư hoàn thiện cơ bản' }}
                </label>
            </th>
            <td><input id="txt-build-quote-{{ $item['id'] }}"
                    data-type="{{ $item['type'] }}"
                    class="form-control form-control-sm txt-build-quote estimate-build-{{ $item['id'] }}"
                    placeholder="
                name="txtBuildQuote[1]" type="text" placeholder="Nhập số"
                    onkeypress="return isNumber(event)" value="{{ $item['resultEstimateBuild'] }}"></td>
            <td><input id="txt-build-price-{{ $item['id'] }}" name="txtBuildPrice[1]" type="hidden"
                    value="{{ $item['value'] }}">{{ number_format($item['value'], 0, '.', ',') }}</td>
            <td><input id="txt-build-subtotal-{{ $item['id'] }}" name="txtBuildSubtotal[1]" type="hidden"
                    value="{{ $item['price'] }}">{{ number_format($item['price'], 0, '.', ',') }}</td>
        </tr>
    @endforeach

    <tr class="tr-quote-type tr-build-quote-type">
        <td colspan="3">
            <input type="hidden" id="resultEstimateBuildPrice" name="resultEstimateBuildPrice"
                value="{{ $totalResultEstimateBuild }}">
            <span class="textresultEstimate">TỔNG CHI PHÍ THI CÔNG THAM KHẢO:</span> 
        </td>
        <td class="resultEstimateBuild">{{ number_format($totalResultEstimateBuild, 0, '.', ',') }} vnđ</td>
    </tr>
