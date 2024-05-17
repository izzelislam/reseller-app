<?php

namespace App\Http\Controllers;

use App\Helpers\FileUpload;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SettingRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $setting = Setting::first();

        return view('setting.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $setting = new Setting();

        return view('setting.create', compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SettingRequest $request): RedirectResponse
    {
        $is_exist = Setting::first();

        if (!$is_exist) {
            if ($request->hasFile("company_logo_file")){
                $file["company_logo"] = FileUpload::file_upload("setting", $request->file("company_logo_file"));
            }
            Setting::create(array_merge($request->validated(), $file));
        }else{
            if ($request->hasFile("company_logo_file")){
                $file["company_logo"] = FileUpload::file_upload("setting", $request->file("company_logo_file"), $is_exist->company_logo);
            }
            $is_exist->update($request->validated());
        }

        return Redirect::route('settings.index')
            ->with('success', 'Setting created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $setting = Setting::find($id);

        return view('setting.show', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $setting = Setting::find($id);

        return view('setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SettingRequest $request, Setting $setting): RedirectResponse
    {
        $setting->update($request->validated());

        return Redirect::route('settings.index')
            ->with('success', 'Setting updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Setting::find($id)->delete();

        return Redirect::route('settings.index')
            ->with('success', 'Setting deleted successfully');
    }
}
