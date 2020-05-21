@extends('layout.layout')

@section('content')
<div class="row">
  <div class="col-md-2">

  </div>
<div class="col-md-8">
  <h1>Liste des véhicules</h1>
  <table class="table" >
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Marque</th>
        <th scope="col">Année</th>
        <th scope="col">Immatriculation</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($voitures as $voiture)
            
       
      <tr>
        <th scope="row">{{$voiture->id}}</th>
        <td>{{$voiture->marque}}</td>
        <td>{{$voiture->annee}}</td>
        <td>{{$voiture->immatriculation}}</td>
        <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#{{$voiture->id}}">Détails</button></td>
      </tr> 
      @endforeach
   
    </tbody>
     </table>
    

<!--Modal de details-->

@foreach ($voitures as $voiture)
<div class="modal fade" id="{{$voiture->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     
     <div style="text-align: center">
     <img  style="margin-top:50px" width="450px" src="{{ $voiture->image }}" alt=" Image {{ $voiture->marque }}" >
     <br><br>
    <p> Modele: {{ $voiture->marque }}</p>
    <p> Année: {{ $voiture->annee }}</p>
    <p> Immatriculation: {{ $voiture->immatriculation }}</p>
     <p><svg id="i-clock" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
     <circle cx="16" cy="16" r="14" />
     <path d="M16 8 L16 16 20 20" />
     </svg> {{$voiture->created_at}}</p>
     <br>
   </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <a href="/sup/{{$voiture->id}}" class="btn btn-success">Supprimer</a>
       <button type="button" class="btn btn-success" data-toggle="modal" data-target="#mod{{$voiture->id}}" data-dismiss="modal">Modifier</button>
     </div>
    </div>
  </div>
</div>
@endforeach

<!--Modal de modification-->

@foreach ($voitures as $voiture)
<div class="modal fade" id="mod{{$voiture->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="exampleModalLabel">{{$voiture->marque}}</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">

<form method="POST" action="/mod">
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <input type="hidden" name="id" value="{{$voiture->id}}">
 <div class="form-group">
   <label for="marque">Marque</label>
   <input type="text" class="form-control" name="marque" id="marque" aria-describedby="emailHelp" value="{{$voiture->marque}}">
 </div>
 <div class="form-group">
   <label for="annee">Année</label>
   <input type="year" class="form-control" name="annee" id="annee" value="{{$voiture->annee}}">
 </div>
 <div class="form-group">
     <label for="immatriculation">Immatriculation</label>
     <input type="text" class="form-control" name="immatriculation" id="immatriculation" value="{{$voiture->immatriculation}}">
   </div>
   <div class="form-group">
     <label for="image">URL Image</label>
   <input type="text" class="form-control" name="image" id="image" value="{{$voiture->image}}">
   </div>
 
 <button type="submit" class="btn btn-success form-control ">Submit</button>
</form>
 </form>
</div>
</div>
</div>
</div>
@endforeach


           
</div>
</div>
@endsection