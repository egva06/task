<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\MemberService;
use Illuminate\Http\Request;

class MembersController extends Controller {
    public function getMembersTree(MemberService $member_service)
    {
        return $member_service->getMembersTree();
    }

    public function getChild(Request $request, MemberService $member_service)
    {
        return $member_service->getChild($request);
    }

    public function getParent(Request $request, MemberService $member_service)
    {
        return $member_service->getParent($request);
    }
}
