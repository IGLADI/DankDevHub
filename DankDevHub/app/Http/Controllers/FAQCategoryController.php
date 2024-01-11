<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQCategory;

class FAQCategoryController extends Controller
{
    public function index()
    {
        $faqCategories = FAQCategory::with('questions')->get();
        return view('faq-categories.index', ['faqCategories' => $faqCategories]);
    }

    public function create()
    {
        return view('faq-categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        FAQCategory::create($validatedData);
        return redirect()->route('faq-categories.index')->with('success', 'FAQ category created successfully!');
    }

    public function edit(FAQCategory $faqCategory)
    {
        return view('faq-categories.edit', ['faqCategory' => $faqCategory]);
    }

    public function update(Request $request, FAQCategory $faqCategory)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $faqCategory->update($validatedData);
        return redirect()->route('faq-categories.index')->with('success', 'FAQ category updated successfully!');
    }

    public function delete(FAQCategory $faqCategory)
    {
        return view('faq-categories.delete', ['faqCategory' => $faqCategory]);
    }

    public function destroy(FAQCategory $faqCategory)
    {
        $faqCategory->delete();
        return redirect()->route('faq-categories.index')->with('success', 'FAQ category deleted successfully!');
    }

    public function show(FAQCategory $faqCategory)
    {
        $faqQuestions = $faqCategory->questions;
        return view('faq-categories.show', ['faqCategory' => $faqCategory, 'faqQuestions' => $faqQuestions]);
    }

    public function demoteFromFaq(Request $request, FAQCategory $faqCategory)
    {
        $faqCategory->is_faq = false;
        $faqCategory->save();
        return redirect()->route('faq-categories.index')->with('success', 'FAQ category demoted successfully!');
    }
}
