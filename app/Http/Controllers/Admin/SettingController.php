<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\FrontHelper;
use App\Models\Setting;
use Settings;
use Config;
use DB;

class SettingController extends Controller
{

    
    private $data;
    public function __construct(Setting $data)
    {
        $this->data = $data;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.setting.index");
    }


    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            $input = $request->all();
            $data = $this->checkUploadFile($request);
            foreach ($input as $key => $value) {
                if(array_key_exists($key, $data)){
                    $input[$key] = $data[$key];
                }
            }
            if (Settings::set($input)){

                DB::commit();       

                return back()->withSuccess("Setting added successfully");
            }else{
                
                DB::rollback();
                return back()->withError('Somethong went wrong!');

            }

        } catch (Exception $e) {
            
            DB::rollback();

            return back()->withError($e->getMessage());
        }
    }


    /*
    * Check And Upload Setting images
    */
    public function checkUploadFile($request)
    {
        $data = [];
        $input = $request->all();
        $bannerImage = [];
        foreach ($input as $key => $value) {
            if($request->hasFile($key)){
                $isResize = false;
                $resizeValue = [];
                /*if (in_array($key, $bannerImage)) {
                    $isResize = true;
                    $resizeValue = [1400=>470];
                }*/
                $fileName = $key;
                $img_dir = 'upload/setting';
                $preImage = Settings::get($key);
                
                $data[$fileName] =  FrontHelper::singleImage($request,$fileName,$img_dir,$isResize,$resizeValue,$preImage);
            }
        }
        /*END*/
        return $data;
    }

}
