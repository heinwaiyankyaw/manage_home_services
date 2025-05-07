<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\Service;

class ComplaintController extends Controller
{
    public function providerComplaintList()
    {
        $servicesIds = Service::where('user_id', auth()->user()->id)->pluck('id');
        $complaints  = Complaint::whereIn('service_id', $servicesIds)->get();
        return view('provider.pages.complaint.index', compact('complaints'));
    }

    public function providerComplaintStatus($id)
    {
        $complaint = Complaint::findOrFail($id);

        if ($complaint->status == 'pending') {
            $complaint->status = 'resolved';
        }
        $complaint->update();
        return back()->with('success', 'Complaint has been made.');
    }

    public function providerComplaintReject($id)
    {
        $complaint = Complaint::findOrFail($id);

        $complaint->status = 'closed';

        $complaint->update();

        return back()->with('success', 'Complaint has been reject');
    }
}
