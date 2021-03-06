<?php

namespace App\Http\Controllers;


use App\Http\Resources\QuestionResource;
use App\Question;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['index','show']]);
    }

    public function index()
    {
         return QuestionResource::collection(Question::latest()->get());
    }

    public function store(Request $request)
    {
         $request['slug'] = str_slug($request->title);
         $question = auth()->user()->questions()->create($request->all());
         return response(new QuestionResource($question), Response::HTTP_CREATED);
    }

    public function show(Question $question)
    {
         return new QuestionResource($question);
    }

    public function update(Request $request, Question $question)
    {
         $question->update($request->all());
         return response('Updated', Response::HTTP_ACCEPTED);
    }

    public function destroy(Question $question)
    {
         $question->delete();
         return response(null, Response::HTTP_NO_CONTENT);
    }
}
