<?php

namespace App\Http\Controllers;

use App\Models\Names;
use Illuminate\Http\Request;

/**
 * Class AdminListName
 * @package App\Http\Controllers
 */
class AdminListName extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getNamesInTable()
    {
        $names = Names::paginate(5);
        return view('list_name', compact('names'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showFormUpdate(Request $request)
    {
        if (!empty($request->id)) {
            $name = Names::find($request->id);
            return view('form_update', compact('name'));
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function nameUpdate(Request $request)
    {
        $name = Names::find($request->id);
        $name->update([
            'status' => $request->status=="Y"?true:false,
            'reason_for_refusal' => $request->reason_for_refusal,
            'date_status' => date("y-m-d h:i:s"),
        ]);
        $name->save();

        //тут же добавляем отправку мейла со статусом и данными.

        $names = Names::paginate(5);
        return view('list_name', compact('names'));
    }
}
