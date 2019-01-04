{{--
    I learned this here in ..
    [FreeTutorials.Us] Udemy - php-with-laravel-for-beginners-become-a-master-in-laravel
    this is working, just remove all validation in the form.
 --}}  
@if(Session::has('flash_message_error'))
    <div class="alert alert-error alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{!! session('flash_message_error') !!}</strong>
    </div>
@endif   

@if(Session::has('flash_message_success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{!! session('flash_message_success') !!}</strong>
    </div>
@endif

{{--
    I learned this here in ..
    Become A Full Stack Web Developer - Beginner To Advanced
    this is working, just remove all validation in the form.
 --}}  
@if($errors->any())
	<div class="alert alert-danger alert-block m-t-40" style="text-align: left">
	    <ul>
	        @foreach($errors->all() as $error)
	            <li><strong>{{ $error }}</strong></li>
	        @endforeach
	    </ul>
	</div>
@endif 



{{--
    I learned this here in ..   
    Advance Validation Ajax jQuery    
--}}  
    
    <div id="print-alert-error-message" class="alert alert-danger alert-block" style="display:none">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <ul></ul>
    </div>

    <div id="print-alert-success-message" class="alert alert-success alert-block" style="display:none">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <ul></ul>
    </div>






