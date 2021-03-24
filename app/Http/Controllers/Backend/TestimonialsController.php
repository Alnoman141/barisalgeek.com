<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\Testimonial;
use App\Models\TestimonialImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image as Image;
use File;
use Auth;

class TestimonialsController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $testimonials = Testimonial::orderBy('id','desc')->get();
        return view('backend.pages.testimonial.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $categories = Category::orderBy('name','asc')->get();
        return view('backend.pages.testimonial.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
           'admin_id'   => 'numeric|required',
           'category_id'   => 'numeric',
           'picture'      => 'image|required|mimes:png,jpg,jpeg,gif',
           'details'   => 'nullable',
           'site_logo'   => 'image|required|mimes:png,svg',
           'status'   => 'numeric',
        ]);

        $testimonial = new Testimonial();

        $testimonial->admin_id = $request->admin_id;
        $testimonial->category_id  = $request->category_id ;
        $testimonial->status = $request->status;
        $testimonial->done_at = $request->done_at;
        $testimonial->details = $request->details;
        //insert site logo
        if ($request->site_logo > 0){
            $image = $request->file('site_logo');
            $image_name = 'BarisalGeek'.'-'.time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/testimonial/sitelogo/'.$image_name);
            Image::make($image)->save($location);
            $testimonial->site_logo = $image_name;
        }

        //insert image
        if ($request->picture > 0){
            $picture = $request->file('picture');
            $image_name = 'BarisalGeek'.'-review-'.time().'.'.$picture->getClientOriginalExtension();
            $location = public_path('images/testimonial/review/'.$image_name);
            Image::make($picture)->save($location);
            $testimonial->picture = $image_name;
        }

        $testimonial->save();

        if (count($request->image) > 0) {
            $i =0;
            $images = $request->file('image');
            foreach ($images as $image) {
                $i++;
                $image_name = 'BarisalGeek-Portfolio-image-'.$i.'-'.time().'.'.$image->getClientOriginalExtension();
                $location = public_path('images/testimonial/'.$image_name);
                Image::make($image)->save($location);
                $testimonial_image = new TestimonialImage();
                $testimonial_image->testimonial_id = $testimonial->id;
                $testimonial_image->image = $image_name;
                $testimonial_image->save();
            }
        }

        session()->flash('success','A New Testimonial Has Added');
        return redirect()->route('admin.testimonial.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

        $testimonial = Testimonial::find($id);
        return view('backend.pages.testimonial.show',compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $testimonial = Testimonial::find($id);
        $categories = Category::orderBy('name','asc')->get();
        return view('backend.pages.testimonial.edit',compact('testimonial','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $request->validate([
            'admin_id'   => 'numeric|required',
            'category_id'   => 'numeric',
            'picture'      => 'image|nullable|mimes:png,jpg,jpeg,gif',
            'details'   => 'nullable',
            'site_logo'   => 'image|nullable|mimes:png,svg',
            'status'   => 'numeric',
        ]);

        $testimonial = Testimonial::find($id);

        $testimonial->admin_id = $request->admin_id;
        $testimonial->category_id  = $request->category_id ;
        $testimonial->status = $request->status;
        $testimonial->done_at = $request->done_at;
        $testimonial->details = $request->details;

//        delete site logo
        if ($request->site_logo > 0){
            if (File::exists('images/testimonial/sitelogo/'.$testimonial->site_logo)){
                File::delete('images/testimonial/sitelogo/'.$testimonial->site_logo);
            }
        }

//        insert new logo
        if ($request->site_logo > 0){
            $image = $request->file('site_logo');
            $image_name = 'BarisalGeek'.'-'.time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/testimonial/sitelogo/'.$image_name);
            Image::make($image)->save($location);
            $testimonial->site_logo = $image_name;
        }

        //        delete picture
        if ($request->picture > 0){
            if (File::exists('images/testimonial/review/'.$testimonial->picture)){
                File::delete('images/testimonial/review/'.$testimonial->picture);
            }
        }

        //insert image
        if ($request->picture > 0){
            $picture = $request->file('picture');
            $image_name = 'BarisalGeek'.'-'.time().'.'.$picture->getClientOriginalExtension();
            $location = public_path('images/testimonial/review/'.$image_name);
            Image::make($picture)->save($location);
            $testimonial->picture = $image_name;
        }

        $testimonial->save();

//        delete testimonial images

        if ($request->image > 0){
            //        delete product old image
            $testimonial_images = TestimonialImage::where('testimonial_id',$testimonial->id)->get();

            foreach ($testimonial_images as $image){
                if (File::exists('images/testimonial/'.$image->image)){
                    File::delete('images/testimonial/'.$image->image);
                }
            }
            $testimonial_images->each->delete();
//            insert new image

            if (count($request->image) > 0) {
                $i =0;
                $images = $request->file('image');
                foreach ($images as $image) {
                    $i++;
                    $image_name = 'BarisalGeek-Portfolio-image-'.$i.'-'.time().'.'.$image->getClientOriginalExtension();
                    $location = public_path('images/testimonial/'.$image_name);
                    Image::make($image)->save($location);
                    $testimonial_image = new TestimonialImage();
                    $testimonial_image->testimonial_id = $testimonial->id;
                    $testimonial_image->image = $image_name;
                    $testimonial_image->save();
                }
            }

        }
        session()->flash('success','Testimonial Has Updated');
        return redirect()->route('admin.testimonial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        if (Auth::user()->role != 'Editor') {
            $testimonial = Testimonial::find($id);
//       delete site logo
            if (File::exists('images/testimonial/sitelogo/' . $testimonial->site_logo)) {
                File::delete('images/testimonial/sitelogo/' . $testimonial->site_logo);
            }

            //       delete image
            if (File::exists('images/testimonial/review/' . $testimonial->image)) {
                File::delete('images/testimonial/review/' . $testimonial->image);
            }

//        delete testimonial image
            $testimonial_images = TestimonialImage::where('testimonial_id', $testimonial->id)->get();

            foreach ($testimonial_images as $image) {
                if (File::exists('images/testimonial/' . $image->image)) {
                    File::delete('images/testimonial/' . $image->image);
                }
            }
            $testimonial_images->each->delete();

            $testimonial->delete();
            session()->flash('success', 'Testimonial Has Deleted');
            return redirect()->route('admin.testimonial.index');
        }else{
            session()->flash('errormsg','You have no permission for requested page!');
            return redirect()->route('admin.index');
        }
    }

}
