<?php

namespace App\Http\Controllers\Client;

use App\Models\Admin\Floor;
use Illuminate\Http\Request;
use App\Models\Admin\AttrFloor;
use App\Models\Admin\AttrMaster;
use App\Models\Admin\StyleDesgin;
use App\Models\Admin\ConfigLayout;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin\TypeContruction;

class AccountingController extends Controller
{

    public function __construct(
        protected ConfigLayout $configLayout,
        protected AttrMaster $attrMaster,
        protected Floor $floor,
        protected AttrFloor $attrFloor,
        protected StyleDesgin $styleDesgin,
        protected TypeContruction $typeContruction

    ) {
    }

    public function index(Request $request)
    {
        
        $searchTypeContruction = $request->sltloaihinh ?? "";
        $searchStyleDesgin = $request->slthinhthuc ?? "";
        $searchAreaConstructionSize = $request->txtrong
            && $request->txtcao
            ? (int)$request->txtrong * (int)$request->txtcao
            : "";
        $searchEstimateDesign =  "";
        $searchFloor = $request->sltsotang ?? "";
        $listFloor = $this->floor->get();
        $listFloorSort = $this->floor->orderBy('id', 'desc')->get();
        $listAttrContruction = $this->attrMaster->where("type", $this->attrMaster::TYPE_ATTRIBUTE_CONTRUCTION)->get();
        $listAttrSupplies = $this->attrMaster->where("type", $this->attrMaster::TYPE_ATTRIBUTE_SUPPLIES)->get();
        $listStyleDesgin = $this->styleDesgin->get();
        $listTypeContruction = $this->typeContruction->get();
        return view("client.pages.accounting", [
            'listFloor' => $listFloor,
            'listAttrContruction' => $listAttrContruction,
            'listAttrSupplies' => $listAttrSupplies,
            'listStyleDesgin' => $listStyleDesgin,
            'listTypeContruction' => $listTypeContruction,
            'listFloorSort' => $listFloorSort,
            'searchTypeContruction' => $searchTypeContruction,
            'searchStyleDesgin' => $searchStyleDesgin,
            'searchAreaConstructionSize' => $searchAreaConstructionSize,
            'searchEstimateDesign' => $searchEstimateDesign,
            'searchFloor' => $searchFloor
        ]);
    }

