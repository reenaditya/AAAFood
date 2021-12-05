<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use DB;

class RatingController extends Controller
{
    private $data;
    public function __construct(Rating $data)
    {
        $this->data = $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function orderRating(Request $request)
    {
        
        //$this->validation($request);

        DB::beginTransaction();
        try {
            
            $this->props($request);
            
            DB::commit();
            
            return redirect()->route('webiste.order.history')->withSuccess("Rating added successfully!");

        } catch (Exception $e) {
            
            DB::rollback();

            return back()->withError($e->getMessage());
        }
    }

    private function validation(Request $request)
    {
        $request->validate([
            'user_id' => ["required","array","min:2","max:100"],
            'restaurant_id' => ["required","array","min:2","max:100"],
            'item_id' => ["required","array","min:8","confirmed"],
            'order_star_rating' => ["required","array","min:2","max:100"],
        ]);
        return $this;
    }

    private function props(Request $request)
    {
        $data = [];
        $cnt = count($request->item_id);
        for ($i=0; $i < $cnt; $i++) { 
            $data = new Rating;
            $data->user_id = $request->user_id[$i];
            $data->item_id = $request->item_id[$i];
            $data->order_id = $request->order_id[$i];
            $data->restro_id = $request->restaurant_id[$i];
            $data->rating = $request->order_star_rating[$i];
            $data->message = $request->message[$i];
            $data->save();
        }
        return $this;
    }
}
