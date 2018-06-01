<html>
   <head>
      <link rel="stylesheet" href="menu.css" />
      <title>Menu des roulants</title>
      <style>
         #menu {
         width: 960px;
         margin:auto;
         }
         #menu ul {
         text-align: center;
         list-style-type:none;
         margin-top: 20px;
         width: 100%;
         margin: auto;
         font-family: fantasy;
         font-size: 30px;
         }
         #menu li {
         float: left;
         margin: auto;
         padding: 0;
         background-color: black;
         }
         #menu li a {
         display: block;
         width: 250px;
         color: white;
         text-decoration: none;
         padding: 5px;
         }
         #menu li a:hover {
         color: red;
         }
         #menu ul li ul {
         display: none;
         }
         #menu ul li:hover ul {
         display: block;
         }
         #menu li:hover ul li {
         float: none;
         }
      </style>
   </head>
   <body>
      <div id="menu">
         <ul id="bobo">
            <li>
               <a href="#">Skateboard</a>
               <ul id="lulu">
                  <li><a href="#">plateau</a></li>
                  <li><a href="#">Setcomplet</a></li>
                  <li><a href="#">Truks/visseries</a></li>
               </ul>
            </li>
            <li>
               <a href="#">Longboard</a>
               <ul id="lulu">
                  <li><a href="#">plateau</a></li>
                  <li><a href="#">Setcomplet</a></li>
                  <li><a href="#">Truks/visseries</a></li>
               </ul>
            </li>
            <li>
               <a href="#">Info pratique</a>
               <ul id="lulu">
                  <li><a href="#">Horraires</a></li>
                  <li><a href="#">Support</a></li>
                  <li><a href="#">F.A.Q</a></li>
               </ul>
            </li>
         </ul>
      </div>
   </body>
</html>