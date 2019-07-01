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
function atualizaDados(param) {
    teste = document.getElementById("teste");
    if (param == 01) {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['Discordo \ntotalmente', 8],
            ['Discordo', 10],
            ['Não concordo, \nnem discordo', 40],
            ['Concordo', 30],
            ['Concordo \ntotalmente', 40]
        ];
    }else if (param == 02) {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['Discordo \ntotalmente', 28],
            ['Discordo', 10],
            ['Não concordo, \nnem discordo', 40],
            ['Concordo', 3],
            ['Concordo \ntotalmente', 40]
        ];
    }else if (param == 03) {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['Discordo \ntotalmente', 8],
            ['Discordo', 10],
            ['Não concordo, \nnem discordo', 50],
            ['Concordo', 30],
            ['Concordo \ntotalmente', 20]
        ];
    }else if (param == 04) {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['Discordo \ntotalmente', 18],
            ['Discordo', 10],
            ['Não concordo, \nnem discordo', 40],
            ['Concordo', 20],
            ['Concordo \ntotalmente', 40]
        ];
    }else if (param == 05) {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['Discordo \ntotalmente', 8],
            ['Discordo', 10],
            ['Não concordo, \nnem discordo', 40],
            ['Concordo', 30],
            ['Concordo \ntotalmente', 20]
        ];
    }else if (param == 06) {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['Discordo \ntotalmente', 58],
            ['Discordo', 10],
            ['Não concordo, \nnem discordo', 40],
            ['Concordo', 30],
            ['Concordo \ntotalmente', 30]
        ];
    }else if (param == 07) {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['Discordo \ntotalmente', 48],
            ['Discordo', 10],
            ['Não concordo, \nnem discordo', 40],
            ['Concordo', 30],
            ['Concordo \ntotalmente', 60]
        ];
    }else if (param == 08) {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['Discordo \ntotalmente', 28],
            ['Discordo', 10],
            ['Não concordo, \nnem discordo', 40],
            ['Concordo', 40],
            ['Concordo \ntotalmente', 5]
        ];
    }else if (param == 09) {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['Discordo \ntotalmente', 28],
            ['Discordo', 10],
            ['Não concordo, \nnem discordo', 30],
            ['Concordo', 60],
            ['Concordo \ntotalmente', 40]
        ];
    }else if (param == 10) {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['Discordo \ntotalmente', 8],
            ['Discordo', 10],
            ['Não concordo, \nnem discordo', 40],
            ['Concordo', 30],
            ['Concordo \ntotalmente', 70]
        ];
    }else if (param == 11) {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['Discordo \ntotalmente', 8],
            ['Discordo', 10],
            ['Não concordo, \nnem discordo', 40],
            ['Concordo', 20],
            ['Concordo \ntotalmente', 50]
        ];
    }else if (param == 12) {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['Discordo \ntotalmente', 8],
            ['Discordo', 10],
            ['Não concordo, \nnem discordo', 4],
            ['Concordo', 80],
            ['Concordo \ntotalmente', 40]
        ];
    }else if (param == 13) {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['Discordo \ntotalmente', 8],
            ['Discordo', 10],
            ['Não concordo, \nnem discordo', 20],
            ['Concordo', 10],
            ['Concordo \ntotalmente', 40]
        ];
    }else if (param == 14) {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['Discordo \ntotalmente', 8],
            ['Discordo', 10],
            ['Não concordo, \nnem discordo', 4],
            ['Concordo', 3],
            ['Concordo \ntotalmente', 40]
        ];
    }else if (param == 15) {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['Discordo \ntotalmente', 8],
            ['Discordo', 10],
            ['Não concordo, \nnem discordo', 5],
            ['Concordo', 3],
            ['Concordo \ntotalmente', 40]
        ];
    }else if (param == 16) {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['Discordo \ntotalmente', 8],
            ['Discordo', 10],
            ['Não concordo, \nnem discordo', 8],
            ['Concordo', 5],
            ['Concordo \ntotalmente', 40]
        ];
    }else if (param == 17) {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['Discordo \ntotalmente', 8],
            ['Discordo', 10],
            ['Não concordo, \nnem discordo', 7],
            ['Concordo', 30],
            ['Concordo \ntotalmente', 9]
        ];
    }else if (param == 18) {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['Discordo \ntotalmente', 8],
            ['Discordo', 10],
            ['Não concordo, \nnem discordo', 4],
            ['Concordo', 6],
            ['Concordo \ntotalmente', 40]
        ];
    }else if (param == 19) {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['Discordo \ntotalmente', 8],
            ['Discordo', 10],
            ['Não concordo, \nnem discordo', 4],
            ['Concordo', 8],
            ['Concordo \ntotalmente', 4]
        ];
    }else if (param == 20) {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['Discordo \ntotalmente', 8],
            ['Discordo', 10],
            ['Não concordo, \nnem discordo', 4],
            ['Concordo', 3],
            ['Concordo \ntotalmente', 4]
        ];
    }else if (param == 21) {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['16 a 24 anos', 8],
            ['25 a 29 anos', 10],
            ['30 a 39 anos', 8],
            ['40 a 59 anos', 8],
            ['50 anos ou \nmais', 8]
        ];
    }else if (param == 22) {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['Masculino', 8],
            ['Feminino', 10],
        ];
    }else if (param == 23) {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['Ensino Fundamental\n/até 4º ano', 8],
            ['Ensino Fundamental\n/5º ao 9º ano', 10],
            ['Ensino Médio', 4],
            ['Ensino Superior', 66],
        ];
    }else if (param == 24) {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['até R$ 2000,00', 8],
            ['R$ 2001,00 a R$ 6000,00', 10],
            ['Acima de R$ 6000,00', 5],
        ];
    }else if (param == 25) {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['Católica', 8],
            ['Evangélica', 10],
            ['Luterana', 4],
            ['Outra', 3],
        ];
    }else if (param == 26) {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['Discordo \ntotalmente', 8],
            ['Discordo', 10],
            ['Não concordo, \nnem discordo', 4],
            ['Concordo', 3],
            ['Concordo \ntotalmente', 55]
        ];
    }
    drawChart();
};

