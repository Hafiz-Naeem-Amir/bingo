<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{

    public function index()
    {
        return view('admin.pages.page');
    }
    public function getData()
    {
        $pages = Page::query();
        return DataTables::of($pages)->make(true);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'p_type_name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'p_name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'p_slug' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/|unique:pages,p_slug',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        Page::create($request->all());
        return response()->json(['success' => 'page has been creatd']);
    }
    public function edit($id)
    {
        $page = Page::find($id);

        if (!$page) {
            return response()->json(['error' => 'Page not found'], 404);
        }

        return response()->json($page);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'p_type_name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'p_name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'p_slug' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/|unique:pages,p_slug,' . $id,
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $page = Page::find($id);
        if (!$page) {
            return response()->json(['error' => 'Page not found or something went wrong'], 422);
        }
        $page->update($request->only('p_type_name', 'p_name', 'p_slug'));
        return response()->json(['success' => 'page has been updated']);
    }

   public function destroy($id)
{
    $page = Page::find($id);

    if(!$page){
        return response()->json(['error' => 'Page not found'], 404);
    }

    $page->delete();

    return response()->json(['success' => 'Page deleted successfully']);
}

}
