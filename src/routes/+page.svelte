<script lang="ts">
    import EMail from "$lib/assets/email.svg";
    import Git from "$lib/assets/git.svg";
    import GitHub from "$lib/assets/github.svg";
    import Instagram from "$lib/assets/instagram.svg";
    import LinkedIn from "$lib/assets/linkedin.svg";
    import Star from "$lib/assets/star.svg";
    import { onMount } from "svelte";

    $effect(() => {
        const indices = Array(50)
            .fill(0)
            .map((_, i) => i);

        const points: [number, number][] = indices.map(() => [
            Math.random(),
            Math.random(),
        ]);
        const sizes = indices.map(() => Math.max(Math.random(), 0.3) * 2);

        const stars = points.map(([x, y], i) => {
            const star = document.createElement("img");
            star.src = Star;
            star.classList.add("star");

            star.style.width = `${sizes[i]}vw`;
            star.style.position = "fixed";
            star.style.left = `${100 * x}%`;
            star.style.top = `${100 * y}%`;

            return star;
        });

        function chooseRandom<T>(arr: T[]): T {
            return arr[Math.floor(Math.random() * arr.length)];
        }

        const connections = stars.map((_, i) => {
            let others: number[] = [];

            const otherCount = Math.max(3, Math.floor(Math.random() * 10));
            for (let i = 0; i < otherCount; i++) {
                let other = i;
                while (other === i || others.includes(other)) {
                    other = chooseRandom(indices);
                }
                others.push(other);
            }

            return others;
        });

        let lidx: number = 0;
        const lineInterval = setInterval(() => {
            if (Math.random() < 0.3) return;
            if (Math.random() < 0.05) lidx = chooseRandom(indices);

            let iter = 0;
            while (iter++ < 1000) {
                const nidx = chooseRandom(indices);
                if (lidx === nidx) continue;

                const [lx, ly] = points[lidx];
                const [rx, ry] = points[nidx];
                const d = Math.sqrt(
                    Math.pow(lx - rx, 2) + Math.pow(ly - ry, 2),
                );
                if ((d > 0.4 && Math.random() < 0.8) || d > 0.5) continue;

                const line = document.getElementById(`${lidx}-${nidx}`);
                if (!line) continue;

                line.setAttribute("opacity", "1");
                setTimeout(
                    () => line.setAttribute("opacity", "0"),
                    4500 + Math.random() * 2500,
                );

                lidx = nidx;
                break;
            }
        }, 650);

        document.getElementById("stars")?.append(...stars);

        const linesSVG = document.getElementById("stars-lines");

        stars.forEach((_, i) => {
            const [x1, y1] = points[i];

            connections[i].forEach((conn) => {
                const [x2, y2] = points[conn];
                const line = document.createElementNS(
                    "http://www.w3.org/2000/svg",
                    "line",
                );

                line.setAttribute("x1", `${x1 * 100}%`);
                line.setAttribute("y1", `${y1 * 100}%`);
                line.setAttribute("x2", `${x2 * 100}%`);
                line.setAttribute("y2", `${y2 * 100}%`);

                line.setAttribute("stroke", "white");
                line.setAttribute("stroke-width", "1.5");

                line.id = `${i}-${conn}`;

                line.setAttribute("opacity", "0");

                linesSVG?.append(line);
            });
        });

        const enterListeners = stars.map((_, i) => () => {
            connections[i].forEach((conn) => {
                const line = document.getElementById(`${i}-${conn}`);
                line?.setAttribute("opacity", "1");
            });
        });

        const leaveListeners = stars.map((_, i) => () => {
            connections[i].forEach((conn) => {
                const line = document.getElementById(`${i}-${conn}`);
                line?.setAttribute("opacity", "0");
            });
        });

        stars.forEach((star, i) => {
            star.addEventListener("mouseenter", enterListeners[i]);
            star.addEventListener("mouseleave", leaveListeners[i]);
        });

        const svgResizeListener = () => {
            linesSVG?.setAttribute(
                "viewBox",
                `0 0 ${window.innerWidth} ${window.innerHeight}`,
            );
        };

        svgResizeListener();

        window.addEventListener("resize", svgResizeListener);

        return () => {
            clearInterval(lineInterval);

            stars.forEach((star, i) => {
                star.removeEventListener("mouseenter", enterListeners[i]);
                star.removeEventListener("mouseleave", leaveListeners[i]);
            });

            window.removeEventListener("resize", svgResizeListener);
        };
    });
</script>

<svg
    id="stars-lines"
    aria-hidden="true"
    style="position: fixed; left: 0; top: 0; height: 100%; width: 100%; z-index: 0;"
></svg>

<div id="stars" style="position: fixed; left: 0; top: 0; z-index: 2;"></div>

<main style="position: relative; z-index: 1;">
    <h1>Hey, I'm Ludwig 🚀</h1>
    <p>Welcome to my digital playground.</p>

    <div class="social-links">
        <a target="_blank" href="https://instagram.com/lehlud">
            <img src={Instagram} alt="" width="25" />
        </a>
        <a target="_blank" href="https://linkedin.com/in/ludwig-lehnert">
            <img src={LinkedIn} alt="" width="25" />
        </a>
        <a target="_blank" href="mailto:info@lehnert.dev">
            <img src={EMail} alt="" width="25" />
        </a>
        <a target="_blank" href="https://gitea.cloud.lehnert.dev/explore/repos">
            <img src={Git} alt="" width="25" />
        </a>
        <a target="_blank" href="https://github.com/lehlud">
            <img src={GitHub} alt="" width="25" />
        </a>
    </div>

    <div class="legal-links">
        <a href="/imprint">Imprint</a>
        <a href="/privacy">Privacy Policy</a>
    </div>
</main>

<style>
    h1 {
        font-size: 3.5rem;
        background: linear-gradient(90deg, #00ffff, #ff00ff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: glow 3s ease-in-out infinite alternate;
    }

    @keyframes glow {
        from {
            text-shadow: 0 0 10px #00ffff;
        }
        to {
            text-shadow: 0 0 20px #ff00ff;
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    :global(.star) {
        animation: fadeIn 1s forwards;
        transition-duration: 500ms;
        translate: -50% -50%;
    }

    :global(#stars-lines line) {
        transition-duration: 500ms;
    }

    :global(#stars-lines line[opacity="1"]) {
        animation: strokeAnim 3s ease-in-out forwards;
    }

    @keyframes strokeAnim {
        from {
            stroke: #00ffff;
        }
        to {
            stroke: #ff00ff;
        }
    }

    p {
        font-size: 1.2rem;
        max-width: 600px;
        margin-top: 1rem;
        color: #ccc;
    }

    .social-links {
        display: flex;
        gap: 0.75rem;
        margin-top: 1.5rem;
    }

    .social-links a {
        padding: 0.75rem;
        font-size: 1rem;
        background: #00ffff;
        color: #1e1e2f;
        border: none;
        border-radius: 999px;
        cursor: pointer;
        transition: background 0.3s ease;

        display: grid;
        place-items: center;
    }

    .social-links a:hover {
        background: #ff00ff;
        color: white;
    }

    .legal-links {
        margin-top: 1rem;
        display: flex;
        gap: 0.5rem;
    }

    .legal-links a {
        color: rgb(255, 255, 255);
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .legal-links a:hover {
        opacity: 0.8;
    }
</style>
