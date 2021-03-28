<?php
namespace App\Traits;

Trait GeneralTrait
{
    public function returnError($errNum, $msg)
    {
        return response()->json([
            'status' => false,
            'errNum' => $errNum,
            'msg'   => $msg
        ]);
    }

    public function returnSuccessMessage($msg = "", $errNum ="5000")
    {
        return [
            'status' => true,
            'errNum' => $errNum,
            'msg'    => $msg,
        ];
    }

    public function returnData($key, $value, $msg = "")
    {
        return response()->json([
            'status' => true,
            'errNum' => '5000',
            'msg'    => $msg,
            $key     => $value
        ]);
    }
}
