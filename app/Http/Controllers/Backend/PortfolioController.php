<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\Portfolio;
use App\Models\PortfolioImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Intervention\Image\Facades\Image as Image;
use Auth;

class PortfolioController extends Controller
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

        $portfolios = Portfolio::orderBy('id','desc')->get();
        return view('backend.pages.portfolio.index',compact('portfolios'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $categories = Category::orderBy('name','asc')->get();
        return view('backend.pages.portfolio.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
            'admin_id'      => 'required|numeric',
            'category_id '  => 'numeric',
            'title'        => 'required|string|max:255',
            'description'  => 'nullable',
            'rating'       => 'required|numeric',
            'status'       => 'numeric',
            'client_name'  => 'string',
            'website'      => 'string',
            'project_type' => 'string',
        ]);

        $portfolio = new Portfolio();

        $portfolio->admin_id = $request->admin_id;
        $portfolio->category_id  = $request->input('category_id');
        $portfolio->title = $request->title;
        $portfolio->description = $request->description;
        $portfolio->rating = $request->rating;
        $portfolio->status = $request->status;
        $portfolio->website = $request->website;
        $portfolio->project_type = $request->project_type;
        $portfolio->completed = $request->completed;
        $portfolio->slug = str_slug($portfolio->category->name);
        if (isset($request->tags)){
            $portfolio->tags = implode(",",$request->tags);
        }
        $portfolio->save();

        if (count($request->image) > 0) {
            $i =0;
            $images = $request->file('image');
            foreach ($images as $image) {
                $i++;
                $image_name = 'BarisalGeek-Portfolio-image-'.$i.'-'.$portfolio->id.'.'.$image->getClientOriginalExtension();
                $location = public_path('images/portfolio/'.$image_name);
                Image::make($image)->save($location);
                $portfolio_image = new PortfolioImage();
                $portfolio_image->portfolio_id = $portfolio->id;
                $portfolio_image->image = $image_name;
                $portfolio_image->save();
            }
        }

        session()->flash('success','A New Portfolio Has Added');
        return redirect()->route('admin.portfolio.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $portfolio = Portfolio::find($id);
        return view('backend.pages.portfolio.show',compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $portfolio = Portfolio::find($id);
        $categories = Category::orderBy('name','asc')->get();
        return view('backend.pages.portfolio.edit',compact('portfolio','categories'));
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
            'admin_id'     => 'required|numeric',
            'category_id ' => 'numeric',
            'title'        => 'required|string|max:255',
            'description'  => 'nullable',
            'rating'       => 'numeric',
            'status'       => 'numeric',
            'website'      => 'string',
            'project_type' => 'string',

        ]);

        $portfolio = Portfolio::find($id);

        $portfolio->admin_id = $request->admin_id;
        $portfolio->category_id  = $request->category_id ;
        $portfolio->title = $request->title;
        $portfolio->description = $request->description;
        $portfolio->rating = $request->rating;
        $portfolio->status = $request->status;
        $portfolio->website = $request->website;
        $portfolio->project_type = $request->project_type;
        $portfolio->completed = $request->completed;
        $portfolio->slug = str_slug($portfolio->category->name);
        if (isset($request->tags)){
            $portfolio->tags = implode(",",$request->tags);
        }
        $portfolio->save();

        if ($request->image > 0){
            //        delete product old image
            $portfolio_images = PortfolioImage::where('portfolio_id',$portfolio->id)->get();

            foreach ($portfolio_images as $image){
                if (File::exists('images/portfolio/'.$image->image)){
                    File::delete('images/portfolio/'.$image->image);
                }
            }
            $portfolio_images->each->delete();
        }

//        insert new product image
        if ($request->image > 0) {
            $i =0;
            $images = $request->file('image');
            foreach ($images as $image) {
                $i++;
                $image_name = 'BarisalGeek-portfolio-'.$portfolio->id.'-image-'.$i.'.'.$image->getClientOriginalExtension();
                $location = public_path('images/portfolio/'.$image_name);
                Image::make($image)->save($location);
                $portfolio_image = new PortfolioImage();
                $portfolio_image->portfolio_id = $portfolio->id;
                $portfolio_image->image = $image_name;
                $portfolio_image->save();
            }
        }

        session()->flash('success','Portfolio Has Updated');
        return redirect()->route('admin.portfolio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        if (Auth::user()->role != 'Editor') {
            $portfolio = Portfolio::find($id);
//        delete product old image
            $portfolio_images = PortfolioImage::where('portfolio_id', $portfolio->id)->get();

            foreach ($portfolio_images as $image) {
//            dd($image->image);
                if (File::exists('images/portfolio/' . $image->image)) {
                    File::delete('images/portfolio/' . $image->image);
                }
            }
            $portfolio_images->each->delete();
            $portfolio->delete();
            session()->flash('success', 'Portfolio Has Deleted');
            return redirect()->route('admin.portfolio.index');
        }else{
            session()->flash('errormsg','You have no permission for requested page!');
            return redirect()->route('admin.index');
        }
    }

}
