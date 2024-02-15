<div class="item_attr d-flex">
    <div class="col-4">
        <input type="text" name="title_category" class="form-control " placeholder="Nhập tên" />
    </div>
    <div class="col-2">
        <select name="type" class="select2 listCategory">
            @foreach ($listStyleDesign as $item)
                <option value="{{ $item->id }}">{{ $item->design_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-2">
        <input type="text" name="value_category" class="form-control  col-4" placeholder="Nhập giá trị (vnd)" />
    </div>
    <div class="col-2 remove_item_category">
        <span onclick="contruction.removeItemCategory(this)">X</span>
    </div>
</div>
