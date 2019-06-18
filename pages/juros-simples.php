<?php require_once '../config.php'; ?>

<?php include(FUNCOES);?>
<?php include(HEADER_TEMPLATE); ?>

    <!--Fomulario e retorna o calcula da funcao-->
    <div class="container">
        <h2>Juros Simples</h2>
        <form action="juros-simples.php">
            <div class="row">
                <div class="col-sm-6">

                    <div class="row" style="margin-top: 20px;">
                        <div class="col-sm-12">
                            <label for="vp">Valor Presente:</label>
                            <input type="number" step="0.01" class="form-control" id="vp" name="vp"/>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-sm-12">
                            <label for="taxa">Taxa % ao:</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6"><input type="number" step="0.01" class="form-control" id="taxa"
                                                     name="taxa"/>
                        </div>
                        <div class="col-sm-1"></div>

                        <div class="col-sm-6">
                            <select class="form-control" id="taxa-t" name="taxa-t">
                                <option value="dia">Dia</option>
                                <option value="mes">Mês</option>
                                <option value="ano">Ano</option>
                                <option value="sem">Semestre</option>
                                <option value="tri">Trimeste</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12" style="margin-top: 20px;">
                            <label for="tempo">Tempo:</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="number" step="0.01" class="form-control" id="tempo"
                                   name="tempo"/>
                        </div>
                        <div class="col-sm-6">
                            <select class="form-control" id="tempo-dia" name="tempo-t">
                                <option value="dia">Dia</option>
                                <option value="mes">Mês</option>
                                <option value="ano">Ano</option>
                                <option value="sem">Semestre</option>
                                <option value="tri">Trimeste</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-sm-12">
                            <label for="vf">Valor Futuro:</label>
                            <input type="number" step="0.01" class="form-control" name="vf" id="vf"/>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" style="margin-top: 20px;">Calcular</button>
                    <input class="btn btn-outline-primary btn-block" style="margin-top: 20px;" type="reset"
                           value="Limpar">
                </div>
        </form>

        <!--Resultados-->
        <div class="col-sm-6">
            <hr>
            <div class="text-center">
                <h3>Resultado</h3>
            </div>
            <hr>

            <div class="row">
                <div class="col-sm-12">
                    <h4><?php jurosSimples(); ?></h4>
                </div>
            </div>
        </div>

    </div>
<?php include(FOOTER_TEMPLATE); ?>