let dados = [
    ['Resposta', 'Quant de Respostas'],
    ['Discordo \ntotalmente', 80],
    ['Discordo', 100],
    ['Não concordo, \nnem discordo', 40],
    ['Concordo', 50],
    ['Concordo \ntotalmente', 40]
];
google.charts.load('current', {
    'packages': ['bar']
});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
    var data = google.visualization.arrayToDataTable(dados);
    var options = {
        title: 'Índice de confiança nas Instituíções Brasileiras',
        subtitle: 'Universidade Regional de Blumenau, Blumenau, 2018-2019',
        colors: ['#005fa4']
    };

    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
    chart.draw(data, google.charts.Bar.convertOptions(options));
}
function atualizaDados() {
    const teste = document.getElementById("teste");
    if (teste.options[teste.selectedIndex].value == "Bancos") {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['Discordo \ntotalmente', 80],
            ['Discordo', 100],
            ['Não concordo, \nnem discordo', 40],
            ['Concordo', 50],
            ['Concordo \ntotalmente', 40]
        ];
    }
    drawChart();
};

// início segundo gráfico
let dados2 = [
    ["Resposta", "Quant de Respostas", { role: "style" }],
    ["Nenhuma \nConfiança", 50, "#D6D3B8"],
    ["Quase Nenhuma \nConfiança", 10, "#D6D3B8"],
    ["Alguma \nConfiança", 30, "#D6D3B8"],
    ["Muita \nConfiança", 15, "#D6D3B8"] //esta cinza

];

google.charts.load("current", { packages: ["corechart"] });
google.charts.setOnLoadCallback(drawChart2);
function drawChart2() {
    var data = google.visualization.arrayToDataTable(dados2);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
        {
            calc: "stringify",
            sourceColumn: 1,
            type: "string",
            role: "annotation",
        },
        2]);

    var options = {
        title: "Índice de confiança nesses grupos sociais",
        width: 600,
        height: 400,
        bar: { groupWidth: "95%" },
        legend: { position: "none" },

    };
    var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
    chart.draw(view, options);
}
function atualizaDadosGraficos() {
    debugger
    const grafico2 = document.getElementById("grafico2");
    if (grafico2.options[grafico2.selectedIndex].value == "Pessoas da sua família") {
        dados2 = [
            ["Resposta", "Quant de Respostas", { role: "style" }],
            ["Nenhuma \nConfiança", 50, ":#FFCC00"],
            ["Quase Nenhuma \nConfiança", 0, ":#FFCC00"],
            ["Alguma \nConfiança", 3, ":#FFCC00"],
            ["Muita \nConfiança", 15, ":#FFCC00"]
        ];
    } else if (grafico2.options[grafico2.selectedIndex].value == "Seus amigos") {
        dados2 = [
            ["Resposta", "Quant de Respostas", { role: "style" }],
            ["Nenhuma \nConfiança", 5, "#FFCC00"],
            ["Quase Nenhuma \nConfiança", 10, "#FFCC00"],
            ["Alguma \nConfiança", 30, "#FFCC00"],
            ["Muita \nConfiança", 1, "#FFCC00"]
        ];
    } else if (grafico2.options[grafico2.selectedIndex].value == "Seus parentes") {
        dados2 = [
            ["Resposta", "Quant de Respostas", { role: "style" }],
            ["Nenhuma \nConfiança", 20, "#FFCC00"],
            ["Quase Nenhuma \nConfiança", 10, "#FFCC00"],
            ["Alguma \nConfiança", 3, "#FFCC00"],
            ["Muita \nConfiança", 15, "#FFCC00"]
        ];
    } else if (grafico2.options[grafico2.selectedIndex].value == "Seus visinhos") {
        dados2 = [
            ["Resposta", "Quant de Respostas", { role: "style" }],
            ["Nenhuma \nConfiança", 50, "#FFCC00"],
            ["Quase Nenhuma \nConfiança", 23, "#FFCC00"],
            ["Alguma \nConfiança", 25, "#FFCC00"],
            ["Muita \nConfiança", 15, "#FFCC00"]
        ];
    } else if (grafico2.options[grafico2.selectedIndex].value == "Brasileiros em geral") {
        dados2 = [
            ["Resposta", "Quant de Respostas", { role: "style" }],
            ["Nenhuma \nConfiança", 25, "#FFCC00"],
            ["Quase Nenhuma \nConfiança", 10, "#FFCC00"],
            ["Alguma \nConfiança", 30, "#FFCC00"],
            ["Muita \nConfiança", 15, "#FFCC00"]
        ];
    }
    drawChart2();
};



