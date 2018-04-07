$('document').ready(function () {

    var axeParams = [
        {name:'Offre', backgroundColor:'rgba(247, 127, 55, 0.6)', borderColor:'rgb(247, 127, 55)'},
        {name:'Organisation', backgroundColor:'rgba(243, 196, 69, 0.6)', borderColor:'rgb(243, 196, 69)'},
        {name:'Personne', backgroundColor:'rgba(126, 196, 86, 0.6)', borderColor:'rgb(126, 196, 86)'},
        {name:'Stratégie', backgroundColor:'rgba(246, 105, 110, 0.6)', borderColor:'rgb(246, 105, 110)'},
        {name:'Technologie et innovation', backgroundColor:'rgba(56, 167, 217, 0.6)', borderColor:'rgb(56, 167, 217)'},
        {name:'Environnement', backgroundColor:'rgba(128, 115, 176, 0.6)', borderColor:'rgb(128, 115, 176)'},
    ];

    var currentAxe = $('body').attr('class');
    var chartLabel = "";
    var chartBackgroundColor = "";
    var chartBorderColor = "";
    for (var index in axeParams) {
        if (axeParams[index].name.toLowerCase() === currentAxe) {
            chartLabel = axeParams[index].name;
            chartBackgroundColor = axeParams[index].backgroundColor;
            chartBorderColor = axeParams[index].borderColor;
            break;
        }
    }

    var buildSkillArray = function () {
        var skillArray = [];
        $('.question-item').each(function( index ) {
            var id = $(this).find('input[type=radio]').first().attr('name');
            var value = $(this).find('input[type=radio]:checked').val();
            var coeff = $(this).find('input[type=radio]').first().attr('data-coeff');
            skillArray.push({
                id: id,
                value: value ? parseInt(value) : 0,
                coeff: parseInt(coeff)
            });

        });
        return skillArray;
    };

    var updateSkillArray = function (skills, id, value) {
        for (var index in skills) {
            if (skills[index].id === id) {
                skills[index].value = parseInt(value);
                break;
            }
        }
        return skills;
    };

    var calcSkillsPercentage = function (skillArray) {
        var sumSkill = 0;
        var sumCoeff = 0;
        var sumSkillMax = 0;
        skillArray.forEach(function (skill) {
            sumSkill += skill.value*skill.coeff;
            sumCoeff += skill.coeff;
            sumSkillMax += 5*skill.coeff;
        });
        var averageSkill = sumSkill/sumCoeff;
        var averageSkillMax = sumSkillMax/sumCoeff;
        var percentage = (averageSkill*100)/averageSkillMax;

        return parseFloat(percentage.toFixed(2));
    };

    var skills = buildSkillArray();
    var skillsPercentage = calcSkillsPercentage(skills);


    var ctx = document.getElementById('axeChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'polarArea',

        // The data for our dataset
        data: {
            //labels: ["Offre"],
            datasets: [{
                backgroundColor: chartBackgroundColor,
                borderColor: chartBorderColor,
                data: [0],
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
            tooltips: {
                callbacks: {
                    label: function(tooltipItems, data) {
                        return chartLabel + ': ' + tooltipItems.yLabel + '%';
                    }
                }
            }
        }
    });

    chart.data.datasets[0].data[0] = skillsPercentage;
    chart.update();

    $('#axeForm input').on('change', function() {
        var currentId = $(this).attr('name');
        var currentValue = $(this).val();
        var updatedSkills = updateSkillArray(skills, currentId, currentValue);
        skillsPercentage = calcSkillsPercentage(updatedSkills);
        chart.data.datasets[0].data[0] = skillsPercentage ;
        chart.update()

    });

    var sampleData = [{"Vehicle":"BMW","Date":"30, Jul 2013 09:24 AM","Location":"Hauz Khas, Enclave, New Delhi, Delhi, India","Speed":42},{"Vehicle":"Honda CBR","Date":"30, Jul 2013 12:00 AM","Location":"Military Road,  West Bengal 734013,  India","Speed":0},{"Vehicle":"Supra","Date":"30, Jul 2013 07:53 AM","Location":"Sec-45, St. Angel's School, Gurgaon, Haryana, India","Speed":58},{"Vehicle":"Land Cruiser","Date":"30, Jul 2013 09:35 AM","Location":"DLF Phase I, Marble Market, Gurgaon, Haryana, India","Speed":83},{"Vehicle":"Suzuki Swift","Date":"30, Jul 2013 12:02 AM","Location":"Behind Central Bank RO, Ram Krishna Rd by-lane, Siliguri, West Bengal, India","Speed":0},{"Vehicle":"Honda Civic","Date":"30, Jul 2013 12:00 AM","Location":"Behind Central Bank RO, Ram Krishna Rd by-lane, Siliguri, West Bengal, India","Speed":0},{"Vehicle":"Honda Accord","Date":"30, Jul 2013 11:05 AM","Location":"DLF Phase IV, Super Mart 1, Gurgaon, Haryana, India","Speed":71}]
    var buildExportData = function () {
        var questionId = "";
        var questionTxt = "";
        var coef = 0;
        var points = 0;
        var result = [];
        $('.question-item').each(function() {
            questionTxt = $(this).find('p').text();
            var inputName = $(this).find('input[type=radio]').attr('name');
            points = $('input[name='+inputName+']:checked').val();
            questionId = parseInt(inputName);
            coef = $('input[name='+inputName+']:checked').attr('data-coeff');
            result.push({
                id: questionId,
                question: questionTxt,
                coefficient: coef,
                points: points
            })
        })
        return result;
    };

    var calculateProgress = function () {
        var nbQuestions = 0;
        var questionAnswered = 0;
        $('.question-item').each(function() {
            var inputName = $(this).find('input[type=radio]').attr('name');
            if ($('input[name='+inputName+']:checked').val()) {
                questionAnswered++;
            }
            nbQuestions++;
        });
        var result = (questionAnswered*100)/nbQuestions;

        return Math.round(result);
    };

    $('#save').on('click', function () {
        var progress = calculateProgress();
        var axeName = $('body').attr('data-code');
        localStorage.setItem(axeName+"Progress", progress);
        // Sauvegarder scores et datas seulement si la progression est à 100%
        if (progress === 100) {
            localStorage.setItem(axeName+"Score", skillsPercentage);
            var exportData = buildExportData();
            localStorage.setItem(axeName+"Data", JSON.stringify(exportData));
        }
        console.log(localStorage.getItem(axeName+"Progress"));
    });

});