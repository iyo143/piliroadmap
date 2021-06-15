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
        $departmentEmail = $validated['department'];
        $feedback = $validated['feedback'];
        $subject = $validated['subject'];
        $departmentName = $validated['department_name'];
        Mail::to($validated['department'])->send( new FeedbackMail($user_name, $email, $departmentEmail, $feedback, $subject, $departmentName));
        Feedback::create($validated);


        return redirect(route('homePage'));
    }
}
