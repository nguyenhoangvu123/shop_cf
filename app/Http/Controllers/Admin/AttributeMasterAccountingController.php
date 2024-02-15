<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\AttrMaster;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Accounting\Attr\Contruction\StoreRequest;
use App\Http\Requests\Admin\Accounting\Attr\Contruction\UpdateRequest;

class AttributeMasterAccountingController extends Controller
{
    public function __construct(protected AttrMaster $attrMaster)
    {
    }

    public function indexContruction()
    {
        return view('admin.pages.accounting.attr.contruction.index');
    }

    public function createContruction()
    {
        return view('admin.pages.accounting.attr.contruction.create');
    }

    public function listContruction(Request $request)
    {
        $listContruction = $this->attrMaster->where("type", $this->attrMaster::TYPE_ATTRIBUTE_CONTRUCTION)->latest('id')->paginate(LIMIT_PAGE, ['*'], 'page', $request->page);
        $view = view('admin.pages.accounting.attr.contruction.list', ['listContruction' => $listContruction])->render();
        return response()->json([
            'data' => $view
        ]);
    }

    public function storeContruction(StoreRequest $request)
    {
        try {
            $name = $request->name;
            $value = $request->value;
            $dataInsert = [
                'attr_master_name' => $name,
                'attr_master_value' => $value,
                'type' => $this->attrMaster::TYPE_ATTRIBUTE_CONTRUCTION
            ];
            $insertContruction = $this->attrMaster->insert($dataInsert);
            if (!$insertContruction) {
                return [
                    'error' => true,
                    'message' => 'Thêm gói thi công thô và nhân công thất bại'
                ];
            }
            return [
                'error' => false,
                'message' => 'Thêm gói thi công thô và nhân công thành công'
            ];
        } catch (\Exception $e) {
        }
    }

    public function editContruction($id)
    {
        $contruction =  $this->attrMaster->where("type", $this->attrMaster::TYPE_ATTRIBUTE_CONTRUCTION)->find($id);
        if (!$contruction) {
            return abort(404);
        }
        return view('admin.pages.accounting.attr.contruction.edit', [
            'contruction' => $contruction
        ]);
    }

    public function updateContruction(UpdateRequest $request, $id)
    {
        try {
            $contruction =  $this->attrMaster->where("type", $this->attrMaster::TYPE_ATTRIBUTE_CONTRUCTION)->find($id);
            if (!$contruction) {
                return [
                    'error' => true,
                    'message' => 'Cập nhật gói thi công thô và nhân công thất bại'
                ];
            }
            $name = $request->name;
            $value = $request->value;
            $dataInsert = [
                'attr_master_name' => $name,
                'attr_master_value' => $value,
                'type' => $this->attrMaster::TYPE_ATTRIBUTE_CONTRUCTION
            ];
            $updateContruction = $contruction->update($dataInsert);
            if (!$updateContruction) {
                return [
                    'error' => true,
                    'message' => 'Cập nhật gói thi công thô và nhân công thất bại'
                ];
            }
            return [
                'error' => false,
                'message' => 'Cập nhật gói thi công thô và nhân công thành công'
            ];
        } catch (\Exception $e) {
        }
    }

    public function deleteContruction($id)
    {
        $contruction =  $this->attrMaster->where("type", $this->attrMaster::TYPE_ATTRIBUTE_CONTRUCTION)->find($id);
        if (!$contruction) {
            return [
                'error' => true,
                'message' => 'Xoá gói thi công thô và nhân công thất bại'
            ];
        }
        $contruction->delete();
        return [
            'error' => false,
            'message' => 'Xoá gói thi công thô và nhân công thành công'
        ];
    }


    public function indexSupplies()
    {
        return view('admin.pages.accounting.attr.supplies.index');
    }

    public function listSupplies(Request $request)
    {
        $listContruction = $this->attrMaster->where("type", $this->attrMaster::TYPE_ATTRIBUTE_SUPPLIES)->latest('id')->paginate(LIMIT_PAGE, ['*'], 'page', $request->page);
        $view = view('admin.pages.accounting.attr.supplies.list', ['listContruction' => $listContruction])->render();
        return response()->json([
            'data' => $view
        ]);
    }

    public function createSupplies()
    {
        return view('admin.pages.accounting.attr.supplies.create');
    }


    public function storeSupplies(StoreRequest $request)
    {
        try {
            $name = $request->name;
            $value = $request->value;
            $dataInsert = [
                'attr_master_name' => $name,
                'attr_master_value' => $value,
                'type' => $this->attrMaster::TYPE_ATTRIBUTE_SUPPLIES
            ];
            $insertContruction = $this->attrMaster->insert($dataInsert);
            if (!$insertContruction) {
                return [
                    'error' => true,
                    'message' => 'Thêm gói vật tư hoàn thiện thất bại'
                ];
            }
            return [
                'error' => false,
                'message' => 'Thêm gói thi vật tư hoàn thiện thành công'
            ];
        } catch (\Exception $e) {
        }
    }

    public function editSupplies($id)
    {
        $contruction =  $this->attrMaster->where("type", $this->attrMaster::TYPE_ATTRIBUTE_SUPPLIES)->find($id);
        if (!$contruction) {
            return abort(404);
        }
        return view('admin.pages.accounting.attr.supplies.edit', [
            'contruction' => $contruction
        ]);
    }

    public function updateSupplies(UpdateRequest $request, $id)
    {
        try {
            $contruction =  $this->attrMaster->where("type", $this->attrMaster::TYPE_ATTRIBUTE_SUPPLIES)->find($id);
            if (!$contruction) {
                return [
                    'error' => true,
                    'message' => 'Cập nhật gói vật tư hoàn thiện thất bại'
                ];
            }
            $name = $request->name;
            $value = $request->value;
            $dataInsert = [
                'attr_master_name' => $name,
                'attr_master_value' => $value,
                'type' => $this->attrMaster::TYPE_ATTRIBUTE_SUPPLIES
            ];
            $updateContruction = $contruction->update($dataInsert);
            if (!$updateContruction) {
                return [
                    'error' => true,
                    'message' => 'Cập nhật gói vật tư hoàn thiện thất bại'
                ];
            }
            return [
                'error' => false,
                'message' => 'Cập nhật gói vật tư hoàn thiện thành công'
            ];
        } catch (\Exception $e) {
        }
    }

    public function deleteSupplies($id)
    {
        $contruction =  $this->attrMaster->where("type", $this->attrMaster::TYPE_ATTRIBUTE_SUPPLIES)->find($id);
        if (!$contruction) {
            return [
                'error' => true,
                'message' => 'Xoá gói vật tư hoàn thiện công thất bại'
            ];
        }
        $contruction->delete();
        return [
            'error' => false,
            'message' => 'Xoá gói vật tư hoàn thiện công thành công'
        ];
    }
}
