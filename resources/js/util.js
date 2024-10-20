globalThis.styles = getComputedStyle(document.body)



globalThis.hslStringToHex = function (hslString) {
    const [h, s, l] = hslString.match(/\d+\.?\d*/g).map(Number);
    const sPercent = s / 100, lPercent = l / 100;
    const c = (1 - Math.abs(2 * lPercent - 1)) * sPercent;
    const x = c * (1 - Math.abs((h / 60) % 2 - 1));
    const m = lPercent - c / 2;
    let r = 0, g = 0, b = 0;

    if (h < 60) [r, g, b] = [c, x, 0];
    else if (h < 120) [r, g, b] = [x, c, 0];
    else if (h < 180) [r, g, b] = [0, c, x];
    else if (h < 240) [r, g, b] = [0, x, c];
    else if (h < 300) [r, g, b] = [x, 0, c];
    else if (h < 360) [r, g, b] = [c, 0, x];

    r = Math.round((r + m) * 255);
    g = Math.round((g + m) * 255);
    b = Math.round((b + m) * 255);

    return `#${((1 << 24) + (r << 16) + (g << 8) + b).toString(16).slice(1)}`;
}
