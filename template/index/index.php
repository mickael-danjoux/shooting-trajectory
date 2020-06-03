
<div class="container">
    <h1 class="mt-3">Paraboles</h1>

    <div class="container">

        <?php
        foreach ($alertes as $alerte): ?>
            <div>
                <p class="alert alert-<?php echo $alerte->getType();?>"><?php echo $alerte->getContent();?></p>
            </div>
        <?php endforeach;
        ?>
    </div>
    <hr>
    <section class="mt-3">
        <h2>TP1 </h2>

        <form action="/tp1" method="post" name="form-tp1">
            <div class="form-group ">
                <div class="form-row">
                    <div class="col-3">
                        <label for="distance">Distance de la cible</label>
                        <input type="number" class="form-control" id="distance" name="distance" step="1" min="0"
                               required placeholder="200">
                    </div>

                </div>
            </div>
            <div class="form-row ">
                <div class="col-3">
                    <input type="submit" class="form-control btn btn-primary" value="calculer" name="tp1">
                </div>
            </div>

        </form>


    </section>

    <hr>


    <section class="mt-3">
        <h2>TP2 Parabole Amortie</h2>
        <div class="mt-3">
            <form action="/tp2" method="post" name="form-tp2">

                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                            <label for="angle">Angle de tir</label>
                            <input type="number" class="form-control" id="angle" name="angle" step="0.001" min="0"
                                   value="<?php echo $angle; ?>" required placeholder="3.8">
                        </div>
                        <div class="col">
                            <label for="vitesseInitial">Vitesse initial</label>
                            <input type="number" class="form-control" id="vitesseInitial" name="vitesseInitial" step="0.001"
                                   min="0" value="<?php echo $vitesseInitial; ?>" required placeholder="200">
                        </div>
                        <div class="col">
                            <label for="coefFluide">Coefficiant du fluide</label>
                            <input type="number" class="form-control" id="coefFluide" name="coefFluide" step="0.001"
                                   min="0" value="<?php echo $coefFluide; ?>" required placeholder="1.025">
                        </div>
                        <div class="col">
                            <label for="massePtMat">Masse du pnt. initial</label>
                            <input type="number" class="form-control" id="massePtMat" name="massePtMat" step="0.001"
                                   min="0" value="<?php echo $massePtMat; ?>" placeholder="8">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-3">
                            <label for="massePtMat">Distance</label>
                            <input type="number" class="form-control" id="distance" name="distance" step="0.001"
                                   min="0" value="<?php echo $distance; ?>" placeholder="800">
                        </div>
                    </div>

                </div>

                <div class="form-row ">
                    <div class="col-3">
                        <input type="submit" class="form-control btn btn-primary" value="calculer" name="tp2" required>
                    </div>
                </div>
            </form>
        </div>

    </section>

    <hr>
    <section class="mt-3">
        <h2>TP3 </h2>

        <form action="/tp3" method="post" name="form-tp1">
            <div class="form-group ">
                <div class="form-row">
                    <div class="col-3">
                        <label for="angle3">Angle</label>
                        <input type="number" class="form-control" id="angle3" name="angle3" step="0.01" min="0"
                               required placeholder="3.5">
                    </div>
                    <div class="col-3">
                        <label for="vitesseInitial3">Vitesse initial</label>
                        <input type="number" class="form-control" id="vitesseInitial3" name="vitesseInitial3" step="1" min="0"
                               required placeholder="250">
                    </div>
                </div>
            </div>
            <div class="form-row ">
                <div class="col-3">
                    <input type="submit" class="form-control btn btn-primary" value="calculer" name="tp3">
                </div>
            </div>

        </form>


    </section>
    <section class="mt-3">
        <h2>TP4 </h2>

        <form action="/tp4" method="post" name="form-tp1">
            <div class="form-group ">
                <div class="form-row">
                    <div class="col-3">
                        <label for="angle4">Angle</label>
                        <input type="number" class="form-control" id="angle4" name="angle4" step="0.01" min="0"
                               required placeholder="4">
                    </div>
                    <div class="col-3">
                        <label for="initialSpeed4">Vitesse initial</label>
                        <input type="number" class="form-control" id="initialSpeed4" name="initialSpeed4" step="1" min="0"
                               required placeholder="850">
                    </div>
                    <div class="col-3">
                        <label for="bulletWeight4">Masse du projectile</label>
                        <input type="number" class="form-control" id="bulletWeight4" name="bulletWeight4" step="0.01" min="0"
                               required placeholder="0.01">
                    </div>
                    <div class="col-3">
                        <label for="bulletDiameter4">Diamètre du projectile</label>
                        <input type="number" class="form-control" id="bulletDiameter4" name="bulletDiameter4" step="0.01" min="0"
                               required placeholder="0.01">
                    </div>
                </div>
            </div>
            <div class="form-row ">
                <div class="col-3">
                    <input type="submit" class="form-control btn btn-primary" value="calculer" name="tp4">
                </div>
            </div>

        </form>


    </section>


</div>
