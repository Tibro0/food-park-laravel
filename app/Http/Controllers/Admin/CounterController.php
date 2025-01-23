<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CounterController extends Controller
{
    public function index(){
        $counter = Counter::first();
        return view('admin.counter.index', compact('counter'));
    }

    public function update(Request $request){
        $request->validate([
            'background' => ['nullable', 'image', 'max:3000'],
            'counter_icon_one' => ['required', 'max:255'],
            'counter_count_one' => ['required', 'numeric'],
            'counter_name_one' => ['required', 'max:255'],
            'counter_icon_two' => ['required', 'max:255'],
            'counter_count_two' => ['required', 'numeric'],
            'counter_name_two' => ['required', 'max:255'],
            'counter_icon_three' => ['required', 'max:255'],
            'counter_count_three' => ['required', 'numeric'],
            'counter_name_three' => ['required', 'max:255'],
            'counter_icon_four' => ['required', 'max:255'],
            'counter_count_four' => ['required', 'numeric'],
            'counter_name_four' => ['required', 'max:255'],
        ]);

        $oldImage = $request->old_background;
        if ($request->file('background')) {
            $image = $request->file('background');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(5472,1026);
            $img->toJpeg(80)->save(base_path('public/uploads/counter_background_image/'.$name_gen));
            $save_url = 'uploads/counter_background_image/'.$name_gen;

            Counter::updateOrCreate(
                ['id' => 1],
                [
                    'background' => $save_url,
                    'counter_icon_one' => $request->counter_icon_one,
                    'counter_count_one' => $request->counter_count_one,
                    'counter_name_one' => $request->counter_name_one,
                    'counter_icon_two' => $request->counter_icon_two,
                    'counter_count_two' => $request->counter_count_two,
                    'counter_name_two' => $request->counter_name_two,
                    'counter_icon_three' => $request->counter_icon_three,
                    'counter_count_three' => $request->counter_count_three,
                    'counter_name_three' => $request->counter_name_three,
                    'counter_icon_four' => $request->counter_icon_four,
                    'counter_count_four' => $request->counter_count_four,
                    'counter_name_four' => $request->counter_name_four,
                ]
            );

            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            toastr()->success('Updated Successfully!');
            return redirect()->back();
        }else{
            Counter::updateOrCreate(
                ['id' => 1],
                [
                    'counter_icon_one' => $request->counter_icon_one,
                    'counter_count_one' => $request->counter_count_one,
                    'counter_name_one' => $request->counter_name_one,
                    'counter_icon_two' => $request->counter_icon_two,
                    'counter_count_two' => $request->counter_count_two,
                    'counter_name_two' => $request->counter_name_two,
                    'counter_icon_three' => $request->counter_icon_three,
                    'counter_count_three' => $request->counter_count_three,
                    'counter_name_three' => $request->counter_name_three,
                    'counter_icon_four' => $request->counter_icon_four,
                    'counter_count_four' => $request->counter_count_four,
                    'counter_name_four' => $request->counter_name_four,
                ]
            );

            toastr()->success('Updated Successfully!');
            return redirect()->back();
        }
    }
}
