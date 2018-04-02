$('document').ready(function () {

    var buildSkillArray = function () {
        var skillArray = [];
        $('.question-item').each(function( index ) {
            var value = $(this).find('input[type=radio]:checked').val();
            skillArray.push({
                value: value ? parseInt(value) : 0,
                coeff: 0
            });

        });
        return skillArray;
    };

    var sumSkills = function (skillArray) {
        var sum = 0
        skillArray.forEach(function (skillValue) {
            sum += skillValue;
        })
        return sum;
    }

    var skills = buildSkillArray();
    var total = sumSkills(skills);
    console.log(skills);
    console.log(total);

    
    $('#axeForm input').on('change', function() {

    });

    var ctx = document.getElementById('axe1Chart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'polarArea',

        // The data for our dataset
        data: {
            labels: ["Offre"],
            datasets: [{
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgb(255, 99, 132)',
                data: [20],
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
                        return data.labels + ': ' + tooltipItems.yLabel + '%';
                    }
                }
            }
        }
    });

    setTimeout(function(){
        chart.data.datasets[0].data[0] = 60;
        chart.update();
    }, 3000);

});