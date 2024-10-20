/**
 * Creates an area chart.
 * @param {Object} options - The options for the chart.
 * @param {string} options.chartId - The ID of the chart container element.
 * @param {Object} options.chartOptions - Additional chart options.
 * @param {Array} options.chartData - The data for the chart.
 * @param {boolean} [options.makeGlobal=false] - Whether to make the chart globally accessible.
 * @param {CSSStyleDeclaration} options.styles - The styles to apply to the chart.
 * @param {Function} options.hslStringToHex - Function to convert HSL string to HEX.
 * @returns {Object} The created chart.
 */
globalThis.makeAreaChart = function (options) {
    const {
        chartId,
        chartOptions,
        chartData,
        makeGlobal = false,
        styles,
        hslStringToHex
    } = options;

    const defaultChartOptions = {
        layout: {
            background: {
                color: hslStringToHex(styles.getPropertyValue('--background'))
            },
            textColor: hslStringToHex(styles.getPropertyValue('--muted-foreground')),
        },
        grid: {
            vertLines: {
                color: hslStringToHex(styles.getPropertyValue('--muted'))
            },
            horzLines: {
                color: hslStringToHex(styles.getPropertyValue('--muted'))
            },
        },
    };

    const mergedChartOptions = { ...defaultChartOptions, ...chartOptions };

    const chart = LightweightCharts.createChart(document.getElementById(chartId), mergedChartOptions);

    chart.applyOptions({
        crosshair: {
            horzLine: {
                visible: false,
                labelVisible: false,
            },
            vertLine: {
                labelVisible: false,
            },
        },
        grid: {
            vertLines: {
                visible: false,
            },
            horzLines: {
                visible: false,
            },
        },
    });

    const series = chart.addAreaSeries({
        topColor: hslStringToHex(styles.getPropertyValue('--primary')),
        bottomColor: hslStringToHex(styles.getPropertyValue('--secondary')),
        lineColor: hslStringToHex(styles.getPropertyValue('--primary')),
        lineWidth: 2,
        crossHairMarkerVisible: false,
    });

    series.priceScale().applyOptions({
        scaleMargins: {
            top: 0.3,
            bottom: 0.25,
        },
    });

    series.setData(chartData);

    if (makeGlobal) {
        window.charts = window.charts || {};
        window.charts[chartId] = chart;
    }

    return chart;
}

/**
 * Creates a line chart.
 * @param {Object} options - The options for the chart.
 * @param {string} options.chartId - The ID of the chart container element.
 * @param {Object} options.chartOptions - Additional chart options.
 * @param {Array} options.chartData - The data for the chart.
 * @param {boolean} [options.makeGlobal=false] - Whether to make the chart globally accessible.
 * @param {CSSStyleDeclaration} options.styles - The styles to apply to the chart.
 * @param {Function} options.hslStringToHex - Function to convert HSL string to HEX.
 * @returns {Object} The created chart.
 */
globalThis.makeLineChart = function (options) {
    const {
        chartId,
        chartOptions,
        chartData,
        makeGlobal = false,
        styles,
        hslStringToHex
    } = options;

    const chart = LightweightCharts.createChart(document.getElementById(chartId), {
        layout: {
            background: {
                color: hslStringToHex(styles.getPropertyValue('--background'))
            },
            textColor: hslStringToHex(styles.getPropertyValue('--muted-foreground')),
        },
        grid: {
            vertLines: {
                color: hslStringToHex(styles.getPropertyValue('--muted'))
            },
            horzLines: {
                color: hslStringToHex(styles.getPropertyValue('--muted'))
            },
        },
        ...chartOptions
    });

    const lineSeries = chart.addLineSeries({
        color: hslStringToHex(styles.getPropertyValue('--primary'))
    });

    lineSeries.setData(chartData);

    if (makeGlobal) {
        window.charts = window.charts || {};
        window.charts[chartId] = chart;
    }

    return chart;
}