<?php

namespace App\Http\Controllers;

use App\Models\Visitors;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function counciling()
    {
        return view('application.counciling.counciling');
    }

    public function visitor()
    {
        return view('application.visitor.visitor-list');
    }

    public function visitorForm()
    {
        return view('application.visitor.visitor-form');
    }

    public function updateVisitor($id)
    {
        return view('application.visitor.update-visitor', compact('id'));
    }

}
