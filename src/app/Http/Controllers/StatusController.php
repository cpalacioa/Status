<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Status;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Log;

class StatusController extends Controller{


     /**
     * Display a listing of Status message..
     *
     * @param  int  $id
     * @return Json Array Status message
     */

    public function index(){
        $Status = Status::orderBy('created_at','DESC')->take(20)->get();
        return response()->json($Status);
    }

    /**
    * show a listing of Status message by search or show a status message by id
    *
    * @param  int|string  $id
    * @return Json Array Status message
    */

    public function getStatus($id){

      if (!ctype_digit($id)) {
        $status = Status::where('status','LIKE',"%$id%")->get();
        if($status->count()>0)
         return response()->json($status);
         else
           return response()->json(array('err'=>['code' => '400000', 'message' => "status messge not found",'link' => 'http://some.url/docs']));
      }

       else {
            $status  = Status::find($id);
            if($status)
             return response()->json($status);
             else
               return response()->json(array('err'=>['code' => '400000', 'message' => "status messge not found",'link' => 'http://some.url/docs']));
          }


    }

    /**
    * Save a message status
    *
    * @param  request $request
    * request not required email but is required status message
    * @return Response
    */

    public function createStatus(Request $request){
      /* Use validator class and valid a correct request */
      $validation = Validator::make(Request::all(),[
          'status' => 'required|max:120',
          'email' => 'email'
      ]);

       if($validation->fails()){
           /* in case exist errors, show a personal custom message */
           $errors = $validation->errors();
           $errorEmail=$errors->first('email');
           $errorStatus=$errors->first('status');

           if($errorEmail){
             return response()->json(array('err'=>['code' => '400003', 'message' => $errorEmail,'link' => 'http://some.url/docs']));
           }

            if($errorStatus){
               return response()->json(array('err'=>['code' => '100', 'message' => $errorStatus,'link' => 'http://some.url/docs']));
           }

        }

        else {
              try {

                $status = new Status;

                if(!Request::get('email'))
                  $status->email      	= 'annonymus';
                else
                  $status->email      	= Request::get('email');

                  $status->status      	= Request::get('status');
                  $status->created_at		=	Carbon::now();
                  $status->save();
                  return response()->json(array('success'=>true));
                }
                 catch (Exception $e) {
                   Log::info("Error to save status error was:"+$e);
                   return response()->json(array('err'=>$e));
                }

              }
    }
    /**
    * Delete a message status
    * @param  integer $id
    * @return Response
    */

    public function deleteStatus($id){

      if (!ctype_digit($id)) {
           Log::error("Id not integer");
           return response()->json(array('err'=>['code' => '50001', 'message' => "id must be a integer number",'link' => 'http://some.url/docs']));
      }

      else {
        $status  = Status::find($id);
        if($status){
          $status->delete();
          Log::info("status with id "+$id+"was deleted");
          return response()->json(array('deleted'=>true));
        }

         else {
           return response()->json(array('err'=>['code' => '400000', 'message' => "status messge not found",'link' => 'http://some.url/docs']));
         }

      }

    }


}
