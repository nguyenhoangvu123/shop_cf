<?php

namespace App\Http\Controllers\Admin\Accounting;

use Illuminate\Http\Request;
use App\Models\Admin\StyleDesgin;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Accounting\Design\StoreRequest;
use App\Http\Requests\Admin\Accounting\Design\UpdateRequest;

class StyleDesignController extends Controller
{
    public function __construct(protected StyleDesgin $styleDesgin)
    {
    }



    public function index()
    {

        return view("admin.pages.accounting.design.index");
    }

    public function list(Request $request)
    {

        $listStyleDesgin = $this->styleDesgin->latest('id')->paginate(LIMIT_PAGE, ['*'], 'page', $request->page);
        $view =  view("admin.pages.accounting.design.list", ["listStyleDesgin" => $listStyleDesgin])->render();
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
            $insertStyleDesgin = $this->styleDesgin->create(
                [
                    'design_name' => $name
                ]
            );
            if (!$insertStyleDesgin) {
                return [
                    'error' => true,
                    'message' => 'Tạo phong cách thiết kế thất bại'
                ];
            }
            return [
                'error' => false,
                'message' => 'Tạo phong cách thiết kế thành công'
            ];
        } catch (\Exception $ex) {
        }
    }

    public function edit($id)
    {
        $design = $this->styleDesgin->find($id);
        if (!$design) {
            return abort(404);
        }

        $view =  view('admin.pages.accounting.design.edit', ['design' => $design])->render();
        return response()->json([
            'data' => $view
        ]);
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $design = $this->styleDesgin->find($id);
            if (!$design) {
                return [
                    'error' => true,
                    'message' => 'Cập nhật phong cách thiết kế thất bại'
                ];
            }

            $name = $request->name;
            $updateDesign = $design->update(
                [
                    'design_name' => $name,
                ]
            );
            if (!$updateDesign) {
                return [
                    'error' => true,
                    'message' => 'Cập nhật phong cách thiết kế thất bại'
                ];
            }
            return [
                'error' => false,
                'message' => 'Cập nhật phong cách thiết kế thành công'
            ];
        } catch (\Exception $e) {
        }
    }

    public function delete($id)
    {
        try {
            $styleDesgin = $this->styleDesgin->find($id);
            if (!$styleDesgin) {
                return [
                    'error' => true,
                    'message' => 'Xoá phong cách thiết kế thất bại'
                ];
            }
            $delete =  $styleDesgin->delete();
            if (!$delete) {
                return [
                    'error' => true,
                    'message' => 'Xoá phong cách thiết kế thất bại'
                ];
            }

            return [
                'error' => false,
                'message' => 'Xoá phong cách thiết kế thành công'
            ];
        } catch (\Exception $ex) {
            Log::info("delete floor failed: " . $ex->getMessage());
        }
    }
}
