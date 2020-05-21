@extends('layout.layout')

@section('content')
  
<br><br><br>
<div class="form-cad" >
<h2>Résever {{$voiture->marque}}</h2>
  <br>
<form method="POST" action="/resa">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" value="{{$voiture->id}}">
    <div class="form-group">
      <label for="user1">Nom</label>
      <input type="text" class="form-control" name="user1" id="user1" placeholder="Entrer votre nom">
    </div>
    <div class="form-group">
      <label for="user2">Prénom</label>
      <input type="text" class="form-control" name="user2" id="user2" placeholder="Entrer votre prénom">
    </div>
    <div class="form-group">
        <label for="immatriculation">Date</label>
        <input type="date" class="form-control" name="date" id="date">
      </div>
      <div class="form-group">
        <label for="lieu">Lieu</label>
        <select name="lieu" id="lieu"
        class="form-control">
          <option value="1">Sainte-Marie</option>
          <option value="2">Saint-Paul</option>
          <option value="3">Saint-Pierre</option>
      </select>
      </div>
    
    <button type="submit" class="btn btn-success form-control ">Submit</button>
  </form>
</div>
@endsection