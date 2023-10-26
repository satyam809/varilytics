<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class FavouriteEventController extends Controller
{
    public function index(Request $request)
    {
        // Check for search input
        // if ($request->search) {
        //     //print_r($request->search->value) ;
        //     $product = DB::table('spaceseat_favourite')->where('event', 'like', '%' . $request->search . '%');
        // }
        // else{
        //     $product = DB::table('spaceseat_favourite');
        // }
        $product = DB::table('spaceseat_favourite');
        //return $product;
        return response()->json(['success' => 'true', 'data' => $product->get(), 'total' => $product->count()]);
        
    }

    public function upcomingevent(Request $request)
    {
        // return $request->event_name;
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://spaceseats.io/api/ticket/get',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response00 = curl_exec($curl);

        curl_close($curl);
        //echo $response00;
        $response00 = json_decode($response00, true);
        //echo $response00['total'];
        //die;
        //$main_url = 'https://spaceseats.io/api/ticket/get?start=0&length='.$response00['total'];
        $main_url = 'https://spaceseats.io/api/ticket/get?start=0&length=8000';
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $main_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response0 = curl_exec($curl);

        curl_close($curl);
        //echo $response0;
        $response0 = json_decode($response0, true);
        //print_r($response0['data']);
        
        //die;


        for($j = 0; $j< count($response0['data']); $j++)
        {
            //echo $response0['data'][$j]['event'].", <br> ";
            $urlreq = str_replace(' ','%20',$response0['data'][$j]['event']);
            // $urlreq = str_replace(' ','%20',$request->event_name);
            $url = 'https://app.ticketmaster.com/discovery/v2/events?apikey=C1zETHjzG9nLxALw3JlbfE4kfWx7TVXW&keyword='.$urlreq;

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            // echo $response;

            $response = json_decode($response, true);
            //var_dump($response);    
            if(isset($response['_embedded']))
            {
                if(isset($response['_embedded']['events'][0]['_embedded']['attractions']))
                {
                    $length = count($response['_embedded']['events'][0]['_embedded']['attractions']);
                
                    for($i = 0; $i < $length; $i++)
                    {
                        //echo $response['_embedded']['events'][0]['_embedded']['attractions'][$i]['name'];
                        $urlreq1 = str_replace(' ','%20',$response['_embedded']['events'][0]['_embedded']['attractions'][$i]['name']);
                        $url1 = 'https://app.ticketmaster.com/discovery/v2/attractions.json?apikey=C1zETHjzG9nLxALw3JlbfE4kfWx7TVXW&keyword='.$urlreq1;


                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                        CURLOPT_URL => $url1,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'GET',
                        ));

                        $response1 = curl_exec($curl);

                        curl_close($curl);
                        $response1 = json_decode($response1, true);
                        //print_r($response1);
                        if(isset($response1['_embedded']))
                        {
                            $total = $response1['_embedded']['attractions'][0]['upcomingEvents']['_total'];
                            if(isset($response1['_embedded']['attractions'][0]['name']))
                            {
                                $artist_name = $response1['_embedded']['attractions'][0]['name'];
                            }
                            else
                            {
                                $artist_name = '';
                            }
                            if(isset($response1['_embedded']['attractions'][0]['upcomingEvents']['_total']))
                            {
                                $_total = $response1['_embedded']['attractions'][0]['upcomingEvents']['_total'];
                            }
                            else
                            {
                                $_total = '';
                            }
                            if(isset($response1['_embedded']['attractions'][0]['upcomingEvents']['tmr']))
                            {
                                $tmr = $response1['_embedded']['attractions'][0]['upcomingEvents']['tmr'];
                            }
                            else
                            {
                                $tmr = '';
                            }
                            if(isset($response1['_embedded']['attractions'][0]['upcomingEvents']['ticketweb']))
                            {
                                $ticketweb = $response1['_embedded']['attractions'][0]['upcomingEvents']['ticketweb'];
                            }
                            else
                            {
                                $ticketweb = '';
                            }
                            if(isset($response1['_embedded']['attractions'][0]['upcomingEvents']['mfx-nl']))
                            {
                                $mfx_nl = $response1['_embedded']['attractions'][0]['upcomingEvents']['mfx-nl'];
                            }
                            else
                            {
                                $mfx_nl = '';
                            }
                            if(isset($response1['_embedded']['attractions'][0]['upcomingEvents']['ticketmaster']))
                            {
                                $ticketmaster = $response1['_embedded']['attractions'][0]['upcomingEvents']['ticketmaster'];
                            }
                            else
                            {
                                $ticketmaster = '';
                            }
                            if(isset($response1['_embedded']['attractions'][0]['upcomingEvents']['_filtered']))
                            {
                                $_filtered = $response1['_embedded']['attractions'][0]['upcomingEvents']['_filtered'];
                            }
                            else
                            {
                                $_filtered = '';
                            }
                            // echo $artist_name;
                            // echo $_total;
                            // echo $tmr;
                            // echo $ticketweb;
                            // echo $mfx_nl;
                            // echo $ticketmaster;
                            // echo $_filtered;

                            $rows = DB::table('artist_upcoming_events')->where('artist_name',$artist_name);
                            if($rows->count() > 0)
                            {
                                $row = $rows->first();
                                //echo "<pre>"; print_r($row->total_event);
                                if(($row->total_event != $_total) || ($row->tmr != $tmr) || ($row->ticketweb != $ticketweb) || ($row->mfx_nl != $mfx_nl) || ($row->ticket_master != $ticketmaster) || ($row->filtered != $_filtered))
                                {
                                    $data = [
                                        'total_event' => $_total,
                                        'tmr' => $tmr,
                                        'ticketweb' => $ticketweb,
                                        'mfx_nl' => $mfx_nl,
                                        'ticket_master' => $ticketmaster,
                                        'filtered' => $_filtered
                                    ];
                                    DB::table('artist_upcoming_events')->where('id', $row->id)->update($data);
                                }
                               
                            }
                            else
                            {
                                //echo "Hello";
                                $data = [
                                    'artist_name' => $artist_name,
                                    'total_event' => $_total,
                                    'tmr' => $tmr,
                                    'ticketweb' => $ticketweb,
                                    'mfx_nl' => $mfx_nl,
                                    'ticket_master' => $ticketmaster,
                                    'filtered' => $_filtered
                                ];
                    
                                DB::table('artist_upcoming_events')->insert($data);
                            }
                            //die;

                            // if($total >= 20)
                            // {
                            //     $res = $response1['_embedded']['attractions'][0]['upcomingEvents'];
                            //     $res = json_encode($res, true);
                            //     $res = str_replace('{','',$res);
                            //     $res = str_replace('}','',$res);
                            //     $res = str_replace('"','',$res);
                            //     $res = str_replace('_','',$res);
                            //     $res = str_replace(',',', ',$res);

                            //     $res = "Artist Name:  ".$response1['_embedded']['attractions'][0]['name'].",
                            //     Number of events: ".$res;


                                
                            //     $curl = curl_init();

                            //     curl_setopt_array($curl, array(
                            //     CURLOPT_URL => 'https://discord.com/api/webhooks/1080035938501140572/_FNUxkabgHdp-PhFNokG-_SDFnumUeM-bqlpY0YP8eQaLenNRDx1tiQ3wFzspRaqqFgn',
                            //     CURLOPT_RETURNTRANSFER => true,
                            //     CURLOPT_ENCODING => '',
                            //     CURLOPT_MAXREDIRS => 10,
                            //     CURLOPT_TIMEOUT => 0,
                            //     CURLOPT_FOLLOWLOCATION => true,
                            //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            //     CURLOPT_CUSTOMREQUEST => 'POST',
                            //     CURLOPT_POSTFIELDS => array('content' => $res),
                            //     CURLOPT_HTTPHEADER => array(
                            //         'Cookie: __cfruid=49fcfb091298c9e08e94797d7adbcbef88da226a-1677571388; __dcfduid=56376172b73e11ed96b15626871a837e; __sdcfduid=56376172b73e11ed96b15626871a837e555fbacc2f40267dec99ae43186ec5cfd471705f132b20c5561d84c52f78adb3'
                            //     ),
                            //     ));

                            //     $response2 = curl_exec($curl);

                            //     curl_close($curl);
                            //     echo $response2;
                            // }
                        }
                        
                    }
                }
            }

        }





        
         //var_dump($response);
        //print($response);

        
    }
    public function monitor()
    {
        $data = DB::table('artist_upcoming_events')->orderBy('total_event','DESC');
        //return $product;
        return response()->json(['success' => 'true', 'data' => $data->get(), 'total' => $data->count()]);
    }

    public function venname(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");

        $urlreq = str_replace(' ','%20',$request->name);
        $url = 'https://app.ticketmaster.com/discovery/v2/venues?apikey=C1zETHjzG9nLxALw3JlbfE4kfWx7TVXW&keyword='.$urlreq;
     

        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response, true);

        // return $response['_embedded']['venues'][0]['upcomingEvents'];

        return $response;
        
    }

    public function google(Request $request)
    {
        //return $request->name; 
        $urlreq = str_replace(' ','%20',$request->name);
        $url = 'https://in.search.yahoo.com/search?fr=mcafee&type=E211IN885G91653&p='.$urlreq;
     
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Cookie: MUID=30499B6F8489616828E789AF851260E6; SRCHD=AF=SNAPST; SRCHHPGUSR=SRCHLANG=en; SRCHUID=V=2&GUID=2B65710996084A909E1FBB85F675828C&dmnchg=1; SRCHUSR=DOB=20230222; SUID=M; _EDGE_S=F=1&SID=19448F80FCF16AD51FC19D40FD6A6B47; _EDGE_V=1; _SS=SID=19448F80FCF16AD51FC19D40FD6A6B47; MUIDB=30499B6F8489616828E789AF851260E6'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response;
        $count = substr_count($response, "apacity");
        //echo count_string($response, "Capacity");
        //echo substr_count($response, "apacity");
        for($i = 1; $i <= $count; $i++)
        {
            //echo $i;
            $response = substr($response,strpos($response, "apacity")+7,strlen($response));
        }
        //echo $response;
        $response = substr($response,0,strpos($response, "</li>"));
        $response = strip_tags($response);
        $response = str_replace(':','',$response);
        $response = str_replace(' ','',$response);
        //$num = str_replace(',','',$response);
        //echo $num;
        // echo (int) $response;
        if((int) $response)
        {
            echo $response;
        }
        else
        {
            echo "General Admission";
        }
        

                
    }

    public function showmore(Request $request)
    {
        $urlreq = str_replace(' ','%20',$request->event_name);
        $url = 'https://app.ticketmaster.com/discovery/v2/events.json?keyword='.$urlreq.'&apikey=C1zETHjzG9nLxALw3JlbfE4kfWx7TVXW';
                
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // $response = json_decode($response, true);
        return $response;
    }




    public function youtube(Request $request)
    {
        $data = [];
        // $urlreq = str_replace(' ','%20',$request->name);
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://youtube-search-results.p.rapidapi.com/youtube-search/?q=".$request->name,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: youtube-search-results.p.rapidapi.com",
                "X-RapidAPI-Key: 91f9afdd3amshdc101e4f83325edp176061jsncbc4efe04ae4"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);


        $response = json_decode($response, true);
       
        $response = $response['items'];

        foreach($response as $val)
        {
            // return $val['views'];
            if(isset($val['id']))
            {

             $id = $val['id'];
             $arr[$id] = $val['views'];
            }
        }

        asort($arr); 
  
        

        //return $arr;
        $length = count($arr);
        // for($i = $length; $i > 1; $i--)
        // {
        //     return $arr[$i];
        // }
        foreach($arr as $key => $arrs)
        {
            $mmykey = $key;
            foreach($response as $val)
            {
                $type = $val['type'];
                if($type == 'video')
                {
                    //$id = $val['id'];
                    if($val['id'] == $mmykey)
                    {
                        array_push($data,$val);
                    }
                }
                
            }
        }
        return $data;
    }










    public function facebookapi(Request $request)
    {
        header('Access-Control-Allow-Origin: https://open.spotify.com');
       
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://www.facebook.com/events/search/?q=Watershed",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Cookie: fr=0I33yVcv1r6iB75VX..Bj7IxD.HW.AAA.0.0.Bj7JBb.AWXtax_UqoA'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        echo $response;
    }

    public function billboard(Request $request)
    {
        $q = str_replace(" ","-",$_GET['q']);
        $q = strtolower($q);
        $curl = curl_init();

        curl_setopt_array($curl, array(
          //CURLOPT_URL => "https://www.billboard.com/results/?q=".$q,
          CURLOPT_URL => "https://www.billboard.com/artist/".$q,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Cookie: fr=0I33yVcv1r6iB75VX..Bj7IxD.HW.AAA.0.0.Bj7JBb.AWXtax_UqoA'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        echo $response;
    }

    public function trend(Request $request)
    {
        $event = $request->event;
        $event = str_replace(' ', '%20', $event);


        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://serpapi.com/search?engine=google_trends&q='.$event.'&api_key=be5a8fa556ca550f3b3dbd819a8521b0f10bd14c9bdc9298679243fde0075462',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;

        $response = json_decode($response, true);

        // $response = json_decode($response->interest_over_time);


        // // print_r($response['timeline_data']);

        // // print_r($response->timeline_data);

        // var_dump($response)


        return $response;
        
    }





    

    public function notes(Request $request)
    {
        // return $request->start;
        $data = DB::table('spaceseat_calendar')->where('event_name','like','%'.$request->title.'%')->whereDate('date',date('Y/m/d',strtotime($request->start)))->pluck('id');
        if($data[0])
        {
            DB::table('spaceseat_calendar')->where('id',$data[0])->update(['notes' => $request->notes]);
        }
        print_r("Done");
    }


    
    public function create(Request $request)
    {
        // header('Content-Type: application/json');
        $url = 'https://app.ticketmaster.com/discovery/v2/events.json?apikey=LJmhFDOl5qTRvpDhR52BWgLY5nB7G6oH&keyword='.$request->event;
        $curl = curl_init();

        curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response);

        
        $value = DB::table('spaceseat_favourite')->where('event_id', $request->eventid)->count();
        if ($value != 0) {
            return response()->json(['success' => 'true', 'message' => 'Event Add to your favourite list.']);
        } else {
            $data = [
                'user_id' => $request->userid,
                'event_id' => $request->eventid,
                'venueid' => $request->venueid,
                'venuename' => $request->venuename,
                'city' => $request->city,
                'state' => $request->state,
                'event' => $request->event,
                'performerid' => $request->performerid,
                'category' => $request->category,
                'availabletixs' => $request->availabletixs,
                'totalvalue' => $request->totalvalue,
                'avgvalue' => $request->avgvalue,
                'lasteventdate' => $request->lasteventdate,
                'dates' => $request->dates,
                'tixsoldindaterange' => $request->tixsoldindaterange,
                'avgsaleprice' => $request->avgsaleprice,
                'createdate' => $request->createdate,
                'isactive' => $request->isactive
            ];

            DB::table('spaceseat_favourite')->insert($data);

            $data0 = [
                
                'event' => $request->event,
                'dates' => date('Y/m/d H:i:s', strtotime($request->lasteventdate)),
                'type' => "favourite"
            ];

            for($i=0; $i<count($response->_embedded->events[0]->sales->presales); $i++)
            {

                $data1 = [
                    'event_name' => $request->event,
                    'date' => date('Y/m/d H:i:s', strtotime($response->_embedded->events[0]->sales->presales[$i]->startDateTime)),
                    'sale_type' => $response->_embedded->events[0]->sales->presales[$i]->name,
                    'type' => "Presale Start Date"
                ];
        
                $data2 = [
                    'event_name' => $request->event,
                    'date' => date('Y/m/d H:i:s', strtotime($response->_embedded->events[0]->sales->presales[$i]->endDateTime)),
                    'sale_type' => $response->_embedded->events[0]->sales->presales[$i]->name,
                    'type' => "Presale End Date"
                ];


                DB::table('spaceseat_calendar')->insert($data1);
    
                DB::table('spaceseat_calendar')->insert($data2);


            }

            

            DB::table('spaceseat_calendar')->insert($data0);
    
            
            
            return response()->json(['success' => 'true', 'message' => 'Event Add to your favourite list.']);
        }
    }



    public function event(Request $request)
    {
        
        $product = DB::table('spaceseat_favourite')->select('event_id')->get();
       
        return response()->json(['success' => 'true', 'data' => $product]);
        
    }



    public function delete(Request $request)
    {
        $product = DB::table('spaceseat_favourite')->where('id', $request->id)->delete();
        //return $product;
        return response()->json(['success' => 'true', 'message' => 'Event Remove to your favourite list.']);
    }



    public function facebook(Request $request)
    {
        
        $product = DB::table('spaceseat_facebook')->select('event_id')->get();
        //return $product;
        return response()->json(['success' => 'true', 'data' => $product]);
        
    }

    public function calendar(Request $request)
    {
        // Check for search input
        // if ($request->search) {
        //     //print_r($request->search->value) ;
        //     $product = DB::table('spaceseat_favourite')->where('event', 'like', '%' . $request->search . '%');
        // }
        // else{
        //     $product = DB::table('spaceseat_favourite');
        // }
        $product = DB::table('spaceseat_calendar');
        //return $product;
        return response()->json(['success' => 'true', 'data' => $product->get(), 'total' => $product->count()]);
        
    }
}