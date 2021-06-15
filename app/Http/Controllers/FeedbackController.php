<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Mail\FeedbackMail;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function store(FeedbackRequest $request){
        $validated = $request->validated();
        $user_name = $validated['name'];
        $email = $validated['email'];
        $department = 'department';
        $feedback = $validated['feedback'];
        $subject = $validated['subject'];
        Mail::to($validated['department'])->send( new FeedbackMail($user_name, $email, $department, $feedback, $subject));
        Feedback::create($validated);


        return redirect(route('homePage'));
    }
}
