<!DOCTYPE html>
<html>
<head>
<title>All Diseases</title>
</head>
<body>

<h1>all diseases</h1> gi
    
    @foreach ($diseases as $disease )
    
    <B>    {{ $loop->iteration }}-  <a href="{{ url("diseases/show/$disease->id") }}">{{ $disease->name }} </a> <B><br>
      INTRO:    {{ $disease->intro }}  <br>
      treatment:   {{ $disease->treatment }}<br>
       protection: 
       {{ $disease->protection }}<br>
    <img src="{{ asset("storage/$disease->img") }}" width="200px" > <hr>
    

        
    @endforeach
</body>
</html>