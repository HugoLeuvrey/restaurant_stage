@extends('layouts.app')

@section('content')

<style type="text/css">

.titre-restaurant{
  margin-top: 50px;
	text-align: center;
	font-size: 43px;
	font-weight: bold;
	color: rgb(0,105,165);
}


.categorie-general
{

    margin-left: 25vw;

}

.add_categorie_plat{
	    margin-top: 120px; /* poussé de la moitié de hauteur de viewport */
 	 transform: translateY(-50%); /* tiré de la moitié de sa propre hauteur */
 	 font-size: 30px;
    vertical-align: middle;
    font-weight: bold;
}

.categorie-titre{
	text-align: center;
	font-size: 26px;
	font-weight: bold;
	color: rgb(0,105,165);
	min-height: 95vh;
	box-shadow: 10px 5px 5px rgb(230,230,230);
	position: fixed;

}


.heightbloc{
	margin-top: 12vh;
    height: 250px;
    background-color:rgb(0,105,165);
    color: white;
	    border-radius: 50px;
    box-shadow: 50px;
}
hr{
  margin-top: 0px;
  height: 3px;
  background-color: rgb(235,195,40);
  width: 25px;
}

body{
	background-color: rgb(252,252,252);
}


.hrstyle{
	  margin-top: 0px;
  height: 3px;
  background-color: rgb(235,195,40);
  width: 25px;
  margin-bottom: 50px;
}
button{
    background-color: transparent;
    border:1px solid transparent;
}
label{
	font-size: 16px;
}
i{
	margin-top: 5px;
}
.name_category{
	text-align: left;
	font-size: 20px;
}

.lien_menu{
	color: rgb(0,105,165);
}

.leftbloc{
	margin-left: 3vw;
}

.ee{
background-color: red; 
}

.contenu-plat{
	margin-top: 100px;
}

.text{
		margin-top: 12vh;
    height: 250px;
    color: white;
}
.ee{
			margin-top: 6vh;
  background-color:rgb(0,105,165);

}

.tailleicon{
	width: 80px;
	font-size: 60px;
}

table{
  margin-top: 50px;
  margin-left: auto;
  margin-right: auto;
  width: 80% !important;
}

.sizeicon{
  font-size: 50px;
  display: block;
  margin-right: auto;
  margin-left: auto;
  text-align: center;
  color: rgb(0,105,165);
}



</style>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-3 categorie-titre">
			<br>
			Vos Catégories
			<hr class="hrstyle">

  				@foreach($category as $category)
  							<div class="row">
  								<div class="col-lg-1 name_category"></div>

  								<div class="col-lg-2 name_category"><i class="material-icons">{{ $category ->icon }}</i></button></div>

  								<div class="col-lg-4 name_category">

  				<a class="lien_menu" href="/category/index/{{$category->id}}">{{$category->name}}</a>
  		</div>
  								<div class="col-lg-4">

  				     <form action="/category/delete/{{ $category ->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                       <a href="/category/{{ $category ->id }}"> <button type="submit"> <i class="material-icons">delete</i></button> </a> 
                      </form>
  					</div>
                      </div>
  				@endforeach
  			
		</div>
		<div class="col-lg-9 categorie-general">
			<br>
  			<div class="titre-restaurant">Plat</div>		
			<hr>
            <a href="/dish/create/{{ $category -> id_restaurant }}">
              
<span class="material-icons sizeicon">
add_circle_outline
</span>

            </a>
<div class="container-fluid">
<div class="row">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Description</th>
      <th scope="col">Prix</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>


    </tr>
  </thead>
  <tbody>
      @foreach($dish as $dish)

    <tr>
      <th scope="row">{{$dish->name}}</th>
      <td>{{$dish->description}}</td>
      <td>{{$dish->price}}</td>
      <td><img src="/images/{{$dish->image}}" width="50px"></td>
        <td>
               <form action="/dish/delete/{{ $dish ->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                       <a href="/dish/{{ $dish ->id }}"> <button type="submit"> <i class="material-icons">delete</i></button> </a> 
              </form>
       </td>
    </tr>
        @endforeach

  </tbody>
</table>

</div>
</div>





		</div>

	</div>
</div>
@endsection
