let dados = [
    ['Resposta', 'Quant de Respostas'],
    ['Discordo \ntotalmente', 80],
    ['Discordo', 100],
    ['Não concordo, \nnem discordo', 40],
    ['Concordo', 50],
    ['Concordo \ntotalmente', 40],
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
    if (teste.options[teste.selectedIndex].value == "Masculino") {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['Masculino', 36],
            [0,0 ],
            [0,0 ]
        ];
    } else if (teste.options[teste.selectedIndex].value == "Feminino") {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['Feminino', 36],
            [0,0 ],
            [0,0 ]
        ];
    }
    drawChart();
}
function atualizaDados2() {
    teste2 = document.getElementById("troca");
    if (teste2.options[teste2.selectedIndex].value == "até R$ 2000,00") {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['TOTAL', 36],
        ];
    } else if (teste2.options[teste2.selectedIndex].value == "R$ 2001,00 a R$ 6000,00") {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['TOTAL', 36],
        ];
    } else if (teste2.options[teste2.selectedIndex].value == "Acima de R$ 6000,00") {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['TOTAL', 36],
        ];
    }
    drawChart();
}
function atualizaDados3() {
    const teste3 = document.getElementById("teste3");
    if (teste3.options[teste3.selectedIndex].value == "Católica") {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['total', 36],
        ];
    } else if (teste3.options[teste3.selectedIndex].value == "Evangélica") {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['total', 36],
        ];
    } else if (teste3.options[teste3.selectedIndex].value == "Luterana") {
        dados = [
            ['Resposta', 'Quant de Respostas'],
            ['total', 36],
        ];
    }
    drawChart();
};
let dados2 = [
    ['Resposta', 'Quant de Respostas'],
    ['Discordo \ntotalmente', 80],
    ['Discordo', 100],
    ['Não concordo, \nnem discordo', 40],
    ['Concordo', 50],
    ['Concordo \ntotalmente', 40],
];

google.charts.load("current", { packages: ["corechart"] });
google.charts.setOnLoadCallback(drawChart2);
function drawChart2() {
    var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" }],
        ["Copper", 8.94, "#D6D3B8"],
        ["Silver", 10.49, "#D6D3B8"],
        ["Gold", 19.30, "#D6D3B8"],
        ["Platinum", 21.45, "#D6D3B8"]
    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
        {
            calc: "stringify",
            sourceColumn: 1,
            type: "string",
            role: "annotation"
        },
        2]);

    var options = {
        title: "Density of Precious Metals, in g/cm^3",
        width: 600,
        height: 400,
        bar: { groupWidth: "95%" },
        legend: { position: "none" },

    };
    var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
    chart.draw(view, options);

}

