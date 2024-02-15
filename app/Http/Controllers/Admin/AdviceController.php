<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Advice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\StoreAdviceRequest;
use App\Http\Requests\Client\UpdateAdviceRequest;

class AdviceController extends Controller
{

    public function __construct(protected Advice $advice)
    {
    }

    public function index()
    {
        return view("admin.pages.advices.index");
    }

    public function list(Request $request)
    {
        $listAdvice = $this->advice->filter($request)->latest('id')->paginate(LIMIT_PAGE, ['*'], 'page', $request->page);
        $data = view('admin.pages.advices.list', ['listAdvice' => $listAdvice])->render();
        $result = [
            'data' => $data
        ];
        return response()->json($result);
    }

    public function edit($id)
    {
        $adviceItem = $this->advice->find($id);
        if ($adviceItem) {
            $result =  [
                'error' => true,
                'message' => 'Đăng ký tư vấn không tồn tại'
            ];
        }
        $view = view('admin.pages.advices.edit', [
            'adviceItem' => $adviceItem
        ])->render();
        $result = [
            'error' => false,
            'data' => $view
        ];
        return response()->json($result);
    }

    public function update(UpdateAdviceRequest $request, $id)
    {
        try {
            $adviceItem = $this->advice->find($id);
            if (!$adviceItem) {
                return  [
                    'error' => true,
                    'message' => 'Đăng ký tư vấn không tồn tại'
                ];
            }
            $dataUpdate = [
                'advice_name' => $request->name,
                'advice_title' => $request->title,
                'advice_email' => $request->email,
                'advice_phone' => $request->phone,
                'advice_descr' => $request->descr,
                'advice_status' => $request->status,
            ];

            $updateAdvice = $adviceItem->update($dataUpdate);
            if (!$updateAdvice) {
                return [
                    'error' => true,
                    'message' => 'Cập nhật đăng ký tư vấn thất bại'
                ];
            }

            return [
                'error' => false,
                'message' => 'Cập nhật đăng ký tư vấn thành công'
            ];
        } catch (\Exception $e) {
            Log::info("update advice failed: " . $e->getMessage());
            return [
                'error' => true,
                'message' => 'Cập nhật đăng ký tư vấn thất bại'
            ];
        }
    }

    public function delete($id)
    {
        try {
            $adviceItem = $this->advice->find($id);
            if (!$adviceItem) {
                return [
                    'error' => true,
                    'message' => 'Xoá đăng ký tư vấn thất bại'
                ];
            }
            $deleteAdvice = $adviceItem->delete();
            if (!$deleteAdvice) {
                return [
                    'error' => true,
                    'message' => 'Xoá đăng ký tư vấn thất bại'
                ];
            }

            return [
                'error' => false,
                'message' => 'Xoá đăng ký tư vấn thành công'
            ];
        } catch (\Exception $ex) {
            Log::info("delete advice failed: " . $ex->getMessage());
        }
    }
}
