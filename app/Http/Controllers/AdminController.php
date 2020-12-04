<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Item;

class AdminController extends Controller
{
    public function users()
    {
        $users = User::get();

        return view('admin.user.home', ['no' => 1], compact('users'));
    }

    public function status(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $user = User::find($id);
        $name = $user->name;
        $user->status = $request->status;
        $user->update();

        Alert::success('Status Berubah', 'Status' . $name . 'Behasil Diubah');
        return redirect('user');
    }

    public function delete_user($id)
    {
        User::destroy($id);

        Alert::error('Dihapus', 'Pengguna Berhasil Dihapus');
        return redirect('user');
    }

    public function detail_user($id)
    {
        $user = User::find($id);
        return view('admin.user.detail', compact('user'));
    }

    public function items()
    {
        $items = Item::all();
        return view('admin.item.home', ['no' => 1], compact('items'));
    }

    public function add_item()
    {
        return view('admin.item.add');
    }

    public function create_item(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'information' => 'required',
            'image' => 'requireq|mimes:png,jpg,jpeg,bmp,png',
        ]);

        $file = $request->image;
        $file_name = Str::random(100) . '.' . $file->extension();
        $file->move_uploaded_file(public_path('uploads'), $file_name);

        $item = new Item;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->information = $request->information;
        $item->image = $file_name;
        $item->save();

        Alert::success('Barang Ditambah', 'Barang Berhasil Ditambahkan');
        return redirect('item');
    }

    public function delete_item($id)
    {
        Item::destroy($id);

        Alert::error('Dihapus', 'Barang Berhasil Dihapus');
        return redirect('item');
    }

    public function detail_item($id)
    {
        $item = Item::find($id);
        return view('admin.item.detail', compact('item'));
    }

    public function edit_item(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'information' => 'required',
            'image' => 'requireq|mimes:png,jpg,jpeg,bmp,png',
        ]);

        $file = $request->image;
        $file_name = Str::random(100) . '.' . $file->extension();
        $file->move_uploaded_file(public_path('uploads'), $file_name);

        $item = Item::find($id);
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->information = $request->information;
        $item->image = $file_name;
        $item->update();

        Alert::success('Detail Barang Diubah', 'Detail Barang Berhasil Dirubah');
        return redirect('item.detail');
    }
}
