<?php

    class Home extends Controller
    {
        public function index ($name = '')
        {
            $user = $this->model('User');
            $user->name = $name;

            $this->view('home/index', [name => $user->name]);
            // echo $user->name;
            // echo "Home/Index " . $name ;
        }

        public function test ()
        {
            echo "Ok from test controller";
        }
    }