<?php require_once '../config.php'; ?>

<?php include(HEADER_TEMPLATE); ?>
<div class="container" style="margin-top: 20px;">
    <h2>Juros Compostos</h2>
    <form action="/juros-composto.php">
        <div class="row">
            <div class="col-sm-12">
                <div class="row" style="margin-top: 20px;">
                    <div class="col-sm-12">
                        <label for="vp">Valor Presente:</label>
                        <input type="number" class="form-control" id="vp" />
                    </div>
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-sm-12">
                        <label for="taxa">Taxa:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6"><input type="number" class="form-control" id="taxa" /></div>
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
                        <label for="vf">Valor Futuro:</label>
                        <input type="number" class="form-control" id="vf" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block" style="margin-top: 20px;">Calcular</button>
                <input class="btn btn-outline-primary btn-block" style="margin-top: 20px;" type="reset" value="Limpar">
            </div>
    </form>
</div>


<?php include(FOOTER_TEMPLATE); ?>