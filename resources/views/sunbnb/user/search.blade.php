@extends('layouts.app')
@section('content')
<div class="container">
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle"
                type="button" id="dropdownMenu1"　data-flip="true" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
          Dropdown
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
          <a class="dropdown-item" href="#!">Action</a>
          <a class="dropdown-item" href="#!">Another action</a>
        </div>
      </div>
</div>
<script type="text/javascript">
  $(function(){
      if($('#slider').length){
          console.log('there');
      }
  });
</script>

<script type="text/javascript">
  $( function() {
  $( "#slider" ).slider();
} );
$(function() {
  // 2スライダーを適用
('#slider').slider(
      min: 0,
      max: 100,
      step: 2,
      range: true,
      // 2初期値（配列指定）
      values: [10, 70],
      // 3スライダー変更時／初期化時の処理
      change: function(e, ui) {
      $('#min').val(ui.values[0]);
      $('#max').val(ui.values[1]);
      },
      create: function(e, ui) {
      var values = $(this).slider('option', 'values')
      $('#min').val(values[0]);
      $('#max').val(values[1]);
      }
  );
});
</script>
@endsection