<?php

namespace App\Traits;

use Mobile_Detect;

trait DeviceType
{
    public function getDeviceType($request)
    {
        $lang = config('app.locale');
        $detect = new Mobile_Detect;

        $deviceType = 'DESKTOP';
        $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'DESKTOP' : 'MOBILESITE') : 'DESKTOP');
        $deviceType = ($detect->isiOS() || $detect->isAndroidOS())?'MOBILE': $deviceType;

        if (isset($request['isMobile']) && $request["isMobile"] == "true" )
        {
            $deviceType = 'MOBILESITE';
        }
        return $deviceType;
    }
}
