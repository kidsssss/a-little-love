<!DOCTYPE html>
<html>
<head>
  <title>Trang Chủ</title>
  <link rel="stylesheet" type="text/css" href="{{URL::to('src/css/main.css')}}">
</head>
<body>
<div class="container">
  <form action="{{route('post.url')}}" method="post">
    <p>Input Your URL Here: </p>
    <input type="text" name="url" required="required">
    <button type="submit">Create Shorten Link</button>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  </form>
  @if($hash)
  <div class="shorten">
    <p>Here is your new URL: </p>
    <a href="{{route('use.url',['hash'=>$hash])}}">localhost:8080/shorten/public/{{$hash}}</a>
  </div>
  @endif
</div>
</body>
</html>