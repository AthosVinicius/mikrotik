<style>
    .error-page {padding: 40px 15px;text-align: center;}
    .error-actions {margin-top:15px;margin-bottom:15px;}
    .error-actions .btn { margin-right:10px; }
    h1.404error {    font-size :100px !important; }
</style>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="error-page">
        <h2>Oops!</h2>
        <h1 class="404error"> Mikrotik - 404 </h1>
        <h2>Route Not Found</h2>
        <div class="error-details">
            route <b>{{ $_SERVER['REQUEST_URI'] }}</b> no found! try gain
        </div>
    </div>