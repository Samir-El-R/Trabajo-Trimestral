<style>
        :root {
            --header: #111111;
            --main: #212121;
            --icono: #838383;
            --menu: #313131;
            --blanco: #ffffff;
            --purple: #7f00ff;
            --pink: #e100ff;
            --azul: #0aadff;
        }
    
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        .header {
            display: flex;
            background-color: black;
            color: white;
            width: 100%;
            height: 65px;
            padding-top: 10px;
        }
    
        /* body {
            background-color: #313131;
            color: white;
        } */
    
        .text_logo {
            min-width: 30%;
            width: 50%;
            display: flex;
            justify-content:space-between;
            margin-left: 40px;
            font-weight: bold;
            font-size: xx-large;
            color: #FFFFFF;
            text-shadow: #FFF 0px 0px 5px, #FFF 0px 0px 10px, #FFF 0px 0px 15px, #FF2D95 0px 0px 20px, #FF2D95 0px 0px 30px, #FF2D95 0px 0px 40px, #FF2D95 0px 0px 50px, #FF2D95 0px 0px 75px;
        }
    
    
        .menu_header {
            display: flex;
            justify-content: flex-end;
            width: 70%;
            flex-wrap: wrap;
            
        }
        ul{
            display: flex;
        }
       
    
        .botones_header {
            
            display: inline-block;
            text-align: center;
            cursor: pointer;
            margin-top: 10px;
            
            margin-right: 50px;
            width: 100px;
            height: 25px;
            border-radius: 10px;
            box-shadow: #FFF 0px 0px 6px, #FFF 0px 0px 4px, #FFF 0px 0px 5px, #FF2D95 0px 0px 5px, #FF2D95 0px 0px 10px, #FF2D95 0px 0px 10px, #FF2D95 0px 0px 20px, #FF2D95 0px 0px 25px;
            background: -webkit-gradient(linear, left top, right top, from #7f00ff, to(#e100ff));
            background: linear-gradient(to right, #7f00ff, #e100ff);
        }
    
        .botones_header li {
            padding-top: 3px;
            list-style: none;
    
        }
    
        .botones_header li a {
    
            color: white;
            text-decoration: none;
    
        }
        
        .boton_cerrar_sesion {
            color: black;
            margin-top: 5px;
            margin-right: 20px;
        }
        .desplegable{
            
            visibility: hidden;
            margin-left: 10px;
        }
        .desplegable ul {
            padding-top: 25px;
            height: 100%;
            width: 80px;
            display: block;
            background-color: white;
            color: black;
            list-style: none;
            border-radius: 0px 0 10px 10px;
        }
        .desplegable>ul>li {
            padding: 10px;
            color: black;
        }
       
        
        .desplegable li:hover>ul{
            display: block;
        }
    
        .botones_header:hover {
            background: #0aadff;
            color: black;
        }
    
        
        .imagen_logo{
            
            justify-content: flex-start;
            width: 40px;
        }
       li>a{
           color: black;
       }
        .nombre_logo{
            
            text-align: center;
            width: 70px;
            justify-content: flex-end;
        }
        
        .logo {
    
            min-width: 30px;
            min-height: 30px;
        }
        svg{
            width: 40px;
            height: 40px;
        }
    </style>
    <header>
        <div class="header">
    
            <div class="text_logo"> <a href="../HTML/index.php">
            <div class="imagen_logo"><svg height="100%" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;" version="1.1" viewBox="0 0 1062 1062" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <circle cx="531.308" cy="531.308" id="circle6" r="531.308" style="fill:rgb(37,183,211);" />
                    <rect height="55.6341" style="fill:rgb(205,205,205);" width="885.051" x="88.7824" y="503.491" />
                    <g>
                        <rect height="213.093" style="fill:rgb(91,96,113);" width="44" x="864.465" y="424.761" />
                        <rect height="334.502" style="fill:rgb(66,72,91);" width="44" x="802.838" y="364.057" />
                        <rect height="525.082" style="fill:rgb(55,60,75);" width="44" x="745.921" y="268.767" />
                    </g>
                    <g>
                        <rect height="213.093" style="fill:rgb(91,96,113);" width="44" x="135.758" y="424.761" />
                        <rect height="334.502" style="fill:rgb(66,72,91);" width="44" x="197.385" y="364.057" />
                        <rect height="525.082" style="fill:rgb(55,60,75);" width="44" x="254.303" y="268.767" />
                    </g>
                </svg></div>
            </a>
                
                <div class="nombre_logo"><h3 class="titulo_logo">ZonaFitness</h3> </div>
                
                    
            </div>
            <div class="menu_header">
                <ul>
    
                    <div  class="botones_header" <?php
                    if (isset($_SESSION["username"])) {

                        echo 'style="display: none;"';
                    } ?>>
                        <li>
                            <a href="../HTML/acceder.php" id="boton_iniciar_sesion">Acceder</a>
                        </li>
                    </div>
    
                    <div  class="botones_header" <?php if (!isset($_SESSION["username"])) {
                        echo 'style="display: none;"';
                    } ?>>
                        <li>
                            <a href="postear.php" id="boton_postear">Postear</a>
                        </li>
                    </div>
    
    
                    <div>
                        <div class="botones_header" id="boton_acceder" <?php if (!isset($_SESSION["username"])) {
                            echo 'style="display: none;"';
                        } ?> >
                            <li>
                                <p>Perfil</p>
                            </li>
                        </div>
                        <div class="desplegable" id="desplegable"  <?php if (!isset($_SESSION["username"])) {
                            echo 'style="display: none;"';
                        } ?>>
                            <ul>
                                <li>
                                    <a href="../HTML/perfil.php" id="boton_acceder">Ir a perfil</a> 
                                </li>
                                <li>
                                    <a href="../Server/cerrar_sesion.php" id="boton_cerrar_sesion">Cerrar Sesión</a> 
                                </li>
                            </ul>
                        </div>
                        <script>
                            
                            document.getElementById("boton_acceder").onclick=function(){hover_on_out()}
                            
                           
                            function hover_on_out(){
                                if( document.getElementById("desplegable").style.visibility=="hidden"){
                                    document.getElementById("desplegable").style.visibility="visible"; 

                                }else{
                                    document.getElementById("desplegable").style.visibility="hidden";
                                }   
                            }
                            
                        </script>
    
                    </div>
                    
                    <div class="boton_cerrar_sesion" <?php if (!isset($_SESSION["username"])) {
                        echo 'style="display: none";';
                    } ?>>
    
                        <a href="../Server/cerrar_sesion.php" id="boton_cerrar_sesion">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-power" width="40" height="40" viewBox="0 0 24 24" stroke-width="3" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M7 6a7.75 7.75 0 1 0 10 0" />
                                <line x1="12" y1="4" x2="12" y2="12" />
                            </svg>
        
                        </a>
        
        
                    </div>
    
                </ul>
                
            </div>
        </div>
    </header>