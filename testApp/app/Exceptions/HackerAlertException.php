<?php

    namespace App\Exceptions;

    use Exception;
    use Log;
    use Illuminate\Database\Eloquent\ModelNotFoundException;
    use Illuminate\Foundation\Exceptions\Handler as Exception;

    class HackerAlertException extends Exception
    {
        public function report ()
        {
            Log::critical("hacker Tried to hack us today");
        }

        public function render ($request)
        {
            // $this->reportable(function (ModelNotFoundException $e){
            //     $errors = $e->getMessage();
            //     return response()->json(['error' => $errors, 'code' => 404], 404); 
            // });

            return response()->json([
                'message' => "Hacker you got no luck today"
            ]);
        }
    }