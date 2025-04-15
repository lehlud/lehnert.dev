<slot />

<style>
    :global(html, body) {
        min-width: 100vw;
        min-height: max(100%, 100vh);
    }

    :global(*) {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :global(body) {
        background: linear-gradient(
            135deg,
            #1e1e2f 0,
            #252547 99vh,
            #252547 100vh
        );

        max-width: 100vw;
        overflow-x: hidden;
    }
</style>
