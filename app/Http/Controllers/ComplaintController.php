<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Complaint;
use Gate;
use Mail;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function form($id)
    {
        //
        $data=DB::table('users')
             ->where('users.id','=',$id)
             ->get();

        return view('YourComplaint',compact('data'));
    }

    public function addcomplaint(request $request)
    {
        //
        $request->validate(
            ['user_email' => 'required|string|max:255|email',
            'complaint_about' =>'required|string|max:20',
            'complaint' =>'required|string|max:500',
            
            
            
           
        ],
        ['user_email.required'=> "Fill out this field",
        'complaint_about.required'=> "Fill out this field",
        'complaint.required'=> "Fill out this field",
        
        
        ]
    );
        
        $complaint = new Complaint;
        
        $complaint->user_email=$request->user_email;
        $complaint->user_id =$request->id;
        $complaint->complaint_about =$request->complaint_about;
        $complaint->complaint =$request->complaint;
        $complaint->save();

         return redirect()->back()->with('flash_message','Your Complaint is Added');

    }

    public function allcomplaints()
    {
        if(Gate::allows('isAdmin'))
        { 
        $data=DB::table('complaints')
            ->join('users','complaints.user_id','=','users.id')
            ->select('user_email','complaints.id as complaintid','complaint_about','user_id','complaint','state')
            ->get();

        return view('complaint.all',compact('data'));
        }
        else 
        {
            return view('403error');
        }
    }

    public function reviewComplaint($id)
    {
        if(Gate::allows('isAdmin'))
        { 
        $complaint=Complaint::where('id',$id)
                    ->update([
                            'state'=>1

                        ]);

                $user=Complaint::where('id',$id)
                    ->select('user_email')              
                    ->get();
            
                    Mail::send('received',['user'=>$user], function($message) use ($user){
                                $message->to($user[0]->user_email)
                                        ->subject('Evora - Complaint Reveiewing');
                    
                            $message->from('sahand.herath@gmail.com','Event Management System');
            
                        });

        return redirect()->back();
        }
        else 
        {
            return view('403error');
        }
    }

    public function SolveComplaint($id)
    {
        if(Gate::allows('isAdmin'))
        { 
        $complaint=Complaint::where('id',$id)
                    ->update([
                            'state'=>2

                        ]);
                        $user=Complaint::where('id',$id)
                        ->select('user_email')              
                        ->get();
                
                        Mail::send('solved',['user'=>$user], function($message) use ($user){
                                    $message->to($user[0]->user_email)
                                            ->subject('Evora - Complaint Solved');
                        
                                $message->from('sahand.herath@gmail.com','Event Management System');
                
                            });

        return redirect()->back();
        }
        else 
        {
            return view('403error');
        }
    }

    public function DeleteComplaint($id)
    {
        if(Gate::allows('isAdmin'))
        { 
        $complain=Complaint::where('id',$id)->delete();

        return redirect()->back();
        }
        else 
        {
            return view('403error');
        }

    }

    public function Hotelcomplaints()
    {
        if(Gate::allows('isAdmin'))
        { 
        $data=DB::table('complaints')
            ->join('users','complaints.user_id','=','users.id')
            ->where('category','=','Hall')
            ->select('user_email','complaints.id as complaintid','complaint_about','user_id','complaint','state')
            ->get();

        return view('complaint.Hotel',compact('data'));
        }
        else 
        {
            return view('403error');
        }
    }
    public function Photographycomplaints()
    {
        if(Gate::allows('isAdmin'))
        { 
        $data=DB::table('complaints')
            ->join('users','complaints.user_id','=','users.id')
            ->where('category','=','Photography')
            ->select('user_email','complaints.id as complaintid','complaint_about','user_id','complaint','state')
            ->get();

        return view('complaint.Photography',compact('data'));
        }
        else 
        {
            return view('403error');
        }
    }
    public function Saloncomplaints()
    {
        if(Gate::allows('isAdmin'))
        { 
        $data=DB::table('complaints')
            ->join('users','complaints.user_id','=','users.id')
            ->where('category','=','Bridel_Designers')
            ->select('user_email','complaints.id as complaintid','complaint_about','user_id','complaint','state')
            ->get();

        return view('complaint.Salon',compact('data'));
        }
        else 
        {
            return view('403error');
        }
    }
    public function DJcomplaints()
    {
        if(Gate::allows('isAdmin'))
        { 
        $data=DB::table('complaints')
            ->join('users','complaints.user_id','=','users.id')
            ->where('category','=','Music')
            ->select('user_email','complaints.id as complaintid','complaint_about','user_id','complaint','state')
            ->get();

        return view('complaint.Band',compact('data'));
        }
        else 
        {
            return view('403error');
        }
    }
    public function Cateringcomplaints()
    {
        if(Gate::allows('isAdmin'))
        { 
        $data=DB::table('complaints')
            ->join('users','complaints.user_id','=','users.id')
            ->where('category','=','Catering')
            ->select('user_email','complaints.id as complaintid','complaint_about','user_id','complaint','state')
            ->get();

        return view('complaint.Catering',compact('data'));
        }
        else 
        {
            return view('403error');
        }
    }
    public function Actorcomplaints()
    {
        if(Gate::allows('isAdmin'))
        { 
        $data=DB::table('complaints')
            ->join('users','complaints.user_id','=','users.id')
            ->where('category','=','Actors')
            ->select('user_email','complaints.id as complaintid','complaint_about','user_id','complaint','state')
            ->get();

        return view('complaint.Artist',compact('data'));
        }
        else 
        {
            return view('403error');
        }
    }
    public function Cakecomplaints()
    {
        if(Gate::allows('isAdmin'))
        { 
        $data=DB::table('complaints')
            ->join('users','complaints.user_id','=','users.id')
            ->where('category','=','Cake_Designers')
            ->select('user_email','complaints.id as complaintid','complaint_about','user_id','complaint','state')
            ->get();

        return view('complaint.Cake',compact('data'));
        }
        else 
        {
            return view('403error');
        }
    }
    public function Costumecomplaints()
    {
        if(Gate::allows('isAdmin'))
        { 
        $data=DB::table('complaints')
            ->join('users','complaints.user_id','=','users.id')
            ->where('category','=','Costume_Designers')
            ->select('user_email','complaints.id as complaintid','complaint_about','user_id','complaint','state')
            ->get();

        return view('complaint.Costume',compact('data'));
        }
        else 
        {
            return view('403error');
        }
    }
    public function Dancingcomplaints()
    {
        if(Gate::allows('isAdmin'))
        { 
        $data=DB::table('complaints')
            ->join('users','complaints.user_id','=','users.id')
            ->where('category','=','Dancing')
            ->select('user_email','complaints.id as complaintid','complaint_about','user_id','complaint','state')
            ->get();

        return view('complaint.Dancing',compact('data'));
        }
        else 
        {
            return view('403error');
        }
    }
    public function Decorationcomplaints()
    {
        if(Gate::allows('isAdmin'))
        { 
        $data=DB::table('complaints')
            ->join('users','complaints.user_id','=','users.id')
            ->where('category','=','Decoration')
            ->select('user_email','complaints.id as complaintid','complaint_about','user_id','complaint','state')
            ->get();

        return view('complaint.Decoration',compact('data'));
        }
        else 
        {
            return view('403error');
        }
    }
    public function Transportcomplaints()
    {
        if(Gate::allows('isAdmin'))
        { 
        $data=DB::table('complaints')
            ->join('users','complaints.user_id','=','users.id')
            ->where('category','=','Wedding_Transport')
            ->select('user_email','complaints.id as complaintid','complaint_about','user_id','complaint','state')
            ->get();

        return view('complaint.Transport',compact('data'));
        }
        else 
        {
            return view('403error');
        }
    }
    public function EventPlannercomplaints()
    {
        if(Gate::allows('isAdmin'))
        { 
        $data=DB::table('complaints')
            ->join('users','complaints.user_id','=','users.id')
            ->where('category','=','Event_Planners')
            ->select('user_email','complaints.id as complaintid','complaint_about','user_id','complaint','state')
            ->get();

        return view('complaint.Event',compact('data'));
        }
        else 
        {
            return view('403error');
        }
    }
    public function Poruwacomplaints()
    {
        if(Gate::allows('isAdmin'))
        { 
        $data=DB::table('complaints')
            ->join('users','complaints.user_id','=','users.id')
            ->where('category','=','Poruwa_Ceramony')
            ->select('user_email','complaints.id as complaintid','complaint_about','user_id','complaint','state')
            ->get();

        return view('complaint.Poruwa',compact('data'));
        }
        else 
        {
            return view('403error');
        }
    }
}
