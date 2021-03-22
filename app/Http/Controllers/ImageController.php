<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $image = new Image;
        
        if ($request->hasFile('images')) {
            $data = [];
            $image = $request->file('images');
            $product_id = $request->product_id;

            foreach ($image as $img) {
                $filename = time() . '.' . $img->getClientOriginalExtension();
                $location = public_path('/images/' . $filename);
                \Image::make($img)->resize(800, 700)->save($location);
                $data[] = [
                    'image' => $filename,
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
                $img->image = $filename;
            }
            Image::insert($data);
        }
    }
}
