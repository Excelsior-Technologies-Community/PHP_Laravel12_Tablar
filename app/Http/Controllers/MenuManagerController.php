<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuManagerController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('order', 'asc')->get();
        $sidebarMenus = Menu::where('is_active', true)->orderBy('order', 'asc')->get();
        
        return view('admin.menu-manager', compact('menus', 'sidebarMenus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'url' => 'required|string',
            'icon' => 'nullable|string',
            'order' => 'required|integer'
        ]);

        Menu::create([
            'title' => $request->title,
            'url' => $request->url,
            'icon' => $request->icon ?? 'ti ti-link',
            'order' => $request->order
        ]);

        return back()->with('success', 'Menu added successfully');
    }

    public function delete($id)
    {
        Menu::findOrFail($id)->delete();
        return back()->with('success', 'Menu deleted successfully');
    }
}