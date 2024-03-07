"use strict";
const data = {
  labels: dates,
  datasets: [
    {
      label: 'Documents',
      data: contents,
      borderColor: "#763CD4",
      borderWidth: 1,
      backgroundColor: '#763CD4',
      fill: false,
      pointRadius: [0],
      cubicInterpolationMode: 'monotone',
      tension: 0.4,
    },
    {
      label: 'Codes',
      data: codes,
      borderColor: "#FF774B",
      borderWidth: 1,
      backgroundColor: '#FF774B',
      fill: false,
      pointRadius: [0],
      cubicInterpolationMode: 'monotone',
      tension: 0.4,
    },
    {
      label: 'Images',
      data: images,
      borderColor: "#E22861",
      borderWidth: 1,
      backgroundColor: '#E22861',
      fill: false,
      pointRadius: [0],
      cubicInterpolationMode: 'monotone',
      tension: 0.4,
    },
    {
      label: 'Chats',
      data: chats,
      borderColor: "#851E3E",
      borderWidth: 1,
      backgroundColor: '#851E3E',
      fill: false,
      pointRadius: [0],
      cubicInterpolationMode: 'monotone',
      tension: 0.4,
    }
  ],
};

const legend = {
  id: 'legend',
  beforeInit(chart) {
    const fitValue = chart.legend.fit;
    chart.legend.fit = function fit() {
      fitValue.bind(chart.legend)();
      return this.height += 20;
    }
  }
}
const configuration = {
  type: 'line',
  data,
  options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
     y: {
        ticks: {
          color: '#898989',
          family:'"Figtree", sans-serif',
          font: {
            size: 9
        }
        },
      },
      x: {
        grid: {
          display: false,
        },
        ticks: {
          color: '#898989',
          family:'"Figtree", sans-serif',
          font: {
            size: 9
        },
        },
      },
      xAxes:{
        display:false
      }
    } ,
    plugins: {
    legend: {
      position:"top",
      labels: {
        font: {
          size: 12,
          weight: 500,
          family:'"Figtree", sans-serif',
        },
        boxWidth: 6,
        boxHeight:6,
        usePointStyle: true,
        pointStyle: "circle"
      }
    }
  },
  },
  plugins: [legend]
};
const myChart = new Chart(
  document.getElementById('myChart'),
  configuration
);
function copyToClipboard(text, messageElement) {
    navigator.clipboard.writeText(text).then(function () {
        $(messageElement).html("Copied!");
        $(messageElement).css("display", "block");
        setTimeout(function() {
        $(messageElement).fadeOut();
        }, 1000);
    });
}
  
$('.copy-button').on('click', function() {
    let couponCodeElement = $(this).closest('.magic-bg').find('#coupon-code');
    let couponCode = $(couponCodeElement).text();
    let copyMessageElement = $(this).closest('.magic-bg').find('#copied-message');
    copyToClipboard(couponCode, copyMessageElement);
});
