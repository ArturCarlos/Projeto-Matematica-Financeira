<?php require_once 'config.php'; ?>
<?php include(HEADER_TEMPLATE); ?>

    <h1>Selecione uma Calculadora</h1>
    <hr/>

    <div class="row">

        <!--Pagina Juros simples-->
        <div class="col-xs-6 col-sm-3 col-md-2"><a href="pages/juros-simples.php" class="btn btn-warning">
                <div class="row">
                    <div class="col-xs-12 text-center"><i class="fa fa-calculator fa-5x"></i></div>

                    <div class="col-xs-12 text-center"><p>Juros Simples</p></div>
                </div>
            </a>
        </div>

        <!--Pagina Juros Composto-->
        <div class="col-xs-6 col-sm-3 col-md-2"><a href="pages/desconto-composto.php" class="btn btn-success">
                <div class="row">
                    <div class="col-xs-12 text-center"><i class="fa fa-calculator fa-5x"></i></div>

                    <div class="col-xs-12 text-center"><p>Juros Composto</p></div>
                </div>
            </a>
        </div>

        <!--Pagina Mosntate-->
        <div class="col-xs-6 col-sm-3 col-md-2"><a href="pages/montante.php" class="btn btn-primary">
                <div class="row">
                    <div class="col-xs-12 text-center"><i class="fa fa-calculator fa-5x"></i></div>

                    <div class="col-xs-12 text-center"><p>Montante</p></div>
                </div>
            </a>
        </div>

        <!--Pagina Desconto simples-->
        <div class="col-xs-6 col-sm-3 col-md-2"><a href="pages/desonto-simples.php" class="btn btn-info">
                <div class="row">
                    <div class="col-xs-12 text-center"><i class="fa fa-calculator fa-5x"></i></div>

                    <div class="col-xs-12 text-center"><p>Desconto Simples</p></div>
                </div>
            </a>
        </div>

        <!--Pagina Juros simples-->
        <div class="col-xs-6 col-sm-3 col-md-2"><a href="pages/desconto-composto.php" class="btn btn-default">
                <div class="row">
                    <div class="col-xs-12 text-center"><i class="fa fa-calculator fa-5x"></i></div>

                    <div class="col-xs-12 text-center"><p>Desconto Composto</p></div>
                </div>
            </a>
        </div>

    </div>


<?php include(FOOTER_TEMPLATE); ?>