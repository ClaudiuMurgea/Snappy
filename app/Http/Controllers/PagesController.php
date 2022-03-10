<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Event;
use App\Models\Invite;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index($eventId = null )
    {
        if ($eventId){
            if (!Event::find($eventId)){
                return redirect(route('admin.home'));
            }
        }

        $page_title = 'Dashboard';
        $page_description = 'Some description for the page';

        if (!$eventId){
            $orders = Order::all();
            $invites = Invite::all() ;
        }else{
            $orders = Order::where('event_id',$eventId)->get();
            $invites = Invite::where('event_id',$eventId)->get();
        }

        $countries =  Country::all()->pluck('iso2','name') ;
        $ordersByCountry = [] ;
        $orderDelivered = [];
        $orderShipped = [];
        $orderException = [];
        $events = Event::all();
        $grouped = \DB::table('orders')
            ->select('country', \DB::raw('count(*) as total'))
            ->groupBy('country')
            ->whereBetween('created_at', [
                Carbon::now()->subdays(30)->format('Y-m-d'),
                Carbon::now()->addDay()->format('Y-m-d')
            ])
            ->get();
        foreach( $grouped as $country){
            $code = Country::where('name',$country->country)->pluck('iso2')->first() ;
            if($code != ""){
                $ordersByCountry[$code] = $country->total ;
            }

        }

        foreach ($orders as $order){
            if (!$order->carrier_id && !$order->tracking_number){
                continue;
            }elseif($order->shipping_status == 'delivered'  ){
                if ($order->country == "United States"){
                        $orderDelivered['us'][] = $order;
                }else{
                    $orderDelivered['intl'][]  = $order;
                }
            }elseif ($order->shipping_status == 'exception'){
                if ($order->country == "United States"){
                    $orderException['us'][] = $order;
                }else{
                    $orderException['intl'][]  = $order;
                }
            }else{
                if ($order->country == "United States"){
                    $orderShipped['us'][] = $order;
                }else{
                    $orderShipped['intl'][]  = $order;
                }
            }
        }

        return view('home.dashboard', compact('page_title','page_description','orders','invites','countries','ordersByCountry','orderDelivered','orderShipped','orderException','events', 'eventId'));
    }

    /**
     * Demo methods below
     */

    // Datatables
    public function datatables()
    {
        $page_title = 'Datatables';
        $page_description = 'This is datatables test page';

        return view('pages.datatables', compact('page_title', 'page_description'));
    }

    // KTDatatables
    public function ktDatatables()
    {
        $page_title = 'KTDatatables';
        $page_description = 'This is KTdatatables test page';

        return view('pages.ktdatatables', compact('page_title', 'page_description'));
    }

    // Select2
    public function select2()
    {
        $page_title = 'Select 2';
        $page_description = 'This is Select2 test page';

        return view('pages.select2', compact('page_title', 'page_description'));
    }

    // jQuery-mask
    public function jQueryMask()
    {
        $page_title = 'jquery-mask';
        $page_description = 'This is jquery masks test page';

        return view('pages.jquery-mask', compact('page_title', 'page_description'));
    }

    // custom-icons
    public function customIcons()
    {
        $page_title = 'customIcons';
        $page_description = 'This is customIcons test page';

        return view('pages.icons.custom-icons', compact('page_title', 'page_description'));
    }

    // flaticon
    public function flaticon()
    {
        $page_title = 'flaticon';
        $page_description = 'This is flaticon test page';

        return view('pages.icons.flaticon', compact('page_title', 'page_description'));
    }

    // fontawesome
    public function fontawesome()
    {
        $page_title = 'fontawesome';
        $page_description = 'This is fontawesome test page';

        return view('pages.icons.fontawesome', compact('page_title', 'page_description'));
    }

    // lineawesome
    public function lineawesome()
    {
        $page_title = 'lineawesome';
        $page_description = 'This is lineawesome test page';

        return view('pages.icons.lineawesome', compact('page_title', 'page_description'));
    }

    // socicons
    public function socicons()
    {
        $page_title = 'socicons';
        $page_description = 'This is socicons test page';

        return view('pages.icons.socicons', compact('page_title', 'page_description'));
    }

    // svg
    public function svg()
    {
        $page_title = 'svg';
        $page_description = 'This is svg test page';

        return view('pages.icons.svg', compact('page_title', 'page_description'));
    }

    // Quicksearch Result
    public function quickSearch()
    {
        return view('layout.partials.extras._quick_search_result');
    }
}
