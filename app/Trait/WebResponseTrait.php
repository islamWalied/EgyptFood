<?php

namespace App\Trait;


use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

trait WebResponseTrait
{
    protected function returnPaginatedData(string $message, int $code, $data, string $view): View
    {
        return view($view, [
            'status' => 'success',
            'code' => $code,
            'message' => __($message),
            'data' => $data,
            'pagination' => [
                'total' => $data->total(),
                'per_page' => $data->perPage(),
                'current_page' => $data->currentPage(),
                'last_page' => $data->lastPage(),
                'from' => $data->firstItem(),
                'to' => $data->lastItem(),
            ],
        ]);
    }

    public function returnAbort(string $msg, int $code): void
    {
        abort($code, __($msg));
    }

    public function returnError(string $msg, int $code): RedirectResponse
    {
        return redirect()->back()->withErrors(['error' => __($msg)])->with('code', $code)->with('status', 'error');
    }

    public function success(string $msg, int $code, string $redirectRoute = 'home'): RedirectResponse
    {
        return redirect()->route($redirectRoute)->with('status', 'success')->with('code', $code)->with('message', __($msg));
    }

    public function returnData(string $msg, int $code, $value, string $view): View
    {
        return view($view, [
            'status' => 'success',
            'code' => $code,
            'message' => __($msg),
            'item' => $value,
        ]);
    }
}
