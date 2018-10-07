@extends('template.php')

@begin('title')
Log In
@end

@begin('css')
<link href="public/css/login.css" rel="stylesheet">
@end

@begin('footer-js')
<script type="text/javascript" src="public/js/login.js"></script>
@end

@begin('body')
<form class="form-signin" method="POST" action="/login">
    <div class="text-center mb-4">
        <img class="mb-4" src="public/img/logo.svg" alt="" width="128" height="128">
        <h1 class="h3 mb-3 font-weight-normal">Accedi a {{config('app.name')}}</h1>
        <p>Build form controls with floating labels via the <code>:placeholder-shown</code> pseudo-element. <a href="https://caniuse.com/#feat=css-placeholder-shown">Works in latest Chrome, Safari, and Firefox.</a></p>
    </div>

    <div class="form-label-group">
        <input type="email" id="inputEmail" name='email' class="form-control" placeholder="Email address" required autofocus>
        <label for="inputEmail">Email address</label>
    </div>

    <div class="form-label-group">
        <input type="password" id="inputPassword"  name='password' class="form-control" placeholder="Password" required>
        <label for="inputPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
        <label>
        <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted text-center">&copy; pure 2017-2018</p>
</form>
@end