// início segundo gráfico
let dados2 = [
    ["Resposta", "Quant de Respostas", { role: "style" }],
    ["Nenhuma \nConfiança", 50, "#005fa4"],
    ["Quase Nenhuma \nConfiança", 10, "#005fa4"],
    ["Alguma \nConfiança", 30, "#005fa4"],
    ["Muita \nConfiança", 15, "#005fa4"]

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
function atualizaDadosGraficos(parametro) {
    grafico2 = document.getElementById("grafico2");
    if (parametro == 1) {
        dados2 = [
            ["Resposta", "Quant de Respostas", { role: "style" }],
            ["Nenhuma \nConfiança", 50, "#005fa4"],
            ["Quase Nenhuma \nConfiança", 0, "#005fa4"],
            ["Alguma \nConfiança", 3, "#005fa4"],
            ["Muita \nConfiança", 15, "#005fa4"]
        ];
    } else if (parametro == 2) {
        dados2 = [
            ["Resposta", "Quant de Respostas", { role: "style" }],
            ["Nenhuma \nConfiança", 5, "#005fa4"],
            ["Quase Nenhuma \nConfiança", 10, "#005fa4"],
            ["Alguma \nConfiança", 30, "#005fa4"],
            ["Muita \nConfiança", 1, "#005fa4"]
        ];
    } else if (parametro == 3) {
        dados2 = [
            ["Resposta", "Quant de Respostas", { role: "style" }],
            ["Nenhuma \nConfiança", 20, "#005fa4"],
            ["Quase Nenhuma \nConfiança", 10, "#005fa4"],
            ["Alguma \nConfiança", 3, "#005fa4"],
            ["Muita \nConfiança", 15, "#005fa4"]
        ];
    } else if (parametro == 4) {
        dados2 = [
            ["Resposta", "Quant de Respostas", { role: "style" }],
            ["Nenhuma \nConfiança", 50, "#005fa4"],
            ["Quase Nenhuma \nConfiança", 23, "#005fa4"],
            ["Alguma \nConfiança", 25, "#005fa4"],
            ["Muita \nConfiança", 15, "#005fa4"]
        ];
    } else if (parametro == 5) {
        dados2 = [
            ["Resposta", "Quant de Respostas", { role: "style" }],
            ["Nenhuma \nConfiança", 25, "#005fa4"],
            ["Quase Nenhuma \nConfiança", 10, "#005fa4"],
            ["Alguma \nConfiança", 30, "#005fa4"],
            ["Muita \nConfiança", 15, "#005fa4"]
        ];
    }
    drawChart2();
};



