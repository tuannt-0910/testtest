<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

class BackupController extends Controller
{
    public function index()
    {
        $files = Storage::files('Laravel');

        return view('Admin.backup.list', compact('files'));
    }
}
