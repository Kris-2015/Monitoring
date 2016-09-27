<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TemplateController extends Controller
{
   /**
    * Function to return the admin view
    * 
    * @param: Request 
    * @return: view
    */
    public function index()
    {
        $data['tasks'] = array(

            array(
                'name' => 'Design New Dashboard',
                'progress' => '87',
                'color' => 'danger'
            ),
            array(
                'name' => 'Create New Home Page',
                'progress' => '76', 
                'color' => 'warning'
            ),
            array(
                'name' => 'Some Other tasks',
                'progress' => '32',
                'color' => 'success'
            ),
            array(
                'name' => 'Start Building Website',
                'progress' => '60', 
                'color' => 'info'
            ),
            array(
                'name' => 'Develop an Awesome Algorithm',
                'progress' => '10',
                'color' => 'success'
            )
        );

        return view('adminlte/page')->with($data);
    } 

   /**
    * Function to redirect to sample page
    *
    * @param: Request
    * @return: return 
    */
   public function sample(Request $request)
   {
        return view('adminlte/page2');
   }
}
