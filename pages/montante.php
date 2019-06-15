<?php require_once '../config.php'; ?>
<?php include(HEADER_TEMPLATE); ?>

<div class="container" style="margin-top: 20px;">
    <h2>Montante</h2>
    <form action="/montante.php">
        <div class="row">
            <div class="col-sm-12">
                <div class="row" style="margin-top: 20px;">
                    <div class="col-sm-12">
                        <label for="r">Valor da Parcela:</label>
                        <input type="number" class="form-control" min="0" pattern="^\d*(\.\d{0,2})?$" id="r" />
                    </div>
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-sm-12">
                        <label for="taxa">Taxa:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6"><input type="number" class="form-control" id="taxa" min="0"
                            pattern="^\d*(\.\d{0,2})?$" /></div>
                    <div class="col-sm-1"> % ao </div>

                    <div class="col-sm-5">
                        <select class="form-control" id="taxa-t">
                            <option>Dia</option>
                            <option>Mês</option>
                            <option>Ano</option>
                            <option>Semestre</option>
                            <option>Trimeste</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12" style="margin-top: 20px;">
                        <label for="tempo">Tempo:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6"><input type="number" class="form-control" id="tempo" /></div>
                    <div class="col-sm-6">
                        <select class="form-control" id="tempo-dia">
                            <option>Dia</option>
                            <option>Mês</option>
                            <option>Ano</option>
                            <option>Semestre</option>
                            <option>Trimeste</option>
                        </select>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-sm-12">
                        <label for="m">Montante:</label>
                        <input type="number" class="form-control" id="m" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block" style="margin-top: 20px;">Calcular</button>
                <input class="btn btn-outline-primary btn-block" style="margin-top: 20px;" type="reset" value="Limpar">
            </div>
    </form>
</div>


<?php include(FOOTER_TEMPLATE); ?>