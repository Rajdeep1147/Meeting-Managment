<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\Student;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::query()
            ->where('status', Post::DEACTIVE)
            ->whereHas('comments', function ($query) {
                $query->where('title', 'like', '%provid%')
                    ->groupBy('post_id');
            })->get();

        $response = PostResource::collection(
            $posts
        );

        return response()->json([
            'status' => 'success',
            'data' => $response,
            'meta' => [
                // 'total' => $total,
                // 'current' => (int) (request('page') ?? 1),
                // 'perPage' => $total_result_per_page
            ],
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //  $request=request('id');
        $responses = Post::find($request->id);

        return $responses;
        $responses->name = $request->name;
        $responses->email = $request->email;
        $responses->password = $request->password;
        $result = $responses->save();

        return $result;
        if ($result) {
            return ['result' => ' updated'];
        } else {
            return ['result' => 'not updated'];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function eluqu()
    {
        $posts = Post::whereDoesntHave('comments', function (Builder $query) {
            $query->where('title', 'like', 'code%');
        })->get();

        return $posts;

    }

    public function collectInfo()
    {
        // Filter Method
        //   return collect([1,2,3,4,5,[]])->filter(function($value){
        //         return $value;
        //   });

        // search Method

        // $names = collect(['Alex', 'John', 'Jason', 'Martyn', 'Hanlin']);

        // return $names->search('Martyn');

        // each method
        $student = Student::all();
        // return $student->each(function($student){

        // });

        // map method
        // return $student->map(function($student){
        //     if($student->status==4){
        //         $student->email_confirmed=1;
        //     }
        //     return $student;
        // });

        // min function in laravel

        // $collection = collect([
        //     ['name' => 'John', 'age' => 25],
        //     ['name' => 'Jane', 'age' => 30],
        //     ['name' => 'Bob', 'age' => 20]
        // ]);

        // $minAge = $collection->min('age');
        // return $minAge;

        //    max function in laravel

        // $collection = collect([
        //     ['name' => 'John', 'age' => 25],
        //     ['name' => 'Jane', 'age' => 30],
        //     ['name' => 'Bob', 'age' => 20]
        // ]);

        // $minAge = $collection->max('age');
        // return $minAge;

        //    Avg function in laravel
        $collection = collect([10, 20, 30, 44, 50]);

        return $collection->avg();
    }
}
