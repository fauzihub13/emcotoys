document.addEventListener("DOMContentLoaded", function () {
    // ============== TRANSACTION BARPLOT ==============
    fetch("/chart-data")
        .then((response) => response.json())
        .then((data) => {
            optionsTransaction.series[0].data = data;
            chartTransaction.updateOptions(optionsTransaction);

        })
        .catch((error) => console.error("Error fetching chart data:", error));

    // ============== USER CLUSTERING ==============
    fetch("/transaction-recap")
        .then((res) => res.json())
        .then((data) => {
            optionsUserClustering.series.forEach((s) => (s.data = []));

            data.forEach((cluster, index) => {
                Object.values(cluster).forEach((point) => {
                    optionsUserClustering.series[index].data.push({
                        x: point[1],
                        y: point[0],
                    });
                });
            });
            chartUserClustering.updateOptions(optionsUserClustering);
        })
        .catch((err) => {
            console.error("Failed to fetch segmentation data:", err);
        });

    // ============== TRANSACTION PERCENTAGE OPTIONS ==============
    fetch("transaction-percentage")
        .then((res) => res.json())
        .then((data) => {
            // Ambil angka persen, misal dari "27.97%" menjadi 27.97
            let percentage = parseFloat(data.paid_sales_percentage);

            chartTransactionPercentage.updateSeries([percentage]);
        })
        .catch((err) => {
            console.error("Failed to fetch transaction percentage:", err);
        });
});



// ============== TRANSACTION BARPLOT OPTIONS ==============
var optionsTransaction = {
    annotations: { position: "back" },
    dataLabels: { enabled: false },
    chart: { type: "bar", height: 300 },
    fill: { opacity: 1 },
    plotOptions: {},
    series: [{ name: "Sales", data: [] }],
    colors: "#435ebe",
    xaxis: {
        categories: [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
        ],
        title: {
            text: "Month",
        },
    },
    yaxis: {
        title: {
            text: "Transaction Amount (Rp)",
        },
    },
};

// ============== USER CLUSTERING OPTIONS ==============
var optionsUserClustering = {
    series: [
        {
            name: "Cluster 1",
            data: [],
        },
        {
            name: "Cluster 2",
            data: [],
        },
        {
            name: "Cluster 3",
            data: [],
        },
        {
            name: "Cluster 4",
            data: [],
        },
    ],
    chart: {
        height: 400,
        type: "scatter",
        zoom: {
            enabled: true,
            type: "xy",
        },
    },
    xaxis: {
        tickAmount: 10,
        title: {
            text: "Transaction Frequency",
        },
    },
    yaxis: {
        tickAmount: 7,
        title: {
            text: "Transaction Amount Average (Rp)",
        },
    },
};

// ============== TRANSACTION PERCENTAGE OPTIONS ==============
var optionsTransactionPercentage = {
    series: [0],
    chart: {
        height: 250,
        type: "radialBar",
        toolbar: {
            show: true,
        },
    },
    plotOptions: {
        radialBar: {
            startAngle: -135,
            endAngle: 225,
            hollow: {
                margin: 0,
                size: "70%",
                background: "#fff",
                image: undefined,
                imageOffsetX: 0,
                imageOffsetY: 0,
                position: "front",
                dropShadow: {
                    enabled: true,
                    top: 3,
                    left: 0,
                    blur: 4,
                    opacity: 0.5,
                },
            },
            track: {
                background: "#fff",
                strokeWidth: "67%",
                margin: 0, // margin is in pixels
                dropShadow: {
                    enabled: true,
                    top: -3,
                    left: 0,
                    blur: 4,
                    opacity: 0.7,
                },
            },

            dataLabels: {
                show: true,
                name: {
                    offsetY: -10,
                    show: true,
                    color: "#888",
                    fontSize: "17px",
                },
                value: {
                    formatter: function (val) {
                        return parseInt(val);
                    },
                    color: "#111",
                    fontSize: "36px",
                    show: true,
                },
            },
        },
    },
    fill: {
        type: "gradient",
        gradient: {
            shade: "dark",
            type: "horizontal",
            shadeIntensity: 0.5,
            gradientToColors: ["#ABE5A1"],
            inverseColors: true,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 100],
        },
    },
    stroke: {
        lineCap: "round",
    },
    labels: ["Percent"],
};

// ============== TRANSACTION BARPLOT RENDER ==============
var chartTransaction = new ApexCharts(
    document.querySelector("#chart-transactions"),
    optionsTransaction
);
chartTransaction.render();

// ============== USER CLUSTERING RENDER ==============
var chartUserClustering = new ApexCharts(
    document.querySelector("#user-segmentation"),
    optionsUserClustering
);
chartUserClustering.render();

// ============== TRANSACTION PERCENTAGE RENDER ==============
var chartTransactionPercentage = new ApexCharts(
    document.querySelector("#transaction-percentage"),
    optionsTransactionPercentage
);
chartTransactionPercentage.render();

