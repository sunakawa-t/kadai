<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.8
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2016 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
use Fuel\Core\Controller;
use Fuel\Core\DB;
use Fuel\Core\Input;
use Fuel\Core\Presenter;
use Fuel\Core\Response;
use Fuel\Core\View;

class Controller_Welcome extends Controller
{
	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		return Response::forge(View::forge('welcome/index'));
	}

	public function action_kadai()
	{
		$name = Input::POST("name");
		$age = Input::POST("age");
		if ($name != "" && empty($age)){
	       $query['test'] = DB::select()->from('admin')->where('name', 'like',"%"."$name"."%")->execute();
		}else if ($age != "" && empty($name)) {
	       $query['test'] = DB::select()->from('admin')->where('age','like',"%".$age."%")->execute();
		}else if ($name != "" && $age != "") {
		    $query['test'] = DB::select()->from('admin')->where('name', 'like',"%"."$name"."%")->and_where('age','like',"%".$age."%")->execute();
		}else{
		    $query['test'] = DB::select()->from('admin')->execute();
		}
		return Response::forge(View::forge('welcome/kadai',$query));
	}

	public function action_update(){
	    $id = Input::POST("id");
	    $name = Input::POST("nameu");
	    $age = Input::POST("ageu");
	    $registry_datetime = Input::POST("registry_datetime");
	    if(isset($_POST["insert"])){
    	    if ($id != ""  && $name != "" && $age != "" && $registry_datetime != ""){
    	        DB::INSERT('admin')->set(array('id'=>"$id",'name'=>"$name",'age'=>"$age",'registry_datetime'=>"$registry_datetime"))->execute();
    	        $query['test'] = DB::select()->from('admin')->execute();
    	    }else{
    	        $query['test'] = DB::select()->from('admin')->execute();
    	    }
    	    return Response::forge(View::forge('welcome/kadai',$query));
	    }

	    if(isset($_POST["update"])){
	       $query["test"] = $this->update($id,$name,$age,$registry_datetime);
	       return Response::forge(View::forge('welcome/kadai',$query));
	    }

	    if(isset($_POST["delite"])){
	        $query["test"] = $this->delete($id,$name,$age,$registry_datetime);
    	    return Response::forge(View::forge('welcome/kadai',$query));
	    }
	}
	public function update($id,$name,$age,$registry_datetime){
        if($id != ""  && $name != "" && empty("$age") && empty("$registry_datetime")){
            DB::UPDATE('admin')->set(array('name'=>"$name"))->WHERE ('id',"$id")->execute();
            $query['test'] = DB::select()->from('admin')->execute();
        }else if($id != ""  && $age != ""){
            DB::UPDATE('admin')->set(array('age'=>"$age"))->WHERE ('id',"$id")->execute();
            $query['test'] = DB::select()->from('admin')->execute();
        }else if($id != ""  && $registry_datetime != ""){
            DB::UPDATE('admin')->set(array('registry_datetime'=>"$registry_datetime"))->WHERE ('id',"$id")->execute();
            $query['test'] = DB::select()->from('admin')->execute();
        }else if($id != ""  && $registry_datetime != ""){
            DB::UPDATE('admin')->set(array('registry_datetime'=>"$registry_datetime"))->WHERE ('id',"$id")->execute();
            $query['test'] = DB::select()->from('admin')->execute();
        }else{
            $query['test'] = DB::select()->from('admin')->execute();
        }
        return $query['test'];
    }

    public function delete($id,$name,$age,$registry_datetime){
        if($id != ""){
            DB::DELETE('admin')->WHERE ('id',"$id")->execute();
            $query['test'] = DB::select()->from('admin')->execute();
        }else{
            $query['test'] = DB::select()->from('admin')->execute();
        }
        return $query['test'];
    }

	/**
	 * A typical "Hello, Bob!" type example.  This uses a Presenter to
	 * show how to use them.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_hello()
	{
		return Response::forge(Presenter::forge('welcome/hello'));
	}

	/**
	 * The 404 action for the application.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		return Response::forge(Presenter::forge('welcome/404'), 404);
	}
}
