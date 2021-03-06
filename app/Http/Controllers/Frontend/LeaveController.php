<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Repositories\Frontend\LeaveRepository;

class LeaveController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function lists(Request $request)
    {
        $input = json_decode($request->input('data'), true);
        $result = LeaveRepository::getInstance()->lists($input);
        return response()->json($result);
    }

    public function publish(Request $request)
    {
        $input = $request->input('data');
        $result = LeaveRepository::getInstance()->publish($input);
        return response()->json($result);
    }
}
