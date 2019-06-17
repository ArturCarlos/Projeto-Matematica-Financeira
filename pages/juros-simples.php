<?php require_once '../config.php'; ?>

<?php include(FUNCOES);
include "modal-jur-simples.php";
?>
<?php include(HEADER_TEMPLATE); ?>

    <!--Fomulario e retorna o calcula da funcao-->
    <div class="container" style="margin-top: 20px;">
        <h2>Juros Simples</h2>
        <form action="juros-simples.php">
            <div class="row">
                <div class="col-sm-12">

                    <div class="row" style="margin-top: 20px;">
                        <div class="col-sm-12">
                            <label for="vp">Valor Presente:</label>
                            <input type="number" class="form-control" id="vp" name="vp"/>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-sm-12">
                            <label for="taxa">Taxa:</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6"><input type="number" class="form-control" id="taxa" name="taxa"/></div>
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
                        <div class="col-sm-6"><input type="number" class="form-control" id="tempo" name="tempo"/>
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
                            <input type="number" class="form-control" name="vf" id="vf"/>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" style="margin-top: 20px;">Calcular</button>
                    <input class="btn btn-outline-primary btn-block" style="margin-top: 20px;" type="reset"
                           value="Limpar">
                </div>
        </form>


    </div>

    <div class="box-header text-left">
        <hr>
        <h3>Resultado</h3>
        <hr>


        <div class="row" style="margin-top: 20px;">
            <div class="col-sm-12">
                <h4><?php jurosSimples();?></h4>
            </div>
        </div>

    </div>

<?php include(FOOTER_TEMPLATE); ?>