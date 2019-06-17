<?php require_once '../config.php'; ?>
<?php require_once FUNCOES;
decontoSimples();
?>
<?php include(HEADER_TEMPLATE); ?>

    <div class="container" style="margin-top: 20px;">
        <h2>Desconto Simples</h2>
        <form action="desconto-simples.php" method="get">
            <div class="row">
                <div class="col-sm-12">
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
                            <input type="number" name="nominal" class="form-control" min="0" pattern="^\d*(\.\d{0,2})?$" id="nominal"/>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-sm-12">
                            <label for="taxa">Taxa:</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="number" class="form-control" name="taxa" id="taxa"/></div>
                        <div class="col-sm-1"> % ao</div>

                        <div class="col-sm-5">
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
                            <input type="number" class="form-control" name="tempo" id="tempo"/></div>
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
                            <input type="number" class="form-control" name="valDesc"
                                   id="valDesc"/>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block" style="margin-top: 20px;">Calcular</button>

                    <input class="btn btn-outline-primary btn-block" style="margin-top: 20px;" type="reset"
                           value="Limpar">
                </div>
        </form>
    </div>

<?php include(FOOTER_TEMPLATE); ?>