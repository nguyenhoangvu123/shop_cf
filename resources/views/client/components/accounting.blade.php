<div class="section" id="section-dutoan">
    <div class="inner">
        <div class="wrap-content">
            <div class="title_main text-center">
                <span class="blue"><b>Dự toán chi phí</b></span>
                <span>xây dựng</span>
            </div>
            <form action="{{ route('client.accounting') }}" method="GET" name="frm-dutoan">
                <div class="content_dutoan">
                    <div class="mg-10 mg_b">
                        <div class="col-md-6 col-sm-6 col-xs-12 pd-10">
                            <div class="item-dutoan">
                                <label>Chọn loại công trình:</label>
                                <select name="sltloaihinh" class="stip sltloaihinh">
                                    @foreach ($dataAccounting['listTypeContructionGlobal'] as $contruction)
                                        <option value="{{ $contruction->id }}">
                                            {{ $contruction->contruction_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 pd-10">
                            <div class="item-dutoan">
                                <label>Chọn phong cách thiết kế:</label>
                                <select name="slthinhthuc" class="stip slthinhthuc">
                                    @foreach ($dataAccounting['listStyleDesginGlobal'] as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->design_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="clear"></div>

                    </div>
                    <div class="mg-10 mg_b">
                        <div class="col-md-6 col-sm-6 col-xs-12 pd-10">
                            <div class="item-dutoan">
                                <label>Chiều rộng m (ví dụ2.5):</label>
                                <input type="number" name="txtrong" class="stip" step="0.1" required="required">
                            </div>
                        </div>


                        <div class="col-md-6 col-sm-6 col-xs-12 pd-10">
                            <div class="item-dutoan">
                                <label>Chiều dài m (ví dụ2.5):</label>
                                <input type="number" name="txtcao" class="stip" step="0.1" required="required">
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="mg-10">
                        <div class="item-dutoan">
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
        </div>
    </div>
</div>
