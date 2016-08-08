<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use App\Http\Requests;
use App\Custom;

class LinkController extends Controller
{

    public function getMakeUrl(){
      return view('index',['hash' => null]);
    }

    public function postMakeUrl(Request $request){
      $this->validate($request,[
        'url' => 'required|URL'
        ]);
      $h = new Custom;;
      do{
        $hash = $h->getRandom();
      }while(Link::where('hash',$hash)->count() > 0);

      if (Link::where('url',$request['url'])->count() > 0) {
        $short = Link::where('url',$request['url'])->first();
        return view('index',['hash' => $short->hash]);
      }
        $newLink = new Link();
        $newLink->url = $request['url'];
        $newLink->hash = $hash;
        $newLink->save();
        return view('index',['hash' =>  $newLink->hash]);
    }

    public function getUse($hash){
      $url = Link::where('hash',$hash)->first();
      if ($url) {
        return redirect($url->url);
      }
      else{
        return 'ko co nhe';
      }
    }
    
}
