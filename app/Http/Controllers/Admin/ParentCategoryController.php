<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ParentCategory;

class ParentCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parentCategories = ParentCategory::orderByDesc('id')->get();

        return view('admin.parent-categories.list', compact('parentCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.parent-categories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ParentCategory::create(['name' => $request->name]);
        toastr()->success('Thêm thành công');

        return redirect()->route('parentcategory.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parentCategory = ParentCategory::find($id);

        return view('admin.parent-categories.edit', compact('parentCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $parentCategory = ParentCategory::find($id);
        $parentCategory->name = $request->name;
        $parentCategory->save();
        toastr()->success('Cập nhật thành công');

        return redirect()->route('parentcategory.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parentCategory = ParentCategory::find($id);
        $parentCategory->delete();
        toastr()->success('Xóa thành công');

        return redirect()->route('parentcategory.list');
    }

    public function updateStatus($id, $status)
    {
        $parentCategory = ParentCategory::find($id);
        $parentCategory->status = $status;
        $parentCategory->save();
        toastr()->success('Cập nhật thành công');

        return redirect()->route('parentcategory.list');
    }
}
