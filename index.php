<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Relatório Mensal</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-white py-10">
<div class="max-w-4xl mx-auto bg-emerald-200 p-8 rounded-lg shadow-md border border-green-300">
    <h1 class="text-3xl font-bold mb-9 text-black border-b-2 border-green-400 pb-2">
        Relatório Mensal
    </h1>
        <form method="POST" action="relatorio.php" class="space-y-6">
            <div>
                <label class="block font-semibold mb-1 text-black-700">Setor</label>
                <select name="setor" required class="w-full border border-green rounded-md px-4 py-2 bg-white text-black-700 transition duration-300 ease-in-out hover:bg-emerald-50 hover:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <option value="">Favor selecionar</option>
                    <option value="Financeiro">Financeiro</option>
                    <option value="APS">APS</option>
                    <option value="Autorizações">Autorizações</option>
                    <option value="CDI">CDI</option>
                    <option value="CEM">CEM</option>
                    <option value="Centro Cirúrgico">Centro Cirúrgico</option>
                    <option value="Clínica Cirúrgica">Clínica Cirúrgica</option>
                    <option value="Clínica Médica">Clínica Médica</option>
                    <option value="Clínica Mista">Clínica Mista</option>
                    <option value="Enfermaria Pediatria">Enfermaria Pediatria</option>
                    <option value="Farmácia Central">Farmácia Central</option>
                    <option value="Farmácia Comercial">Farmácia Comercial</option>
                    <option value="Hotelaria">Hotelaria</option>
                    <option value="Hospital DIA">Hospital DIA</option>
                    <option value="Internação">Internação</option>
                    <option value="Jurídico">Jurídico</option>
                    <option value="Laboratório">Laboratório</option>
                    <option value="Obstetrícia">Obstetrícia</option>
                    <option value="Pronto Atendimento Adulto">Pronto Atendimento Adulto</option>
                    <option value="Pronto Atendimento Infantil">Pronto Atendimento Infantil</option>
                    <option value="Parâmetrização">Parâmetrização</option>
                    <option value="Qualidade">Qualidade</option>
                    <option value="RH">RH</option>
                    <option value="SESMT">SESMT</option>
                    <option value="SND">SND</option>
                    <option value="Saúde Ocupacional Unimed - SOU">Saúde Ocupacional Unimed - SOU</option>
                    <option value="Tecnologia da Informação - Hospital">Tecnologia da Informação - Hospital</option>
                    <option value="Tecnologia da Informação - SEDE">Tecnologia da Informação - SEDE</option>
                    <option value="Transporte">Transporte</option>
                    <option value="UTI Adulto">UTI Adulto</option>
                    <option value="UTI Neo">UTI Neo</option>
                </select>
            </div>

            <div>
                <label class="block font-semibold mb-1 text-black-700">Mês de referência do Relatório</label>
                <select name="mes_referencia" required class="w-full border border-green-300 rounded-md px-4 py-2 bg-white text-black-700 duration-300 ease-in-out hover:bg-emerald-50 hover:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500"">
                    <option value="">Favor selecionar</option>
                    <?php
                    $meses = [
                        "Janeiro",
                        "Fevereiro",
                        "Março",
                        "Abril",
                        "Maio",
                        "Junho",
                        "Julho",
                        "Agosto",
                        "Setembro",
                        "Outubro",
                        "Novembro",
                        "Dezembro"
                    ];
                    foreach ($meses as $i => $mes) {
                        echo "<option value='" . ($i + 1) . "'>$mes</option>";
                    }
                    ?>
                </select>
            </div>

            <h1 class="text-2xl font-bold mt-20 text-black border-b-2 border-green-400 pb-2">Indicadores Financeiro</h1>

            <?php
            $campos_numericos = [
                "Custo Médio Mensal Gerado pelo Setor este Ano (custo total de 2025 dividido pelo número de meses incluindo o mês de referencia deste relatório)" => "custo_medio_2025",
                "Custo Médio Mensal no Ano de 2024 (Custo total de 2024 dividido por 12 meses)" => "custo_medio_2024",
                "Variação de Custo Acumulado em % Comparando o Período em Meses Deste Ano e Mesmo Período do Ano Anterior" => "variacao_custo"
            ];
            foreach ($campos_numericos as $label => $name) {
                echo "
        <div>
          <label class='block font-semibold mb-1 text-black-700'>$label</label>
          <input type='number' step='0.01' name='$name' required class='w-full border border-green-300 rounded-md px-4 py-2 text-black-700 bg-white'>
        </div>";
            }
            ?>

            <div>
                <h1 class="text-2xl font-bold mt-20 text-black border-b-2 border-green-400 pb-2">Metas</h1>
                <p class="text-gray-600 font-medium">
                    Em 2025 temos como Meta para cada setor a redução de pelo menos 5% de custo mensalmente. Isto acarretará em uma economia global no fechamento do ano de 5% de custos.
                </p>
            </div>

            <?php
            $textareas = [
                "Ações implementadas para redução de custos no último mês" => "acoes_reducao",
                "Caso tenha havido aumento de custos no mês anterior, justificar e informar quais medidas serão tomadas para equilibrar o indicador negativo." => "justificativa_aumento",
                "Desafios enfrentados no último mês" => "desafios",
                "Ações e Projetos de melhoria - informar prazos" => "acoes_projetos",
                "Demandas e Solicitações" => "demandas",
                "Caso tenha interesse, deixe suas considerações que não se enquadraram nos itens anteriores" => "consideracoes"
            ];
            foreach ($textareas as $label => $name) {
                echo "
        <div>
          <label class='block font-semibold mb-1 text-black-700'>$label</label>
          <textarea name='$name' rows='3' class='w-full border border-green-300 rounded-md px-4 py-2 text-black-700 bg-white'></textarea>
        </div>";
            }
            ?>

            <div class="text-right">
                <button type="submit" class="text-xl w-32 h-12 rounded bg-emerald-500 text-white relative overflow-hidden group z-10 hover:text-white duration-1000">
                    <span
                        class="absolute bg-emerald-600 w-36 h-36 rounded-full group-hover:scale-100 scale-0 -z-10 -left-2 -top-10 group-hover:duration-500 duration-700 origin-center transform transition-all"></span>
                    <span
                        class="absolute bg-emerald-800 w-36 h-36 -left-2 -top-10 rounded-full group-hover:scale-100 scale-0 -z-10 group-hover:duration-700 duration-500 origin-center transform transition-all"></span>
                    Enviar
                </button>
            </div>
        </form>
    </div>
</body>

</html>
aa
