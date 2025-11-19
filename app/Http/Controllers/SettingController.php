<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        return view('parametre.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            // Horaires
            'start_time' => 'nullable',
            'break_time' => 'nullable',
            'resume_time' => 'nullable',
            'end_time' => 'nullable',

            // Jours
            'workdays' => 'nullable|array',

            // Retards
            'tolerance_minutes' => 'nullable|integer',
            'sanction_after' => 'nullable|integer',

            // Textes
            'conditions' => 'nullable|string',
            'obligations' => 'nullable|string',
            'sanctions' => 'nullable|string',
        ]);

        $settings = Setting::first() ?? new Setting();
        $settings->fill($data);
        $settings->save();

        return back()->with('success', 'Paramètres enregistrés ✔️');
    }

    public function conditions()
{
    $settings = Setting::first(); // Tu récupères tes données
    return view('parametre.politique', compact('settings'));
}

}
