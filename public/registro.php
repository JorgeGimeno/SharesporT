<?php
    require_once('header.php');
?>

    <main class="registro">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <img class="img-fluid" src="img/img-registro.jpg" alt="">
                </div>
                <div class="col-md-4">
                    <form>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="sr-only" for="name">Nombre</label>
                                <input type="email" class="form-control" id="name" placeholder="Nombre">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="sr-only" for="apellidos">Apellidos</label>
                                <input type="email" class="form-control" id="apellidos" placeholder="Apellidos">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="sr-only" for="Ciudad">Ciudad</label>
                                <input type="text" class="form-control" id="Ciudad" placeholder="Ciudad">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="sr-only" for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group pr-3 w-50">
                                <label class="sr-only" for="nick">Nick</label>
                                <input type="text" class="form-control" id="nick" placeholder="Nick">
                            </div>
                            <div class="form-group  w-50">
                                <label class="sr-only" for="inputPassword4">Password</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input sr-only" type="checkbox" id="gridCheck">
                                <label class="form-check-label sr-only" for="gridCheck">Check me out</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Registrarme</button>
                    </form>
                </div>
            </div>
        </div>
    </main>



    </div>
    </div>
    </div>




















    <?php
 require_once('footer.php');
?>


        <!-- Scripts propios -->

        <?php
    require_once('scripts.php')
?>