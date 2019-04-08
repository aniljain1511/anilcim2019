<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gate;

class BlogController extends Controller
{

	protected $blog;

	private $form_rules = [
        'title' => 'required|string|max:255',
        'description'=>'required',
        'status' => 'required|integer'
    ];


	public function __construct()
    {

    	$this->blog = new Blog();
  
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    	$searchtext = $request->searchtext;

    	$blogs = $this->blog->getAllblogs($request);

		return view('home', [
            'blogs' => $blogs,
            'searchtext'=>$searchtext
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

		return view('create',[
        ]);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
        $this->validate($request, $this->form_rules);

		$data = Array();

		$data['title']= $request->title;
		$data['description']= $request->description;
		$data['user_id']= $request->user()->id;
		$data['status']= $request->status;
		$data['created_at']= date("Y-m-d H:i:s");


		$blogId = $this->blog->insertData($data);

		$request->session()->flash('status', 'Blog was successful!');

        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog= $this->blog->getblogById($id);

        return view('show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$blog= $this->blog->getblogById($id);

        if (Gate::denies('checkrole',$blog->user_id)) {
			return view('403');
        }

        return view('edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
    	$blog= $this->blog->getblogById($id);

		if (Gate::denies('checkrole',$blog->user_id)) {
			return view('403');
        }

		$this->validate($request, $this->form_rules);

		$data = Array();

		$data['title']= $request->title;
		$data['description']= $request->description;
		$data['status']= $request->status;
		$data['updated_at']= date("Y-m-d H:i:s");
		

		$this->blog->updateData($data, $id);

		$request->session()->flash('status', 'Blog updated successful!');
	
		return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
    	$blog= $this->blog->getblogById($id);

        if (Gate::denies('checkrole',$blog->user_id)) {
			return view('403');
        }

		$data = Array();

		$data['deleted_status']= 1;
		$data['deleted_by']= $request->user()->id;
		$data['deleted_at']= date("Y-m-d H:i:s");

		$this->blog->deleteBlog($data, $id);

		$request->session()->flash('status', 'Blog deleted successful!');

		return redirect('home');
    }
}
