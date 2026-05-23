<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $partners = Partner::when($search, function ($query) use ($search) {

            $query->where('name', 'LIKE', '%' . $search . '%');

        })
        ->latest()
        ->get();

        return view('admin.partners.index', compact('partners', 'search'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo_url' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        $logo = $request->file('logo_url');

        $logoPath = $logo->store('partners', 'public');

        Partner::create([
            'name' => $request->name,
            'logo_url' => $logoPath
        ]);

        return redirect()->back()
            ->with('success', 'Partner berhasil ditambahkan');
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $data = [
            'name' => $request->name
        ];

        if ($request->hasFile('logo_url')) {

            $logo = $request->file('logo_url');

            $logoPath = $logo->store('partners', 'public');

            $data['logo_url'] = $logoPath;
        }

        $partner->update($data);

        return redirect()->back()
            ->with('success', 'Partner berhasil diupdate');
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();

        return redirect()->back()
            ->with('success', 'Partner berhasil dihapus');
    }
}
