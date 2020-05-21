@extends('layout.layout')

@section('content')
<div class="corps">
    <h2>Bienvenue! <br> Choisir une Voiture!</h2>
<div class="aligne-art">
@foreach ($voitures as $voiture)
<div class="art-cad"  onclick="changerPage('/resa/{{ $voiture->id }}')">
    <article class="arti" onclick="changerPage('/resa/{{ $voiture->id }}')">
        
         <img src="{{ $voiture->image }}" alt=" Image {{ $voiture->marque }}" >
         <br><br>
        <p> Modele: {{ $voiture->marque }}</p>
        <p> Année: {{ $voiture->annee }}</p>
        <p> Immatriculation: {{ $voiture->immatriculation }}</p>
         <p><svg id="i-clock" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
         <circle cx="16" cy="16" r="14" />
         <path d="M16 8 L16 16 20 20" />
         </svg> {{$voiture->created_at}}</p>
         <br>
    </article>
</div>           
@endforeach
</div>
</div>
<script>
function changerPage(urlDestination){
    document.location.href= urlDestination ;
    }</script>
@endsection