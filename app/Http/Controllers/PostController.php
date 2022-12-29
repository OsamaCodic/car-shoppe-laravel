<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Post;
use carbon\carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form_title = 'Create Post';
        $form_action= url('/posts');
        $form_btn = 'Create';
        $form_btn_icon = 'fa fa-plus';
        $form_btn_class = 'btn-success';

        return view('posts.partials.form', compact(    
            'form_title',
            'form_action',
            'form_btn',
            'form_btn_icon',
            'form_btn_class'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file('filename')) //Upload Image
        {
            $image = $request->file('filename');
            $given_name = null;
            $name = is_null($given_name) ? uniqid() : $given_name . '-' . rand(1, 6000);
            $name = $name . '.' . $image->extension();
            \Storage::disk('public')->putFileAs('post_image', $image, $name);                
            $request->merge(['image' => $name]);
        }
        Post::updateOrCreate(['id'=>$request->post_id],$request->except('_token', 'post_id', 'filename'));

        $msg = @$request->post_id? 'New post updated successfully!': 'New post created successfully!';
        return response([
            'redirect_url' => url('/posts'),
            'status' => $msg
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $form_title = 'Edit Post';
        $form_action= url('/posts');
        $form_btn = 'Update';
        $form_btn_icon = 'fa fa-pencil';
        $form_btn_class = 'btn-warning';
        $post = Post::get()->where('id', $id)->first();
        return view('posts.partials.form', compact(    
            'form_title',
            'form_action',
            'form_btn',
            'form_btn_icon',
            'form_btn_class',
            'post'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id)->delete();
    }

    public function fakePosts(){
        $total = 3;
        if (@$_GET['total']) {
            $total = $_GET['total'];
        }
        $faker = Faker::create();
        foreach(range(1, $total) as $index) {
            DB::table('posts')->insert(
                array(
                    'details' => $faker->paragraph(1),
                    'image'  => 'testing.jpeg',
                    'privacy' => $faker->text($maxNbChars = 20),
                    'privacy' => 'testing.jpeg',
                    'created_at' => $faker->dateTimeBetween('+0 days', '+2 years'),
                    'updated_at' => $faker->dateTimeBetween('+1 week', '+1 month')
                ),
            );
        }

        echo $total . ' fake posts created in posts table';
    }
}
