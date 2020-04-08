 <!DOCTYPE html>
 <html>
 <head>
 	<title>Register</title>
 	<link rel="stylesheet" type="text/css" href="css/style.css">
 </head>
 <body>
 	<div class="form-modal">
    
    <div class="form-toggle">
        <button id="login-toggle" onclick="toggleLogin()">log in</button>
        <button id="signup-toggle" onclick="toggleSignup()">sign up</button>
    </div>

    <div id="login-form">
    	 
        <form action="#" method="POST">
            <input type="email" placeholder="Enter email" required="" />
            <input type="password" placeholder="Enter password" required="" />
            <button type="button" class="btn login">login</button>
            <p><a href="#">Forgotten account</a></p>
            <hr/>
            <button type="button" class="btn -box-sd-effect"> <i class="fa fa-google fa-lg" aria-hidden="true"></i> sign in with google</button>
            <!-- <button type="button" class="btn -box-sd-effect"> <i class="fa fa-linkedin fa-lg" aria-hidden="true"></i> sign in with linkedin</button>
            <button type="button" class="btn -box-sd-effect"> <i class="fa fa-windows fa-lg" aria-hidden="true"></i> sign in with microsoft</button> -->
        </form>
    </div>

    <div id="signup-form">
        <form action="" method="POST">
            <input type="email" placeholder="Enter your email" required="" />
            <input type="text" placeholder="Choose username" required="" />
            <input type="password" placeholder="Create password" required="" />
            <button type="button" class="btn signup">create account</button>
            <p>Clicking <strong>create account</strong> means that you are agree to our <a href="javascript:void(0)">terms of services</a>.</p>
            <hr/>
            <button type="button" class="btn -box-sd-effect"> <i class="fa fa-google fa-lg" aria-hidden="true"></i> sign up with google</button>
           <!--  <button type="button" class="btn -box-sd-effect"> <i class="fa fa-linkedin fa-lg" aria-hidden="true"></i> sign up with linkedin</button>
            <button type="button" class="btn -box-sd-effect"> <i class="fa fa-windows fa-lg" aria-hidden="true"></i> sign up with microsoft</button> -->
        </form>
    </div>

</div>
<script type="text/javascript">
	function toggleSignup(){
   document.getElementById("login-toggle").style.backgroundColor="#fff";
    document.getElementById("login-toggle").style.color="#222";
    document.getElementById("signup-toggle").style.backgroundColor="#1dd2b0";
    document.getElementById("signup-toggle").style.color="#fff";
    document.getElementById("login-form").style.display="none";
    document.getElementById("signup-form").style.display="block";
}

function toggleLogin(){
    document.getElementById("login-toggle").style.backgroundColor="#1dd2b0";
    document.getElementById("login-toggle").style.color="#fff";
    document.getElementById("signup-toggle").style.backgroundColor="#fff";
    document.getElementById("signup-toggle").style.color="#222";
    document.getElementById("signup-form").style.display="none";
    document.getElementById("login-form").style.display="block";
}

</script>
 
 </body>
 </html>