<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}"/>
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{asset('css/docs.css')}}"/>
</head>
<body>
    <main>
        <div class="container row">
        <div class="col-12"><h1>Nos annonces</h1></div>
        <div class="col-6">
        <ul class="list-group list-group-flush">
        @foreach($bien as $biens)
            <li class="list-group-item row">
                <div class="col-12"><img src="" alt="une image"></div>
                <div class="col-12">
                <h2>{{$biens->title}} </h2>
                    <ul class="list-group list-goup-flush">
                                    <li class="list-group-item list-group-item-dark">Ville : {{$biens->ville}} </li>
                                    <li class="list-group-item list-group-item-dark"> Quartier : {{$biens->quartier}} </li>
                                    <li class="list-group-item list-group-item-dark"> Prix : {{$biens->prix}} </li>
                    </ul>
                </div>
            </li>
        @endforeach
        </ul>
        
        
        </div>

           
        

        </div>
    </main>
</body>
</html>