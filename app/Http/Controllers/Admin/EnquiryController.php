<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contactus;
// use App\Models\Subscriber;

class EnquiryController extends Controller
{
  public function enquiryList()
  {
     $details = Contactus::orderBy('updated_at', 'desc')->get();
     return view('admin.userenquiry.contactus', compact('details'));
  }

  public function removeEnquiry($id)
  {
    $data = Contactus::findorfail($id);
    $data->delete();
    return redirect()->back()->with('message', 'Contactus Deleted Successfully.');
  }

  public function subscriberList()
  {
    $details = Subscriber::orderBy('updated_at', 'desc')->get();
    return view('admin.userenquiry.subscriber', compact('details'));
  }

  public function removeSubscriber($id)
  {
    $data = Subscriber::findorfail($id);
    $data->delete();
    return redirect()->back()->with('message', 'Subscriber Deleted Successfully.');
  }
}