    public function calculate(Request $request)
    {
        // diện tích xây dựng 
        $areaConstructionSize = $request->areaConstructionSize;
        // tổng diện tích thiết kế 
        $resultEstimateDesign = $request->resultEstimateDesign;
        // loại công trình
        $constructionVal = $request->constructionVal;
        // phong cách thiêt kế 
        $packageVal = $request->packageVal;
        // tổng diện tích xây dựng
        $resultEstimateBuild = $request->resultEstimateBuild;
        
        // vật tự hoàn thiện
        $typeSuppliesVal = $request->typeSuppliesVal;
        // thi công và công nhân 
        $typeContructionVal = $request->typeContructionVal;

        // danh chi phi thiết kế đã chọn
        $designQuotePrices = $request->designQuotePrices;
        // danh chi phí xây dựng đã chọn
        $buildQuotePrices = $request->buildQuotePrices;

        // thay đổi input diện tích

        $isChangeInput = $request->isChangeInput;

        // danh sách kết cấu 
        $countListIdAttrFloors = count($request->listIdAttrFloors);
        // diện tích chi phí dự trù 
        $estimatedArea = 0;
        $listIdAttrFloors = [];
        
        $firstItemAttrFloors = $request->listIdAttrFloors[0]['idAttrFloor'] ?? "";
        $lastItemAttrFloors = $request->listIdAttrFloors[$countListIdAttrFloors - 1]['idAttrFloor'] ?? "";
        $listAttrFloors = $this->attrFloor->whereIn("id", [$firstItemAttrFloors, $lastItemAttrFloors])->get();
        foreach ($listAttrFloors as $item ) {
                $totalItem =  ($item->value_expense * $areaConstructionSize) / 100;
                $estimatedArea +=$totalItem;
        }

        $resultEstimateBuildNew = $resultEstimateBuild - $estimatedArea;
       
        foreach ($request->listIdAttrFloors as $item) {
            $listIdAttrFloors[$item['idFloor']] = $item['idAttrFloor'];
        };
        $dataContruction = $this->typeContruction->with([
            'categories' => function ($q) use ($packageVal) {
                $q->where("id_desgin", $packageVal);
            }
        ])->find($constructionVal);
        $itemTypeSupplies = $this->attrMaster->find($typeSuppliesVal);
        $itemTypeContructionVal = $this->attrMaster->find($typeContructionVal);
        if ($buildQuotePrices) {
            $designQuoteBuildNew = [];
            foreach ($buildQuotePrices as $item) {
                $itemAttrr = $item[3] == $this->attrMaster::TYPE_ATTRIBUTE_CONTRUCTION ? $itemTypeContructionVal : $itemTypeSupplies;
                $value = $itemAttrr->attr_master_value;
                $designQuoteBuildNew[] = [
                    'id' => $itemAttrr->id,
                    'value' =>  $value,
                    'price' => $item[1] * $value,
                    'checked' => $item[2],
                    'type' => $itemAttrr->type,
                    'resultEstimateBuild' => $item[1]
                ];
            }
        } else {
            $designQuoteBuildNew = [
                [
                    'id' => $itemTypeContructionVal->id,
                    'value' => $itemTypeContructionVal->attr_master_value,
                    'price' => $itemTypeContructionVal->attr_master_value * $resultEstimateBuild,
                    'resultEstimateBuild' => $resultEstimateBuild,
                    'checked' => 0,
                    'type' => $itemTypeContructionVal->type,
                    
                ],
                [
                    'id' => $itemTypeSupplies->id,
                    'value' => $itemTypeSupplies->attr_master_value,
                    'price' => $itemTypeSupplies->attr_master_value * $resultEstimateBuildNew,
                    'checked' => 0,
                    'type' => $itemTypeSupplies->type,
                    'resultEstimateBuild' => $resultEstimateBuildNew
                   
                ]
            ];
        }
        
        if ($designQuotePrices && $isChangeInput > 0) {
            $designQuotePricesNew = [];
            foreach ($designQuotePrices as $item) {
                $designQuotePricesNew[$item[0]] = [$item[1], $item[2]];
            }
            $categories = $dataContruction->categories->map(function ($category)
            use ($designQuotePricesNew, $resultEstimateDesign, $listIdAttrFloors, $areaConstructionSize) {
                if (!empty($designQuotePricesNew[$category->id])) {
                    return   [
                        'id' => $category->id,
                        'name' => $category->name,
                        'value' => $designQuotePricesNew[$category->id][0] ?? 0,
                        'price' => $category->price,
                        'checked' => $designQuotePricesNew[$category->id][1] ?? 1,
                        'totalItem' => $category->price * $designQuotePricesNew[$category->id][0],
                        'resultEstimateDesign' => $resultEstimateDesign
                    ];
                }
            });
        } else {
            $categories = [];
        }


        $viewTotalDesign = view('client.components.accounting.total_design', [
            'resultEstimateDesign' => $resultEstimateDesign,
            'dataContruction' => $dataContruction,
            "categories" => $categories,
            'listIdAttrFloors' => $listIdAttrFloors,
            'areaConstructionSize' => $areaConstructionSize
        ])->render();
        $viewTotalBuild = view('client.components.accounting.total_build', [
            'resultEstimateBuild' => $resultEstimateBuild,
            'designQuoteBuildNew' => $designQuoteBuildNew
        ])->render();
        return response()->json([
            'error' => false,
            'viewTotalDesign' => $viewTotalDesign,
            'viewTotalBuild' => $viewTotalBuild,
            'designQuotePrices' => $designQuotePrices
        ]);
    }
}
