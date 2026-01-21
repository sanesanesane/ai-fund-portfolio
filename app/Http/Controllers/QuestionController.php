<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

class QuestionController extends Controller
{
    public function create(Request $request)
    {
        $userId = $request->session()->get('user_id');
        if (!$userId) {
            return redirect()->route('top');
        }

        // choicesがある前提（なければ with('choices') を外す）
        $questions = Question::with('choices')->orderBy('id')->get();

        return view('question.create', compact('questions'));
    }

    public function store(Request $request)
    {
        $userId = $request->session()->get('user_id');
        if (!$userId) {
            return redirect()->route('top');
        }

        // 形式：answers[question_id] = choice_id
        $validated = $request->validate([
            'answers' => ['required', 'array'],
            'answers.*' => ['required', 'integer', 'exists:choices,id'],
        ]);

        foreach ($validated['answers'] as $questionId => $choiceId) {
            Answer::updateOrCreate(
                ['user_id' => $userId, 'question_id' => (int)$questionId],
                ['choice_id' => (int)$choiceId]
            );
        }

        return redirect()->route('result.show');
    }
}
