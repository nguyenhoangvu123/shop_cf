<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Admin\Floor;
use App\Models\Admin\AttrFloor;
use App\Models\Admin\AttrMaster;
use App\Models\Admin\StyleDesgin;
use App\Models\Admin\TypeContruction;

class AccountingComposer
{

    public function __construct(
        protected AttrMaster $attrMaster,
        protected Floor $floor,
        protected AttrFloor $attrFloor,
        protected StyleDesgin $styleDesgin,
        protected TypeContruction $typeContruction
    ) {
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $listFloor = $this->floor->get();
        $listFloorSort = $this->floor->orderBy('id', 'desc')->get();
        $listAttrContruction = $this->attrMaster->where("type", $this->attrMaster::TYPE_ATTRIBUTE_CONTRUCTION)->get();
        $listAttrSupplies = $this->attrMaster->where("type", $this->attrMaster::TYPE_ATTRIBUTE_SUPPLIES)->get();
        $listStyleDesgin = $this->styleDesgin->get();
        $listTypeContruction = $this->typeContruction->get();
        $dataAccounting = [
            'listAttrContructionGlobal' => $listAttrContruction,
            'listAttrSuppliesGlobal' => $listAttrSupplies,
            'listStyleDesginGlobal' => $listStyleDesgin,
            'listTypeContructionGlobal' => $listTypeContruction,
            'listFloorSortGlobal' => $listFloorSort,
            'listFloorGlobal' => $listFloor
        ];
        $view->with('dataAccounting', $dataAccounting);
    }
}
