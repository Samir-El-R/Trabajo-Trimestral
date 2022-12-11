    <?php
    session_start();
    require 'header.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="postear.css">
        <title>Postear</title>

        <style>
            /* Style de pagina post */

            body {
                background-color: #212121;
                color: white;
                height: 100%;
            }

            main {
                display: flex;
                justify-content: center;

            }

            .formulario {
                display: flex;
                background-color: #313131;
                border: 2px solid white;
                padding: 15px;
                margin-top: 50px;
                font-size: 22px;

            }

            form {
                padding: 15px;
            }

            select {
                margin-bottom: 20px;
            }

            input {
                margin-top: 20px;
                margin-bottom: 20px;
            }

            .div_flex {
                padding-top: 30px;
                text-align: center;
                display: flex;
                justify-content: center;
            }

            .div_contenido {
                display: flex;
                flex-direction: column;
            }

            #contenido {
                font-size: 16px;
                font-weight: 400;
                color: #444;
                line-height: 1.3;
                padding: .4em 1.4em .3em .8em;
                width: 400px;
                max-width: 100%;
                box-sizing: border-box;
                margin: 20px auto;
                border: 1px solid #aaa;
                box-shadow: 0 1px 0 1px rgba(0, 0, 0, .03);
                border-radius: .3em;
                appearance: none;
                background-color: #fff;
            }
            .botones input{
                font-size: 16px;
                font-weight: 400;
                color: #444;
                line-height: 1.3;
                padding: .4em 1.4em .3em .8em;
                width: 200px;
                max-width: 50%;
                box-sizing: border-box;
                margin: 20px auto;
                border: 1px solid #aaa;
                box-shadow: 0 1px 0 1px rgba(0, 0, 0, .03);
                border-radius: .3em;
                appearance: none;
                background-color: #fff;
            }

            .titulo {
                font-size: 16px;
                font-weight: 400;
                color: #444;
                line-height: 1.3;
                padding: .4em 1.4em .3em .8em;
                width: 400px;
                max-width: 100%;
                box-sizing: border-box;
                margin: 20px auto;
                border: 1px solid #aaa;
                box-shadow: 0 1px 0 1px rgba(0, 0, 0, .03);
                border-radius: .3em;
                appearance: none;
                background-color: #fff;
            }

            /*           */

            .input_file {
                font-weight: bolder;
                margin-right: 20px;
                border: none;
                background: black;
                padding: 10px 20px;
                border-radius: 10px;
                color: #fff;
                cursor: pointer;
                transition: background .2s ease-in-out;
            }

            .input_file:hover {
                background: grey;
            }

            input[type=file] {
                color: transparent;
                display: none;
            }

            .subir_imagen {
                text-align: center;
            }

            /*  */

            .select-css {
                display: block;
                font-size: 16px;
                font-weight: 400;
                color: #444;
                line-height: 1.3;
                padding: .4em 1.4em .3em .8em;
                width: 400px;
                max-width: 100%;
                box-sizing: border-box;
                margin: 20px auto;
                border: 1px solid #aaa;
                box-shadow: 0 1px 0 1px rgba(0, 0, 0, .03);
                border-radius: .3em;
                -moz-appearance: none;
                -webkit-appearance: none;
                appearance: none;
                background-color: #fff;
                background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'),
                    linear-gradient(to bottom, #ffffff 0%, #f7f7f7 100%);
                background-repeat: no-repeat, repeat;
                background-position: right .7em top 50%, 0 0;
                background-size: .65em auto, 100%;
            }

            .select-css::-ms-expand {
                display: none;
            }

            .select-css:hover {
                border-color: #888;
            }

            .select-css:focus {
                border-color: #aaa;
                box-shadow: 0 0 1px 3px rgba(59, 153, 252, .7);
                box-shadow: 0 0 0 3px -moz-mac-focusring;
                color: #222;
                outline: none;
            }

            .select-css option {
                font-weight: normal;
            }


            .classOfElementToColor:hover {
                background-color: red;
                color: black
            }

            .select-css option[selected] {
                background-color: orange;
            }


            /*           */
        </style>
    </head>

    <body>
        <main>

            <!-- Formulario para rellenar informacion relevante de cada post -->

            <div class="formulario">
                <div class="post_formulario">
                    <form method="post" enctype="multipart/form-data">

                        <!-- Select para seleccionar tema de post -->

                        <label for="tema">Escoge Tema:</label>
                        <select class="select-css" name="temas" id="temas" require>
                            <option value="general">General</option>
                            <option value="rutinas">Rutinas</option>
                            <option value="culturismo">Culturismo</option>
                            <option value="dietas">Dietas</option>
                            <option value="ciclos">Ciclos</option>
                        </select>
                        <br>

                        <!-- Selección de titulo para el post -->

                        <label for="post_titulo">Titulo del Post:</label><br>
                        <input type="text" class="titulo" name="post_titulo" id="post_titulo">
                        <br>
                        <br>
                        <!-- Selección de imagen para el post -->

                        <div class="subir_imagen">
                            <label class="input_file" for="file">Selección de imagen</label>
                            <br>
                            <input type="file" name="file" id="file" accept="image/png, image/jpeg"><br>

                        </div>
                        <!-- Selección de contenido para el post -->
                        <div class="div_flex">
                            <div class="div_contenido">
                                <label for="post_contenido">Contenido post:</label>
                                <br>
                                <textarea name="post" id="contenido" cols="30" rows="10">
                                </textarea>

                            </div>
                        </div>


                        <!-- Botón para mandar la información -->
                        <div class="botones">
                            <input type="submit" value="Publicar" id="publicar" name="publicar">
                            <input type="reset" value="Cancelar" id="cancelar" name="cancelar">
                        </div>

                    </form>
                </div>
            </div>
        </main>
        <?php
        require '../Server/postear.php';
        ?>
    </body>

    </html>