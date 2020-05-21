@extends('layout.layout')

@section('content')
<div class="row">
  <div class="col-md-2">

  </div>
<div class="col-md-8">
  <h1>Réservations validés</h1>
  <table class="table" >
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Utilisateur</th>
        <th scope="col">Voiture</th>
        <th scope="col">Date</th>
        <th scope="col">Lieu</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($valides as $valide)
            
       
      <tr>
        <th scope="row">{{$valide->id}}</th>
        <td>{{$valide->user}}</td>
        <td>{{$valide->voiture->marque}}</td>
        <td>{{$valide->réservation}}</td>
        <td>{{$valide->lieu->lieu}}</td>
        <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#{{$valide->id}}">Détails</button></td>
      </tr> 
      @endforeach
   
    </tbody>
     </table>
     <br><br>
<table class="table" >
  <h1>Résevations en attentes de validation</h1>
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Utilisateur</th>
      <th scope="col">Voiture</th>
      <th scope="col">Date</th>
      <th scope="col">Lieu</th>
      <th scope="col"></th>
    </tr>
  </thead>
    <tbody>
      
        @foreach ($attentes as $attente) 
        <tr>
          <th scope="row">{{$attente->id}}</th>
          <td>{{$attente->user}}</td>
          <td>{{$attente->voiture->marque}}</td>
          <td>{{$attente->réservation}}</td>
          <td>{{$attente->lieu->lieu}}</td>
          <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#{{$attente->id}}">Détails</button></td>
        </tr> 
      @endforeach
     
    </tbody>
     </table>
    

<!--Modal de details-->

             @foreach ($reservations as $reservation)
             <div class="modal fade" id="{{$reservation->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Réservation n°{{$reservation->id}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <p>Nom du locataire: {{$reservation->user}} </p>
                  <p>Modele: {{$reservation->voiture->marque}}</p>
                  <p>Date de sortie du véhicule: {{$reservation->réservation}}</p>
                  <p>Lieu de remise des clés: {{$reservation->lieu->lieu}}</p>
               
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="/del/{{$reservation->id}}" class="btn btn-success">Supprimer</a>
                    @if($reservation->etat==0)
                    <a href="/val/{{$reservation->id}}" class="btn btn-success">Valider</a>
                    @endif
                  </div>
                 </div>
               </div>
             </div>
             @endforeach


           
</div>
</div>
@endsection
