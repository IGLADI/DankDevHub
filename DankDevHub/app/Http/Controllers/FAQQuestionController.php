<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQQuestion;
use App\Models\FAQCategory;

class FAQQuestionController extends Controller
{
    public function index()
    {
        $faqQuestions = FAQQuestion::all();
        return view('faq-questions.index', ['faqQuestions' => $faqQuestions]);
    }

    public function create()
    {
        $faqCategories = FAQCategory::all();
        return view('faq-questions.create', ['faqCategories' => $faqCategories]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'faq_category_id' => 'required',
            'question' => 'required|string',
        ]);

        if ($validatedData) {
            $faqQuestion = new FAQQuestion();
            $faqQuestion->f_a_q_category_id = $request->input('faq_category_id');
            $faqQuestion->question = $request->input('question');
            $faqQuestion->save();
        }
        return redirect()->route('faq.index')->with('success', 'FAQ question created successfully!');
    }

    public function edit(FAQQuestion $faqQuestion)
    {
        $faqCategories = FAQCategory::all();
        return view('faq-questions.edit', ['faqQuestion' => $faqQuestion, 'faqCategories' => $faqCategories]);
    }

    public function update(Request $request, FAQQuestion $faqQuestion)
    {
        $validatedData = $request->validate([
            'faq_category_id' => 'required',
            'question' => 'required|string',
        ]);
        $validatedData['f_a_q_category_id'] = $validatedData['faq_category_id'];

        $faqQuestion->update($validatedData);
        return redirect()->route('faq.index')->with('success', 'FAQ question updated successfully!');
    }

    public function destroy(FAQQuestion $faqQuestion)
    {
        $faqQuestion->delete();
        return redirect()->route('faq.index')->with('success', 'FAQ question deleted successfully!');
    }

    public function answer(Request $request, FaqQuestion $faq_question)
    {
        $request->validate([
            'answer' => 'required|string',
        ]);

        $faq_question->answer = $request->input('answer');
        $faq_question->save();

        return redirect()->back()->with('success', 'FAQ question answered successfully!');
    }

    public function promoteToFaq($id)
    {
        $faqQuestion = FaqQuestion::findOrFail($id);
        $faqQuestion->is_faq = true;
        $faqQuestion->save();

        return redirect()->route('faq.index')->with('success', 'Question pinned to FAQ.');
    }

    public function demoteFromFaq($id)
    {
        $faqQuestion = FaqQuestion::findOrFail($id);
        $faqQuestion->is_faq = false;
        $faqQuestion->save();

        return redirect()->route('faq.index')->with('success', 'Question unpinned from FAQ.');
    }
}
