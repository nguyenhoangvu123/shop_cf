<?php

namespace App\Http\Controllers\Admin\Accounting;

use App\Models\Admin\Floor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Accounting\Floor\StoreRequest;
use App\Http\Requests\Admin\Accounting\Floor\UpdateRequest;

class FloorController extends Controller
{

    public function __construct(protected Floor $floor)
    {
    }



    public function index()
    {

        return view("admin.pages.accounting.floor.index");
    }

    public function list(Request $request)
    {

        $listFloor = $this->floor->filter($request)->latest('id')->paginate(LIMIT_PAGE, ['*'], 'page', $request->page);
        $view =  view("admin.pages.accounting.floor.list", ["listFloor" => $listFloor])->render();
        return response()->json(
            [
                'data' => $view
            ]
        );
    }

    public function create()
    {
        return view("admin.pages.accounting.floor.create");
    }


    public function store(StoreRequest $request)
    {
        try {
            $name = $request->name;
            $type = $request->type;
            $listAttrFloor = $request->listAttrFloor;
            $position = $this->floor->getPositionLasted();
            $insertFloor = $this->floor->create(
                [
                    'floor_name' => $name,
                    'floor_attr_type' => $type,
                    'floor_position' => $position
                ]
            );
            if (!$insertFloor) {
                return [
                    'error' => true,
                    'message' => 'Tạo tầng thất bại'
                ];
            }
            $insertFloor->attrFloors()->createMany($listAttrFloor);
            return [
                'error' => false,
                'message' => 'Tạo tầng thành công'
            ];
        } catch (\Exception $ex) {
        }
    }

    public function edit($id)
    {
        $floor = $this->floor->with('attrFloors')->find($id);
        if (!$floor) {
            return abort(404);
        }

        return view('admin.pages.accounting.floor.edit', ['floor' => $floor]);
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $floor = $this->floor->find($id);
            if (!$floor) {
                return [
                    'error' => true,
                    'message' => 'Cập nhật tầng thất bại'
                ];
            }

            $name = $request->name;
            $type = $request->type;
            $listAttrFloor = $request->listAttrFloor;
            $updateFloor = $floor->update(
                [
                    'floor_name' => $name,
                    'floor_attr_type' => $type
                ]
            );
            if (!$updateFloor) {
                return [
                    'error' => true,
                    'message' => 'Cập nhật tầng thất bại'
                ];
            }
            $floor->attrFloors()->delete();
            $floor->attrFloors()->createMany($listAttrFloor);
            return [
                'error' => false,
                'message' => 'Cập nhật tầng thành công'
            ];
        } catch (\Exception $e) {
        }
    }

    public function delete($id)
    {
        try {
            $floor = $this->floor->find($id);
            if (!$floor) {
                return [
                    'error' => true,
                    'message' => 'Xoá tầng thất bại'
                ];
            }
            $floor->attrFloors()->delete();
            $deleteFloor = $floor->delete();
            if (!$deleteFloor) {
                return [
                    'error' => true,
                    'message' => 'Xoá tầng thất bại'
                ];
            }

            return [
                'error' => false,
                'message' => 'Xoá tầng thành công'
            ];
        } catch (\Exception $ex) {
            Log::info("delete floor failed: " . $ex->getMessage());
        }
    }
}
