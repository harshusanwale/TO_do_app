<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
      //add task
      public function addTask(Request $request)
      {
        
        
        $validator = Validator::make($request->all(), [ 
            'task' => 'required|',
            'user_id' => 'required',
           
        ]);
        if ($validator->fails()) { 
            return response()->json(['status' => 0,'error'=>$validator->errors()], 422);            
        }
        $input = $request->all(); 
       
        $task = Task::create($input); 

        $data = array(
            'id' => $task->id,
            'user_id' => $task->user_id,
            'task' => $task->task,
            'status' => 0,
            'created_at' => date('d-m-Y H:i:s A',strtotime($task->created_at)),
            'updated_at' => date('d-m-Y H:i:s A',strtotime($task->updated_at))
        );
       
          $result = $data;
          $response = [
              'status'  => 1,
              'message'   => 'successfully created a task',
              'success'   => $result
          ];
          return response()->json($response, 200);
      }

        //status change
        public function statusChange(Request $request)
        {
                   
          $validator = Validator::make($request->all(), [ 
              'task_id' => 'required',
              'status' => 'required',
             
          ]);
          if ($validator->fails()) { 
              return response()->json(['status' => 0,'error'=>$validator->errors()], 422);            
          }
          $input = $request->all(); 

          $status = $request->status;
          if($status == 'pending'){
            $status = 0;
          }else{
            $status = 1 ;
          }
          
         
          $task = Task::where('id', $request->task_id)
          ->update([
              'status' => $status,
           ]); 
         
          if($task == true){
            $response = [
                'status'  => 1,
                'message'   => 'status change successfully ',

            ];
            return response()->json($response, 200);
        }else{
            $response = [
                'status'  => 0,
                'message'   => 'status  not change  ',

            ];
            return response()->json($response, 422);
        }
        }
}
