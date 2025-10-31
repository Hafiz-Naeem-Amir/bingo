<?php

namespace App\Http\Controllers\Admin;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ContentController extends Controller
{
    public function index()
    {
        return view('admin.pages.content');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'page_id' => 'required|exists:pages,id',
            'h1' => 'nullable|string|max:255',
            'h2' => 'nullable|string|max:255',
            'h3' => 'nullable|string|max:255',
            'h4' => 'nullable|string|max:255',
            'h5' => 'nullable|string|max:255',
            'h6' => 'nullable|string|max:255',
            'p1' => 'nullable|string',
            'p2' => 'nullable|string',
            'title' => 'nullable|string|max:255',
            'keyword' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->except('image');

        // image upload
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/contents'), $filename);
            $data['image'] = 'uploads/contents/' . $filename;
        }

        $content = Content::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Content saved successfully!',
            'data' => $content
        ]);
    }
}
