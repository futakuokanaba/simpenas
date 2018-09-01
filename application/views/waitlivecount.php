<!-- BEM-VOTE -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wait Live Count</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato|Ubuntu:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	 <style media="screen">

	 *{
			 font-family: 'Lato',sans-serif;
	 }
	 a{
			 color: inherit;
	 }
	 body{
			 background-color: #e6e6e6;
	 }
	 nav.navbar{
			 background-color: white;
			 border-bottom: orange 5px solid;
			 text-transform: uppercase;
	 }
	 .navbar-brand{
			 font-size: 2em;
			 font-weight: bold;
			 font-family: 'Ubuntu', sans-serif;
	 }
	 .jumbotron{
			 background-color: orange;
			 border-radius: 0;
			 color: white;
			 background-color: orange;
	 }
	 .jumbotron h4{
			 font-weight: bold;
	 }
	 .jumbotron img{
			 width: 250px;
	 }
	 .about-home-top{
			 margin-top: -30px;
	 }
	 .about-home-top h4{
			 text-transform: uppercase;
			 margin-bottom: 20px;
	 }
	 .about-home{
			 background-color: white;
			 text-align: center;
			 padding: 25px;
	 }
	 .about-home h2, .article-home h2{
			 text-transform: uppercase;
			 font-size: 2em;
			 border-bottom: 3px solid orange;
			 margin: 25px;
	 }
	 .article-home{
			 padding: 20px;
			 background-color: #f0f0f0;
	 }
	 .article-home img{
			 width: 350px;
			 height: 225px
	 }
	 .daftar-article-home{
			 margin-top: -30px;
	 }
	 .article-content{
			 background-color: white;
			 border-radius: 7px;
			 margin: 10px;
	 }
	 .article-content img{
			 width: 300px;
	 }
	 .article-content h3{
			 font-size: 1.5em;
	 }
	 .article-content h5{
			 font-weight: bold;
			 font-size: 1.2em;
	 }
	 .article-content h5.article-about{
			 text-transform: uppercase;
			 margin: 12px;
	 }
	 .article-content-article{
			 border: 2px solid #d4c3c3;
			 width: 350px;
	 }
	 .article-content-article h3{
			 padding: 0 5px 0 5px;
			 font-size: 1.5em;
	 }
	 .article-content-article h5{
			 font-size: 1.2em;
	 }
	 .article-content-article img{
			 width: 100%;
	 }
	 .contact-home{
			 background-color: #201e1b;
			 color: white;
	 }
	 .struktur-top{
			 border-bottom: orange 2px solid;
	 }
	 .struktur{
			 padding: 10px;
	 }
	 .struktur img{
			 width: 200px;
	 }
	 .struktur h5{
			 font-weight: normal;
			 text-transform: uppercase;
	 }
	 footer{
			 background-color: #282828;
			 color: white;
			 padding: 5px;
	 }
	 .event-jumbotron{
			 background-image: url(../img/kevin-364843.jpg);
			 background-attachment: fixed;
			 background-repeat: no-repeat;
			 background-size: cover;
			 background-position: bottom;
	 }
	 .event-jumbotron h1{
			 border-bottom: 5px solid white;
			 font-weight: bold;
			 text-shadow: none;
	 }
	 .event-jumbotron h4{
			 font-weight: bold;
			 text-shadow: none;
	 }
	 .event-center{
			 margin-top: -30px;
	 }
	 .page404{
			 height: 100vh;
			 background-image: none;
			 background-color: white;
			 color: darkslategray;
			 font-family: 'Ubuntu', sans-serif;
	 }
	 .page404 h1{
			 font-size: 150px;
			 font-family: monospace;
			 letter-spacing: 10px;
	 }
	 .page404 h2{
			 font-size: 50px;
			 text-transform: uppercase;
	 }
	 .maintenance{
			 height: 100vh;
			 background-image: none;
			 background-color: white;
			 color: darkslategray;
			 font-family: 'Ubuntu', sans-serif;
	 }
	 .maintenance h1{
			 text-transform: uppercase;
			 border-radius: 10px;
			 font-size: 50px;
			 font-family: monospace;
			 border-bottom: 5px solid darkslategray;
	 }
	 .maintenance h2{
			 font-size: 30px;
			 text-transform: uppercase;
	 }
	 </style>
</head>
<body>
   <div class="jumbotron page404 flex-column d-flex align-items-center justify-content-center align-content-center">
   <h1 style="border:none"><i class="fa fa-cog fa-spin fa-2x"></i></h1>
  <h3 class="text-center">Oops.. Live Count akan ditampilkan setelah pemilihan selesai..</h3>
</div>
</body>
</html>
