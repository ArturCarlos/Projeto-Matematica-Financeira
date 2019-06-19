<?php require_once '../config.php'; ?>
<?php require_once FUNCOES;
decontoSimples();
?>
<?php include(HEADER_TEMPLATE); ?>

    <div class="container" style="margin-top: 20px;">
        <h2>Desconto Simples</h2>
        <form action="desconto-simples.php" method="get">
            <div class="row">
                <div class="col-sm-6">
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-sm-12">
                            <label for="tipo-desconto">Tipo de desconto: </label>
                        </div>
                        <div class="col-sm-12">
                            <select class="form-control" name="tipo-desconto">
                                <option value="com">Comercial</option>
                                <option value="rac">Racional</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-sm-12">
                            <label for="N">Valor Nominal:</label>
                            <input type="number" step="0.01" name="nominal" class="form-control" min="0"
                                   pattern="^\d*(\.\d{0,2})?$" id="nominal"/>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-sm-12">
                            <label for="taxa">Taxa % ao:</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="number" step="0.01" class="form-control" name="taxa" id="taxa"/></div>

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
                            <input type="number" step="0.01" class="form-control" name="tempo" id="tempo"/></div>
                        <div class="col-sm-6">
                            <select class="form-control" id="tempo-dia" name="tempo-dia">
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
                            <label for="vf">Valor após Desconto:</label>
                            <input type="number" step="0.01" class="form-control" name="valDesc"
                                   id="valDesc"/>
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