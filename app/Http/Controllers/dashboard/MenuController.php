<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreMenuRequest;
use App\Http\Requests\Dashboard\UpdateMenuRequest;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::latest()->paginate(5);
        $categories = Category::get();
        return view('dashboard.pages.menu', [
            'categories' => $categories,
            'menus' => $menus
        ]);
    }
    public function store(StoreMenuRequest $request) {
        $data = [
            'name' => $request->input('name'),
            'details' => $request->input('details'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category')
        ];
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/menus');
            $image->move($destinationPath, $name);
            $data['image'] = $name;
        }
        Menu::create($data);
        return redirect(url('/menus'))->with('addmenu', 'Menu Created Successfully!!!');
    }

    public function update(UpdateMenuRequest $request, $id)
    {

        $data = [
            'name' => $request->input('name1'),
            'details' => $request->input('details1'),
            'price' => $request->input('price1'),
            'category_id' => $request->input('category1')
        ];

        if($request->hasFile('image1'))
        {
            $oldImage = Menu::find($id)->image;
            if($oldImage)
            {
                unlink('uploads/menus/'.$oldImage);
            }
            // dd($oldImage);
            $image = $request->file('image1');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/menus');
            $image->move($destinationPath, $name);
            $data['image'] = $name;
        }

        Menu::where('id', $id)->update($data);
        return redirect(url('/menus'))->with('updatemenu', 'Menu Updated Successfully!!!');
    }
    public function delete(Request $request, $id)
    {
        Menu::where('id', $id)->delete();
        return redirect('/menus')->with('deletemenu', 'Menu Record is Deleted Successfully!!!');
    }
}
