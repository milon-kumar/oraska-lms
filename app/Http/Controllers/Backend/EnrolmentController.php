<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Enrole;
use App\Models\Payment;
use Illuminate\Http\Request;

class EnrolmentController extends Controller
{
    public function enrole()
    {
        $enrols = Enrole::with(['user','payment','course'])->get();
        return view('backend.admin.pages.enrole.index',compact('enrols'));
    }

    public function enroleApprove($id)
    {
        $enrole = Enrole::findOrFail($id);
        $payment = Payment::findOrFail($enrole->payments_id);

        $enrole->update([
            'status'=>'approve'
        ]);

        $payment->update([
            'status'=>'approve',
        ]);

        toast('Course Approve Success... :)','success');
        return redirect()->route('admin.enrole.approve');
    }

    public function enroleDecline($id)
    {
        $enrole = Enrole::findOrFail($id);
        $payment = Payment::findOrFail($enrole->payments_id);

        $enrole->update([
            'status'=>'decline'
        ]);

        $payment->update([
            'status'=>'decline',
        ]);

        toast('Course Declined... :(','success');
        return redirect()->route('admin.enrole.approve');
    }
}
