@extends('layouts.master')
@section('content')
<body>
  <div style="width: 400px; height: 400px; overflow: hidden">

<form>
내 판매정보
<input type="button" value="이전으로" onClick="prevPage()">

</form>
</div>
@stop

<script>
function prevPage(){
history.back();
}
</script>
