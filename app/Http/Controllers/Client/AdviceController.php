<?php

namespace App\Http\Controllers\Client;

use App\Models\Admin\Advice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\StoreAdviceRequest;
use App\Jobs\SendMailEdviceJob;
use Illuminate\Support\Facades\Mail;

class AdviceController extends Controller
{
    public function __construct(protected Advice $advice)
    {
    }

    public function store(StoreAdviceRequest $request)
    {
        try {
            $dataInsert = [
                'advice_name' => $request->name,
                'advice_title' => $request->title,
                'advice_email' => $request->email,
                'advice_phone' => $request->phone,
                'advice_descr' => $request->descr,
                'advice_status' => $this->advice::STATUS_DEFAULT,
            ];

            $insertAdvice = $this->advice->create($dataInsert);
            if (!$insertAdvice) {
                return [
                    'error' => true,
                    'message' => 'Đăng ký tư vấn thất bại'
                ];
            }
            // SendMailEdviceJob::dispatch($insertAdvice);
            return [
                'error' => false,
                'message' => 'Đăng ký tư vấn thành công'
            ];
        } catch (\Exception $e) {
            Log::info("store advice failed: " . $e->getMessage());
            return [
                'error' => false,
                'message' => 'Đăng ký tư vấn thất bại'
            ];
        }
    }
}
