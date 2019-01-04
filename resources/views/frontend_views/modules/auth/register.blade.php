@extends('frontend_views.layouts.master_page')

@section('content')

<div class="container">
    <div class="col-md-3">
        
    </div>
    <div class="col-md-6">
        <div class="box">
        <h1>New account</h1>

        <p class="lead">Not our registered customer yet?</p>
        <p>With registration with us new world of fashion, fantastic discounts and much more opens to you! The whole process will not take you more than a minute!</p>
        <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>

        <hr>

        <form id="registrationform">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="text-center">
                <button type="button" id="smbButton" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
            </div>
        </form>
    </div>    
    </div>
    <div class="col-md-3">
        
    </div>
</div>
<!-- /.container -->

@endsection


@section('script')

<script>
    $(document).on('click', '#smbButton', function(e){
        alert('gumagana ba??'); exit();
        

       // ajax function
        $.ajax({
            url: {!! url('auth-customers') !!},
            type: 'POST',
            data: $('#registrationForm').serialize(),
            
        });

    });
</script>

@endsection