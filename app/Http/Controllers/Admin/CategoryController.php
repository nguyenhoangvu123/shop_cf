<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function __construct(protected Category $category)
    {
    }

    public function index()
    {
        $listParentCategory = $this->category->where("parent_id", null)->get();
        $data = [
            'listParentCategory' => $listParentCategory
        ];
        return view('admin.pages.categories.index', $data);
    }

    public function list(Request $request)
    {
        $listCategory = $this->category->filter($request)->latest('id')->paginate(LIMIT_PAGE, ['*'], 'page', $request->page);
        $data = view('admin.pages.categories.list', ['listCategory' => $listCategory])->render();
        $result = [
            'data' => $data
        ];
        return response()->json($result);
    }

    public function store(StoreCategoryRequest $request)
    {
        try {
            $dataInsert = [
                'category_name' => $request->name,
                'parent_id' => $request->parent,
                'category_slug' => Str::slug($request->name),
                'status' => $request->status,
                'position_show' => $request->positionShow
            ];
            $insertCategory = $this->category->create($dataInsert);
            if (!$insertCategory) {
                return [
                    'error' => true,
                    'message' => 'Thêm danh mục thất bại'
                ];
            }
            return [
                'error' => false,
                'message' => 'Thêm danh mục thành công'
            ];
        } catch (\Exception $ex) {
            Log::info("store category failed: " . $ex->getMessage());
        }
    }

    public function edit($id)
    {
        $listParentCategory = $this->category
            ->where("parent_id", null)
            ->where("id", "<>", $id)
            ->get();
        $categoryItem = $this->category->find($id);
        if ($categoryItem) {
            $result =  [
                'error' => true,
                'message' => 'Danh mục không tồn tại'
            ];
        }
        $view = view('admin.pages.categories.edit', [
            'listParentCategory' => $listParentCategory,
            'categoryItem' => $categoryItem
        ])->render();
        $result = [
            'error' => false,
            'data' => $view
        ];
        return response()->json($result);
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        try {
            $dataUpdate = [
                'category_name' => $request->name,
                'parent_id' => $request->parent,
                'category_slug' => Str::slug($request->name),
                'status' => $request->status,
                'position_show' => $request->positionShow
            ];
            $categoryItem = $this->category->find($id);
            if (!$categoryItem) {
                return [
                    'error' => true,
                    'message' => 'Cập nhật danh mục thất bại'
                ];
            }
            $updateCategory = $categoryItem->update($dataUpdate);
            if (!$updateCategory) {
                return [
                    'error' => true,
                    'message' => 'Cập nhật danh mục thất bại'
                ];
            }
            return [
                'error' => false,
                'message' => 'Cập nhật danh mục thành công'
            ];
        } catch (\Exception $ex) {
            Log::info("update category failed: " . $ex->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $categoryItem = $this->category->find($id);
            if (!$categoryItem) {
                return [
                    'error' => true,
                    'message' => 'Xoá danh mục thất bại'
                ];
            }
            $deleteCategory = $categoryItem->delete();
            if (!$deleteCategory) {
                return [
                    'error' => true,
                    'message' => 'Xoá danh mục thất bại'
                ];
            }

            return [
                'error' => false,
                'message' => 'Xoá danh mục thành công'
            ];
        } catch (\Exception $ex) {
            Log::info("delete category failed: " . $ex->getMessage());
        }
    }
}
