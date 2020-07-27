@extends('front.layout.master')
@section('content')
   <section class="section pt-0">
       <div class="container-fluid px-0">
           <div class="row align-items-center">
               <div class="col-lg-12 col-md-12 mt-4 pt-0 mt-sm-0 pt-sm-0">
                   <div class="position-relative">
                       @foreach($contract as $contact)
                           <img src="{{asset($contact->image)}}" class="" alt="" height="400px" width="100%">
                       @endforeach
                   </div>
               </div><!--end col-->
           </div><!--end row-->
       </div><!--end container-->
   </section>
@endsection
