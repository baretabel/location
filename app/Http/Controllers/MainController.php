<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Voiture;
use App\Lieu;
use App\Reservation;

class MainController extends Controller
{
    public function resa(){
        
            return view('form');
        
    }
    public function create(Request $request){
  
        $voitures = new Voiture;
        $voitures->marque = $request->marque;
        $voitures->annee = $request->annee;
        $voitures->immatriculation = $request->immatriculation;
        $voitures->image = $request->image;
        $voitures->save();
        return redirect()->action('MainController@voiture');
    }
    public function reser(Request $request){
      $user=$request->user1." ".$request->user2;
      $lieux = new Reservation;
      $lieux->voiture_id = $request->id;
      $lieux->réservation = $request->date;
      $lieux->lieu_id= $request->lieu;
      $lieux->user = $user;
      $lieux->save();
      return redirect()->action('MainController@voiture');
  }


    public function modif(Request $request){

      $this->validate($request,[
        'marque'=>'required|max:255',
        'annee'=>'required',
        'immatriculation'=>'required|max:7',
        'image'=>'required|max:255',
        
      ]);
    
      $voitures = Voiture::find($request->id);
    
      $voitures->marque = $request->marque;
      $voitures->annee = $request->annee;
      $voitures->immatriculation = $request->immatriculation;
      $voitures->image = $request->image;
      $voitures->save();
    
    return redirect()->action('MainController@voiture');
    }
    public function voiture(){
      $voitures = Voiture::all();
        return view('voiture',['voitures'=> $voitures]);
    }
    public function home(){
      $voitures = Voiture::all();
        return view('home',['voitures'=> $voitures]);
    }

    public function sup($id){
      $voiture = Voiture::where('id', $id)->first();
      $voiture->delete();
      return redirect()->action('MainController@voiture');
    }
    public function show($id){
      $voiture = Voiture::where('id', $id)->first();
      return view('resa',['voiture'=> $voiture]);
    }

    public function del($id){
      $reservation = Reservation::where('id', $id)->first();
      $reservation->delete();
      return redirect()->action('MainController@reservations');
      

    }

    public function val($id){
      $reservation = Reservation::find($id);
      $reservation->etat = 1;
      $reservation->save();
      return redirect()->action('MainController@reservations');
    } 
    public function reservations(){
      $reservations = Reservation::all();
      $valides = Reservation::where('etat', 1)->get();
      $attentes = Reservation::where('etat', 0)->get();
      return view('reser',['valides'=> $valides,'attentes'=> $attentes,'reservations'=> $reservations]);
      
  }
        
}
