<?php

namespace App\Http\Controllers;

use App\Models\Names;
use Illuminate\Http\Request;

/**
 * Class Name
 * @package App\Http\Controllers
 */
class Name extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showForm()
    {
        return view('form_get_name');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function storeName(Request $request)
    {
        $validated = $request->validate([
            'nameUser' => 'min:3|max:11',
        ]);

        $names = Names::create([
            'name' => $request->nameUser,
        ]);

        if ($names) {
            return view('form_get_name', ['success' => 'Запрос на имя ' . $names->name . ' отправлен']);
        } else {
            return view('form_get_name', ['error' => 'Запрос на имя ' . $names->name . ' не отправлен']);
        }

    }
}
