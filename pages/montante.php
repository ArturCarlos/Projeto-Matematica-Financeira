<?php require_once '../config.php'; ?>
<?php include(HEADER_TEMPLATE); ?>

    <div class="container" style="margin-top: 20px;">
        <h2>Montante</h2>
        <form action="montante.php">
            <div class="row">
                <div class="col-sm-6">
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-sm-12">
                            <label for="r">Valor da Parcela:</label>
                            <input type="number" step="0.01" class="form-control" min="0" pattern="^\d*(\.\d{0,2})?$"
                                   id="r"/>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-sm-12">
                            <label for="taxa">Taxa % ao:</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6"><input type="number" step="0.01" class="form-control" id="taxa" min="0"
                                                     pattern="^\d*(\.\d{0,2})?$"/></div>
                        <div class="col-sm-6">
                            <select class="form-control" id="taxa-t">
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
                        <div class="col-sm-6"><input type="number" step="0.01" class="form-control" id="tempo"/></div>
                        <div class="col-sm-6">
                            <select class="form-control" id="tempo-dia">
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
                            <label for="m">Montante:</label>
                            <input type="number" step="0.01" class="form-control" id="m"/>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" style="margin-top: 20px;">Calcular</button>
                    <input class="btn btn-outline-primary btn-block" style="margin-top: 20px;" type="reset"
                           value="Limpar">
                </div>
        </form>
    </div>


<?php include(FOOTER_TEMPLATE); ?>