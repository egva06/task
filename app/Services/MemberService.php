<?php

namespace App\Services;

use App\Http\Resources\MemberCollection;
use App\Member;


class MemberService {

    public function getMembersTree()
    {
        $result = Member::all('id', 'name', 'surname', 'parent_id');
        return response()->make(new MemberCollection($this->buildTree($result)));
    }

    public function getParent($request)
    {
        $result = Member::where('id', $request->id)->get();
        return response()->make(new MemberCollection($result));
    }

    public function getChild($request)
    {
        $result = Member::where('parent_id', $request->id)->get();
        return response()->make(new MemberCollection($result));
    }

    function buildTree($items)
    {
        $childs = array();

        foreach ($items as $item)
        {
            $childs[$item->parent_id][] = $item;
        }

        foreach ($items as $item)
        {
            if (isset($childs[$item->id]))
            {
                $item->children = $childs[$item->id];
            }
        }

        if ( ! isset($childs[0]))
        {
            return [];
        }
        return $childs[0];
    }


}
