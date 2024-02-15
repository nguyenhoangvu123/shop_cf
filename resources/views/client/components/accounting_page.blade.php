<form action="{{ route('client.accounting') }}" class="form-accounting_page" method="GET" name="frm-dutoan>
    <div class="content_dutoan">
    <div class="item-dutoan mg_b">
        <label>Chọn loại nhà:</label>
        <select name="sltloaihinh" class="stip sltloaihinh">
            @foreach ($dataAccounting['listTypeContructionGlobal'] as $contruction)
                <option value="{{ $contruction->id }}">
                    {{ $contruction->contruction_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="item-dutoan mg_b">
        <label>Chọn phong cách thiết kế:</label>
        <select name="slthinhthuc" class="stip slthinhthuc">
            @foreach ($dataAccounting['listStyleDesginGlobal'] as $item)
                <option value="{{ $item->id }}">
                    {{ $item->design_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="clear"></div>

    <div class="item-dutoan mg_b">
        <label>Chiều rộng m (ví dụ2.5):</label>
        <input type="number" name="txtrong" class="stip" step="0.1" required="required">
    </div>


    <div class="item-dutoan mg_b">
        <label>Chiều dài m (ví dụ2.5):</label>
        <input type="number" name="txtcao" class="stip" step="0.1" required="required">
    </div>
    <div class="clear"></div>
    <div class="mg-10 mg_b">
        <div class="item-dutoan dutoan-left">
            <p class="pd-10">
                <input type="submit" name="btnsb" value="Tính kết quả" class="btnsb">
            </p>
            <p class="pd-10">
                <input type="reset" name="btnreset" value="Làm lại" class="btnsb">
            </p>
        </div>
        <div class="clear"></div>
    </div>
    </div>
</form>
