<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

trait SetResponseRedirectTrait
{
    use SetFlashMessageTrait;

    protected function responseJson($error = true, $responseCode = 200, $message = [], $data = NULL): JsonResponse
    {
        return response()->json([
            'error' => $error,
            'response_code' => $responseCode,
            'message' => $message,
            'data' => $data,
        ]);
    }

    protected function responseRedirect($route, $message, $type = 'success', $error = false, $withOldInputWhenError = false, $routeParam = NULL): RedirectResponse
    {
        $this->setFlashMessage($message, $type); // Setting the flash Message.
        $this->showFlashMessages();              // Showing the Flash message which are actually setting the messages to session.

        if (Route::has($route)) {
            return ($error && $withOldInputWhenError)
                ? redirect()->back()->withInput()
                : redirect()->route($route, $routeParam);
        }

        return ($error && $withOldInputWhenError)
            ? redirect()->back()->withInput()
            : redirect($route);
    }

    protected function responseRedirectBack($message, $type = 'success', $error = false, $withOldInputWhenError = false): RedirectResponse
    {
        if ($message) {
            $this->setFlashMessage($message, $type);
            $this->showFlashMessages();
        }

        return redirect()->back();
    }

    protected function responseBackWithException($throwable, $message = 'Something went wrong. Please try again.', $type = 'info', $error = TRUE, $withOldInputWhenError = TRUE): RedirectResponse
    {
        $this->setFlashMessage($message, $type);
        $this->showFlashMessages();

        Log::error($throwable->getMessage(), $throwable->getTrace());

        return ($error && $withOldInputWhenError)
            ? back()->with('custom-error', $message)->with('console-log', $throwable->getMessage())->withInput()
            : back()->with('custom-error', $message)->with('console-log', $throwable->getMessage());
    }
}
