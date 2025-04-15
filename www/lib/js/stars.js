const indices = __INDICES__();
const points = __POINTS__();
const edges = __EDGES__();
const sizes = __SIZES__();


const starsEdges = document.getElementById('stars-edges');
const starsEdgesResize = () => {
    const w = starsEdges.clientWidth;
    const h = starsEdges.clientHeight;
    starsEdges.setAttribute('viewBox', `0 0 ${w} ${h}`);
};
starsEdgesResize();
window.addEventListener('resize', starsEdgesResize);

const stars = [...indices];

document.querySelectorAll('#stars-container>*').forEach((star, i) => {
    const currEdges = indices.map((o) => {
        const [x, y] = (i > o) ? [o, i] : [i, o];
        return [document.getElementById(`${x}-${y}`), o];
    }).filter(([e]) => !!e);

    stars[i] = [star, currEdges];
});

stars.forEach(([star, edges]) => {
    star.addEventListener('mouseenter', () => {
        edges.forEach(([edge]) => {
            edge.setAttribute('opacity', '1');
        });
    });

    star.addEventListener('mouseleave', () => {
        edges.forEach(([edge]) => {
            edge.setAttribute('opacity', '0');
        });
    });
});

function chooseRandom(arr) {
    return arr[Math.floor(Math.random() * arr.length)];
}


let lidx = 0;
const activeEdges = [];
setInterval(() => {
    if (Math.random() < 0.3) return;
    if (Math.random() < 0.03) lidx = chooseRandom(indices);

    let iter = 0;
    while (iter++ < 300) {
        const [, ledges] = stars[lidx];

        let edge, nidx, iter2 = 0;
        do {
            [edge, nidx] = chooseRandom(ledges);
        } while ((edge === undefined || activeEdges.includes(edge)) && iter2++ < 100);

        activeEdges.push(edge);

        edge.setAttribute("opacity", "1");
        setTimeout(() => {
            edge.setAttribute("opacity", "0");
            activeEdges.splice(activeEdges.indexOf(edge), 1);
        }, 4500 + Math.random() * 2500);

        lidx = nidx;
        return;
    }
}, 650);


