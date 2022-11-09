<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->has('name')) {

            $tag = Tag::where('name', 'LIKE', '%' . $request['name'] . '%')->paginate();

            return $tag;
        } // all user
        else {

            $tags = Tag::paginate();

            return $tags;
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StoreTagRequest $request)
    {
        $tag = User::create(["name" => $request['name']]);

        return response($tag, 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTagRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTagRequest $request)
    {

        if (auth()->user()->can('create', auth()->user())) {

            $tag = User::create(["name" => $request['name']]);

            return response($tag, 201);
        } else {
            return response(['message' => 'Forbidden'], 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return $tag;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTagRequest  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Tag $tag)
    {


        if (Gate::forUser(auth()->user())->allows("update",$tag)) {

            $tag->update($request->all());
            return $tag;

        } else {
            return response(['message' => 'Forbidden'], 403);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($tag)
    {

        if (Gate::forUser(auth()->user())->allows('delete', auth()->user())) {

            $t=Tag::find($tag);

            if($t){
                return $t->delete();

            }else{
                return response(['message' => 'NoFound'], 404);

            }



        } else {
            return response(['message' => 'Forbidden'], 403);
        }
    }
}
