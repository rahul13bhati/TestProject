<?php


namespace App\Helpers;
use Request;
use App\LogActivity as LogActivityModel;


class LogActivity
{


    public static function addToLog($subject)
    {
    	$log = [];
    	$log['subject'] = $subject;
    	$log['user_id'] = auth()->check() ? auth()->user()->id : 1;
    	LogActivityModel::create($log);
    }


    public static function logActivityLists()
    {
    	return LogActivityModel::latest()->get();
    }


}