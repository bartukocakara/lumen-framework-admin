<?php

namespace App\Repositories\Concrete;

use App\Repositories\Abstracts\IRepository;
use Illuminate\Support\Facades\Cache;

class BaseRepository implements IRepository
{

     /**
     * @var string
     */
    protected string $cacheKey = __CLASS__;

    /**
     * @var int
     */
    protected int $cacheTime = 1440;

    protected int $cacheTimeLow = 5;

    protected int $cacheTimeMid = 30;

    protected int $cacheTimeHigh = 60;

    protected const MIN_STOCK_QTY= 0;

    protected function ifDataExists($data, $model, $dataName = false)
    {
        if($data == null)
        {
            return __("models.".$model).
                   __("actions.".config("response-messages.NOT_FOUND"));
        }
        return $data;
    }

    protected function ifArrayDataExists($array)
    {
        $data = [];
        foreach ($array as $key =>  $value)
        {
            if(count($value) != 0)
            {
                $data[$key] = $value;
            }
            else {
                $data[$key] = __("actions.".config("response-messages.NOT_FOUND"));
            }
        }
        return $data;
    }

    protected function updateResponse($update, $model)
    {
        if($update != 0)
        {
            return __("models.".$model).
                   __("actions.".config("response-messages.UPDATE_SUCCESS"));
        }
        return __("models.".$model).
                   __("actions.".config("response-messages.UPDATE_FAIL"));
    }

    protected function insertResponse($create, $model)
    {
        if($create != 0)
        {
            return __("models.".$model).
                   __("actions.".config("response-messages.CREATE_SUCCESS"));
        }
        return __("models.".$model).
                   __("actions.".config("response-messages.CREATE_FAIL"));
    }

    protected function deleteResponse($delete, $model)
    {
        if($delete != 0)
        {
            return __("models.".$model).
                   __("actions.".config("response-messages.DELETE_SUCCESS"));
        }
        return __("models.".$model).
                   __("actions.".config("response-messages.DELETE_FAIL"));
    }

    protected function mailSendResponse($send, $mailModel)
    {
        if($send != false)
        {
            return __("models.".$mailModel).
                   __("actions.".config("response-messages.MAIL_SEND_SUCCESS"));
        }
        return __("models.".$mailModel).
                   __("actions.".config("response-messages.MAIL_SEND_FAIL"));
    }

    protected function whereLikeQuery($col, $keywords, $q)
    {
        foreach ($keywords as $value)
        {
           if($value != "")
           {
               $q->orWhere($col, "like", "%{$value}%");
           }
        }
        return $q;
    }
    protected function whereProductsSellable($query)
    {
        return $query->where("products.is_active", config("enums.statuses.ACTIVE"))
                     //->where("products.status", config("enums.statuses.ACTIVE"))
                     ->where("products.xml_active", config("enums.statuses.ACTIVE"))
                     ->where("products.stock_qty", ">", self::MIN_STOCK_QTY);
    }

}
