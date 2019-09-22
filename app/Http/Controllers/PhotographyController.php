<?php

namespace App\Http\Controllers;
use App\User;
use App\Photography;
use App\Photography_event;
use Image;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use DB;



class PhotographyController extends Controller
{
	
	public function index()
    {    $level = DB::table('photographies')
                ->join('users','users.id','=','photographies.user_id')
                ->get();
      
       
       return view('Photography', compact('level'));
      
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

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
        $request->validate(
            ['Studio_Name' => 'required|string|max:255',
            'Address' => 'required|string|max:255',
            'ContactNo' =>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'Link' =>'required|string|max:255',
            'Description' =>'required|string|max:500',
            
            'Drone' => 'required|string|max:20',
            'Wedding_Photography' => 'required|string|max:20',
            'Preshoot_Vedio' => 'required|string|max:20',
            'Wedding_Vedio' => 'required|string|max:20',
            'Album_Making' => 'required|string|max:20',
            'Wedding_Card' => 'required|string|max:20',
            
            'main_pic'=> 'required|image|dimensions:min_width=300,min_height=100',
            'pic1' => 'required|image|dimensions:min_width=300,min_height=100',
            'pic2' => 'required|image|dimensions:min_width=300,min_height=100',
            'pic3' => 'required|image|dimensions:min_width=300,min_height=100',
            'pic4' => 'required|image|dimensions:min_width=300,min_height=100',
            'Wedding' => 'required|string|max:20',
            'Birthday' => 'required|string|max:20',
            'Competition' => 'required|string|max:20',
            'Professional_Events' => 'required|string|max:20',
            'Sports' => 'required|string|max:20',
            'Trips' => 'required|string|max:20',

        ],
        ['Studio_Name.required'=> "Fill out this field",
        'Address.required'=> "Fill out this field",
        'ContactNo.required'=> "Fill out this field",
        'Link.required'=> "Fill out this field",
        'Description.required'=> "Fill out this field",

        'Drone.required'=> "Fill out this field",
        'Wedding_Photography.required'=> "Fill out this field",
        'Preshoot_Vedio.required'=> "Fill out this field",
        'Wedding_Vedio.required'=> "Fill out this field",
        'Album_Making.required'=> "Fill out this field",
        'Wedding_Card.required'=>"Fill out this field",
        
        'main_pic.required'=> "Add a image here",
        'pic1.required'=> "Add a image here",
        'pic2.required'=> "Add a image here",
        'pic3.required' => "Add a image here",
        'pic4.required'=> "Add a image here",
        'Wedding.required'=> "Fill out this field",
        'Birthday.required'=> "Fill out this field",
        'Competition.required' => "Fill out this field",
        'Professional_Events.required'=> "Fill out this field",
        'Sports.required'=> "Fill out this field",
        'Trips.required' => "Fill out this field",
        
       

        ]
    );
        $photography = new Photography;
        $photography->Studio_Name=$request->Studio_Name;
        $photography->Address=$request->Address;
        $photography->ContactNo =$request->ContactNo;
        $photography->Link =$request->Link;
        $photography->Description =$request->Description;
        $photography->Drone =$request->Drone;
        $photography->Wedding_Photography =$request->Wedding_Photography;
        $photography->Preshoot_Vedio=$request->Preshoot_Vedio;
        $photography->Wedding_Vedio=$request->Wedding_Vedio;
        $photography->Album_Making=$request->Album_Making;
        $photography->Wedding_Card=$request->Wedding_Card;
        $photography->user_id = Auth::user()->id;
        
        if($request->hasFile('main_pic'))
          {
             $main_pic=$request->file('main_pic');
           
             $filename=time().'.'.$main_pic->getClientOriginalExtension();
             Image::make($main_pic)->resize(960,640)->save(public_path('/uploads/photography/'. $filename));

             
             $photography->main_pic=$filename;
             
         }

         if($request->hasFile('pic1'))
          {
             $pic1=$request->file('pic1');
           
             $filename=time().'.'.$pic1->getClientOriginalExtension();
             Image::make($pic1)->resize(960,640)->save(public_path('/uploads/photography/'. $filename));

             
             $photography->pic1=$filename;
             
         }

         if($request->hasFile('pic2'))
          {
             $pic2=$request->file('pic2');
           
             $filename=time().'.'.$pic2->getClientOriginalExtension();
             Image::make($pic2)->resize(960,640)->save(public_path('/uploads/photography/'. $filename));

             
             $photography->pic2=$filename;
             
         }

         if($request->hasFile('pic3'))
          {
             $pic3=$request->file('pic3');
           
             $filename=time().'.'.$pic3->getClientOriginalExtension();
             Image::make($pic3)->resize(960,640)->save(public_path('/uploads/photography/'. $filename));

             
             $photography->pic3=$filename;
             
         }

         if($request->hasFile('pic4'))
          {
             $pic4=$request->file('pic4');
           
             $filename=time().'.'.$pic4->getClientOriginalExtension();
             Image::make($pic4)->resize(960,640)->save(public_path('/uploads/photography/'. $filename));

             
             $photography->pic4=$filename;
             
         }
            $photography->save();


            $photography_event = new Photography_event;
            $photography_event->user_id = Auth::user()->id;
            $photography_event->Wedding=$request->Wedding;
            $photography_event->Get_togather =$request->Get_togather;
            $photography_event->Birthday =$request->Birthday;
            $photography_event->Competition =$request->Competition;
            $photography_event->Professional_Events =$request->Professional_Events;
            $photography_event->Sports =$request->Sports;
            $photography_event->Trips=$request->Trips;
            $photography_event->save();

            return view('home');


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

    public function viewProfile($id)
    {
        $data = DB::table('users')
                ->where('users.id','=',$id)
                ->join('photographies','users.id','=','photographies.user_id')
                ->join('photography_events','users.id','=','photography_events.user_id')
                ->get();

                return view('Photographyview',compact('data'));
    }

    public function wedding()
    {    $level = DB::table('photographies')
                ->join('users','users.id','=','photographies.user_id')
                ->join('photography_events','users.id','=','photography_events.user_id')
                ->where('photography_events.Wedding','=','Available')
                ->get();
      
       
       return view('Photography', compact('level'));
      
    }

    public function birthday()
    {    $level = DB::table('photographies')
                ->join('users','users.id','=','photographies.user_id')
                ->join('photography_events','users.id','=','photography_events.user_id')
                ->where('photography_events.Birthday','=','Available')
                ->get();
      
       
       return view('Photography', compact('level'));
      
    }

    public function party()
    {    $level = DB::table('photographies')
                ->join('users','users.id','=','photographies.user_id')
                ->join('photography_events','users.id','=','photography_events.user_id')
                ->where('photography_events.Get_togather','=','Available')
                ->get();
      
       
       return view('Photography', compact('level'));
      
    }

    public function prof()
    {    $level = DB::table('photographies')
                ->join('users','users.id','=','photographies.user_id')
                ->join('photography_events','users.id','=','photography_events.user_id')
                ->where('photography_events.Professional_Events','=','Available')
                ->get();
      
       
       return view('Photography', compact('level'));
      
    }

    public function sports()
    {    $level = DB::table('photographies')
                ->join('users','users.id','=','photographies.user_id')
                ->join('photography_events','users.id','=','photography_events.user_id')
                ->where('photography_events.Sports','=','Available')
                ->get();
      
       
       return view('Photography', compact('level'));
      
    }

    public function outside()
    {    $level = DB::table('photographies')
                ->join('users','users.id','=','photographies.user_id')
                ->join('photography_events','users.id','=','photography_events.user_id')
                ->where('photography_events.Trips','=','Available')
                ->get();
      
       
       return view('Photography', compact('level'));
      
    }

    public function profile()
    {   
        $id1 = Auth::id();
        $data = DB::table('photographies')
                ->join('users','users.id','=','photographies.user_id')
                ->join('photography_events','users.id','=','photography_events.user_id')
                ->where('users.id','=',$id1)
                ->select('users.id as userid','name','email','photographies.id as photographyid','Studio_Name', 'Address', 'ContactNo','Link','Description','Drone','Wedding_Photography','Preshoot_Vedio','Wedding_Vedio','Album_Making','Wedding_Card','main_pic','pic1','pic2','pic3','pic4','photography_events.id as eventid','Wedding', 'Get_togather','Birthday','Competition','Professional_Events','Sports','Trips')
                ->get();

                return view('PhotographyUserProfile',compact('data'));
    }

    public function InfoUpdate(Request $request, $userid, $photographyid)
    {
        //
        $request->validate(
            ['Studio_Name' => 'required|string|max:255',
            'Address' => 'required|string|max:255',
            'ContactNo' =>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'Link' =>'required|string|max:255',
            'Description' =>'required|string|max:500',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            
           
        ],
        ['Studio_Name.required'=> "Fill out this field",
        'Address.required'=> "Fill out this field",
        'ContactNo.required'=> "Fill out this field",
        'Link.required'=> "Fill out this field",
        'Description.required'=> "Fill out this field",
        'name.required'=> "Fill out this field",
        'email.required'=> "Fill out this field",
        
         ]
    );
        
        
        $photo = Photography::find($photographyid); 
        $photo ->Studio_Name=$request->Studio_Name;
        $photo ->Address=$request->Address;
        $photo ->Description =$request->Description;
        $photo ->ContactNo =$request->ContactNo;
        $photo ->Link =$request->Link;
        $photo ->update();

        $photo1 = User::find($userid); 
        $photo1 ->name=$request->name;
        $photo1 ->email=$request->email;
        $photo1 ->update();

        
        return redirect('/Profile');
        
    }
}
