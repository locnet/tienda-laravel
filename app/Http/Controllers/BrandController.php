<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\Handler;
use App\Http\Requests;
use Input;
use App\Brand;
use Carbon\Carbon;


class BrandController extends Controller
{
    
    private $brand;
    
    public function __construct(Brand $brand){
        $this->brand = $brand;
    }
    
    
    public function index()
    {
        $brand = $this->brand->lists('name','id')->sort();
        return view('stoc.index',compact('brand'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        $brand = $this->brand->lists('name','id')->sort();
        $message = false;
    	return view('brand.create_new_brand',compact('brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = $this->brand->lists('name','id')->sort();

        $validate = $this->validate($request, [
            'name' => 'required'
            ]);
        
        if($this->brand->where('name',$request->input('name'))->count() === 0) {
            
            if(Brand::firstOrCreate(array('name' => $request->input('name')))){
                return view('brand.success')
                      ->with('message','Se ha insertado un nuevo fabricante!');
            }            
        } else {
            return view('brand.success')->with('message','Ya tenemos este fabricante!');
        }
        
    }

}
