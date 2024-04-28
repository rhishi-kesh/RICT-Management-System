<?php

namespace App\Http\Controllers;

use App\Models\Visitors;
use Illuminate\Http\Request;

class VisitorController extends Controller
{       
    // those are Views/application

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
        $id = $id;
        return view('application.visitor.update-visitor',compact('id'));
    }

}
