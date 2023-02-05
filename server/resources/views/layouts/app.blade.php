<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>FlightReservation</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  @include('layouts._header')

  @yield('content')

  <script>
    function delete_alert(e){
      if(!window.confirm('本当に削除しますか？')){
        return false;
      }
      document.deleteform.submit();
    };
  </script>
</body>

</html>