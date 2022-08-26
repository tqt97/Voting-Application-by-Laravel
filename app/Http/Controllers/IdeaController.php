<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\Vote;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $ideas = Idea::with('user', 'category', 'status')
        //     ->addSelect([
        //         'voted_by_user' => Vote::select('id')
        //             ->where('user_id', auth()->id())
        //             ->whereColumn('idea_id', 'ideas.id')
        //     ])
        //     ->withCount('votes')
        //     ->latest()
        //     ->simplePaginate(Idea::PAGINATION_COUNT);

        // return view('idea.index', compact('ideas'));
        return view('idea.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Idea $idea)
    {
        $votesCount = $idea->votes->count();

        return view('idea.show', [
            'idea' => $idea,
            'votesCount' => $votesCount,
            'backUrl' => url()->previous() !== url()->full() && url()->previous() !== route('login')
                ? url()->previous()
                : route('ideas.index'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Idea $idea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Idea $idea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Idea $idea)
    {
        //
    }
}
