<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

@if ($message = Session::get('success'))
<div class="bg-white border border-[#4D7C0F] text-[#4D7C0F] rounded p-4">
    <strong>{{ $message }}</strong>
</div>
@endif
  
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <strong>{{ $message }}</strong>
</div>
@endif
   
@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
    <strong>{{ $message }}</strong>
</div>
@endif
   
@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
    <strong>{{ $message }}</strong>
</div>
@endif
  
@if ($errors->any())
<div class="alert alert-danger">
    Please check the form below for errors
</div>
@endif