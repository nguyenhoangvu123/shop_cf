<?php

namespace App\Http\Controllers\Admin\Accounting;

use App\Models\Admin\Floor;
use Illuminate\Http\Request;
use App\Models\Admin\AttrFloor;
use App\Models\Admin\StyleDesgin;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Admin\TypeContruction;
use App\Http\Requests\Admin\Accounting\Contruction\StoreRequest;
use App\Http\Requests\Admin\Accounting\Contruction\UpdateRequest;

class TypeContructionController extends Controller
{
    public function __construct(
        protected TypeContruction $typeContruction,
        protected StyleDesgin $styleDesgin,
        protected Floor $floor
    ) {
    }

    public function index()
    {
        return view('admin.pages.accounting.contruction.index');
    }

    public function create()
    {
        $listStyleDesign = $this->styleDesgin->get();
        $floor = $this->floor->where("floor_checked", $this->floor::TYPE_FLOOR_DEFAULT)->get();
        return view('admin.pages.accounting.contruction.create', [
            'listStyleDesign' => $listStyleDesign,
            'floor' => $floor
        ]);
    }

    public function listStyleDesign(Request $request)
    {
        $listIdDesign = $request->listIdDesign ?? [];
        $listStyleDesign = $this->styleDesgin->whereNotIn('id', $listIdDesign)->get();
        $view = view('admin.pages.accounting.contruction.list_design', ['listStyleDesign' => $listStyleDesign])->render();
        return response()->json(
            ['data' => $view, 'count' => $listStyleDesign->count()]
        );
    }

    public function list(Request $request)
    {
        $listContruction = $this->typeContruction->latest('id')->paginate(LIMIT_PAGE, ['*'], 'page', $request->page);
        $view =  view("admin.pages.accounting.contruction.list", ["listContruction" => $listContruction])->render();
        return response()->json(
            [
                'data' => $view
            ]
        );
    }

    public function store(StoreRequest $request)
    {
        try {
            $name = $request->name;
            $listCategory = $request->listAttrCategory;
            $contruction = $this->typeContruction->create([
                'contruction_name' => $name
            ]);
            if (!$contruction) {
                return [
                    'error' => true,
                    'message' => 'Tạo loại công trình thất bại'
                ];
            }
            $contruction->categories()->createMany($listCategory);
            return [
                'error' => false,
                'message' => 'Tạo loại công trình thành công'
            ];
        } catch (\Exception $ex) {
        }
    }

    public function edit($id)
    {
        $floor = $this->floor->where("floor_checked", $this->floor::TYPE_FLOOR_DEFAULT)->get();
        $listStyleDesign = $this->styleDesgin->get();
        $contruction = $this->typeContruction->with('categories')->find($id);
        if (!$contruction) {
            return abort(404);
        }
        return view('admin.pages.accounting.contruction.edit', [
            'contruction' => $contruction,
            'floor' => $floor,
            'listStyleDesign' => $listStyleDesign
        ]);
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $contruction = $this->typeContruction->find($id);
            if (!$contruction) {
                return [
                    'error' => true,
                    'message' => 'Cập nhật loại công trình thất bại'
                ];
            }
            $name = $request->name;
            $listCategory = $request->listAttrCategory;
            $updateContruction = $contruction->update([
                'contruction_name' => $name
            ]);
            if (!$updateContruction) {
                return [
                    'error' => true,
                    'message' => 'Cập nhật loại công trình thất bại'
                ];
            }
            $contruction->categories()->delete();
            $contruction->categories()->createMany($listCategory);
            return [
                'error' => false,
                'message' => 'Cập nhật loại công trình thành công'
            ];
        } catch (\Exception $e) {
            Log::info("message" . $e->getMessage());
        }
    }

    public function delete($id)
    {
        $contruction = $this->typeContruction->find($id);
        if (!$contruction) {
            return [
                'error' => true,
                'message' => 'Xoá loại công trình thất bại'
            ];
        }
        $contruction->categories()->delete();
        $contruction->delete();
        return [
            'error' => false,
            'message' => 'Xoá loại công trình thành công'
        ];
    }
}
