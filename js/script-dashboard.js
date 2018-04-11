var offreProgress = localStorage.getItem("offreProgress") ? localStorage.getItem("offreProgress") : 0;
var organisationProgress = localStorage.getItem("organisationProgress") ? localStorage.getItem("organisationProgress") : 0;
var personneProgress = localStorage.getItem("personneProgress") ? localStorage.getItem("personneProgress") : 0;
var strategieProgress = localStorage.getItem("strategieProgress") ? localStorage.getItem("strategieProgress") : 0;
var technoProgress = localStorage.getItem("technologieProgress") ? localStorage.getItem("technologieProgress") : 0;
var environnementProgress = localStorage.getItem("environnementProgress") ? localStorage.getItem("environnementProgress") : 0;
var offreScore = localStorage.getItem("offreScore") ? localStorage.getItem("offreScore") : 0;
var organisationScore = localStorage.getItem("organisationScore") ? localStorage.getItem("organisationScore") : 0;
var personneScore = localStorage.getItem("personneScore") ? localStorage.getItem("personneScore") : 0;
var strategieScore = localStorage.getItem("strategieScore") ? localStorage.getItem("strategieScore") : 0;
var technoScore = localStorage.getItem("technologieScore") ? localStorage.getItem("technologieScore") : 0;
var environnementScore = localStorage.getItem("environnementScore") ? localStorage.getItem("environnementScore") : 0;

var axeParams = [
    {name:'Offre', backgroundColor:'rgba(247, 127, 55, 0.6)', borderColor:'rgb(247, 127, 55)'},
    {name:'Organisation', backgroundColor:'rgba(243, 196, 69, 0.6)', borderColor:'rgb(243, 196, 69)'},
    {name:'Personne', backgroundColor:'rgba(126, 196, 86, 0.6)', borderColor:'rgb(126, 196, 86)'},
    {name:'Stratégie', backgroundColor:'rgba(246, 105, 110, 0.6)', borderColor:'rgb(246, 105, 110)'},
    {name:'Technologie et innovation', backgroundColor:'rgba(56, 167, 217, 0.6)', borderColor:'rgb(56, 167, 217)'},
    {name:'Environnement', backgroundColor:'rgba(128, 115, 176, 0.6)', borderColor:'rgb(128, 115, 176)'},
];

function JSONToCSVConvertor(JSONData, ReportTitle, ShowLabel) {
    var CSV = '';

    for (var j=0; j< JSONData.length; j++) {
        //If JSONData is not an object then JSON.parse will parse the JSON string in an Object
        var arrData = typeof JSONData[j] != 'object' ? JSON.parse(JSONData[j]) : JSONData[j];

        //Set Report title in first row or line
        CSV += ReportTitle[j] + '\r\n\n';

        //This condition will generate the Label/Header
        if (ShowLabel) {
            var row = "";

            //This loop will extract the label from 1st index of on array
            for (var index in arrData[0]) {

                //Now convert each value to string and comma-seprated
                row += index + ',';
            }

            row = row.slice(0, -1);

            //append Label row with line break
            CSV += row + '\r\n';
        }

        //1st loop is to extract each row
        for (var i = 0; i < arrData.length; i++) {
            var row = "";

            //2nd loop will extract each column and convert it in string comma-seprated
            for (var index in arrData[i]) {
                row += '"' + arrData[i][index] + '",';
            }

            row.slice(0, row.length - 1);

            //add a line break after each row
            CSV += row + '\r\n';
        }
        CSV += '\r\n\n\n';
    }

    if (CSV == '') {
        alert("Invalid data");
        return;
    }

    //Generate a file name
    var fileName = "export";
    //var fileName = "export_";
    //this will remove the blank-spaces from the title and replace it with an underscore
    //fileName += ReportTitle.replace(/ /g,"_");

    //Initialize file format you want csv or xls
    var uri = 'data:text/csv;charset=utf-8,' + escape(CSV);

    // Now the little tricky part.
    // you can use either>> window.open(uri);
    // but this will not work in some browsers
    // or you will not get the correct file extension

    //this trick will generate a temp <a /> tag
    var link = document.createElement("a");
    link.href = uri;

    //set the visibility hidden so it will not effect on your web-layout
    link.style = "visibility:hidden";
    link.download = fileName + ".csv";

    //this part will append the anchor tag and remove it after automatic click
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

$('document').ready(function () {

    $('#axe1-completion').text(offreProgress);
    $('#axe2-completion').text(organisationProgress);
    $('#axe3-completion').text(personneProgress);
    $('#axe4-completion').text(strategieProgress);
    $('#axe5-completion').text(technoProgress);
    $('#axe6-completion').text(environnementProgress);

    var ctx = document.getElementById('globalChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'polarArea',

        // The data for our dataset
        data: {
            labels: [axeParams[0].name, axeParams[1].name, axeParams[2].name, axeParams[3].name, axeParams[4].name, axeParams[5].name],
            datasets: [{
                backgroundColor: [axeParams[0].backgroundColor, axeParams[1].backgroundColor, axeParams[2].backgroundColor, axeParams[3].backgroundColor, axeParams[4].backgroundColor, axeParams[5].backgroundColor],
                borderColor: [axeParams[0].borderColor, axeParams[1].borderColor, axeParams[2].borderColor, axeParams[3].borderColor, axeParams[4].borderColor, axeParams[5].borderColor],
                data: [offreScore, organisationScore, personneScore, strategieScore, technoScore, environnementScore],
            }]
        },

        // Configuration options go here
        options: {
            scale: {
                ticks: {
                    max: 100,
                    stepSize: 10
                }
            },
            legend: {
                position: 'bottom'
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        return data.labels[tooltipItem.index] + ': ' + tooltipItem.yLabel + '%';
                    }
                }
            }
        }
    });

    if (offreProgress == 100 && organisationProgress == 100 && personneProgress == 100 && strategieProgress == 100 && technoProgress == 100 && environnementProgress == 100) {
        $('.btn-container').css("display", "flex");
        $('.chart-container').css("display", "block");
        chart.update();
    }

    $('#graphe').on('click', function (event) {
        event.preventDefault();
        document.querySelector('#globalChart').scrollIntoView({ 
            behavior: 'smooth' 
        });
    });

    $('#export-data').on('click', function () {
        var offreData = localStorage.getItem("offreData");
        var organisationData = localStorage.getItem("organisationData");
        var personneData = localStorage.getItem("personneData");
        var strategieData = localStorage.getItem("strategieData");
        var technologieData = localStorage.getItem("technologieData");
        var environnementData = localStorage.getItem("environnementData");
        var dataArray = [offreData, organisationData, personneData, strategieData, technologieData, environnementData];
        var titleArray = ['Offre', 'Organisation', 'Personne', 'Stratégie', 'Technologie et innovation', 'Environnement'];
        JSONToCSVConvertor(dataArray, titleArray, true);
    });

});